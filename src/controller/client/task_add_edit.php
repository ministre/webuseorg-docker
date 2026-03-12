<?
include("../../inc/class/config.php");		// загружаем классы настроек
include("../../inc/class/users.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
$cfg->GetFromBaseNoSmarty();				// получаем настройки из базы

include("../../controller/server/login.php");			// проверяем вход пользователя
include("../../controller/server/functions.php");		// подгружаем функции пользователя

$mode=$_GET["mode"];
$id=$_GET["id"];
$status=1;
// Если пользователь есть, то показываем диалог
if ($user->randomid!="") {
 // если форму редактируем,то получаем данные для неё
 if ($mode=="edit"){
        $SQL = "SELECT tasks.id,tasks.userid,tasks.touserid,tasks.dt,tasks.title,tasks.txt,tasks.status,tasks.maxdate,users.login FROM tasks INNER JOIN users ON tasks.touserid=users.id WHERE tasks.id='$id'";  
	$result = mysql_query($SQL,$cfg->base_id);
	if ($result!='') {
         while ($myrow = mysql_fetch_array($result)){
                $dt=MySQLDateTimeToDateTime($myrow[dt]);
                $maxdate=MySQLDateTimeToDateTime($myrow[maxdate]);
                $touserid=$myrow[touserid];
                $status=$myrow[status];
		$title=$myrow[title];
                $txt=$myrow[txt];
	 };
	} else {die('Неверный запрос DoubleLogin: ' . mysql_error());}  
  };
?>
<script>
 // проверка на заполнение значений
 $(function(){
        var field = new Array("dt", "title", "maxdate");//поля обязательные                 
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
            else{
            if(error==1) var err_text = "Не все обязательные поля заполнены!<hr>";
            $("#messenger").html(err_text); 
            $("#messenger").fadeIn("slow"); 
            return false; //если в форме встретились ошибки , не  позволяем отослать данные на сервер.
            }                                       
        })
    });
</script>

<hr>
<div id="messenger"></div>
<form ENCTYPE="multipart/form-data" action="?content_page=tasks&step=<? echo "$mode&id=$id"; ?>" method="post" name="form1" target="_self">
 Кому назначено:
 <select name=touserid>
<?
  $result = mysql_query("SELECT * FROM users order by login;",$cfg->base_id);
    while ($myrow = mysql_fetch_array($result))
    {
      echo "<option value=$myrow[id]";
      if ($myrow[id]==$touserid){echo " selected";};
      echo ">$myrow[login]</option>";
    };
?>   
 </select><br>
 <table border=0>
<tr>
 <td>Дата/время:</td><td><input name="dt" id="dt" size=16 value="<? echo "$dt";?>"></td>
</tr>
<tr>
 <td>Заголовок:</td><td><input name="title" id="title" size=60 value="<? echo "$title";?>"></td>
</tr>
<tr>
 <td>Пояснение:</td>
 <td>
   <textarea name="txt" type="text" id="txt" rows="10" cols="90"><? echo "$txt";?></textarea>    
 </td>
</tr> 
<tr>
 <td>Выполнить до:</td><td><input name="maxdate" id="maxdate" size=16  value="<? echo "$maxdate";?>"></td>
</tr> 
<tr>
 <td>Текущий статус:</td>
 <td>
    <select name=status>
      <option value=1 <? if ($status==1) {echo " selected";};?>>В работе</option>
      <option value=0 <? if ($status==0) {echo " selected";};?>>Завершено</option>
      <option value=2 <? if ($status==2) {echo " selected";};?>>Остановлено</option>
    </select>
 </td>
</tr> 
 </table>
<div align=center><input type="submit"  name="Submit" value="Сохранить"></div> 
</form>
<script type="text/javascript" src="templates/<? echo "$cfg->theme"; ?>/js/rulesdatepicker.js"></script>
<?
} else {echo "Пользователь не авторизирован!";};
?>