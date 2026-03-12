<?
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id


$page = $_GET['page']; // get the requested page
$limit = $_GET['rows']; // get how many rows we want to have into the grid
$sidx = $_GET['sidx']; // get index row - i.e. user click to sort
$sord = $_GET['sord']; // get the direction
$filters = $_GET['filters']; // получаем наложенные поисковые фильтры
$oper= $_POST['oper'];
$id = $_POST['id'];
$orgid= $_POST['orgid'];
$login= $_POST['login'];
$pass= $_POST['pass'];
$email= $_POST['email'];
$mode= $_POST['mode'];

if ($oper=='')
{
	
	$flt=json_decode($filters,true);	
	$cnt=count($flt['rules']);
	$where="";
	for ($i=0;$i<$cnt;$i++)
	{
		$field=$flt['rules'][$i]['field'];
		if ($field=='org.id'){$field='org.name';};
		$data=$flt['rules'][$i]['data'];
		$where=$where."($field LIKE '%$data%')";
		if ($i<($cnt-1)){$where=$where." AND ";};
	};
	if ($where!=""){$where="WHERE ".$where;};
	//echo "!$where!";	
	
	if(!$sidx) $sidx =1;
	$result = mysql_query("SELECT COUNT(*) AS count,org.id AS orgid,users.id,users.orgid,users.login,users.pass,users.email,users.mode,users.active,org.name AS orgname FROM users INNER JOIN org ON users.orgid=org.id ".$where);
	$row = mysql_fetch_array($result);
	$count = $row['count'];

	if( $count >0 ) {$total_pages = ceil($count/$limit);} else {$total_pages = 0;};
	if ($page > $total_pages) $page=$total_pages;

	$start = $limit*$page - $limit;
	$SQL = "SELECT org.id AS orgid,users.id,users.orgid,users.login,users.pass,users.email,users.mode,users.active,org.name AS orgname FROM users INNER JOIN org ON users.orgid=org.id ".$where." ORDER BY $sidx $sord LIMIT $start , $limit";
	//echo "!$SQL!";
	$result = mysql_query( $SQL ) or die("Не могу выбрать список пользователей!".mysql_error());

	$responce->page = $page;
	$responce->total = $total_pages;
	$responce->records = $count;
	$i=0;
	while($row = mysql_fetch_array($result)) {
	    $responce->rows[$i]['id']=$row[id];
	    if ($row[mode]=='1'){$mode='Да';} else {$mode='Нет';};
	    if ($row[active]=="1")
		{$responce->rows[$i]['cell']=array("<img src=templates/".$cfg->theme."/ico/accept.png>",$row[id],$row[orgname],$row[login],'скрыто',$row[email],$mode);} else
		{$responce->rows[$i]['cell']=array("<img src=templates/".$cfg->theme."/ico/cancel.png>",$row[id],$row[orgname],$row[login],'скрыто',$row[email],$mode);};
	    $i++;
	}
	echo json_encode($responce);
};
if ($oper=='edit')
{
	if ($mode=='Да') {$mode=1;} else {$mode=0;};
	if ($pass!='скрыто'){
	$SQL = "UPDATE users SET mode='$mode',login='$login',pass='$pass',email='$email' WHERE id='$id'";
	} else {
	$SQL = "UPDATE users SET mode='$mode',login='$login',email='$email' WHERE id='$id'";	
	};
	$result = mysql_query( $SQL ) or die("Не могу обновить данные по пользователю!".mysql_error());
};
if ($oper=='add')
{
	$SQL = "INSERT INTO knt (id,name,comment,active) VALUES (null,'$name','$comment',1)";
	$result = mysql_query( $SQL ) or die("Не могу добавить пользователя!".mysql_error());

};
if ($oper=='del')
{
	$SQL = "UPDATE users SET active=not active WHERE id='$id'";
	$result = mysql_query( $SQL ) or die("Не могу обновить данные по пользователю!".mysql_error());
};
?>