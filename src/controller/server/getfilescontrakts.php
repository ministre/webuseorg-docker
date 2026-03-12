<?php

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
$id = $_POST['id'];
$idcontract= $_GET['idcontract'];
$where=" WHERE idcontract='$idcontract'";

if ($oper=='')
{
	if(!$sidx) $sidx =1;
	$result = mysql_query("SELECT COUNT(*) AS count FROM files_contract".$where);
	$row = mysql_fetch_array($result);
	$count = $row['count'];

	if( $count >0 ) {$total_pages = ceil($count/$limit);} else {$total_pages = 0;};
	if ($page > $total_pages) $page=$total_pages;

	$start = $limit*$page - $limit;
	$SQL = "SELECT * FROM files_contract ".$where." ORDER BY $sidx $sord LIMIT $start , $limit";
        //echo "!$SQL!";
	$result = mysql_query( $SQL ) or die("Не могу выбрать список договоров!".mysql_error());

	$responce->page = $page;
	$responce->total = $total_pages;
	$responce->records = $count;
	$i=0;
	while($row = mysql_fetch_array($result)) {
	    $responce->rows[$i]['id']=$row[id];      
            $filename=$row[filename];
            $userfreandlyfilename=$row[userfreandlyfilename];
            if ($userfreandlyfilename==""){$userfreandlyfilename='Посмотреть';};
            $responce->rows[$i]['cell']=array($row[id],"<a target=_blank href='files/$filename'>$userfreandlyfilename</a>");
	    $i++;
	}
	echo json_encode($responce);
};
if ($oper=='del')
{
       	$SQL = "DELETE FROM files_contract WHERE id='$id'";
	$result = mysql_query( $SQL ) or die("Не смог удалить файл!".mysql_error());    
};

?>
