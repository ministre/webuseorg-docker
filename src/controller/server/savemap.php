<?
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id

$eqid=$_GET['eqid'];
$coor=$_GET['coor'];
//print_r($coor);
$x=$coor[0][1];
$y=$coor[0][0];
//echo "$zx";
    $SQL = "UPDATE equipment SET mapx='$x',mapy='$y',mapmoved=0 WHERE id='$eqid'";
    $result = mysql_query( $SQL ) or die("Не могу координаты ТМЦ!".mysql_error());
?>