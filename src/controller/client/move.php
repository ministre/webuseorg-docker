<?
include("../../inc/class/config.php");		// загружаем классы настроек
include("../../inc/class/users.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id

include("../../controller/server/login.php");			// проверяем вход пользователя
include("../../controller/server/functions.php");		// подгружаем функции пользователя

$id=$_GET["id"];
$step=$_GET["step"];

echo "<script>orgid=$user->orgid</script>";
echo "<script>placesid=''</script>";
echo "<script>userid=$user->id</script>";

echo "<script>orgid1=''</script>";
echo "<script>placesid1=''</script>";
echo "<script>userid1=''</script>";

     $result = mysql_query("SELECT * FROM equipment WHERE id='$id';",$cfg->base_id);
		       while ($myrow = mysql_fetch_array($result)){
			    $dtpost=MySQLDateTimeToDateTime($myrow[datepost]);
			    $orgid=$myrow[orgid]; echo "<script>orgid1='".$orgid."'</script>";
			    $placesid=$myrow[placesid];echo "<script>placesid1='".$placesid."'</script>";
			    $userid=$myrow[usersid];echo "<script>userid1='".$userid."'</script>";
		       };

?>
<script>
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
<form id="myForm" ENCTYPE="multipart/form-data" action="controller/server/equipment_form.php?step=move&id=<? echo "$id" ?>" method="post" name="form1" target="_self">
<div class="row-fluid"> 
  <div class="span6">
    <label>Организация (откуда):</label>
    <div id=sorg1>
        <select name=sorgid1 id=sorgid1>
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
        <label>Помещение:</label>
        <div name=splaces1 id=splaces1>идет загрузка..</div>
        <label>Человек:</label>
        <div name=susers1 id=susers1>идет загрузка..</div>
    </div>      
  </div>
  <div class="span6">
    <label>Организация (куда):</label>
        <div id=sorg>
         <select name=sorgid id=sorgid >
<?
  $result = mysql_query("SELECT * FROM org WHERE active=1 order by name;",$cfg->base_id);
    while ($myrow = mysql_fetch_array($result))
    {
      echo "<option value=$myrow[id]";
      if ($myrow[id]==$user->orgid){echo " selected";};
      echo ">$myrow[name]</option>";
    };
?>
            </select>
        </div>
        <label>Помещение:</label>
        <div name=splaces id=splaces>идет загрузка..</div>
        <label>Человек:</label>
        <div name=susers id=susers>идет загрузка..</div>      
  </div>
</div>    
<div class="row-fluid">
  <div class="span12">
    <label>Комментарии: </label>
    <textarea class="span8" name=comment><? echo "$comment";?></textarea>      
  </div>
</div    
<div align=center><input type="submit"  name="Submit" value="Сохранить"></div> 
</form>
<script>
    function GetListUsers1(orgid,userid){
     $("#susers1").load("controller/server/getlistusers1.php?orgid="+orgid+"&userid="+userid);
    };
    function GetListUsers(orgid,userid){
     $("#susers").load("controller/server/getlistusers.php?orgid="+orgid+"&userid="+userid);
    };
    function GetListPlaces1(orgid,placesid){
       url="controller/server/getlistplaces1.php?orgid="+orgid+"&placesid="+placesid;
       $("#splaces1").load(url);
    };
    function GetListPlaces(orgid,placesid){
       url="controller/server/getlistplaces.php?orgid="+orgid+"&placesid="+placesid;
       $("#splaces").load(url);
    };
    $("#sorgid1").click(function(){
      $("#splaces1").html="идет загрузка.."; // заглушка. Зачем?? каналы счас быстрые
      $("#susers1").html="идет загрузка..";      
      GetListPlaces1($("#sorgid1 :selected").val(),''); // перегружаем список помещений организации
      GetListUsers1($("#sorgid1 :selected").val(),'') // перегружаем пользователей организации
    });
    $("#sorgid").click(function(){
      $("#splaces").html="идет загрузка.."; // заглушка. Зачем?? каналы счас быстрые
      $("#susers").html="идет загрузка..";
      GetListPlaces($("#sorgid :selected").val(),''); // перегружаем список помещений организации
      GetListUsers($("#sorgid :selected").val(),'') // перегружаем пользователей организации
    });
    
 GetListUsers1(orgid1,userid1);
 GetListUsers(orgid,userid);
 GetListPlaces1(orgid1,placesid1);
 GetListPlaces(orgid,placesid);
</script>    
<?
?>