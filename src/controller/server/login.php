<?
$user=new Tusers;				
// Если есть кукисы, получаем сессионный идентификатор
if (isset($_COOKIE["user_randomid"])) {
    $user_randomid=$_COOKIE["user_randomid"];
    SetCookie("user_randomid","$user_randomid",time()+3600000);
    } else {$user_randomid="";};
$user->randomid=$user_randomid;
if ($user->randomid!=""){ // если есть кукисы, то заполняем данные по пользователю ГЛОБАЛЬНО в переменную $user
  $user->GetByRandomId($user->randomid);
};
?>