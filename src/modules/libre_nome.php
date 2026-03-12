<?
if (isset($_GET["step"])) {$step=$_GET["step"];} else {$step="";};
// Выполняем токма если юзер зашел!
if (($user->mode==1) and ($step!=''))
{    
    $groupid=ClearHtml($_POST["groupid"]);
    if ($groupid==""){$err[]="Не выбрана группа!";};
    $vendorid=ClearHtml($_POST["vendorid"]);
    if ($vendorid==""){$err[]="Не задан производитель!";};
    $namenome=ClearHtml($_POST["namenome"]);
    if ($namenome==""){$err[]="Не задано наименование!";};
    
       // Добавляем номенклатуру
    if ($step=="add")
    {
     if (count($err)==0)
     {               
              $sql="INSERT INTO nome (id,groupid,vendorid,name,active) VALUES (NULL,'$groupid','$vendorid','$namenome','1')";                                      
  		$result = mysql_query($sql,$cfg->base_id);                
  		if ($result==''){die('Не смог добавить номенклатуру!: ' . mysql_error());}

     };
    };
    if ($step=="edit")
    {
     if (count($err)==0)
     {
              $id=$_GET["id"];
              $sql="UPDATE nome SET groupid='$groupid',vendorid='$vendorid',name='$namenome' WHERE id='$id'";                                      
  		$result = mysql_query($sql,$cfg->base_id);                
  		if ($result==''){die('Не смог изменить номенклатуру!: ' . mysql_error());}

     };
    };
 
};
?>