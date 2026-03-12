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
$groupid = $_GET['groupid'];
if ($groupid=="") {$groupid = $_POST['groupid'];};
$id = $_POST['id'];
$name= $_POST['name'];
// если выбрана группа, то обрабатываем, иначе ничего
//echo "!$groupid!";
if ($oper=='')
{
	if(!$sidx) $sidx =1;
	$result = mysql_query("SELECT COUNT(*) AS count FROM group_param");
	$row = mysql_fetch_array($result);
	$count = $row['count'];

	if( $count >0 ) {$total_pages = ceil($count/$limit);} else {$total_pages = 0;};
	if ($page > $total_pages) $page=$total_pages;
        //echo "!$limit*$page - $limit!";
	$start = $limit*$page - $limit;
	$SQL = "SELECT id,name,active FROM group_param WHERE groupid='$groupid' ORDER BY $sidx $sord LIMIT $start , $limit";
        //echo "!$SQL!";
	$result = mysql_query( $SQL ) or die("Не могу выбрать список параметров групп!".mysql_error());

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
	$SQL = "UPDATE group_param SET name='$name' WHERE id='$id'";
        //echo "!$SQL!";
	$result = mysql_query( $SQL ) or die("Не могу обновить данные по группе!".mysql_error());
};
if ($oper=='add')
{
	if (($groupid=="") or ($name=="")) {die();};
	$SQL = "INSERT INTO group_param (id,groupid,name,active) VALUES (null,'$groupid','$name',1)";
        //echo "!$SQL!";
	$result = mysql_query( $SQL ) or die("Не могу добавить параметр группы!".mysql_error());

};
if ($oper=='del')
{
	$SQL = "UPDATE group_param SET active=not active WHERE id='$id'";
	$result = mysql_query( $SQL ) or die("Не могу обновить данные по параметрам группы!".mysql_error());
};
?>