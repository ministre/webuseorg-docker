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


function SendEmailByPlaces($plid,$title,$txt){
    global $cfg;
    $sql="SELECT userid AS uid, users.email AS email
            FROM places_users
            INNER JOIN users ON users.id = places_users.userid
            WHERE places_users.placesid =$plid
            AND users.email <>  ''";
    $result = mysql_query($sql,$cfg->base_id);  
    //echo "!$result!";
    while($row = mysql_fetch_array($result)) {
     smtpmail($row[email],$title,$txt);   
     //echo "!$row[email],$title,$txt!-";
    };
};

if (isset($_GET["step"])) {$step=$_GET["step"];} else {$step="";};
// Выполняем токма если юзер зашел!
if (($user->mode==1) and ($step!=''))
{
    if ($step!='move'){
	$dtpost=DateToMySQLDateTime2(ClearHtml($_POST["dtpost"]));
	if ($dtpost==""){$err[]="Не выбрана дата!";};   
	$sorgid=ClearHtml($_POST["sorgid"]);
	if ($sorgid==""){$err[]="Не выбрана организация!";};  
	$splaces=ClearHtml($_POST["splaces"]);
	if ($splaces==""){$err[]="Не выбрано помещение!";};    
	$suserid=ClearHtml($_POST["suserid"]);
	if ($suserid==""){$err[]="Не выбран пользователь!";};    
	$sgroupname=ClearHtml($_POST["sgroupname"]);
	if ($sgroupname==""){$err[]="Не выбрана группа номенклатуры!";};    
	$svendid=ClearHtml($_POST["svendid"]);
	if ($svendid==""){$err[]="Не выбран производитель!";};    
	$snomeid=ClearHtml($_POST["snomeid"]);
	if ($snomeid==""){$err[]="Не выбрана номенклатура!";};    
	$buhname=ClearHtml($_POST["buhname"]);
	$sernum=ClearHtml($_POST["sernum"]);
	$invnum=ClearHtml($_POST["invnum"]);
	$shtrihkod=ClearHtml($_POST["shtrihkod"]);    
	$os=ClearHtml($_POST["os"]);
	$mode=ClearHtml($_POST["mode"]);
        $mapyet=ClearHtml($_POST["mapyet"]);
	$cost=ClearHtml($_POST["cost"]);
	$picphoto=ClearHtml($_POST["picname"]);
	$currentcost=ClearHtml($_POST["currentcost"]);
	$comment=ClearHtml($_POST["comment"]);
        $ip=ClearHtml($_POST["ip"]);
    } else
    {
        $sorgid=ClearHtml($_POST["sorgid"]);
	if ($sorgid==""){$err[]="Не выбрана организация!";};  
        $splaces=ClearHtml($_POST["splaces"]);
	if ($splaces==""){$err[]="Не выбрано помещение!";};    
        $suserid=ClearHtml($_POST["suserid"]);
	if ($suserid==""){$err[]="Не выбран пользователь!";};
	
        $sorgid1=ClearHtml($_POST["sorgid1"]);
	if ($sorgid1==""){$err[]="Не выбрана организация!";};  
        $splaces1=ClearHtml($_POST["splaces1"]);
	if ($splaces1==""){$err[]="Не выбрано помещение!";};    
        $suserid1=ClearHtml($_POST["suserid1"]);
	if ($suserid1==""){$err[]="Не выбран пользователь!";};    	
	
	$comment=ClearHtml($_POST["comment"]);
    };
       // Добавляем родимую
    
    if ($step=="add")
    {
     if (count($err)==0)
     {               
        $sql="INSERT INTO equipment (id,orgid,placesid,usersid,nomeid,buhname,datepost,cost,currentcost,sernum,invnum,shtrihkod,os,mode,comment,active,ip,mapyet)
        VALUES (NULL,'$sorgid','$splaces','$suserid','$snomeid','$buhname','$dtpost','$cost','$currentcost','$sernum','$invnum','$shtrihkod','$os','$mode','$comment','1','$ip','$mapyet')";                                      
  	$result = mysql_query($sql,$cfg->base_id);                
  	if ($result==''){die('Не смог добавить номенклатуру!: ' . mysql_error());}
	if ($cfg->sendemail==1){
		     $txt="Внимание! На Вашу ответственность переведена новая единица ТМЦ. <a href=$url?content_page=eq_list&usid=$suserid>Подробности здесь.</a>";
		      smtpmail("$touser->email","Уведомление о перемещении ТМЦ",$txt);
                      SendEmailByPlaces($splaces,"Изменился состав ТМЦ в помещении","Внимание! В закрепленном за вами помещении изменился состав ТМЦ. <a href=$url?content_page=eq_list>Подробнее здесь.</a>");
		    };		      

     };
    };
    if ($step=="edit")
    {
     if (count($err)==0)
     {
              $id=$_GET["id"];
	      //echo "!$id!$sorgid!$picphoto!";
              $sql="UPDATE equipment SET
	      usersid='$suserid',nomeid='$snomeid',buhname='$buhname',
	      datepost='$dtpost',cost='$cost',currentcost='$currentcost',sernum='$sernum',invnum='$invnum',
	      shtrihkod='$shtrihkod',os='$os',mode='$mode',comment='$comment',photo='$picphoto',ip='$ip',mapyet='$mapyet' WHERE id='$id'";                                      
  		$result = mysql_query($sql,$cfg->base_id);                
  		if ($result==''){die('Не смог изменить номенклатуру!: ' . mysql_error());}

     };
    };
    if ($step=="move")
    {
     if (count($err)==0)
     {
              $id=$_GET["id"];
	      //echo "!$id!$sorgid!$picphoto!";
              $sql="UPDATE equipment SET mapmoved=1,
	      orgid='$sorgid',placesid='$splaces',usersid='$suserid' WHERE id='$id'";                                      
  		$result = mysql_query($sql,$cfg->base_id);                
  		if ($result==''){$err[]='Не смог изменить регистр номенклатуры - перемещение!: ' . mysql_error();}        
	$sql="INSERT INTO move (id,eqid,dt,orgidfrom,orgidto,placesidfrom,placesidto,useridfrom,useridto,comment)
        VALUES (NULL,'$id',NOW(),'$sorgid1','$sorgid','$splaces1','$splaces','$suserid1','$suserid','$comment')";                                      
  	$result = mysql_query($sql,$cfg->base_id);
	//echo "!$sql!";
  	if ($result==''){$err[]='Не смог добавить перемещение!: ' . mysql_error();}
		if ($cfg->sendemail==1){
		     $touser= new Tusers;
		     $touser->GetById($suserid);
		     $url=GetSiteUrl();
		     $tmcname=GetTMCName($id);
		     //echo "-$tmcname-";
		     $txt="Внимание! На Вашу ответственность переведена новая единица ТМЦ ($tmcname). <a href=$url?content_page=eq_list&usid=$suserid>Подробности здесь.</a>";
		      smtpmail("$touser->email","Уведомление о перемещении ТМЦ",$txt);
                     SendEmailByPlaces($splaces1,"Изменился состав ТМЦ в помещении","Внимание! В закрепленном за вами помещении изменился состав ТМЦ. <a href=$url?content_page=eq_list>Подробнее здесь.</a>");
                     SendEmailByPlaces($splaces,"Изменился состав ТМЦ в помещении","Внимание! В закрепленном за вами помещении изменился состав ТМЦ. <a href=$url?content_page=eq_list>Подробнее здесь.</a>");                     
		     $touser= new Tusers;
		     $touser->GetById($suserid1);
		     $txt="Внимание! С вашей отвественности снята единица ТМЦ ($tmcname). <a href=$url?content_page=eq_list&usid=$suserid1>Подробности здесь.</a>";
		      smtpmail("$touser->email","Уведомление о перемещении ТМЦ",$txt);		      
		    };

     };
    };
 
};
  if (count($err)==0) {echo "ok";} else {
  echo '<script>$("#messenger").addClass("alert alert-error");</script>';
        for ($i = 0; $i <= count($err); $i++) {echo "$err[$i]<br>";};  };
?>
