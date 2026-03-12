<?
include("../../inc/class/config.php");		// загружаем классы настроек
include("../../inc/class/users.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id

include("../../controller/server/login.php");			// проверяем вход пользователя
include("../../controller/server/functions.php");		// подгружаем функции пользователя

$step=$_GET["step"];
$id=$_GET["id"];

if ($user->mode=="1") {
    
if ($step=="edit"){
        $SQL = "SELECT * FROM users WHERE id='$id'";  
	$result = mysql_query($SQL,$cfg->base_id);
	if ($result!='') {
         while ($myrow = mysql_fetch_array($result)){
                $orgid=$myrow[orgid];
                $login=$myrow[login];
                $pass=$myrow[pass];
                $email=$myrow[email];
                $mode=$myrow[mode];
	 };
	} else {die('Неверный запрос DoubleLogin: ' . mysql_error());}  
  };    
?>
 
 <script>
 $(function(){
        var field = new Array("login", "pass", "email");//поля обязательные                 
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
                    $("#add_edit" ).dialog( "destroy" );
                    jQuery("#list2").jqGrid().trigger('reloadGrid');
                };
                
            }); 
        }); 
        
</script>
<div id="messenger"></div>    
<form id="myForm" class="well" ENCTYPE="multipart/form-data" action="controller/server/libre_users_form.php?step=<? echo "$step&id=$id"; ?>" method="post" name="form1" target="_self">
 <span class="help-block">Организация:</span>
 <select name=orgid>
<?
  $result = mysql_query("SELECT * FROM org WHERE active=1 order by name;",$cfg->base_id);
    while ($myrow = mysql_fetch_array($result))
    {
      echo "<option value=$myrow[id]";
      if ($myrow[id]==$orgid){echo " selected";};
      echo ">$myrow[name]</option>";
    };
?>   
 </select>
         <select name=mode>
            <option value=0 <? if ($mode==0) {echo "selected";};?>>Пользователь</option>
            <option value=0 <? if ($mode==1) {echo "selected";};?>>Администратор</option>
        </select>
 
 <div class="well form-inline">
    <input placeholder="Логин" name="login" id="login" value="<? echo "$login";?>">
    <input placeholder="Пароль" name="pass" id="pass"  TYPE=PASSWORD value="<? echo "$pass";?>">
    <input placeholder="Email" name="email" id="email" size=16 value="<? echo "$email";?>"> 
 </div>
 <div align=center><input type="submit"  name="Submit" value="Сохранить"></div> 
</form> 
<?

    
} else echo "Нужны права администратора!";

?>