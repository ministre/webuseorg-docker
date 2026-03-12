<?
include("../../inc/class/config.php");		// загружаем классы настроек
include("../../inc/class/users.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
$cfg->GetFromBaseNoSmarty();				// получаем настройки из базы
include("../../controller/server/login.php");			// проверяем вход пользователя
include("../../controller/server/functions.php");		// подгружаем функции пользователя
$step=$_GET["step"];
$id=$_GET["id"];

if ($step=='edit')
 {
    $result = mysql_query("SELECT * FROM news WHERE id='$id';",$cfg->base_id);
		       while ($myrow = mysql_fetch_array($result)){
			    $dtpost=MySQLDateTimeToDateTime($myrow[dt]);
			    $title=$myrow[title];
			    $txt=$myrow[body];			    
		       };
 };

?>
<script type="text/javascript" src="templates/<? echo "$cfg->theme"; ?>/js/tiny.js"></script>
<div id="messenger"></div>    
<form ENCTYPE="multipart/form-data" action="?content_page=news&step=<? echo "$step&newsid=$id"; ?>" method="post" name="form1" target="_self">
<table>
<tr>
<td>    
 Дата: <br>
 <input name=dtpost id=dtpost value="<? echo "$dtpost"; ?>" size="14"><br>
</td>    <td>     
  Заголовок:<br>
  <input name=title class="field span4" value="<? echo "$title";?>"  placeholder="Заголовок" size="50"><br>
</td>      
 </tr>
 <tr>
    <td colspan="2" rowspan="1">    
 Тело:<br>
<textarea name=txt class="field span6" rows="6" placeholder="Введите новость" cols=80>
<? echo "$txt";?>
</textarea>
</td>    
</tr>
</table>
</form>
 <script>
 $(function(){
        var field = new Array("dtpost", "title", "txt");//поля обязательные
        $("form1").submit(function() {// обрабатываем отправку формы
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
            if(error==1) var err_text = "Не все обязательные поля заполнены!<hr>";
            $("#messenger").html(err_text);
            $("#messenger").fadeIn("slow");
            return false; //если в форме встретились ошибки , не  позволяем отослать данные на сервер.
            }
        })
    });
</script>
<script type="text/javascript" src="templates/<? echo "$cfg->theme"; ?>/js/rulesdatepicker.js"></script>


