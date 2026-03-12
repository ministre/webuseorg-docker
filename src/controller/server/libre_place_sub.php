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
$orgid = $_GET['orgid'];
$placesid = $_GET['placesid'];
$name= $_POST['name'];
$comment= $_POST['comment'];
//echo "!$placesid!";
if ($oper=='')
{
	if(!$sidx) $sidx =1;
	$result = mysql_query("SELECT COUNT(*) AS count FROM places_users");
	$row = mysql_fetch_array($result);
	$count = $row['count'];

	if( $count >0 ) {$total_pages = ceil($count/$limit);} else {$total_pages = 0;};
	if ($page > $total_pages) $page=$total_pages;

	$start = $limit*$page - $limit;
	$SQL = "SELECT places_users.id AS plid,placesid,userid,users.login as name FROM places_users INNER JOIN users ON users.id=userid WHERE placesid='$placesid' ORDER BY $sidx $sord LIMIT $start , $limit";
        //echo "!$SQL!";
        //die();
	$result = mysql_query( $SQL ) or die("Не могу выбрать список помещений/пользователей!".mysql_error());

	$responce->page = $page;
	$responce->total = $total_pages;
	$responce->records = $count;
	$i=0;
	while($row = mysql_fetch_array($result)) {
	    $responce->rows[$i]['id']=$row[plid];
	    $responce->rows[$i]['cell']=array($row[plid],$row[name]);		
	    $i++;
	}
	echo json_encode($responce);
};
if ($oper=='edit')
{
	$SQL = "UPDATE places_users SET userid='$name' WHERE id='$id'";
	$result = mysql_query( $SQL ) or die("Не могу обновить данные по помещениям/пользователям!".mysql_error());
};
if ($oper=='add')
{
        if (($placesid=="") or ($name=="")) {die();};
	$SQL = "INSERT INTO places_users (id,placesid,userid) VALUES (null,'$placesid','$name')";
	$result = mysql_query( $SQL ) or die("Не могу добавить помещение/пользователя!".mysql_error());

};
if ($oper=='del')
{
	$SQL = "DELETE FROM places_users WHERE id='$id'";
	$result = mysql_query( $SQL ) or die("Не могу удалить помещение/пользователя!".mysql_error());
};

?>