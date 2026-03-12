<?
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
include("../../controller/server/functions.php");		// подгружаем функции (мини версия)

$geteqid=$_POST['geteqid'];
$uploaddir = '../../images/photo/';

$userfile_name=basename($_FILES['myfile']['name']);
$len=strlen($userfile_name);
$ext_file=substr($userfile_name,$len-4,$len);
$tmp=GetRandomId(20);
$userfile_name=$tmp.$ext_file;
$uploadfile = $uploaddir.$userfile_name;

$sr=$_FILES['myfile']['tmp_name'];
$dest=$uploadfile;

$res=move_uploaded_file($sr,$dest);
if ($res!=false){
     echo "$userfile_name";
     //echo "$geteqid!";
        if ($geteqid!=""){
     	$SQL = "UPDATE equipment SET photo='$userfile_name' WHERE id='$geteqid'";
	$result = mysql_query( $SQL ) or die("Не могу обновить фото!".mysql_error());
        };
     } else {echo "error";};
?>