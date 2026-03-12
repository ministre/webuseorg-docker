<?php

# Copyright (c) 2012-2013 by Pavel Gribov
# Данное ПО распространяется по лицензии GPL v.3
# http://грибовы.рф

$ver='1.05';

$slist[]='SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO"';
$slist[]='SET AUTOCOMMIT=0';

$slist[]='CREATE TABLE config (
  id int(11) NOT NULL AUTO_INCREMENT,
  ad tinyint(1) NOT NULL,
  domain1 varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  domain2 varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  ldap varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  usercanregistrate tinyint(1) NOT NULL,
  useraddfromad tinyint(1) NOT NULL,
  theme varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  sitename varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  emailadmin varchar(100) NOT NULL,
  smtphost varchar(20) NOT NULL,
  smtpauth tinyint(1) NOT NULL,
  smtpport varchar(20) NOT NULL,
  smtpusername varchar(40) NOT NULL,
  smtppass varchar(20) NOT NULL,
  emailreplyto varchar(40) NOT NULL,
  sendemail tinyint(1) NOT NULL,
  version varchar(10) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2';

$slist[]='CREATE TABLE equipment (
  id int(11) NOT NULL AUTO_INCREMENT,
  orgid int(11) NOT NULL,
  placesid int(11) NOT NULL,
  usersid int(11) NOT NULL,
  nomeid int(11) NOT NULL,
  buhname varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  datepost datetime NOT NULL,
  cost int(11) NOT NULL,
  currentcost int(11) NOT NULL,
  sernum varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  invnum varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  shtrihkod varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  os tinyint(1) NOT NULL,
  mode tinyint(1) NOT NULL,
  comment text COLLATE utf8_unicode_ci NOT NULL,
  photo varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  ip VARCHAR(100) NOT NULL,
  mapx VARCHAR(8) NOT NULL,
  mapy VARCHAR(8) NOT NULL,
  mapmoved INT(2) NOT NULL,
  mapyet TINYINT NOT NULL DEFAULT  0,
  active tinyint(1) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=326';

$slist[]='CREATE TABLE eq_param (
  id int(11) NOT NULL AUTO_INCREMENT,
  grpid int(11) NOT NULL,
  paramid int(11) NOT NULL,
  eqid int(11) NOT NULL,
  param varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=66';

$slist[]='CREATE TABLE group_nome (
  id int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  active tinyint(1) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=22';

$slist[]='CREATE TABLE group_param (
  id int(11) NOT NULL AUTO_INCREMENT,
  groupid int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  active tinyint(1) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26';

$slist[]='CREATE TABLE knt (
  id int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  active tinyint(1) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3';

$slist[]='CREATE TABLE move (
  id int(11) NOT NULL AUTO_INCREMENT,
  eqid int(11) NOT NULL,
  dt datetime NOT NULL,
  orgidfrom int(11) NOT NULL,
  orgidto int(11) NOT NULL,
  placesidfrom int(11) NOT NULL,
  placesidto int(11) NOT NULL,
  useridfrom int(11) NOT NULL,
  useridto int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=576';

$slist[]='CREATE TABLE news (
  id int(11) NOT NULL AUTO_INCREMENT,
  dt datetime NOT NULL,
  title varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  body text COLLATE utf8_unicode_ci NOT NULL,
  stiker tinyint(1) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11';

$slist[]='CREATE TABLE nome (
  id int(11) NOT NULL AUTO_INCREMENT,
  groupid int(11) NOT NULL,
  vendorid int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  active tinyint(1) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=127';

$slist[]='CREATE TABLE org (
  id int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  picmap VARCHAR( 255 ),
  active int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6';

$slist[]='CREATE TABLE places (
  id int(11) NOT NULL AUTO_INCREMENT,
  orgid int(11) NOT NULL,
  `name` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  active tinyint(1) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=44';

$slist[]='CREATE TABLE places_users (
  id int(11) NOT NULL AUTO_INCREMENT,
  placesid int(11) NOT NULL,
  userid int(11) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=77';

$slist[]='CREATE TABLE tasks (
  id int(11) NOT NULL AUTO_INCREMENT,
  userid int(11) NOT NULL,
  touserid int(11) NOT NULL,
  dt datetime NOT NULL,
  title varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  txt text COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  maxdate datetime NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=61';

