<?
if (isset($_GET["step"])) {$step=$_GET["step"];} else {$step="";};
if (($user->mode==1) and ($step!=''))
{    
    $dtpost=DateToMySQLDateTime2(ClearHtml($_POST["dtpost"]));
    if ($dtpost==""){$err[]="Не введена дата!";};
    $title=ClearHtml($_POST["title"]);
    if ($title==""){$err[]="Не задан заголовок!";};
    $txt=$_POST["txt"];
    if ($txt==""){$err[]="Нету тела новости!";};
    $newsid=$_GET["newsid"];
    
    if ($step=="add"){
     if (count($err)==0){
              $sql="INSERT INTO news (id,dt,title,body) VALUES (NULL,'$dtpost','$title','$txt')";                                      
  		$result = mysql_query($sql,$cfg->base_id);                
  		if ($result==''){die('Не смог добавить новость!: ' . mysql_error());}        
     };
    };
    
    if (($step=="edit") and ($newsid!="")){
     if (count($err)==0){
              $sql="UPDATE news SET dt='$dtpost',title='$title',body='$txt' WHERE id='$newsid'";                                      
  		$result = mysql_query($sql,$cfg->base_id);                
  		if ($result==''){die('Не смог отредактировать новость!: ' . mysql_error());}        
     };
    };

    
};

?>