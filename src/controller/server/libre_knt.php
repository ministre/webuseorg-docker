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
$name= $_POST['name'];
$INN= $_POST['INN'];
$KPP= $_POST['KPP'];
$bayer= $_POST['bayer'];
$supplier= $_POST['supplier'];
$ERPCode= $_POST['ERPCode'];
$dog= $_POST['dog'];
$comment= $_POST['comment'];

$filters = $_GET['filters']; // получаем наложенные поисковые фильтры

$flt=json_decode($filters,true);	
	$cnt=count($flt['rules']);
	$where="";
	for ($i=0;$i<$cnt;$i++)
	{
		$field=$flt['rules'][$i]['field'];
		$data=$flt['rules'][$i]['data'];
		if ($data!='-1'){
                    $where=$where."($field LIKE '%$data%')";                    
                    } else {$where=$where."($field LIKE '%%')";};
		if ($i<($cnt-1)){$where=$where." AND ";};
	};
	if ($where!=""){$where="WHERE ".$where;};

if ($oper=='')
{
	if(!$sidx) $sidx =1;
	$result = mysql_query("SELECT COUNT(*) AS count FROM knt");
	$row = mysql_fetch_array($result);
	$count = $row['count'];

	if( $count >0 ) {$total_pages = ceil($count/$limit);} else {$total_pages = 0;};
	if ($page > $total_pages) $page=$total_pages;

	$start = $limit*$page - $limit;
	$SQL = "SELECT id,name,INN,KPP,bayer,supplier,dog,ERPCode,comment,active FROM knt ".$where." ORDER BY $sidx $sord LIMIT $start , $limit";
	$result = mysql_query( $SQL ) or die("Не могу выбрать список контрагентов!".mysql_error());

	$responce->page = $page;
	$responce->total = $total_pages;
	$responce->records = $count;
	$i=0;
	while($row = mysql_fetch_array($result)) {
	    $responce->rows[$i]['id']=$row[id];
            if ($row[bayer]==0){$row[bayer]='No';} else {$row[bayer]='Yes';};
            if ($row[supplier]==0){$row[supplier]='No';} else {$row[supplier]='Yes';};
            if ($row[dog]==0){$row[dog]='No';} else {$row[dog]='Yes';};
	    if ($row[active]=="1")                
		{$responce->rows[$i]['cell']=array("<img src=templates/".$cfg->theme."/ico/accept.png>",$row[id],$row[name],$row[INN],$row[KPP],$row[bayer],$row[supplier],$row[dog],$row[ERPCode],$row[comment]);} else
		{$responce->rows[$i]['cell']=array("<img src=templates/".$cfg->theme."/ico/cancel.png>",$row[id],$row[name],$row[INN],$row[KPP],$row[bayer],$row[supplier],$row[dog],$row[ERPCode],$row[comment]);};
	    $i++;
	}
	echo json_encode($responce);
};
if ($oper=='edit')
{
        if ($bayer=='Yes') {$bayer=1;} else {$bayer=0;};
        if ($supplier=='Yes') {$supplier=1;} else {$supplier=0;};
        if ($dog=='Yes') {$dog=1;} else {$dog=0;};
	$SQL = "UPDATE knt SET name='$name',comment='$comment',INN='$INN',KPP='$KPP',bayer='$bayer',supplier='$supplier',dog='$dog',ERPCode='$ERPCode' WHERE id='$id'";
	$result = mysql_query( $SQL ) or die("Не могу обновить данные по контрагенту!".mysql_error());
};
if ($oper=='add')
{
	$SQL = "INSERT INTO knt (id,name,INN,KPP,bayer,supplier,dog,ERPCode,comment,active) VALUES (null,'$name','$INN','$KPP','$bayer','$supplier','$dog','$ERPCode','$comment',1)";
	$result = mysql_query( $SQL ) or die("Не могу добавить контрагента!".mysql_error());

};
if ($oper=='del')
{
	$SQL = "UPDATE knt SET active=not active WHERE id='$id'";
	$result = mysql_query( $SQL ) or die("Не могу обновить данные по контрагенту!".mysql_error());
};

?>