<?
$newsid=$num=$_GET['id'];
if ($newsid!="") {
    $SQL = "SELECT * FROM news WHERE id=$newsid";
    $result = mysql_query( $SQL ) or die("Не могу выбрать список новостей!".mysql_error());
    while($row = mysql_fetch_array($result)) {
        $smarty->assign('news_dt', $row[dt]);
        $smarty->assign('news_title', $row[title]);
        $smarty->assign('news_body', $row[body]);
    };
};
?>