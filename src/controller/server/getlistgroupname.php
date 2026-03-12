<?
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id

$orgid=$_GET['orgid'];
$addnone=$_GET['addnone'];

if ($user->mode!="1")
{
    $SQL = "SELECT * FROM group_nome WHERE active=1 ORDER BY name";
    $result = mysql_query( $SQL ) or die("Не могу выбрать список групп!".mysql_error());
    $sts="<select name=sgroupname id=sgroupname>";
    if ($addnone=='true'){$sts=$sts."<option value='-1' >нет выбора</option>";};
    while($row = mysql_fetch_array($result)) {
         $sts=$sts."<option value=$row[id]>$row[name]</option>";
	};
    $sts=$sts."</select>";
 echo $sts;
} else {echo "Не достаточно прав!!!";}

?>