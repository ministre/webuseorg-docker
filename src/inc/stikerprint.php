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
 echo "<table border=1 width=1380px cellpadding=8 cellspacing=0>";
 $rw=0;
 for ($i=0;$i<=count($idmass);$i++) {
  $sql="SELECT * FROM users_profile WHERE usersid='$idmass[$i]'";
  $result = mysql_query($sql) or die("Не могу выбрать!".mysql_error());  
   if ($rw==0) {echo "<tr style='vertical-align: top;'>";};
   echo "<td width=460px >";
  while($row = mysql_fetch_array($result)) {		
	$fio=$row[fio];
	$code=$row[code];
	$post=$row[post];
	echo "<h1>$fio</h1>";
	echo "<h2>$post</h2>";
	echo "<h3>№$code</h3>";	
	};
	echo "</td>";	
	if ($rw==2) {echo "</tr>";};
	$rw++;
	if ($rw==3) {$rw=0;};	
	};
echo "</table>";		
?>
</body>
</html>