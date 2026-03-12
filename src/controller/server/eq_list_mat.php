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
$id = $_POST['id'];

if ($oper=='')
{
	if(!$sidx) $sidx =1;
	$result = mysql_query("SELECT COUNT(*) AS count FROM equipment");
	$row = mysql_fetch_array($result);
	$count = $row['count'];

	if( $count >0 ) {$total_pages = ceil($count/$limit);} else {$total_pages = 0;};
	if ($page > $total_pages) $page=$total_pages;

	$start = $limit*$page - $limit;
	$SQL = "SELECT name as grname,res2.* FROM group_nome INNER JOIN (SELECT places.name as plname,res.* FROM places INNER JOIN(
                SELECT name AS namenome,nome.groupid as grpid, eq . *  FROM nome INNER JOIN (
                SELECT equipment.id AS eqid, equipment.placesid AS plid, equipment.nomeid AS nid, equipment.buhname AS bn, equipment.cost AS cs, equipment.currentcost AS curc, equipment.invnum, equipment.sernum, equipment.shtrihkod, equipment.mode, equipment.os FROM equipment 
                WHERE equipment.active =1 and equipment.usersid='$curuserid')
                AS eq ON nome.id = eq.nid)
                AS res ON places.id=res.plid ORDER BY $sidx $sord LIMIT $start , $limit)   AS res2 ON group_nome.id=res2.grpid";
        //echo "!$SQL!";            
	$result = mysql_query( $SQL ) or die("Не могу выбрать сформировать список по оргтехнике/помещениям/пользователю!".mysql_error());

	$responce->page = $page;
	$responce->total = $total_pages;
	$responce->records = $count;
	$i=0;
	while($row = mysql_fetch_array($result)) {
	    $responce->rows[$i]['id']=$row[eqid];    
            $responce->rows[$i]['cell']=array($row[eqid],$row[plname],$row[namenome],$row[grname],$row[invnum],$row[sernum],$row[shtrihkod],$row[mode],$row[os],$row[cs],$row[curc],$row[bn]);
	    $i++;
	}
	echo json_encode($responce);
};

?>