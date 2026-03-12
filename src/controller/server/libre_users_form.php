<?php
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
include("../../functions.php");		// подгружаем функции (мини версия)


if (isset($_GET["step"])) {$step=$_GET["step"];} else {$step="";};
    $orgid=ClearHtml($_POST["orgid"]);
    if ($orgid==""){$err[]="Не выбрана организация!";};
    $login=ClearHtml($_POST["login"]);
    if ($login==""){$err[]="Не задан логин!";};
    $pass=ClearHtml($_POST["pass"]);
    if ($pass==""){$err[]="Не задан пароль!";};
    $email=ClearHtml($_POST["email"]);
    if ($email==""){$err[]="Не задан E-mail!";};
    $mode=ClearHtml($_POST["mode"]);
    if ($mode==""){$err[]="Не задан режим!";};
    if (!eregi("^[a-zA-Z0-9\._-]+@[a-zA-Z0-9\._-]+\.[a-zA-Z]{2,4}$",$email)) {$err[]="Не верно указан E-mail";};
    if ($step=="add")
    {
        if (DoubleLogin($login)!=0){$err[]="Такой логин уже есть в базе!";};
        if (DoubleEmail($email)!=0){$err[]="Такой E-mail уже есть в базе!";};        
    };
       // Добавляем пользователя   
    if ($step=="add")
    {
     if (count($err)==0)
     {
                $randomid=GetRandomId(60);
                $sql="INSERT INTO users (id,randomid,orgid,login,pass,email,mode,active) VALUES (NULL,'$randomid','$orgid','$login','$pass','$email','$mode','1')";                                      
  		$result = mysql_query($sql,$cfg->base_id);                
  		if ($result==''){die('Не смог добавить пользователя!: ' . mysql_error());}

     };
    };
    if ($step=="edit")
    {
     if (count($err)==0)
     {
	      $id=$_GET["id"];
              $sql="UPDATE users SET orgid='$orgid',login='$login',pass='$pass',email='$email',mode='$mode' WHERE id='$id'";                                      
  		$result = mysql_query($sql,$cfg->base_id);                
  		if ($result==''){die('Не смог изменить пользователя!: ' . mysql_error());}

     };
    };
  if (count($err)==0) {echo "ok";} else {
  echo '<script>$("#messenger").addClass("alert alert-error");</script>';
        for ($i = 0; $i <= count($err); $i++) {echo "$err[$i]<br>";};  };
?>
