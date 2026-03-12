<?
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id

$eqid=$_GET['eqid'];

 $SQL = "SELECT * FROM org WHERE id='$eqid'";
    $result = mysql_query( $SQL ) or die("Не могу выбрать список фото!".mysql_error());
    $photo="";
    while($row = mysql_fetch_array($result)) {
        $photo=$row[picmap];
	};
  if ($photo!="") {echo "<img src=images/maps/0-0-0-$photo width=100%>";} else 
  {echo "<img src=images/noimage.jpg width=100%>";};
?>