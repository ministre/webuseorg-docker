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
$nomename= $_POST['nomename'];

if ($oper=='')
{
	
	$flt=json_decode($filters,true);	
	$cnt=count($flt['rules']);
	$where="";
	for ($i=0;$i<$cnt;$i++)
	{
		$field=$flt['rules'][$i]['field'];
		if ($field=='nomeid'){$field='nome.id';};
		$data=$flt['rules'][$i]['data'];
		$where=$where."($field LIKE '%$data%')";
		if ($i<($cnt-1)){$where=$where." AND ";};
	};
	if ($where!=""){$where="WHERE ".$where;};
	//echo "!$where!";	
	
	if(!$sidx) $sidx =1;
	$result = mysql_query("SELECT COUNT(*) AS count FROM nome");
	$row = mysql_fetch_array($result);
	$count = $row['count'];

	if( $count >0 ) {$total_pages = ceil($count/$limit);} else {$total_pages = 0;};
	if ($page > $total_pages) $page=$total_pages;

	$start = $limit*$page - $limit;
	$SQL = "SELECT nome.id as nomeid,group_nome.name as groupname,vendor.name as vendorname,nome.name as nomename,nome.active as nomeactive FROM nome INNER JOIN group_nome ON group_nome.id=nome.groupid INNER JOIN vendor ON nome.vendorid=vendor.id ".$where." ORDER BY $sidx $sord LIMIT $start , $limit";
	//echo "!$SQL!";
	$result = mysql_query( $SQL ) or die("Не могу выбрать список номенклатуры!".mysql_error());

	$responce->page = $page;
	$responce->total = $total_pages;
	$responce->records = $count;
	$i=0;
	while($row = mysql_fetch_array($result)) {
	    $responce->rows[$i]['id']=$row[nomeid];
	    if ($row[nomeactive]=="1")
		{$responce->rows[$i]['cell']=array("<img src=templates/".$cfg->theme."/ico/accept.png>",$row[nomeid],$row[groupname],$row[vendorname],$row[nomename]);} else
		{$responce->rows[$i]['cell']=array("<img src=templates/".$cfg->theme."/ico/cancel.png>",$row[nomeid],$row[groupname],$row[vendorname],$row[nomename]);};
	    $i++;
	}
	echo json_encode($responce);
};
if ($oper=='edit')
{
	$SQL = "UPDATE nome SET name='$nomename' WHERE id='$id'";	
	$result = mysql_query( $SQL ) or die("Не могу обновить данные по номенклатуре!".mysql_error());
};
if ($oper=='add')
{
	$SQL = "INSERT INTO knt (id,name,comment,active) VALUES (null,'$name','$comment',1)";
	$result = mysql_query( $SQL ) or die("Не могу добавить пользователя!".mysql_error());

};
if ($oper=='del')
{
	$SQL = "UPDATE nome SET active=not active WHERE id='$id'";
	$result = mysql_query( $SQL ) or die("Не могу обновить данные по номенклатуре!".mysql_error());
};
?>