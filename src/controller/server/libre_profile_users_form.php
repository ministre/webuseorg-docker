<?php
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
include("../../functions.php");		// подгружаем функции (мини версия)


if (isset($_GET["step"])) {$step=$_GET["step"];} else {$step="";};
if (isset($_GET["id"])) {$id=$_GET["id"];} else {$id="";};
if (isset($_GET["userid"])) {$userid=$_GET["userid"];} else {$id="";};
    $fio=ClearHtml($_POST["fio"]);
    $endfaze=DateToMySQLDateTime2(ClearHtml($_POST["endfaze"]));
    $post=ClearHtml($_POST["post"]);
    $faza=ClearHtml($_POST["faza"]);
    $code=ClearHtml($_POST["code"]);
//echo "!$endfaze!";
    if ($step=="add")
    {
        $sql="INSERT INTO users_profile (id,usersid,fio,faza,code,enddate,post) VALUES (NULL,'$userid','$fio','$faza','$code','$enddate','$post')";                                      
        $result = mysql_query($sql,$cfg->base_id);                
        if ($result==''){die('Не смог добавить профиль!: ' . mysql_error());}
        
    };

    if ($step=="edit")
    {
        $sql="UPDATE users_profile SET fio='$fio',faza='$faza',code='$code',enddate='$endfaze',post='$post' WHERE usersid='$userid'";                                      
        $result = mysql_query($sql,$cfg->base_id);                
        if ($result==''){die('Не смог добавить профиль!: ' . mysql_error());}
        
    };
echo "ok";

?>