$slist[]='CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  randomid varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  orgid int(11) NOT NULL,
  login varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  pass varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  email varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mode` int(11) NOT NULL,
  lastdt datetime NOT NULL,
  active tinyint(1) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=57';

$slist[]='CREATE TABLE vendor (
  id int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  active tinyint(1) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=51';


  $slist[]="ALTER TABLE  `equipment` ADD  `repair` BOOLEAN NOT NULL AFTER  `photo`";
  $slist[]="CREATE TABLE  `repair` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dt` date NOT NULL,
  `kntid` int(11) NOT NULL,
  `eqid` int(11) NOT NULL,
  `cost` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `dtend` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1";
  
  
  $slist[]="ALTER TABLE  `knt` ADD  `fullname` VARCHAR( 200 ) NOT NULL AFTER  `active` ,
    ADD  `ERPCode` INT NOT NULL AFTER  `fullname` ,
    ADD  `INN` VARCHAR(20)  COLLATE utf8_unicode_ci NOT NULL AFTER  `ERPCode` ,
    ADD  `KPP` VARCHAR(20)  COLLATE utf8_unicode_ci NOT NULL AFTER  `INN` ,
    ADD  `bayer` INT NOT NULL AFTER  `KPP` ,
    ADD  `supplier` INT NOT NULL AFTER  `bayer` ,
    ADD  `dog` INT NOT NULL AFTER  `supplier`";
          

$slist[]="CREATE TABLE  contract (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`kntid` INT NOT NULL ,
`name` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`datestart` DATE NOT NULL ,
`dateend` DATE NOT NULL ,
`num` VARCHAR( 20 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci,
`work` INT NOT NULL ,
`comment` VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL ,
`active` INT NOT NULL
) ENGINE = MYISAM ;  ";
  
$slist[]="CREATE TABLE `files_contract` (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`idcontract` INT NOT NULL ,
userfreandlyfilename VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
`filename` VARCHAR( 200 ) NOT NULL
) ENGINE = MYISAM ;";

$slist[]="CREATE TABLE  users_profile (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `usersid` INT NOT NULL ,
    `fio` VARCHAR( 100 ) NOT NULL ,
    `faza` VARCHAR( 255 ) NOT NULL ,
    `code` VARCHAR( 20 ) NOT NULL ,
    `enddate` DATE NOT NULL ,
    `post` VARCHAR( 200 ) NOT NULL
    ) ENGINE = MYISAM ; ";

$slist[]="CREATE TABLE  exp_log (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`guid` VARCHAR( 200 ) NOT NULL ,
`TimeVal` DATETIME NOT NULL ,
`event` INT NOT NULL ,
`hozorgan` INT NOT NULL ,
`mode` INT NOT NULL
) ENGINE = MYISAM ;";

$slist[]="ALTER TABLE  `exp_log` ADD UNIQUE (`guid`)";

$slist[]="ALTER TABLE  `users_profile` ADD  `res1` VARCHAR( 100 ) NOT NULL AFTER  `post` ,
ADD  `res2` INT( 100 ) NOT NULL AFTER  `res1` ,
ADD  `res3` INT( 100 ) NOT NULL AFTER  `res2`";

$slist[]="ALTER TABLE  `users_profile` ADD  `res4` DATETIME NOT NULL AFTER  `res3`";

include("../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../config.php");			// загружаем основные настройки, которых нет в БД
include("../functions.php");

