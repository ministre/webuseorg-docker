<?
 $smarty->assign("ArrayUsers",GetArrayUsers());
    $SQL = "SELECT * FROM news WHERE stiker=1";
    $result = mysql_query( $SQL ) or die("Не могу выбрать список стикеров!".mysql_error());
    while($row = mysql_fetch_array($result)) {
        $smarty->assign('stiker_dt', $row[dt]);
        $smarty->assign('stiker_title', $row[title]);
        $smarty->assign('stiker_body', $row[body]);
    };
 $smarty->assign("ArrayUsersProfile",GetArrayUsersProfile());    
?>