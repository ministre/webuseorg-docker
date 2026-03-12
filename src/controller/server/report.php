<?
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id


$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction
$oper= $_POST['oper'];
$curuserid = $_GET['curuserid'];
$curplid = $_GET['curplid'];
$curorgid = $_GET['curorgid'];
$tpo = $_GET['tpo'];
$os = $_GET['os'];
$repair = $_GET['repair'];
$mode = $_GET['mode'];
$id = $_POST['id'];
$where="";
if ($curuserid!='-1') {$where=$where." and equipment.usersid='$curuserid'";}
if ($curplid!='-1') {$where=$where." and equipment.placesid='$curplid'";}
if ($curorgid!='-1') {$where=$where." and equipment.orgid='$curorgid'";}
if ($os=='true') {$where=$where." and equipment.os=1";}
if ($repair=='true') {$where=$where." and equipment.repair=1";}
if ($mode=='true') {$where=$where." and equipment.mode=1";}
if ($tpo=='2') {$where=$where." and equipment.mode=0  and equipment.os=0";}

if ($oper=='')
{
	if(!$sidx) $sidx =1;
	$result = mysql_query("SELECT COUNT(*) AS count,places.name as plname,res.* FROM places INNER JOIN(
                SELECT name AS namenome, eq . *  FROM nome INNER JOIN (
                SELECT equipment.id AS eqid, equipment.placesid AS plid, equipment.nomeid AS nid, equipment.buhname AS bn, equipment.cost AS cs, equipment.currentcost AS curc, equipment.invnum, equipment.sernum, equipment.shtrihkod, equipment.mode, equipment.os FROM equipment 
                WHERE equipment.active =1".$where.")
                AS eq ON nome.id = eq.nid)
                AS res ON places.id=res.plid")  or die("Не могу выбрать сформировать список по оргтехнике/помещениям/пользователю!(1)".mysql_error());
	$row = mysql_fetch_array($result);
	$count = $row['count'];

	if( $count >0 ) {$total_pages = ceil($count/$limit);} else {$total_pages = 0;};
	if ($page > $total_pages) $page=$total_pages;

	$start = $limit*$page - $limit;
	$SQL = "SELECT name as grname,res2.* FROM group_nome INNER JOIN (SELECT places.name as plname,res.* FROM places  INNER JOIN(
                SELECT name AS namenome,nome.groupid as grpid, eq . *  FROM nome INNER JOIN (
                SELECT equipment.id AS eqid, equipment.placesid AS plid, equipment.nomeid AS nid, equipment.buhname AS bn, equipment.cost AS cs, equipment.currentcost AS curc, equipment.invnum, equipment.sernum, equipment.shtrihkod, equipment.mode, equipment.os FROM equipment 
                WHERE equipment.active =1".$where.")
                AS eq ON nome.id = eq.nid)
                AS res ON places.id=res.plid) AS res2 ON group_nome.id=res2.grpid ORDER BY $sidx $sord LIMIT $start , $limit";
        //echo "!$SQL!";            
	$result = mysql_query( $SQL ) or die("Не могу выбрать сформировать список по оргтехнике/помещениям/пользователю!".mysql_error());

	$responce->page = $page;
	$responce->total = $total_pages;
	$responce->records = $count;
	$i=0;
	while($row = mysql_fetch_array($result)) {
	    $responce->rows[$i]['id']=$row[eqid];    
            $responce->rows[$i]['cell']=array($row[eqid],$row[plname],$row[namenome],$row[grname],$row[invnum],$row[sernum],$row[shtrihkod],$row[mode],$row[os],$row[bn],$row[cs],$row[curc]);
	    $i++;
	}
	echo json_encode($responce);
};

?>