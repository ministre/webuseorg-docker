<?php
include("../../inc/class/config.php");		// загружаем классы настроек
include("../../inc/class/users.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id

include("../../controller/server/login.php");			// проверяем вход пользователя
include("../../controller/server/functions.php");		// подгружаем функции пользователя

$eqid=$_GET["eqid"];
$step=$_GET["step"];

?>
 <script>
 $(function(){
        var field = new Array("dtpost","dt","kntid" );//поля обязательные
        $("form").submit(function() {// обрабатываем отправку формы
            var error=0; // индекс ошибки
            $("form").find(":input").each(function() {// проверяем каждое поле в форме
                for(var i=0;i<field.length;i++){ // если поле присутствует в списке обязательных
                    if($(this).attr("name")==field[i]){ //проверяем поле формы на пустоту
                        if(!$(this).val()){// если в поле пустое
                            $(this).css('border', 'red 1px solid');// устанавливаем рамку красного цвета
                            error=1;// определяем индекс ошибки
                        }
                        else{
                            $(this).css('border', 'gray 1px solid');// устанавливаем рамку обычного цвета
                        }

                    }
                }
           })
            if(error==0){ // если ошибок нет то отправляем данные
                return true;
            }
            else {
            if(error==1) var err_text = "Не все обязательные поля заполнены!";
            $("#messenger").addClass("alert alert-error");
            $("#messenger").html(err_text);
            $("#messenger").fadeIn("slow");
            return false; //если в форме встретились ошибки , не  позволяем отослать данные на сервер.
            }
        })
    });
$(document).ready(function() { 
            // навесим на форму 'myForm' обработчик отлавливающий сабмит формы и передадим функцию callback.
            $('#myForm').ajaxForm(function(msg) {                 
                if (msg!="ok"){
                    $('#messenger').html(msg); 
                } else {
                    $("#pg_add_edit" ).dialog( "destroy" );
                    jQuery("#tbl_equpment").jqGrid().trigger('reloadGrid');
                };
                
            }); 
        }); 
    
</script>

<div id="messenger"></div>    
<form id="myForm" ENCTYPE="multipart/form-data" action="controller/server/repair.php?step=add&eqid=<? echo "$eqid" ?>" method="post" name="form1" target="_self">
    <label>Кто ремонтирует:</label>
    <div id=sorg1>
        <select name=kntid id=kntid>
<?
         $result = mysql_query("SELECT * FROM knt WHERE active=1 order by name;",$cfg->base_id);
            while ($myrow = mysql_fetch_array($result)) {
                echo "<option value=$myrow[id]";
                    if ($myrow[id]==$orgid){echo " selected";};
                echo ">$myrow[name]</option>";                
                };
?>
     </select>   
</div>            
<div class="row-fluid">         
    <div class="span6">  
        <label>Начало ремонта:</label>
        <input name=dtpost id=dtpost value="<? echo "$dtpost"; ?>" size=14>
        <label>Конец ремонта:</label>
        <input name=dt id=dt value="<? echo "$dt"; ?>" size=14>
    </div>
    <div class="span6">            
        <label>Стоимость ремонта:</label>
        <input name=cst id=cst value="<? echo "$cst"; ?>" size=14>        
        <label>Статус:</label>
        <select name=status id=status>
            <option value='1'>В ремонте</option>
           <option value='0'>Ремонт завершен</option>            
        </select>
    </div>
    
  </div>    
        
        <label>Комментарии:</label>
        <textarea class="span6" name=comment>
        <? echo "$comment";?>
        </textarea>
        <div align=center><input type="submit"  name="Submit" value="Сохранить"></div>       
    

</form>
<script type="text/javascript" src="templates/<? echo "$cfg->theme"; ?>/js/rulesdatepicker.js"></script>
<script>
    $("#status").change(function(){       
       $("#dt").datepicker("show");
    });       
</script>    