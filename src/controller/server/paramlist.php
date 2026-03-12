<?
include("../../inc/class/config.php");
include("../../controller/server/functions.php");		// подгружаем функции (мини версия)
$cfg=new Tconfig;
include("../../config.php");		
include("../../inc/connect.php");	

$id = $_GET['eqid'];
$oper = $_POST['oper'];
$param = $_POST['param'];
$paramidid = $_POST['id'];
if ($id==""){$id = $_POST['eqid'];};
//echo "!$paramid!";

// получаем группу номенклатуры
    $SQL = "SELECT equipment.id,nome.id as nomeid,nome.groupid AS groupid FROM equipment INNER JOIN nome ON nome.id=equipment.nomeid WHERE (equipment.id='$id') AND (nome.active=1)";
    //echo "!$SQL!";
    $result = mysql_query( $SQL ) or die("Не получилось найти группу!".mysql_error());
    while($row = mysql_fetch_array($result)) {
        $groupid=$row[groupid];
    };
    if ($groupid=="") {echo "Нет параметров у группы!";die();};
    //echo "!$groupid!";
// получаем список параметров группы
    $SQL = "SELECT id,name FROM group_param WHERE (groupid='$groupid') AND (active=1)";
    //echo "!$SQL!";
    $result = mysql_query( $SQL ) or die("Не получилось найти параметры!".mysql_error());
    while($row = mysql_fetch_array($result)) {
        $paramid=$row[id];
        $name=$row[name];
        //echo "!$paramid!$name!";
            // проверяем, если какогото параметра нет, то добавляем его в основную таблице связанную с оргнехникой
            $SQL = "SELECT id FROM eq_param WHERE (grpid='$groupid') AND (eqid='$id') AND (paramid='$paramid')";
            $res2 = mysql_query( $SQL ) or die("Не получилось выбрать существующие параметры!".mysql_error());
            $cnt=0;
            while($row2 = mysql_fetch_array($res2)) {$cnt++;};
            // если параметра нет, то добавляем...
            if ($cnt==0){
                $SQL="INSERT INTO eq_param (id,grpid,paramid,eqid) VALUES (NULL,'$groupid','$paramid','$id')";
             	 $rs = mysql_query($SQL,$cfg->base_id);                
  		 if ($rs==''){die('Не смог добавить параметр!: ' . mysql_error());}

            };
    };

// получаем список параметров конкретной позиции     
    $SQL = "SELECT eq_param.id as pid,group_param.name as pname,eq_param.param as pparam FROM eq_param INNER JOIN group_param ON group_param.id=eq_param.paramid WHERE (eqid='$id')";
   // echo "!$SQL!";
    $result = mysql_query( $SQL ) or die("Не получилось найти параметры!".mysql_error());
    $i=0;
    while($row = mysql_fetch_array($result)) {
        $responce->rows[$i]['id']=$row[pid];
		$responce->rows[$i]['cell']=array(
		$row[pid],$row[pname],$row[pparam]
		);
	    $i++;
        
    };
    echo json_encode($responce);
// если просто листаем, тогда
if ($oper=='edit')
{
              $sql="UPDATE eq_param SET eq_param.param='$param' WHERE id='$paramidid'";
            //  echo "!$sql!";
  		$result = mysql_query($sql,$cfg->base_id);                
  		if ($result==''){die('Не смог изменить параметр!: ' . mysql_error());}    
};

if ($oper=='del')
{
              $sql="DELETE FROM eq_param WHERE id='$paramidid'";
              echo "!$sql!";
  		$result = mysql_query($sql,$cfg->base_id);                
  		if ($result==''){die('Не смог удалить параметр!: ' . mysql_error());}    
};


?>