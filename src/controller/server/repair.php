<?php
include("../../inc/class/config.php");		// загружаем классы настроек
include("../../inc/class/users.php");		// загружаем классы настроек
include("../../inc/class/class.phpmailer.php");		//
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
$cfg->GetFromBaseNoSmarty();				// получаем настройки из базы
include("../../functions.php");		// подгружаем функции (мини версия)
include("../../controller/server/login.php");			// проверяем вход пользователя

if (isset($_GET["step"])) {$step=$_GET["step"];} else {$step="";};
if (isset($_GET["eqid"])) {$eqid=$_GET["eqid"];} else {$eqid="";};
$oper= $_POST['oper'];

$id = $_POST['id'];
if ($id!=""){$eqid=$id;};

// Выполняем токма если юзер зашел!
if (($user->mode==1) and ($eqid!=''))
{
  if ($step=='add'){
	$dtpost=DateToMySQLDateTime2(ClearHtml($_POST["dtpost"]));
	if ($dtpost==""){$err[]="Не выбрана дата!";};   
	$dt=DateToMySQLDateTime2(ClearHtml($_POST["dt"]));
	if ($dtpost==""){$err[]="Не выбрана дата!";};   
	$kntid=ClearHtml($_POST["kntid"]);
	if ($kntid==""){$err[]="Не выбран контрагент!";};   
        $cst=ClearHtml($_POST["cst"]);
	$status=ClearHtml($_POST["status"]);	
      	$comment=ClearHtml($_POST["comment"]);
	
        if (count($err)==0){
            $sql="INSERT INTO repair (id,dt,kntid,eqid,cost,comment,dtend,status)
            VALUES (NULL,'$dtpost','$kntid','$eqid','$cst','$comment','$dt','1')";                                      
            $result = mysql_query($sql,$cfg->base_id);                
            if ($result==''){die('Не смог добавить ремонт!: ' . mysql_error());}   
            $sql="UPDATE equipment SET repair='$status' WHERE id='$eqid'";            
            $result = mysql_query($sql,$cfg->base_id);                
            if ($result==''){die('Не смог обновить запись о ремонте!: ' . mysql_error());}   
            
        };
      
  };  
    if ($step=='list'){          
            $page = $_GET['page']; // get the requested page
            $limit = $_GET['rows']; // get how many rows we want to have into the grid
            $sidx = $_GET['sidx']; // get index row - i.e. user click to sort
            $sord = $_GET['sord']; // get the direction
            $oper= $_POST['oper'];
            $id = $_POST['id'];  
            
            if(!$sidx) $sidx =1;
            $result = mysql_query("SELECT COUNT(*) AS count FROM repair");
            $row = mysql_fetch_array($result);
            $count = $row['count'];

            if( $count >0 ) {$total_pages = ceil($count/$limit);} else {$total_pages = 0;};
            if ($page > $total_pages) $page=$total_pages;

            $start = $limit*$page - $limit;
            $SQL = "SELECT rp2.rstatus as rstatus,rp2.rpid as rpid,knt.id as kntid,knt.name as namekont,rp2.kntid,rp2.dt,rp2.cost,rp2.comment,rp2.dtend,rp2.nomeid,rp2.name as namenome FROM knt INNER JOIN(
                    SELECT rp.rstatus as rstatus,rp.rpid as rpid,nome.name,rp.kntid,rp.dt,rp.cost,rp.comment,rp.dtend,rp.nomeid FROM nome INNER JOIN 
                    (SELECT repair.status as rstatus,repair.id as rpid,repair.kntid,repair.dt,repair.cost,repair.comment,repair.dtend,equipment.nomeid FROM repair INNER JOIN  equipment ON repair.eqid= equipment.id) AS rp ON rp.nomeid=nome.id) AS rp2 ON rp2.kntid=knt.id ORDER BY $sidx $sord LIMIT $start , $limit";
            $result = mysql_query( $SQL ) or die("Не могу выбрать список контрагентов!".mysql_error());

            $responce->page = $page;
            $responce->total = $total_pages;
            $responce->records = $count;
            $i=0;
            while($row = mysql_fetch_array($result)) {
                $responce->rows[$i]['id']=$row[rpid];
                if ($row[rstatus]=='1'){$row[rstatus]="Ремонт";} else {$row[rstatus]="Сделано";}
                $responce->rows[$i]['cell']=array($row[rpid],$row[namekont],$row[namenome],MySQLDateTimeToDateTime($row[dt]),MySQLDateTimeToDateTime($row[dtend]),$row[cost],$row[comment],$row[rstatus]);
                $i++;
                }
            echo json_encode($responce);            
    };  
       if ($step=='edit'){
           //echo "!$oper!!";
         if ($oper=='edit'){
            $cost=$_POST['cost'];
            $comment=$_POST['comment'];
            $rstatus=$_POST['rstatus'];
            $SQL = "UPDATE repair SET cost='$cost',comment='$comment',status='$rstatus' WHERE id='$eqid'";
            $result = mysql_query( $SQL ) or die("Не смог обновить статус ремонта!".mysql_error());
            $SQL="SELECT * FROM repair WHERE id='$eqid'";
            $result = mysql_query($SQL)  or die("Не получилось выбрать список ремонтов!".mysql_error());
            while($row = mysql_fetch_array($result)) {
              $eqid_1=$row[eqid];
            };
            $SQL = "UPDATE equipment SET repair='$rstatus' WHERE id='$eqid_1'";
            $result = mysql_query( $SQL ) or die("Не смог обновить статус ремонта!".mysql_error());
         };
         if ($oper=='del'){
            //echo "!$oper!$eqid!"; 
            $SQL="SELECT * FROM repair WHERE id='$eqid'";
            $result = mysql_query($SQL)  or die("Не получилось выбрать список ремонтов!".mysql_error());
            while($row = mysql_fetch_array($result)) {
              $status=$row[status];
            };
            echo "!$oper!$eqid!$status!"; 
            if ($status!='1'){
            $SQL = "delete FROM repair WHERE id='$eqid'";
            $result = mysql_query( $SQL ) or die("Не смог обновить статус ремонта!".mysql_error());};
         };
         
            
        };
};

if ($step!="list")
{
 if (count($err)==0) {echo "ok";} else {
  echo '<script>$("#messenger").addClass("alert alert-error");</script>';
        for ($i = 0; $i <= count($err); $i++) {echo "$err[$i]<br>";};  };
};
?>
