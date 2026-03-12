<?php
$orgid = $_GET['orgid'];
include("../../inc/class/config.php");
include("../../controller/server/functions.php");		// подгружаем функции (мини версия)
$cfg=new Tconfig;
include("../../config.php");		
include("../../inc/connect.php");	
?>
<table  id="mytable" class="table table-striped">
<thead>
<tr>
<th>Статус</th>
<th>IP (имя)</th>
<th>Название</th>
<th>Группа</th>
<th>Где</th>
</tr>
</thead>
<tbody>
<?
$SQL = "SELECT places.name as pname,eq3.grname as grname,eq3.ip as ip,eq3.nomename as nomename FROM places INNER JOIN
    (SELECT eq2.placesid as placesid,group_nome.name as grname,eq2.ip as ip,eq2.nomename as nomename FROM group_nome INNER JOIN
    (SELECT eq.placesid as placesid,nome.groupid as groupid,eq.ip as ip,nome.name as nomename FROM nome INNER JOIN 
    (SELECT equipment.placesid as placesid,equipment.nomeid as nomeid,equipment.ip as ip FROM equipment WHERE equipment.active=1 and equipment.ip<>'' and equipment.orgid='$orgid') as eq ON eq.nomeid=nome.id) as eq2 ON eq2.groupid=group_nome.id) as eq3 ON places.id=eq3.placesid";
$result = mysql_query( $SQL ) or die("Не получилось выполнить запрос на получение списка номенклатуры!".mysql_error());
 while($row = mysql_fetch_array($result)) { 
exec("ping $row[ip] -c 1 -w 1 && exit", $output, $retval);     
if ($retval != 0){$res='<i class="icon-remove"></i>';} else {$res='<i class="icon-ok"></i>';};
//print_r($output);
echo "<tr>";
echo "<td>$res</td>";
echo "<td>$row[ip]</td>";
echo "<td>$row[nomename]</td>";
echo "<td>$row[grname]</td>";
echo "<td>$row[pname]</td>";
echo "</tr>";
  };
?>

</tbody>
</table>
