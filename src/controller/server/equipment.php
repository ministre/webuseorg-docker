<?
include("../../inc/class/config.php");
include("../../controller/server/functions.php");		// подгружаем функции (мини версия)
$cfg=new Tconfig;
include("../../config.php");		
include("../../inc/connect.php");	


$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction
$oper= $_POST['oper'];
$orgid = $_GET['orgid'];
$sorgider = $_GET['sorgider'];
$id = $_POST['id'];
$ip = $_POST['ip'];
$name= $_POST['name'];
$comment= $_POST['comment'];

$buhname=$_POST['buhname'];
$sernum=$_POST['sernum'];
$invnum=$_POST['invnum'];
$shtrihkod=$_POST['shtrihkod'];
$cost=$_POST['cost'];
$currentcost=$_POST['currentcost'];
$os=$_POST['os'];
$mode=$_POST['mode'];
$mapyet=$_POST['mapyet'];
$tmp=$_POST['eqmapyet'];
if ($tmp!=''){$mapyet=$tmp;};

//echo "!$mapyet!";

$filters = $_GET['filters']; // получаем наложенные поисковые фильтры

$flt=json_decode($filters,true);	
	$cnt=count($flt['rules']);
	$where="";
	for ($i=0;$i<$cnt;$i++)
	{
		$field=$flt['rules'][$i]['field'];
		//if ($field=='nomeid'){$field='nome.id';};
		if ($field=='org.name'){$field='org.id';};
		$data=$flt['rules'][$i]['data'];
		if ($data!='-1'){
                    if (($field=='placesid') or ($field=='getvendorandgroup.grnomeid')) {$where=$where."($field = '$data')";} else {$where=$where."($field LIKE '%$data%')";};
                    
                    } else {$where=$where."($field LIKE '%%')";};
		if ($i<($cnt-1)){$where=$where." AND ";};
	};
	if ($where!=""){$where="WHERE ".$where;};
	//echo "!$where!";	
 if ($where=='') {$where="WHERE equipment.orgid='$sorgider'";} else
 {$where=$where." AND equipment.orgid='$sorgider'";}

if ($oper=='')
{
	if(!$sidx) $sidx =1;
	$result = mysql_query("SELECT count(*) as count, getvendorandgroup.grnomeid,equipment.id AS eqid,equipment.orgid AS eqorgid, org.name AS orgname, getvendorandgroup.vendorname AS vname, 
            getvendorandgroup.groupname AS grnome, places.name AS placesname, users.login AS userslogin, 
            getvendorandgroup.nomename AS nomename, buhname, sernum, invnum, shtrihkod, datepost, cost, currentcost, os, equipment.mode AS eqmode, equipment.comment AS eqcomment, equipment.active AS eqactive
	FROM equipment
	INNER JOIN (
	SELECT nome.groupid AS grnomeid,nome.id AS nomeid, vendor.name AS vendorname, group_nome.name AS groupname, nome.name AS nomename
	FROM nome
	INNER JOIN group_nome ON nome.groupid = group_nome.id
	INNER JOIN vendor ON nome.vendorid = vendor.id
	) AS getvendorandgroup ON getvendorandgroup.nomeid = equipment.nomeid
	INNER JOIN org ON org.id = equipment.orgid
	INNER JOIN places ON places.id = equipment.placesid
	INNER JOIN users ON users.id = equipment.usersid ".$where." ");
	$row = mysql_fetch_array($result);
	$count = $row['count'];

	if( $count >0 ) {$total_pages = ceil($count/$limit);} else {$total_pages = 0;};
	if ($page > $total_pages) $page=$total_pages;

	$start = $limit*$page - $limit;
	$SQL = "SELECT getvendorandgroup.grnomeid,equipment.id AS eqid,equipment.orgid AS eqorgid, org.name AS orgname, getvendorandgroup.vendorname AS vname, 
            getvendorandgroup.groupname AS grnome, places.name AS placesname, users.login AS userslogin, 
            getvendorandgroup.nomename AS nomename, buhname, sernum, invnum, shtrihkod, datepost, cost, currentcost, os, equipment.mode AS eqmode,equipment.mapyet AS eqmapyet,equipment.comment AS eqcomment, equipment.active AS eqactive,equipment.repair AS eqrepair
	FROM equipment
	INNER JOIN (
	SELECT nome.groupid AS grnomeid,nome.id AS nomeid, vendor.name AS vendorname, group_nome.name AS groupname, nome.name AS nomename
	FROM nome
	INNER JOIN group_nome ON nome.groupid = group_nome.id
	INNER JOIN vendor ON nome.vendorid = vendor.id
	) AS getvendorandgroup ON getvendorandgroup.nomeid = equipment.nomeid
	INNER JOIN org ON org.id = equipment.orgid
	INNER JOIN places ON places.id = equipment.placesid
	INNER JOIN users ON users.id = equipment.usersid ".$where." 
	ORDER BY $sidx $sord LIMIT $start , $limit";
	//echo "!$SQL!";die();
	$result = mysql_query( $SQL ) or die("Не получилось выбрать список оргтехники!".mysql_error());

	$responce->page = $page;
	$responce->total = $total_pages;
	$responce->records = $count;
	$i=0;
	while($row = mysql_fetch_array($result)) {
	    $responce->rows[$i]['id']=$row[eqid];
	    if ($row[eqactive]=="1") {$active="<img src=templates/".$cfg->theme."/ico/accept.png>";} else
				   {$active="<img src=templates/".$cfg->theme."/ico/cancel.png>";};
	    if ($row[eqrepair]=="1") {$active=$active."<img src=templates/".$cfg->theme."/ico/error.png>";};
                                   
		if ($row[os]==0){$os='No';} else {$os='Yes';};
		if ($row[eqmode]==0){$eqmode='No';} else {$eqmode='Yes';};
                if ($row[eqmapyet]==0){$eqmapyet='No';} else {$eqmapyet='Yes';};
		$dtpost=MySQLDateTimeToDateTime($row[datepost]);
		$responce->rows[$i]['cell']=array(
		$active,$row[eqid],$row[placesname],$row[nomename],
		$row[grnome],$row[vname],$row[buhname],$row[sernum],$row[invnum],
		$row[shtrihkod],$row[orgname],$row[userslogin],$dtpost,$row[cost],$row[currentcost],$os,$eqmode,$eqmapyet,$row[eqcomment],$row[eqrepair]
		);
	    $i++;
	}
	echo json_encode($responce);
};
if ($oper=='edit')
{
	if ($os=='Yes') {$os=1;} else {$os=0;};
	if ($mode=='Yes') {$mode=1;} else {$mode=0;};
        if ($mapyet=='Yes') {$mapyet=1;} else {$mapyet=0;};
	$SQL = "UPDATE equipment SET buhname='$buhname',sernum='$sernum',invnum='$invnum',shtrihkod='$shtrihkod',cost='$cost',currentcost='$currentcost',os='$os',mode='$mode',mapyet='$mapyet',comment='$comment' WHERE id='$id'";
	$result = mysql_query( $SQL ) or die("Не смог обновить оргтехнику!".mysql_error());
};
if ($oper=='add')
{
	$SQL = "INSERT INTO places (id,orgid,name,comment,active) VALUES (null,'$orgid','$name','$comment',1)";
	$result = mysql_query( $SQL ) or die("Не смог вставить оргтехнику!".mysql_error());

};
if ($oper=='del')
{
	$SQL = "UPDATE equipment SET active=not active WHERE id='$id'";
	$result = mysql_query( $SQL ) or die("Не смог пометить на удаление оргтехнику!".mysql_error());
};

?>