$step=$_GET['step'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Учет ТМЦ в организации">
    <meta name="author" content="(c) 2012 by Gribov Pavel">
    
    <title>Учет ТМЦ в организации</title>

    <meta name="generator" content="yarus" />
    
    <link rel="stylesheet" type="text/css" href="../templates/<? echo "$cfg->theme";?>/css/bootstrap.css">

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>    

    <link rel="stylesheet" type="text/css" href="../templates/<? echo "$cfg->theme";?>/css/bootstrap-responsive.css">        
    <link rel="stylesheet" type="text/css" href="../templates/<? echo "$cfg->theme";?>/css/jquery-ui.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->    
 
    <script type="text/javascript" src="../jquery/jquery.js"></script>
    <script type="text/javascript" src="../jquery/jquery-ui.js"></script>
    <script>var curuserid='{$user_id}';</script>
</head>
<body>
<? 
 if ($step=="step2"){
    $cfg->mysql_host=$_POST['host_mysql'];
    $cfg->mysql_user=$_POST['login_mysql'];
    $cfg->mysql_pass=$_POST['pass_mysql'];
    $cfg->mysql_base=$_POST['name_mysql'];           
    // пробуем соедениться с базой
    $cfg->base_id=mysql_connect($cfg->mysql_host,$cfg->mysql_user,$cfg->mysql_pass);
    if (!$cfg->base_id){$err[]='Ошибка установления соединения с БД';};
    // пробуем выбрать базу
    if (mysql_select_db($cfg->mysql_base)==false){$err[]="Ошибка: не могу подключить базу $cfg->mysql_base.Пробую её создать.";};    
    // если базы нет, пробуем её создать
    if (count($err)!=0)
    {
        $sql="CREATE DATABASE $cfg->mysql_base";
        $result = mysql_query($sql,$cfg->base_id);                
        if ($result==''){$err[]='Ошибка создания БД: '.mysql_error();} else {$err= array();};
        if (mysql_select_db($cfg->mysql_base)==false){$err[]="Ошибка: не могу подключить базу $cfg->mysql_base";};            
    };
    // Если БД создана таки, то пробуем в неё вливать дамп..
    if (count($err)==0)
    {
        for ($i=0;$i<count($slist);$i++){
        $sql=$slist[$i];
        $result = mysql_query($sql,$cfg->base_id);                
        if ($result==''){$err[]='Ошибка создания БД: '.mysql_error();};        
        };
    };
    if (count($err)!=0){$step='';};
 }; 

if ($step=="step3"){
    $cfg->mysql_host=$_POST['host_mysql'];
    $cfg->mysql_user=$_POST['login_mysql'];
    $cfg->mysql_pass=$_POST['pass_mysql'];
    $cfg->mysql_base=$_POST['name_mysql'];           
    $org_name=mysql_escape_string($_POST[org_name]);
    $user_email=$_POST['user_email'];           
    $user_login=$_POST['user_login'];           
    $user_pass=$_POST['user_pass'];           
    
    if ($org_name==""){$err[]="Нет имени организации!";};    
    if ($user_email==""){$err[]="Нет E-mail!";};    
    if ($user_login==""){$err[]="Нет логина!";};    
    if ($user_pass==""){$err[]="Нет имени пользователя!";};    
    
    // пробуем соедениться с базой
    if (count($err)==0){
        $cfg->base_id=mysql_connect($cfg->mysql_host,$cfg->mysql_user,$cfg->mysql_pass);
        if (!$cfg->base_id){$err[]='Ошибка установления соединения с БД';};
        if (mysql_select_db($cfg->mysql_base)==false){$err[]="Ошибка: не могу подключить базу $cfg->mysql_base.";};            
        };
    // добавляем данные для инициализации    
    if (count($err)==0){        
        $sli[]="INSERT INTO org (id,name,active) VALUES (1,'$org_name',1)";
        $rd=GetRandomId(60);
        $dt=date( 'Y-m-d H:i:s');
        $sli[]="INSERT INTO users (id,randomid,orgid,login,pass,email,mode,lastdt,active) VALUES
            (1,'$rd',1,'$user_login','$user_pass','$user_email',1,'$dt',1)";
        $sli[]="INSERT INTO config (`id`, `ad`, `domain1`, `domain2`, `ldap`, `usercanregistrate`, `useraddfromad`, `theme`, `sitename`, `emailadmin`, `smtphost`, `smtpauth`, `smtpport`, `smtpusername`, `smtppass`, `emailreplyto`, `sendemail`, `version`) VALUES (NULL, '0', '', '', '', '0', '0', 'bootstrap', 'Учет ТМЦ', '', '', '0', '', '', '', '', '0', '$ver');";
        for ($i=0;$i<count($sli);$i++){
            $sql=$sli[$i];
            //echo "$sql<br>";
            $result = mysql_query($sql,$cfg->base_id);                
            if ($result==''){$err[]='Ошибка выполнения : '.mysql_error();};        
        };
    };
    if (count($err)!=0){
      $err[]='<b>Внимание!</b> были найдены ошибки при работе с БД. Попробуйте изменить данные для соединения.';
      echo '<div class="alert alert-error">';
        for ($i = 0; $i <= count($err); $i++) {echo "$err[$i]<br>";};  
      echo '</div>';
    };    
    if (count($err)!=0){$step='step2';};
};
 
 
 if ($step==""){     
  if (count($err)!=0){
      $err[]='<b>Внимание!</b> были найдены ошибки при работе с БД. Попробуйте изменить данные для соединения.';
      echo '<div class="alert alert-error">';
        for ($i = 0; $i <= count($err); $i++) {echo "$err[$i]<br>";};  
      echo '</div>';
  };
?>
<h1>Установка портала. Шаг 1</h1>    
<form class="well" action="?step=step2" method="post" name="form1" target="_self">
<div class="row-fluid">  
  <div class="span6">  
    <label>Где расположена MySQL</label>
    <input type="text" class="span4" name="host_mysql" placeholder="Обычно localhost" value="<? echo "$cfg->mysql_host";?>">        
    <label>Имя базы данных в MySQL</label>
    <input type="text" class="span4" name="name_mysql" placeholder="Введите имя базы.." value="<? echo "$cfg->mysql_base";?>">
  </div>
    <div class="span6">
        <label>Имя пользователя MySQL</label>
            <input type="text" class="span4" name="login_mysql" placeholder="имя пользователя" value="<? echo "$cfg->mysql_user";?>">  
        <label>Пароль для пользователя MySQL</label>
        <input type="password" class="span4" name="pass_mysql" placeholder="пароль" value="<? echo "$cfg->mysql_pass";?>">
    </div>
</div>  
  <button type="submit" class="btn btn-primary">Начать установку</button>
</form>    
<?
 };
 
if ($step=="step2")
{
    ?>
 <script>
 $(function(){
        var field = new Array("org_name", "user_email", "user_login","user_pass");//поля обязательные
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
            if(error==1) var err_text = "Не все обязательные поля заполнены!";
            $("#messenger").addClass("alert alert-error");
            $("#messenger").html(err_text);
            $("#messenger").fadeIn("slow");
            return false; //если в форме встретились ошибки , не  позволяем отослать данные на сервер.
            }
        })
    });
