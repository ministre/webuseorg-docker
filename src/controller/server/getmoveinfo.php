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
$id = $_POST['id'];
$eqid = $_GET['eqid'];
$comment= $_POST['comment'];

if ($oper=='')
{
	if(!$sidx) $sidx =1;
	$result = mysql_query("SELECT COUNT(*) AS count,mv.id, mv.eqid, mv.dt, mv.orgname1, org.name AS orgname2, mv.place1, places.name AS place2, mv.user1, users.login AS user2,move.comment as comment
            FROM move
            INNER JOIN (
            SELECT move.id, move.eqid, move.dt AS dt, org.name AS orgname1, places.name AS place1, users.login AS user1
            FROM move
            INNER JOIN org ON org.id = orgidfrom
            INNER JOIN places ON places.id = placesidfrom
            INNER JOIN users ON users.id = useridfrom
            ) AS mv ON move.id = mv.id
            INNER JOIN org ON org.id = move.orgidto
            INNER JOIN places ON places.id = placesidto
            INNER JOIN users ON users.id = useridto WHERE move.eqid='$eqid'");
	$row = mysql_fetch_array($result);
	$count = $row['count'];

	if( $count >0 ) {$total_pages = ceil($count/$limit);} else {$total_pages = 0;};
	if ($page > $total_pages) $page=$total_pages;

	$start = $limit*$page - $limit;
	$SQL = "SELECT mv.id, mv.eqid, mv.dt, mv.orgname1, org.name AS orgname2, mv.place1, places.name AS place2, mv.user1, users.login AS user2,move.comment as comment
            FROM move
            INNER JOIN (
            SELECT move.id, move.eqid, move.dt AS dt, org.name AS orgname1, places.name AS place1, users.login AS user1
            FROM move
            INNER JOIN org ON org.id = orgidfrom
            INNER JOIN places ON places.id = placesidfrom
            INNER JOIN users ON users.id = useridfrom
            ) AS mv ON move.id = mv.id
            INNER JOIN org ON org.id = move.orgidto
            INNER JOIN places ON places.id = placesidto
            INNER JOIN users ON users.id = useridto WHERE move.eqid='$eqid'
            ORDER BY $sidx $sord LIMIT $start , $limit";
        //echo "!$SQL!";
	$result = mysql_query( $SQL ) or die("Не могу выбрать список перемещений!".mysql_error());

	$responce->page = $page;
	$responce->total = $total_pages;
	$responce->records = $count;
	$i=0;
	while($row = mysql_fetch_array($result)) {
	    $responce->rows[$i]['id']=$row[id];	    
            $responce->rows[$i]['cell']=array($row[id],$row[dt],$row[orgname1],$row[place1],$row[user1],$row[orgname2],$row[place2],$row[user2],$row[comment]);
	    $i++;
	}
	echo json_encode($responce);
};

if ($oper=='edit')
{
    	$SQL = "UPDATE move SET comment='$comment' WHERE id='$id'";
        $result = mysql_query( $SQL ) or die("Не могу обновить комментарий!".mysql_error());
};

if ($oper=='del')
{
    	$SQL = "DELETE FROM move WHERE id='$id'";
        $result = mysql_query( $SQL ) or die("Не могу удалить запись о перемещении!".mysql_error());
};