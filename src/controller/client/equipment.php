<?
include("../../inc/class/config.php");		// загружаем классы настроек
include("../../inc/class/users.php");		// загружаем классы настроек

$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
$cfg->GetFromBaseNoSmarty();				// получаем настройки из базы
include("../../controller/server/login.php");			// проверяем вход пользователя
include("../../controller/server/functions.php");		// подгружаем функции пользователя
?>
 <script>
 $(function(){
        var field = new Array("dtpost", "sorgid", "splaces","suserid","sgroupname","svendid","snomeid");//поля обязательные
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
            if(error==1) var err_text = "Не все обязательные поля заполнены!<hr>";
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
<?
$step=$_GET["step"];
$id=$_GET["id"];

if ($user->mode=="1") {
echo "<script>orgid=''</script>";
echo "<script>placesid=''</script>";
echo "<script>userid=''</script>";
echo "<script>vendorid=''</script>";
echo "<script>groupid=''</script>";
echo "<script>groupid=''</script>";
echo "<script>nomeid=''</script>";
if ($step=="edit"){
		     $result = mysql_query("SELECT * FROM equipment WHERE id='$id';",$cfg->base_id);
		       while ($myrow = mysql_fetch_array($result)){
			    $dtpost=MySQLDateTimeToDateTime($myrow[datepost]);
			    $orgid=$myrow[orgid]; echo "<script>orgid='".$orgid."'</script>";
			    $placesid=$myrow[placesid];echo "<script>placesid='".$placesid."'</script>";
			    $userid=$myrow[usersid];echo "<script>userid='".$userid."';</script>";
			    $nomeid=$myrow[nomeid];echo "<script>nomeid='".$nomeid."'</script>";
			    $buhname=$myrow[buhname];
			    $cost=$myrow[cost];
			    $currentcost=$myrow[currentcost];
			    $sernum=$myrow[sernum];
			    $invnum=$myrow[invnum];
			    $shtrihkod=$myrow[shtrihkod];
			    $os=$myrow[os];
			    $mode=$myrow[mode];
                            $mapyet=$myrow[mapyet];
			    $comment=$myrow[comment];
			    $photo=$myrow[photo];
                            $ip=$myrow[ip];
		       };
		     
		     $result = mysql_query("SELECT * FROM nome WHERE id='$nomeid';",$cfg->base_id);
		       while ($myrow = mysql_fetch_array($result)){
			    $vendorid=$myrow[vendorid]; echo "<script>vendorid='".$vendorid."'</script>";
			    $groupid=$myrow[groupid];echo "<script>grouid='".$groupid."'</script>";
		       };
		       
       };       
?>
<div id="messenger"></div>    
<form id="myForm" class="well form-inline" ENCTYPE="multipart/form-data" action="controller/server/equipment_form.php?step=<? echo "$step&id=$id"; ?>" method="post" name="form1" target="_self">
 <input name=dtpost id=dtpost value="<? echo "$dtpost"; ?>" size=14>
 <div class="row-fluid">
  <div class="span4">
 <label>Куда:</label><br>
     <div id=sorg>
    <select name=sorgid id=sorgid>
    <?
        $result = mysql_query("SELECT * FROM org WHERE active=1 order by name;",$cfg->base_id);
        while ($myrow = mysql_fetch_array($result)){
          echo "<option value=$myrow[id]";
            if ($myrow[id]==$orgid){echo " selected";};
          echo ">$myrow[name]</option>";
           };
    ?>
    </select>
    </div>
    <div id=splaces>идет загрузка..</div>
    <div id=susers>идет загрузка..</div>      
    <label>Серийный номер:</label>
    <input name=sernum value="<? echo "$sernum";?>" size=14>    
    <label>Статический IP:</label>
    <input name=ip id=ip value="<? echo "$ip"; ?>" size=14>
  </div>
  <div class="span4">
    <label>Что:</label><br>     
     <div id=sgroups>
        <?
            $SQL = "SELECT * FROM group_nome WHERE active=1 ORDER BY name";
            $result = mysql_query( $SQL ) or die("Не могу выбрать список групп!".mysql_error());
            $sts="<select name=sgroupname id=sgroupname>";
            while($row = mysql_fetch_array($result)) {
                $sts=$sts."<option value=$row[id] ";
                if ($groupid==$row[id]){$sts=$sts."selected";};
                $sts=$sts.">$row[name]</option>";
                };
            $sts=$sts."</select>";
            echo $sts;
        ?>
    </div>    
    <div id=svendors>идет загрузка..</div>
    <div id=snomes>идет загрузка..</div> 
    <label>Инвентарный номер: </label>
    <input id=invnum name=invnum value="<? echo "$invnum";?>" size=14><button class="btn btn-primary" name=binv id=binv>Создать</button><br>    
    <label class="checkbox">
        <input type="checkbox" name="os" value="1" <? if ($os=="1") {echo "checked";};?>> Основные ср-ва
    </label>
    
  </div>
  <div class="span4">
     <label>Имя по бухгалтерии:</label>
     <input name=buhname value="<? echo "$buhname";?>" size=30>           
     <input name=cost value="<? echo "$cost";?>" placeholder="Начальная стоимость" >
     <input name=currentcost value="<? echo "$currentcost";?>" placeholder="Текущая стоимость">
     <label>Штрихкод:</label>
     <input name=shtrihkod id=shtrihkod value="<? echo "$shtrihkod";?>" size=14><button class="btn btn-primary" name=bshtr id=bshtr>Создать</button><br>     
    <label class="checkbox">
        <input type="checkbox" name="mode" value="1" <? if ($mode=="1") {echo "checked";};?>> Списано
    </label>    
    <label class="checkbox">
        <input type="checkbox" name="mapyet" value="1" <? if ($mapyet=="1") {echo "checked";};?>> Есть на карте
    </label>    

     
  </div>
</div>

<script type="text/javascript" src="jquery/_ajaxupload.js"></script>
<script>
       var btnUpload=$('#uploadButton');
       var upload_me=new $.ajax_upload(btnUpload, {
         action : 'controller/server/uploadimage.php',
         name : 'myfile',
         onComplete: function(file, response){
         if(response=="error"){$('#status').text='ошибка..';} else {
           $("#nomeimage").html('<img class=img-rounded src=images/photo/'+response+'  width=120>');
           $("#picname").val(response);
           };       
         }
       });
</script>
 <br>
<div class="row-fluid">
  <div class="span4">
    <div name=nomeimage id=nomeimage align=center>
        <?
        if ($photo!="") {echo "<img class=img-rounded src=images/photo/$photo width=120>";} else {echo "<img class=img-rounded src=images/noimage.jpg width=120>";};
        ?>          
    </div>    
    <input name=picname id=picname TYPE=HIDDEN value="<? echo "$photo";?>">    
  </div>
  <div class="span8">
        <label>Комментарии:</label><br>
        <textarea class="span12" name=comment>
        <? echo "$comment";?>
        </textarea>
        <div align=center><input type="submit" class="btn btn-primary" name="Submit" value="Сохранить"></div>       
        <div align=left><div id="uploadButton" class="btn btn-primary">Загрузить фото</div>              </div>
  </div>
</div> 
</form>
<script type="text/javascript" src="templates/<? echo "$cfg->theme"; ?>/js/rulesdatepicker.js"></script>

 <script>
    
    function GetListPlaces(orgid,placesid){
       url="controller/server/getlistplaces.php?orgid="+orgid+"&placesid="+placesid;
       $("#splaces").load(url);
    };
    function GetListUsers(orgid,userid){
       //alert(userid+"!!");
     $("#susers").load("controller/server/getlistusers.php?orgid="+orgid+"&userid="+userid);
    };
    function GetListGroups(groupid){
      $("#sgroups").load("controller/server/getlistgroupname.php?groupid="+groupid);
    };
    function GetListNome(groupid,vendorid,nmd){
	 $.ajax({
     			url: "controller/server/getlistnomes.php?groupid="+groupid+"&vendorid="+vendorid+"&nomeid="+nmd,
     			success: function(answ){
       			$("#snomes").html(answ);
       			//GetListNome($("#sgroupname :selected").val(),$("#svendid :selected").val());
		        }
    		});
    };

    function GetListVendors(groupid,vendorid){
	 $.ajax({
     			url: "controller/server/getlistvendors.php?groupid="+groupid+"&vendorid="+vendorid,
     			success: function(answ){
       			$("#svendors").html(answ);
       			GetListNome($("#sgroupname :selected").val(),$("#svendid :selected").val(),nomeid);
			      $("#svendid").click(function(){
			          $("#snomes").html="идет загрузка.."; // заглушка. Зачем?? каналы счас быстрые
				      GetListNome($("#sgroupname :selected").val(),$("#svendid :selected").val());
				    });

		        }
    		});
    };

       // Заполняем инвентарник и штрихкод    
       function getRandomNum(lbound, ubound) {
       return (Math.floor(Math.random() * (ubound - lbound)) + lbound);};

    $("#binv").click(function(){
       var today = new Date();
       $("#invnum").val(today.getDay()+""+today.getMonth()+""+today.getFullYear()+""+today.getUTCHours()+""+today.getMinutes()+""+today.getSeconds());       
       return false;
    });    

    $("#bshtr").click(function(){
       shtr="";
       for (var i = 0; i < 13; i++) {shtr=shtr+""+getRandomNum(1,9);}       
       $("#shtrihkod").val(shtr);       
       return false;
    });    

    
    // обрабатываем нажатие кнопки выбора организации
    $("#sorgid").click(function(){
      $("#splaces").html="идет загрузка.."; // заглушка. Зачем?? каналы счас быстрые
      $("#susers").html="идет загрузка..";
      GetListPlaces($("#sorgid :selected").val(),''); // перегружаем список помещений организации
      GetListUsers($("#sorgid :selected").val(),'') // перегружаем пользователей организации
    });
    // выбираем производителя по группе
    $("#sgroupname").click(function(){
      $("#svendors").html="идет загрузка.."; // заглушка. Зачем?? каналы счас быстрые
      GetListVendors($("#sgroupname :selected").val()); // перегружаем список vendors
    });

         // загружаем места  
         GetListPlaces($("#sorgid :selected").val(),placesid);
         // загружаем пользователей
	 //alert(userid)
         GetListUsers( $("#sorgid :selected").val(),userid);
         // загружаем производителя
         GetListVendors($("#sgroupname :selected").val(),vendorid);
         // номенклатура	 
         GetListNome($("#sgroupname :selected").val(),$("#svendid :selected").val(),nomeid);   
  </script>

<?
};

?>