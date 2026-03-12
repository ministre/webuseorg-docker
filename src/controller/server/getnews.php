<?
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
include("../../functions.php");			// соеденяемся с БД, получаем $cfg->base_id

$num=$_GET['num'];

 $SQL = "SELECT * FROM news ORDER by dt DESC";
 //echo "$SQL";
    $result = mysql_query( $SQL ) or die("Не могу выбрать список новостей!".mysql_error());
    $cnt=0;$rz=0;
    while($row = mysql_fetch_array($result)) {
        $cnt++;
        if ($cnt==$num){
        $dt=MySQLDateTimeToDateTime($row[dt]);
        echo "<span class='label label-info'>$dt</span><h5>$row[title]</h5>";
        $pieces = explode("<!-- pagebreak -->", $row[body]);
        echo "<p>$pieces[0]</p>";
        echo "<div align=right><a class='btn btn-primary btn-small' href=?content_page=news_read&id=$row[id]>Читать дальше</a></div>";    
        $rz++;
        };
	};
  if ($rz==0) {echo "error";};
?>