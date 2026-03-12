<?php
require_once('smarty/Smarty.class.php');
$smarty = new Smarty();

include("inc/class/config.php");		// загружаем классы настроек
include("inc/class/org.php");		// загружаем классы организаций
include("inc/class/users.php");		// загружаем классы пользователей
include("inc/class/knt.php");		// загружаем классы пользователей

include("inc/class/class.phpmailer.php");		//
//include("inc/class/calss.pop3.php");		//
//include("inc/class/calss.smtp.php");		// 

$cfg=new Tconfig;
include("config.php");				// загружаем основные настройки, которых нет в БД
include("inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
$cfg->GetFromBase();				// получаем настройки из базы

$smarty->template_dir = 'templates/'.$cfg->theme."/";
$smarty->compile_dir = 'templates_c/';
$smarty->config_dir = 'configs/';
$smarty->cache_dir = 'cache/';

include("functions.php");			// загружаем функции
include("inc/login.php");			// проверяем вход пользователя

include("modules/config.php");			// модуль настроек

// узнаем какую страницу грузить (используется в index.tpl)
if ($content_page==""){
if (isset($_GET["content_page"])) {
 	$content_page=$_GET["content_page"].".tpl";
	include("modules/".$_GET["content_page"].".php");			// загружаем постобработчик
 	$smarty->assign("content_page", $_GET["content_page"].".tpl");
       } else {
	      	$content_page="home.tpl";
	        include("modules/home.php");			// загружаем постобработчик		
	      	$smarty->assign("content_page", "home.tpl");
              };
};
$smarty->assign("err", $err);  			// список ошибок
include("inc/tasks.php");			// проверяем задачи
// показываем 
$smarty->display("index.tpl");

?>