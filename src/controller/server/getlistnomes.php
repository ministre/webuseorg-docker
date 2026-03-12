<?
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id

$id=$_GET['groupid'];
$vid=$_GET['vendorid'];
$nomeid=$_GET['nomeid'];

if ($user->mode!="1")
{
    $SQL = "SELECT id,name FROM nome WHERE groupid ='$id' and vendorid='$vid'";
    $result = mysql_query( $SQL ) or die("Не могу выбрать список номенклатуры!".mysql_error());
    $sts="<select name=snomeid id=snomeid>";
    while($row = mysql_fetch_array($result)) {
         $sts=$sts."<option value=$row[id] ";
	 if ($nomeid==$row[id]) {$sts=$sts."selected";};
	 $sts=$sts.">$row[name]</option>";
	};
    $sts=$sts."</select>
";
 echo $sts;
} else {echo "Не достаточно прав!!!";}

?>