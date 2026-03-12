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
$orgid = $_GET['orgid'];
$id = $_POST['id'];
$name= $_POST['name'];
$comment= $_POST['comment'];

if ($oper=='')
{
	if(!$sidx) $sidx =1;
	$result = mysql_query("SELECT COUNT(*) AS count FROM places");
	$row = mysql_fetch_array($result);
	$count = $row['count'];

	if( $count >0 ) {$total_pages = ceil($count/$limit);} else {$total_pages = 0;};
	if ($page > $total_pages) $page=$total_pages;

	$start = $limit*$page - $limit;
	$SQL = "SELECT id,name,comment,active FROM places WHERE orgid='$orgid' ORDER BY $sidx $sord LIMIT $start , $limit";
	$result = mysql_query( $SQL ) or die("Не могу выбрать список помещений!".mysql_error());

	$responce->page = $page;
	$responce->total = $total_pages;
	$responce->records = $count;
	$i=0;
	while($row = mysql_fetch_array($result)) {
	    $responce->rows[$i]['id']=$row[id];
	    if ($row[active]=="1")
		{$responce->rows[$i]['cell']=array("<img src=templates/".$cfg->theme."/ico/accept.png>",$row[id],$row[name],$row[comment]);} else
		{$responce->rows[$i]['cell']=array("<img src=templates/".$cfg->theme."/ico/cancel.png>",$row[id],$row[name],$row[comment]);};
	    $i++;
	}
	echo json_encode($responce);
};
if ($oper=='edit')
{
	$SQL = "UPDATE places SET name='$name',comment='$comment' WHERE id='$id'";
	$result = mysql_query( $SQL ) or die("Не могу обновить данные по помещениям!".mysql_error());
};
if ($oper=='add')
{
	$SQL = "INSERT INTO places (id,orgid,name,comment,active) VALUES (null,'$orgid','$name','$comment',1)";
	$result = mysql_query( $SQL ) or die("Не могу добавить помещение!".mysql_error());

};
if ($oper=='del')
{
	$SQL = "UPDATE places SET active=not active WHERE id='$id'";
	$result = mysql_query( $SQL ) or die("Не могу обновить данные по помещению!".mysql_error());
};

?>