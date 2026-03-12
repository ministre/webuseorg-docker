<?
include("../../inc/class/config.php");		// загружаем классы настроек
include("../../inc/class/users.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id


include("../../controller/server/login.php");			// проверяем вход пользователя
include("../../controller/server/functions.php");		// подгружаем функции пользователя

$mode=$_GET["mode"];
$id=$_GET["id"];

// Если пользователь есть, то показываем диалог
if ($user->randomid!="") {
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
?>
<hr>
Кому назначено:
 
<?
  $result = mysql_query("SELECT * FROM users order by login;",$cfg->base_id);
    while ($myrow = mysql_fetch_array($result))
    {
       if ($myrow[id]==$touserid){echo "$myrow[login]";};
     };
?>   
 <br>
 <table border=0>
<tr>
 <td>Дата/время:</td><td><input readonly="readonly" name="dt" id="dt" size=16 value="<? echo "$dt";?>"></td>
</tr>
<tr>
 <td>Заголовок:</td><td><input readonly="readonly" name="title" id="title" size=60 value="<? echo "$title";?>"></td>
</tr>
<tr>
 <td>Пояснение:</td>
 <td>
   <textarea readonly="readonly" name="txt" type="text" id="txt" rows="10" cols="90"><? echo "$txt";?></textarea>    
 </td>
</tr> 
<tr>
 <td>Выполнить до:</td><td><input readonly="readonly" name="maxdate" id="maxdate" size=16  value="<? echo "$maxdate";?>"></td>
</tr> 
<tr>
 <td>Текущий статус:</td>
 <td>
      <? if ($status==1) {echo "В работе";}
         if ($status==0) {echo "Завершено";}
         if ($status==2) {echo "Остановлено";}
      ?>
 </td>
</tr> 
 </table>
<?
};

?>