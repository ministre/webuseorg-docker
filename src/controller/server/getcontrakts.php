<?
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
//include("../../controller/server/functions.php");		// подгружаем функции пользователя
include("../../functions.php");		// подгружаем функции (мини версия)

$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction
$oper= $_POST['oper'];
$idknt= $_GET['idknt'];
$id = $_POST['id'];
$name= $_POST['name'];
$num= $_POST['num'];
$datestart= $_POST['datestart'];
$dateend= $_POST['dateend'];
$work= $_POST['work'];
$comment= $_POST['comment'];
$where=" WHERE kntid='$idknt'";

if ($oper=='')
{
	if(!$sidx) $sidx =1;
	$result = mysql_query("SELECT COUNT(*) AS count FROM contract".$where);
	$row = mysql_fetch_array($result);
	$count = $row['count'];

	if( $count >0 ) {$total_pages = ceil($count/$limit);} else {$total_pages = 0;};
	if ($page > $total_pages) $page=$total_pages;

	$start = $limit*$page - $limit;
	$SQL = "SELECT * FROM contract ".$where." ORDER BY $sidx $sord LIMIT $start , $limit";
        //echo "!$SQL!";
	$result = mysql_query( $SQL ) or die("Не могу выбрать список договоров!".mysql_error());

	$responce->page = $page;
	$responce->total = $total_pages;
	$responce->records = $count;
	$i=0;
	while($row = mysql_fetch_array($result)) {
	    $responce->rows[$i]['id']=$row[id];
            if ($row[work]==0){$row[work]='No';} else {$row[work]='Yes';};
	    if ($row[active]=="1")                
		{$responce->rows[$i]['cell']=array("<img src=templates/".$cfg->theme."/ico/accept.png>",$row[id],$row[num],$row[name],MySQLDateTimeToDateTime($row[datestart]),MySQLDateTimeToDateTime($row[dateend]),$row[work],$row[comment]);} else
		{$responce->rows[$i]['cell']=array("<img src=templates/".$cfg->theme."/ico/cancel.png>",$row[id],$row[num],$row[name],MySQLDateTimeToDateTime($row[datestart]),MySQLDateTimeToDateTime($row[dateend]),$row[work],$row[comment]);};
	    $i++;
	}
	echo json_encode($responce);
};
if ($oper=='edit')
{
        if ($work=='Yes'){$work='1';} else {$work='0';};
        $datestart=DateToMySQLDateTime2(ClearHtml($datestart));
        $dateend=DateToMySQLDateTime2(ClearHtml($dateend));
    	$SQL = "UPDATE contract SET num='$num',name='$name',comment='$comment',datestart='$datestart',dateend='$dateend',work='$work' WHERE id='$id'";
	$result = mysql_query( $SQL ) or die("Не могу обновить данные по договору!".mysql_error());
        echo "!$SQL!";

};

if ($oper=='add')
{
        if ($work=='Yes'){$work='1';} else {$work='0';};
        $datestart=DateToMySQLDateTime2(ClearHtml($datestart));
        $dateend=DateToMySQLDateTime2(ClearHtml($dateend));
    	$SQL = "INSERT INTO contract (id,kntid,num,name,comment,datestart,dateend,work,active) VALUES (null,'$idknt','$num','$name','$comment','$datestart','$dateend','$work',1)";
        echo "!$SQL!";
	$result = mysql_query( $SQL ) or die("Не могу добавить данные по договору!".mysql_error());
        

};
if ($oper=='del')
{
    	$SQL = "UPDATE contract SET active=not active WHERE id='$id'";
	$result = mysql_query( $SQL ) or die("Не смог пометить на удаление договор!".mysql_error());

};


?>
