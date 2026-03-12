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
$title= $_POST['title'];
$stiker= $_POST['stiker'];

if ($oper=='')
{
	if(!$sidx) $sidx =1;
	$result = mysql_query("SELECT COUNT(*) AS count FROM news");
	$row = mysql_fetch_array($result);
	$count = $row['count'];

	if( $count >0 ) {$total_pages = ceil($count/$limit);} else {$total_pages = 0;};
	if ($page > $total_pages) $page=$total_pages;

	$start = $limit*$page - $limit;
	$SQL = "SELECT * FROM news ORDER BY $sidx $sord LIMIT $start , $limit";
	$result = mysql_query( $SQL ) or die("Не могу выбрать список новостей!".mysql_error());

	$responce->page = $page;
	$responce->total = $total_pages;
	$responce->records = $count;
	$i=0;
	while($row = mysql_fetch_array($result)) {
	    $responce->rows[$i]['id']=$row[id];	    
	    $responce->rows[$i]['cell']=array($row[id],$row[dt],$row[title],$row[stiker]);		
	    $i++;
	}
	echo json_encode($responce);
};

if ($oper=='edit')
{
	$SQL = "UPDATE news SET title='$title',stiker='$stiker' WHERE id='$id'";
	$result = mysql_query( $SQL ) or die("Не могу обновить заголовок новости!".mysql_error());
};

if ($oper=='del')
{
	$SQL = "DELETE FROM news WHERE id='$id'";
	$result = mysql_query( $SQL ) or die("Не могу удалить новость!".mysql_error());
};
