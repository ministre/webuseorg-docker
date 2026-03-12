<?php /* Smarty version Smarty-3.1.11, created on 2013-03-20 08:15:00
         compiled from "modules/menu/user/main" */ ?>
<?php /*%%SmartyHeaderCode:82805434950b32299267b97-07469499%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '752569b02139852bebbcf76b93594337d4188e79' => 
    array (
      0 => 'modules/menu/user/main',
      1 => 1363752897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '82805434950b32299267b97-07469499',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b3229926af18_09123138',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b3229926af18_09123138')) {function content_50b3229926af18_09123138($_smarty_tpl) {?>  <li><a href=?index.php>Главная</a></li>  
  <li><a href=?content_page=eq_list>Профиль</a></li>
  <li><a href=?content_page=user_list>Сводка по пользователям</a></li>
  <li><a href=?content_page=contract_control>Контроль договоров</a></li>
  <li><a href=?content_page=maps>Планы помещений</a></li>
  <li><a href=?content_page=tasks>Задачи</a></li>  
  <li><a href=?content_page=reports>Отчеты</a></li><?php }} ?>