<?php /* Smarty version Smarty-3.1.11, created on 2013-03-19 13:06:21
         compiled from "modules/menu/admin/main" */ ?>
<?php /*%%SmartyHeaderCode:126785525150b326354da005-81680895%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e85fa40db21c2ec8f80a061b81380f2030bd4410' => 
    array (
      0 => 'modules/menu/admin/main',
      1 => 1363683576,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '126785525150b326354da005-81680895',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b326354dd795_86536243',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b326354dd795_86536243')) {function content_50b326354dd795_86536243($_smarty_tpl) {?>	<li><a href=?content_page=config>Настройки</a></li>
	<li><a href=?content_page=delete>Удаление обьектов</a></li>
	<li><a href=?content_page=export>Выгрузка XML</a></li>	
        <li><a href=?content_page=import_knt>Загрузка контрагентов из XML</a></li>	
        <li><a href=?content_page=import_empl>Загрузка учеток из XML</a></li>	
        <li><br></li>
        <li><a href=?content_page=ping>Проверка доступности</a></li>	<?php }} ?>