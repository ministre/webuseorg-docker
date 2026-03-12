<?php
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
include("../../functions.php");		// подгружаем функции (мини версия)

$curuserid = $_GET['curuserid'];

        $SQL = "SELECT * FROM users_profile WHERE usersid='$curuserid'";  
	$result = mysql_query($SQL,$cfg->base_id);
	if ($result!='') {
         while ($myrow = mysql_fetch_array($result)){
                $id=$myrow[id];
                $fio=$myrow[fio];
                $faza=$myrow[faza];
                $code=$myrow[code];
                $endfaze=MySQLDateTimeToDateTime($myrow[enddate]);
                $post=$myrow[post];
	 };
?>
<script>
    $("#bexp").click(function(){
       newWin=window.open("","","width=480,height=200");
       newWin.document.write("<table border=1 width=460px cellpadding=8 cellspacing=0><tr><td><? echo "<h1>$fio</h1><h2>$post</h2><h3>№$code</h3>";?></td></tr></table>")
    });
</script>
    <div class="row-fluid">
        <div class="span4">
            <span class="help-block">ФИО</span>
            <input placeholder="ФИО" name="fio" id="fio" value="<? echo "$fio";?>">
            <span class="help-block">Должность</span>            
            <input placeholder="Должность" name="post" id="post" value="<? echo "$post";?>">
        </div>
        <div class="span4">
            <span class="help-block">Текущая фаза</span>
            <input placeholder="Текущая фаза" name="faza" id="faza" value="<? echo "$faza";?>">
            <span class="help-block">Код ERP</span>     
            <input placeholder="Код учетной системы" name="code" id="code" value="<? echo "$code";?>">            
        </div>
        <div class="span4">
            <span class="help-block">Конец фазы</span>     
            <input placeholder="Дата завершения фазы" name="endfaze" id="dtpost" value="<? echo "$endfaze";?>"><br><br>
            <button name=bexp id=bexp>Распечатать</button>
        </div>
    </div>
</br>
<?
        };


?>