</script>
<div id="messenger"></div>    
<h1>Установка портала. Шаг 2</h1>    
<form class="well" action="?step=step3" method="post" name="form1" target="_self">
    <label>Введите название организации</label>
    <input type="text" class="span4" name="org_name" placeholder="Например ООО 'Рога и Копыта'" value="ООО 'Рога и Копыта'">            
<div class="row-fluid">  
  <div class="span6">  
    <label>Ваш E-mail</label>
    <input type="text" class="span4" name="user_email" placeholder="Введите e-mail.." value="wp-goblin@mail.ru">
  </div>
    <div class="span6">
        <label>Ваш логин</label>
            <input type="text" class="span4" name="user_login" placeholder="логин пользователя" value="test">  
        <label>Ваш пароль</label>
        <input type="password" class="span4" name="user_pass" placeholder="пароль" value="test">
    </div>
</div>  
      <input type="hidden" name="host_mysql"  value="<? echo "$cfg->mysql_host";?>">        
      <input type="hidden" name="name_mysql"  value="<? echo "$cfg->mysql_base";?>">
      <input type="hidden" name="login_mysql" value="<? echo "$cfg->mysql_user";?>">  
      <input type="hidden" name="pass_mysql"  value="<? echo "$cfg->mysql_pass";?>">
  <button type="submit" class="btn btn-primary">Закончить установку</button>
</form>        
<?
};
if ($step=="step3") {
  echo '<div class="alert alert-success">  ';
  echo "Поздравляю! Портал успешно установлен. Осталось поправить содержимое config.php<br>";  
  echo "P.S. И не забудьте удалить папку <b>install</b><br>";  
  echo '</div>';
};
?>
</body>
</html>