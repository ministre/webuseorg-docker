<?php

include("../../inc/class/config.php");		// загружаем классы настроек
include("../../inc/class/users.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id

include("../../controller/server/login.php");			// проверяем вход пользователя
include("../../controller/server/functions.php");		// подгружаем функции пользователя

$step='edit';
$userid=$_GET["userid"];

?>
<script>    
$(document).ready(function() { 
            // навесим на форму 'myForm' обработчик отлавливающий сабмит формы и передадим функцию callback.
            $('#myForm').ajaxForm(function(msg) {                 
                if (msg!="ok"){
                    $('#messenger').html(msg); 
                } else {
                    $("#add_edit" ).dialog( "destroy" );
                    jQuery("#list2").jqGrid().trigger('reloadGrid');
                };
                
            }); 
        }); 
        
</script>
<?


if ($user->mode=="1") {    
    // А вдруг редактируем??
    if ($step=="edit"){
        $SQL = "SELECT * FROM users_profile WHERE usersid='$userid'";  
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
	} else {die('Неверный запрос : ' . mysql_error());}  
  };
  if ($id==""){$step="add";};
  
?>
<div id="messenger"></div>    
<form id="myForm" class="well" ENCTYPE="multipart/form-data" action="controller/server/libre_profile_users_form.php?step=<? echo "$step&id=$id&userid=$userid"; ?>" method="post" name="form1" target="_self">
    <div class="row-fluid">
        <div class="span6">
            <span class="help-block">ФИО</span>
            <input placeholder="ФИО" name="fio" id="fio" value="<? echo "$fio";?>">
            <span class="help-block">Конец фазы</span>     
            <input placeholder="Дата завершения фазы" name="endfaze" id="dtpost" value="<? echo "$endfaze";?>">
            <span class="help-block">Должность</span>            
            <input placeholder="Должность" name="post" id="post" value="<? echo "$post";?>">
        </div>
        <div class="span6">
            <span class="help-block">Текущая фаза</span>
            <input placeholder="Текущая фаза" name="faza" id="faza" value="<? echo "$faza";?>">
            <span class="help-block">Код ERP</span>     
            <input placeholder="Код учетной системы" name="code" id="code" value="<? echo "$code";?>">            
        </div>
    </div>
<div align=center><input type="submit"  name="Submit" value="Сохранить"></div> 
</form>
<script type="text/javascript" src="templates/<? echo "$cfg->theme"; ?>/js/rulesdatepicker.js"></script>
<?
  
};



?>
