
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="ru-RU">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="generator" content="yarus" />
</head>
<body>
<?
include("../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../config.php");			// загружаем основные настройки, которых нет в БД
include("../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id

 $idmass=explode(",",$_GET[mass]);
 echo "<table border=1>";
 $rw=0;
 for ($i=0;$i<=count($idmass);$i++) {
  $sql="SELECT equipment.shtrihkod,equipment.buhname,nome.name as nomename,equipment.invnum FROM equipment INNER JOIN nome ON nome.id=equipment.nomeid WHERE equipment.id='$idmass[$i]'";
  $result = mysql_query($sql) or die("Не могу выбрать!".mysql_error());  
   if ($rw==0) {echo "<tr>";};
   echo "<td>";
  while($row = mysql_fetch_array($result)) {		
	$shtrihkod=$row[shtrihkod];
	$buhname=$row[buhname];
	$nomename=$row[nomename];
	$invnum=$row[invnum];
	echo "<font size=1>Бух:$buhname<br>";
	echo "ИТ:$nomename</font><br>";
	echo "<img src='ean13.php?shtrihkod=$shtrihkod'><br>";	
	echo "№$invnum<br>";	
	};
	echo "</td>";	
	if ($rw==3) {echo "</tr>";};
	$rw++;
	if ($rw==4) {$rw=0;};	
	};
echo "</table>";		
?>
</body>
</html>