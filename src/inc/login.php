<?
$user=new Tusers;				
// Если есть кукисы, получаем сессионный идентификатор
if (isset($_COOKIE["user_randomid"])) {
    $user_randomid=$_COOKIE["user_randomid"];
    SetCookie("user_randomid","$user_randomid",time()+3600000);
    } else {$user_randomid="";};
$smarty->assign('user_randomid', $user_randomid);
$user->randomid=$user_randomid;

if ($user->randomid!=""){ // если есть кукисы, то заполняем данные по пользователю ГЛОБАЛЬНО в переменную $user
  $user->GetByRandomId($user->randomid);
  $user->UpdateLastdt($user->id);
  $smarty->assign('user_login', $user->login);
  $smarty->assign('user_pass', $user->pass);  
  $smarty->assign('user_randomid', $user->randomid);
  $smarty->assign('user_email', $user->email);
  $smarty->assign('user_mode', $user->mode);
  $smarty->assign('user_active', $user->active);
  $smarty->assign('user_orgid', $user->orgid);
  $smarty->assign('user_active', $user->active);  
};

// обрабатываем попытку войти/зарегистрироваться
if (isset($_GET["login_step"])) {
    if ($_GET["login_step"]=='reg'){
        $reg_email= ClearHtml(strtolower($_POST["reg_email"]));
        $reg_login= ClearHtml($_POST["reg_login"]);
        $reg_pass=  ClearHtml($_POST["reg_pass"]);
        $reg_orgid= ClearHtml($_POST["reg_orgid"]);
        $smarty->assign("reg_email",$reg_email);
        $smarty->assign("reg_login",$reg_login);
        $smarty->assign("reg_pass",$reg_pass);
        $smarty->assign("reg_orgid",$reg_orgid);
        $smarty->assign("content_page", "registration.tpl");
        // проверка на ошибки
        if (!eregi("^[a-zA-Z0-9\._-]+@[a-zA-Z0-9\._-]+\.[a-zA-Z]{2,4}$",$reg_email)) {$err[]="Не верно указан E-mail";};
        if ($reg_login=="") {$err[]="Не верно указан логин";};
        if ($reg_pass=="")  {$err[]="Не верно указан пароль";};
        if ($reg_orgid=="") {$err[]="Не указана организация";};
        if (DoubleLogin($reg_login)!=0){$err[]="Такой логин уже есть в базе!";};
        if (DoubleEmail($reg_email)!=0){$err[]="Такой E-mail уже есть в базе!";};        
        // если ошибок нет, то пробуем занести такого в базу
        if (count($err)==0){
             $tmp_user= new Tusers;
             $tmp_user->randomid=GetRandomId(100);
             $tmp_user->orgid=$reg_orgid;
             $tmp_user->login=$reg_login;
             $tmp_user->pass=$reg_pass;
             $tmp_user->email=$reg_email;
             $tmp_user->mode=0;
             $tmp_user->lastdt=date( 'Y-m-d H:i:s');
             SetCookie("user_randomid","$tmp_user->randomid",time()+3600000);
             $tmp_user->Add();
	     $user->GetByRandomId($tmp_user->randomid);
	      $smarty->assign('user_login', $user->login);
	      $smarty->assign('user_pass', $user->pass);  
	      $smarty->assign('user_randomid', $user->randomid);
	      $smarty->assign('user_email', $user->email);
	      $smarty->assign('user_mode', $user->mode);
	      $smarty->assign('user_active', $user->active);
	      $smarty->assign('user_orgid', $user->orgid);  
            } else {  //иначе возврат на страницу регистрации
                $smarty->assign("ArrayOrg",GetArrayOrg());
                $smarty->assign("content_page", "registration.tpl");
                $content_page="registration.tpl";                
            }
    };
    if ($_GET["login_step"]=='logout'){ // если выход то стираем кукисы и ГО на главную страницу
        SetCookie("user_randomid");
        $user_randomid="";
        $user->randomid=$user_randomid;
        $smarty->assign('user_randomid', $user->randomid);
        $smarty->assign("content_page", "home.tpl");
        $content_page="home.tpl";                
        
    };
    if ($_GET["login_step"]=='enter'){ // если вход то пытаемся зайти
      $enter_user_login=$_POST["enter_user_login"];
      $enter_user_pass=$_POST["enter_user_pass"];      
      $smarty->assign("enter_user_login", $enter_user_login);
      $smarty->assign("enter_user_pass", $enter_user_pass);
      if ($enter_user_login==""){$err[]="Логин не может быть пустым!";};
      if ($enter_user_pass==""){$err[]="Пароль не может быть пустым!";};
      if (count($err)==0){
          $user->GetByLoginPass($enter_user_login,$enter_user_pass);
          $user_randomid=$user->randomid;
          if ($user_randomid!=""){
          $smarty->assign('user_login', $user->login);
          $smarty->assign('user_pass', $user->pass);  
          $smarty->assign('user_randomid', $user->randomid);
          $smarty->assign('user_email', $user->email);
          $smarty->assign('user_mode', $user->mode);
          $smarty->assign('user_active', $user->active);
          $smarty->assign('user_orgid', $user->orgid);  
          SetCookie("user_randomid","$user->randomid",time()+3600000);            
          } else {            
            if (($cfg->ad==1) and (check_LDAP_user(strtolower($enter_user_login),$enter_user_pass,$cfg->ldap,$cfg->domain1,$cfg->domain2)=='true')){
              $user->GetByLogin($enter_user_login);
              $user_randomid=$user->randomid;
              if ($user_randomid!=""){
                $smarty->assign('user_login', $user->login);
                $smarty->assign('user_pass', $user->pass);  
                $smarty->assign('user_randomid', $user->randomid);
                $smarty->assign('user_email', $user->email);
                $smarty->assign('user_mode', $user->mode);
                $smarty->assign('user_active', $user->active);
                $smarty->assign('user_orgid', $user->orgid);  
                SetCookie("user_randomid","$user->randomid",time()+3600);
              } else  {$err[]="Пользователь с таким логином найден в АД, но не найден в базе!";}
            } else {
                $err[]="Пользователь с таким логином/паролем не найден!";
                if ($cfg->usercanregistrate==1){$err[]="Вы можете <a href=?content_page=registration>зарегистрироваться</a>";};
            }
            };
      };
    };
};
$smarty->assign('user_id', $user->id);
?>