<?
include("../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../config.php");			// загружаем основные настройки, которых нет в БД
include("../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id

function GetRandomId($n)
{
  $id="";
  for ($i = 1; $i <= $n; $i++)
  {
    $id=$id.chr(rand(48,56));
  }
    return $id;
};

$step = $_GET['step'];

if ($step=="")
{
?>    
  <form ENCTYPE="multipart/form-data" action="?step=install" method="post" name="form1" target="_self">
 Имя базы (откуда берем):<br>
 <input name=basename id=basename value="useorg"><br>
 <input type="submit"  name="Submit" value="Начать">     
  </form>
<?  
}
else
{
  $basename = $_POST['basename'];
  echo "**********************************<br>";
  echo "*         ИМПОРТ ДАННЫХ          *<br>";
  echo "**********************************<br>";
  $base_id_import=mysql_connect($cfg->mysql_host,$cfg->mysql_user,$cfg->mysql_pass);
    if (!$base_id_import) {echo "<b>Ошибка:</b> Нет соединения с базой MySQL. Возможно не верно настроен конфигурационный файл.<br>";die();};

 echo "-импортирую организации<br>";
    if (mysql_select_db($basename,$base_id_import)==false){echo "<b>Ошибка:</b> не могу подключить базу $basename<br>";die();};
    $result_imp = mysql_query("SELECT * FROM org",$base_id_import);    
    if (!$result_imp)  {echo "<b>Ошибка:</b> ".mysql_error()."<br>";die();$err++;};
    
    if (mysql_select_db($cfg->mysql_base,$cfg->base_id)==false){echo "<b>Ошибка:</b> не могу подключить базу $cfg->mysql_base<br>";die();};
    // удаляюю содержимое
    $result = mysql_query("DELETE FROM org",$cfg->base_id);
    if (!$result)  {echo "<b>Ошибка:</b> ".mysql_error()."<br>";die();$err++;};
    // переношу
    while ($myrow = mysql_fetch_array($result_imp))
    {
       $result = mysql_query("INSERT INTO org (id,name,active) VALUES ($myrow[id],'$myrow[name]',1)",$cfg->base_id);
       if (!$result)  {echo "<b>Ошибка:</b> ".mysql_error()."<br>";die();$err++;};
    };

 echo "-импортирую пользователей<br>";
    if (mysql_select_db($basename,$base_id_import)==false){echo "<b>Ошибка:</b> не могу подключить базу $basename<br>";die();};
    $result_imp = mysql_query("SELECT * FROM peoples",$base_id_import);    
    if (!$result_imp)  {echo "<b>Ошибка:</b> ".mysql_error()."<br>";die();$err++;};

    
    if (mysql_select_db($cfg->mysql_base,$cfg->base_id)==false){echo "<b>Ошибка:</b> не могу подключить базу $cfg->mysql_base<br>";die();};
    $result = mysql_query("DELETE FROM users",$cfg->base_id);
    if (!$result)  {echo "<b>Ошибка 1:</b> ".mysql_error()."<br>";die();$err++;};
    
    while ($myrow = mysql_fetch_array($result_imp))
    {
       $randomid=GetRandomId(60);
       $email=$myrow[login].'@khortitsa.com';
       $mode=0;
       if ($myrow[login]=="gribov.p"){$mode='1';};
       $sql="INSERT INTO users (id,randomid,orgid,login,pass,email,mode,lastdt,active) VALUES                             
                             ($myrow[id],'$randomid',1,'$myrow[login]','$myrow[pass]','$email',$mode,'',1)";
                             //echo "!$sql!";
       $result = mysql_query($sql,$cfg->base_id);       
       if (!$result)  {echo "<b>Ошибка 2:</b> ".mysql_error()."<br>";die();$err++;};
    };


 echo "-импортирую производителей<br>";
    if (mysql_select_db($basename,$base_id_import)==false){echo "<b>Ошибка:</b> не могу подключить базу $basename<br>";die();};
    $result_imp = mysql_query("SELECT * FROM custnome",$base_id_import);    
    if (!$result_imp)  {echo "<b>Ошибка:</b> ".mysql_error()."<br>";die();$err++;};

    
    if (mysql_select_db($cfg->mysql_base,$cfg->base_id)==false){echo "<b>Ошибка:</b> не могу подключить базу $cfg->mysql_base<br>";die();};
    $result = mysql_query("DELETE FROM vendor",$cfg->base_id);
    if (!$result)  {echo "<b>Ошибка 1:</b> ".mysql_error()."<br>";die();$err++;};
    
    while ($myrow = mysql_fetch_array($result_imp))
    {
       $sql="INSERT INTO vendor (id,name,comment,active) VALUES                             
                             ($myrow[id],'$myrow[name]','',1)";
                             //echo "!$sql!";
       $result = mysql_query($sql,$cfg->base_id);       
       if (!$result)  {echo "<b>Ошибка 2:</b> ".mysql_error()."<br>";die();$err++;};
    };
 echo "-импортирую группы номенклатуры<br>";
    if (mysql_select_db($basename,$base_id_import)==false){echo "<b>Ошибка:</b> не могу подключить базу $basename<br>";die();};
    $result_imp = mysql_query("SELECT * FROM groupnome",$base_id_import);    
    if (!$result_imp)  {echo "<b>Ошибка:</b> ".mysql_error()."<br>";die();$err++;};

    
    if (mysql_select_db($cfg->mysql_base,$cfg->base_id)==false){echo "<b>Ошибка:</b> не могу подключить базу $cfg->mysql_base<br>";die();};
    $result = mysql_query("DELETE FROM group_nome",$cfg->base_id);
    if (!$result)  {echo "<b>Ошибка 1:</b> ".mysql_error()."<br>";die();$err++;};
    
    while ($myrow = mysql_fetch_array($result_imp))
    {
       $sql="INSERT INTO group_nome (id,name,comment,active) VALUES                             
                             ($myrow[id],'$myrow[name]','',1)";
                             //echo "!$sql!";
       $result = mysql_query($sql,$cfg->base_id);       
       if (!$result)  {echo "<b>Ошибка 2:</b> ".mysql_error()."<br>";die();$err++;};
    };
    
 echo "-импортирую названия номенклатуры<br>";
    if (mysql_select_db($basename,$base_id_import)==false){echo "<b>Ошибка:</b> не могу подключить базу $basename<br>";die();};
    $result_imp = mysql_query("SELECT * FROM nome",$base_id_import);    
    if (!$result_imp)  {echo "<b>Ошибка:</b> ".mysql_error()."<br>";die();$err++;};

    
    if (mysql_select_db($cfg->mysql_base,$cfg->base_id)==false){echo "<b>Ошибка:</b> не могу подключить базу $cfg->mysql_base<br>";die();};
    $result = mysql_query("DELETE FROM nome",$cfg->base_id);
    if (!$result)  {echo "<b>Ошибка 1:</b> ".mysql_error()."<br>";die();$err++;};
    
    while ($myrow = mysql_fetch_array($result_imp))
    {
       $sql="INSERT INTO nome (id,groupid,vendorid,name,active) VALUES                             
                             ($myrow[id],$myrow[groupnomeid],$myrow[custnomeid],'$myrow[name]',1)";
                             //echo "!$sql!";
       $result = mysql_query($sql,$cfg->base_id);       
       if (!$result)  {echo "<b>Ошибка 2:</b> ".mysql_error()."<br>";die();$err++;};
    };

 echo "-импортирую названия помещений<br>";
    if (mysql_select_db($basename,$base_id_import)==false){echo "<b>Ошибка:</b> не могу подключить базу $basename<br>";die();};
    $result_imp = mysql_query("SELECT * FROM houses",$base_id_import);    
    if (!$result_imp)  {echo "<b>Ошибка:</b> ".mysql_error()."<br>";die();$err++;};

    
    if (mysql_select_db($cfg->mysql_base,$cfg->base_id)==false){echo "<b>Ошибка:</b> не могу подключить базу $cfg->mysql_base<br>";die();};
    $result = mysql_query("DELETE FROM places",$cfg->base_id);
    if (!$result)  {echo "<b>Ошибка 1:</b> ".mysql_error()."<br>";die();$err++;};
    
    while ($myrow = mysql_fetch_array($result_imp))
    {
       $sql="INSERT INTO places (id,orgid,name,comment,active) VALUES                             
                             ($myrow[id],$myrow[orgid],'$myrow[name]','$myrow[comment]',1)";
                             //echo "!$sql!";
       $result = mysql_query($sql,$cfg->base_id);       
       if (!$result)  {echo "<b>Ошибка 2:</b> ".mysql_error()."<br>";die();$err++;};
    };
 echo "-импортирую размещение пользователей<br>";
    if (mysql_select_db($basename,$base_id_import)==false){echo "<b>Ошибка:</b> не могу подключить базу $basename<br>";die();};
    $result_imp = mysql_query("SELECT * FROM piplhouse",$base_id_import);    
    if (!$result_imp)  {echo "<b>Ошибка:</b> ".mysql_error()."<br>";die();$err++;};

    
    if (mysql_select_db($cfg->mysql_base,$cfg->base_id)==false){echo "<b>Ошибка:</b> не могу подключить базу $cfg->mysql_base<br>";die();};
    $result = mysql_query("DELETE FROM places_users",$cfg->base_id);
    if (!$result)  {echo "<b>Ошибка 1:</b> ".mysql_error()."<br>";die();$err++;};
    
    while ($myrow = mysql_fetch_array($result_imp))
    {
       $sql="INSERT INTO places_users (id,placesid,userid) VALUES                             
                             ($myrow[id],$myrow[houseid],'$myrow[peopleid]')";
                             //echo "!$sql!";
       $result = mysql_query($sql,$cfg->base_id);       
       if (!$result)  {echo "<b>Ошибка 2:</b> ".mysql_error()."<br>";die();$err++;};
    };

 echo "-импортирую реестр оргтехники<br>";
    if (mysql_select_db($basename,$base_id_import)==false){echo "<b>Ошибка:</b> не могу подключить базу $basename<br>";die();};
    $result_imp = mysql_query("SELECT * FROM orgtehnika",$base_id_import);    
    if (!$result_imp)  {echo "<b>Ошибка:</b> ".mysql_error()."<br>";die();$err++;};

    
    if (mysql_select_db($cfg->mysql_base,$cfg->base_id)==false){echo "<b>Ошибка:</b> не могу подключить базу $cfg->mysql_base<br>";die();};
    $result = mysql_query("DELETE FROM equipment",$cfg->base_id);
    if (!$result)  {echo "<b>Ошибка 1:</b> ".mysql_error()."<br>";die();$err++;};
    
    while ($myrow = mysql_fetch_array($result_imp))
    {
       $sql="INSERT INTO equipment (id,orgid,placesid,usersid,nomeid,buhname,datepost,cost,currentcost,sernum,
       invnum,shtrihkod,os,mode,comment,photo,active)
       VALUES ($myrow[id],$myrow[orgid],$myrow[housesid],$myrow[peoplesid],
       $myrow[nomeid],'$myrow[buhname]','$myrow[datepost]','$myrow[costpost]',0,
       '$myrow[sernum]','$myrow[invnum]','$myrow[shtrihkod]',$myrow[os],$myrow[mode],'$myrow[comment]','',1)";
                             //echo "!$sql!";
       $result = mysql_query($sql,$cfg->base_id);       
       if (!$result)  {echo "<b>Ошибка 2:</b> ".mysql_error()."<br>";die();$err++;};
    };
 echo "-импортирую реестр перемещения<br>";
    if (mysql_select_db($basename,$base_id_import)==false){echo "<b>Ошибка:</b> не могу подключить базу $basename<br>";die();};
    $result_imp = mysql_query("SELECT * FROM perem",$base_id_import);    
    if (!$result_imp)  {echo "<b>Ошибка:</b> ".mysql_error()."<br>";die();$err++;};

    
    if (mysql_select_db($cfg->mysql_base,$cfg->base_id)==false){echo "<b>Ошибка:</b> не могу подключить базу $cfg->mysql_base<br>";die();};
    $result = mysql_query("DELETE FROM move",$cfg->base_id);
    if (!$result)  {echo "<b>Ошибка 1:</b> ".mysql_error()."<br>";die();$err++;};
    
    while ($myrow = mysql_fetch_array($result_imp))
    {
       $sql="INSERT INTO move (id,eqid,dt,orgidfrom,orgidto,placesidfrom,placesidto,useridfrom,useridto,comment)
       VALUES ($myrow[id],$myrow[orgtid],'$myrow[dateper]',$myrow[orgid],
       $myrow[orgid],'$myrow[housesid]','$myrow[housesid]','$myrow[peoplesid]','$myrow[peoplesid]','$myrow[comment]')";
                             //echo "!$sql!";
       $result = mysql_query($sql,$cfg->base_id);       
       if (!$result)  {echo "<b>Ошибка 2:</b> ".mysql_error()."<br>";die();$err++;};
    };
    
    
};

?>
