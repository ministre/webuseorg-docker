<?
include("inc/class/config.php");		// загружаем классы настроек
include("inc/class/org.php");		// загружаем классы организаций
include("inc/class/users.php");		// загружаем классы пользователей

$cfg=new Tconfig;
include("config.php");				// загружаем основные настройки, которых нет в БД
include("inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
$cfg->GetFromBaseNoSmarty();				// получаем настройки из базы

$yet=0;

if ($cfg->version=="1.00")
{
  $yet++;
  $sql="ALTER TABLE  `config` CHANGE  `smtpusername`  `smtpusername` VARCHAR( 40 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (1): ' . mysql_error());}          
  $sql="ALTER TABLE  `config` CHANGE  `emailreplyto`  `emailreplyto` VARCHAR( 40 ) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (2): ' . mysql_error());}          
  $sql="UPDATE config SET version='1.01'";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (3): ' . mysql_error());}            
 };
if ($cfg->version=="1.01")
{
  $yet++;
  $sql="ALTER TABLE  `equipment` ADD  `repair` BOOLEAN NOT NULL AFTER  `photo`";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (4): ' . mysql_error());}          

  $sql="CREATE TABLE  `repair` (
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
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (4): ' . mysql_error());}           
  
  $sql="UPDATE config SET version='1.02'";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (5): ' . mysql_error());}            
 
};

if ($cfg->version=="1.02")
{
  $yet++;
  $sql="ALTER TABLE  `equipment` ADD  `ip` VARCHAR( 100 ) NOT NULL";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (6): ' . mysql_error());}          
   
  $sql="UPDATE config SET version='1.03'";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (7): ' . mysql_error());}            
 
};

if ($cfg->version=="1.03")
{
  $yet++;
  $sql="ALTER TABLE  `org` ADD  `picmap` VARCHAR( 255 ) NOT NULL AFTER  `name`";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (8): ' . mysql_error());}           
  
  $yet++;
  $sql="ALTER TABLE  `equipment` ADD  `mapx` VARCHAR( 8 ) NOT NULL ,ADD  `mapy` VARCHAR( 8 ) NOT NULL ,ADD  `mapmoved` INT( 2 ) NOT NULL  ";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (9): ' . mysql_error());}    
  
  $yet++;
  $sql="ALTER TABLE  `equipment` ADD  `mapyet` TINYINT NOT NULL DEFAULT  '0'  ";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (10): ' . mysql_error());}    
   
  $sql="UPDATE config SET version='1.04'";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (11): ' . mysql_error());}            
 
};

if ($cfg->version=="1.04")
{
  $yet++;
  $sql="ALTER TABLE  `knt` ADD  `fullname` VARCHAR( 200 ) NOT NULL AFTER  `active` ,
    ADD  `ERPCode` INT NOT NULL AFTER  `fullname` ,
    ADD  `INN` VARCHAR(20) COLLATE utf8_unicode_ci NOT NULL AFTER  `ERPCode` ,
    ADD  `KPP` VARCHAR(20) COLLATE utf8_unicode_ci NOT NULL AFTER  `INN` ,
    ADD  `bayer` INT NOT NULL AFTER  `KPP` ,
    ADD  `supplier` INT NOT NULL AFTER  `bayer` ,
    ADD  `dog` INT NOT NULL AFTER  `supplier`";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (12): ' . mysql_error());}           

  
  $yet++;
  $sql="CREATE TABLE  contract (
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
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (13): ' . mysql_error());}           
  
  
    $yet++;
    $sql="CREATE TABLE  `files_contract` (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `idcontract` INT NOT NULL ,
    userfreandlyfilename VARCHAR( 255 ) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
    `filename` VARCHAR( 200 ) NOT NULL
    ) ENGINE = MYISAM ;   ";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (14): ' . mysql_error());}           

 $yet++;
    $sql="CREATE TABLE  users_profile (
    `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
    `usersid` INT NOT NULL ,
    `fio` VARCHAR( 100 ) NOT NULL ,
    `faza` VARCHAR( 255 ) NOT NULL ,
    `code` VARCHAR( 20 ) NOT NULL ,
    `enddate` DATE NOT NULL ,
    `post` VARCHAR( 200 ) NOT NULL
    ) ENGINE = MYISAM ;   ";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (15): ' . mysql_error());}   
  
  
  $yet++;
    $sql=" CREATE TABLE  exp_log (
`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
`guid` VARCHAR( 200 ) NOT NULL ,
`TimeVal` DATETIME NOT NULL ,
`event` INT NOT NULL ,
`hozorgan` INT NOT NULL ,
`mode` INT NOT NULL
) ENGINE = MYISAM ;";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (16): ' . mysql_error());}   

  $yet++;
  $sql="ALTER TABLE  exp_log ADD UNIQUE (guid);";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (17): ' . mysql_error());}   
  
  
  $yet++;
  $sql="ALTER TABLE  `users_profile` ADD  `res1` VARCHAR( 100 ) NOT NULL AFTER  `post` ,
    ADD  `res2` INT( 100 ) NOT NULL AFTER  `res1` ,
    ADD  `res3` INT( 100 ) NOT NULL AFTER  `res2`";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (18): ' . mysql_error());}   

  $yet++;
  $sql="ALTER TABLE  `users_profile` ADD  `res4` DATETIME NOT NULL AFTER  `res3`";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (19): ' . mysql_error());}   
    
  $sql="UPDATE config SET version='1.05'";
  $result = mysql_query($sql,$cfg->base_id);                
  if ($result==''){die('Ошибка (оюновление до 1.05): ' . mysql_error());}            

};


echo "$yet обновлений успешно установлено...<br>";
echo "Для перехода на портал нажмите <a href=index.php>сюда</a>";
?>