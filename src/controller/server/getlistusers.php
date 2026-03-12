<?
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id

$orgid=$_GET['orgid'];
$userid=$_GET['userid'];
$addnone=$_GET['addnone'];
//echo "!!!$userid!!!";
if ($user->mode!="1")
{
    $SQL = "SELECT * FROM users WHERE orgid='$orgid' AND active=1 ORDER BY login";
    $result = mysql_query( $SQL ) or die("Не могу выбрать список пользователей!".mysql_error());
    $sts="<select name=suserid id=suserid>";
    if ($addnone=='true'){$sts=$sts."<option value='-1' >нет выбора</option>";};
    while($row = mysql_fetch_array($result)) {
         $sts=$sts."<option value=$row[id] ";
	  if ($userid==$row[id]){$sts=$sts."selected";};
	 $sts=$sts.">$row[login]</option>";
	};
    $sts=$sts."</select>";   
 echo $sts;    
} else {echo "Не достаточно прав!!!";}

?>