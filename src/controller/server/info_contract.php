<?php
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
include("../../functions.php");		// подгружаем функции (мини версия)

$kntid = $_GET['kntid'];

$SQL = "SELECT * FROM knt WHERE id='$kntid' and active=1";
$result = mysql_query( $SQL ) or die("Не могу выбрать список контрагентов!".mysql_error());
$dogcount=0;
while($row = mysql_fetch_array($result)) {
    if ($row[dog]=='1'){
        ?><div class="alert alert-success">Контрагент: <?
        echo "$row[name]<br>";
        $SQL = "SELECT * FROM contract WHERE kntid='$kntid' and work=1 and datestart<=CURDATE() and dateend>=CURDATE() and active=1";
        $result2 = mysql_query( $SQL ) or die("Не могу выбрать список договоров!".mysql_error());
        while($row2 = mysql_fetch_array($result2)) {
            $dogcount++;
            ?><div class="well"><span class="label label-info">Активный договор:</span></br><? 
            $dt1=MySQLDateTimeToDateTime($row2[datestart]);
            $dt2=MySQLDateTimeToDateTime($row2[dateend]);
            echo "Номер: $row2[num], $row2[name]</br>";            
            echo "Срок действия с $dt1 по $dt2<br>";
            echo "Файлы: ";
                    $SQL = "SELECT * FROM files_contract WHERE idcontract='$row2[id]'";
                    $result3 = mysql_query( $SQL ) or die("Не могу выбрать список файлов!".mysql_error());
                    while($row3 = mysql_fetch_array($result3)) {
                        echo "<a target='_blank' href='files/$row3[filename]'>$row3[userfreandlyfilename]</a>;";
                    };
            echo "<br>";
            echo "</div>";
        };
        if ($dogcount==0) {?>
            <div class="alert alert-error">
                <b>Внимание!</b> У контрагента нет активных договоров. Обратитесь в юридический отдел!
            </div>                    
        <?};
        ?></div><?
    } else
    {
        ?>
            <div class="alert alert-error">
                <b>Внимание!</b> У контрагента <? echo "$row[name]"; ?> не выставлен конроль договоров. Обратитесь в юридический отдел!
            </div>        
        <?
    };
};

?>
