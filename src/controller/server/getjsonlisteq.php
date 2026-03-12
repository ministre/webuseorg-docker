<?
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id

$orgid=$_GET['orgid'];
$selpom=$_GET['selpom'];

if ($selpom!='null') {$spom=" AND equipment.placesid=$selpom";} else {$spom="";};

$SQL = "SELECT equipment.photo as photo,equipment.mapmoved as mapmoved,getvendorandgroup.grnomeid,equipment.mapx as mapx,equipment.mapy as mapy,equipment.id AS eqid,equipment.orgid AS eqorgid, org.name AS orgname, getvendorandgroup.vendorname AS vname, 
            getvendorandgroup.groupname AS grnome, places.name AS placesname, users.login AS userslogin, 
            getvendorandgroup.nomename AS nomename, buhname, sernum, invnum, shtrihkod, datepost, cost, currentcost, os, equipment.mode AS eqmode, equipment.comment AS eqcomment, equipment.active AS eqactive,equipment.repair AS eqrepair
	FROM equipment
	INNER JOIN (
	SELECT nome.groupid AS grnomeid,nome.id AS nomeid, vendor.name AS vendorname, group_nome.name AS groupname, nome.name AS nomename
	FROM nome
	INNER JOIN group_nome ON nome.groupid = group_nome.id
	INNER JOIN vendor ON nome.vendorid = vendor.id
	) AS getvendorandgroup ON getvendorandgroup.nomeid = equipment.nomeid
	INNER JOIN org ON org.id = equipment.orgid
	INNER JOIN places ON places.id = equipment.placesid
	INNER JOIN users ON users.id = equipment.usersid  WHERE equipment.orgid=$orgid and mapyet=1".$spom;


$result = mysql_query( $SQL ) or die("Не могу выбрать сформировать список по оргтехнике/помещениям/пользователю!".mysql_error());

$i=0;
while($row = mysql_fetch_array($result)) {
    $responce->rows[$i]['poz']=$i;    
    $responce->rows[$i]['cell']=array(
		$active,$row[eqid],$row[placesname],$row[nomename],$row[mapx],$row[mapy],
		$row[grnome],$row[vname],$row[buhname],$row[sernum],$row[invnum],
		$row[shtrihkod],$row[orgname],$row[userslogin],$dtpost,$row[cost],$row[currentcost],$os,$eqmode,$row[eqcomment],$row[eqrepair],$row[mapmoved],$row[photo]);
    $i++;
};

echo json_encode($responce);


?>