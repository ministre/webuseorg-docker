<?php /* Smarty version Smarty-3.1.11, created on 2012-11-27 12:20:30
         compiled from "templates/standart/useradmin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1235304366506300d977f4c3-61726216%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c3d08480bdc10e38027ae509773d11aaa1fe3e8' => 
    array (
      0 => 'templates/standart/useradmin.tpl',
      1 => 1353921293,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1235304366506300d977f4c3-61726216',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_506300d9780389_50713844',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_506300d9780389_50713844')) {function content_506300d9780389_50713844($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="hero-unit">
<table id="list2"></table>
<div id="pager2"></div>
<input type="BUTTON" id="adduser" value="Добавить" />
<input type="BUTTON" id="edituser" value="Редактировать" />
<div id="add_edit"></div>
<script type="text/javascript" src="controller/client/js/libre_users.js"></script>
</div>
<?php }?><?php }} ?>