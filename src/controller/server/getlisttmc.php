<?php
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id

$placesid=$_GET['placesid'];
$addnone=$_GET['addnone'];

if ($user->mode!="1")
{
    $SQL = "SELECT nome.id as nid,nome.name as nomename,eq.id as eqid FROM nome INNER JOIN (SELECT nomeid,id FROM equipment WHERE placesid='$placesid') as eq ON nome.id=eq.nomeid";
    $result = mysql_query( $SQL ) or die("Не могу выбрать список помещений!".mysql_error());
    $sts="<select name=splacestmc id=splacestmc size=10>";
    if ($addnone=='true'){$sts=$sts."<option value='-1' >нет выбора</option>";};
    while($row = mysql_fetch_array($result)) {
         $sts=$sts."<option value=$row[eqid] ";
	  if ($placesid==$row[eqid]){$sts=$sts."selected";};
	 $sts=$sts.">$row[nomename]</option>";
	};
    $sts=$sts."</select>";   
 echo $sts;    
} else {echo "Не достаточно прав!!!";}

?>

<script type="text/javascript" src="controller/client/js/mapeq.js"></script>