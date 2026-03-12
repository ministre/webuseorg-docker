<?
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id

$id=$_GET['groupid'];
$vendorid=$_GET['vendorid'];
$addnone=$_GET['addnone'];

if ($user->mode!="1")
{
    $SQL = "SELECT vendorid, vendor.name, COUNT( nome.id ) FROM nome INNER JOIN vendor ON vendor.id = vendorid WHERE groupid ='$id' GROUP BY vendorid";
    $result = mysql_query( $SQL ) or die("Не могу выбрать список групп!".mysql_error());
    $sts="<select name=svendid id=svendid>";
    if ($addnone=='true'){$sts=$sts."<option value='-1' >нет выбора</option>";};
    while($row = mysql_fetch_array($result)) {
         $sts=$sts."<option value=$row[vendorid] ";
	 if ($vendorid==$row[vendorid]){$sts=$sts."selected";};
	 $sts=$sts.">$row[name]</option>";
	};
    $sts=$sts."</select>
";
 echo $sts;
} else {echo "Не достаточно прав!!!";}

?>