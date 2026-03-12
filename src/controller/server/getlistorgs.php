<?
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id

if ($user->mode!="1")
{
    $SQL = "SELECT * FROM org WHERE active=1 ORDER BY name";
    $result = mysql_query( $SQL ) or die("Не могу выбрать список организаций!".mysql_error());
    $sts="<select name=orgs id=orgs>";
    while($row = mysql_fetch_array($result)) {
         $sts=$sts."<option value=$row[id] ";
	  if ($user->orgid==$row[id]){$sts=$sts."selected";};          
	 $sts=$sts.">$row[name]</option>";
	};
    $sts=$sts."</select>";   
 echo $sts;
} else {echo "Не достаточно прав!!!";}

?>