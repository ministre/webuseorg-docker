<?
include("../../inc/class/config.php");		// загружаем классы настроек
include("../../inc/class/users.php");		// загружаем классы пользователей
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
include("../../controller/server/functions.php");		// подгружаем функции (мини версия)
include("../../controller/server/login.php");			// проверяем вход пользователя

$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction
$oper= $_POST['oper'];
$id = $_POST['id'];
$title= $_POST['title'];
$status= $_POST['status'];

if ($oper=='')
{
	if(!$sidx) $sidx =1;
	$SQL = "SELECT COUNT(id) AS count FROM tasks WHERE userid='$user->id'";
	//echo "$SQL";
	$result = mysql_query("$SQL")  or die("Не могу выбрать список задач_1!".mysql_error());
	$row = mysql_fetch_array($result);	
	$count = $row['count'];
	//echo "!$count!";
	if( $count >0 ) {$total_pages = ceil($count/$limit);} else {$total_pages = 0;};
	if ($page > $total_pages) $page=$total_pages;
	
	$start = $limit*$page - $limit;
	if ($start<0){$start=0;};
	$SQL = "SELECT tasks.id,tasks.userid,tasks.touserid,tasks.dt,tasks.title,tasks.txt,tasks.status,tasks.maxdate,users.login FROM tasks INNER JOIN users ON tasks.touserid=users.id WHERE userid='$user->id' ORDER BY $sidx $sord LIMIT $start , $limit";
	//echo "$SQL";
	$result = mysql_query( $SQL ) or die("Не могу выбрать список задач!".mysql_error());

	$responce->page = $page;
	$responce->total = $total_pages;
	$responce->records = $count;
	$i=0;
	while($row = mysql_fetch_array($result)) {
	    $responce->rows[$i]['id']=$row[id];	    
	    if ($row[status]=='0'){$row[status]="Завершено";};
	    if ($row[status]=='1'){$row[status]="В работе";};
	    if ($row[status]=='2'){$row[status]="Остановлено";};
	    $responce->rows[$i]['cell']=array($row[id],$row[login],MySQLDateTimeToDateTime($row[dt]),$row[title],$row[status],MySQLDateTimeToDateTime($row[maxdate]));
	    $i++;
	}        
	echo json_encode($responce);
};
if ($oper=='edit')
{
	$SQL = "UPDATE tasks SET title='$title',status='$status' WHERE id='$id'";
	$result = mysql_query( $SQL ) or die("Не могу обновить данные по задачам!".mysql_error());	
};
if ($oper=='del')
{
	$SQL = "delete FROM tasks WHERE id='$id'";
	//echo "$SQL";
	$result = mysql_query( $SQL ) or die("Не могу удалить задачу!".mysql_error());	
};

?>