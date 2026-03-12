<?php /* Smarty version Smarty-3.1.11, created on 2012-11-30 09:47:08
         compiled from "templates/bootstrap/tasks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:212241735250b32cf4e4cd77-61127076%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ca51ffeadab2bc894089e3046060a963e5cb4fce' => 
    array (
      0 => 'templates/bootstrap/tasks.tpl',
      1 => 1354196297,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '212241735250b32cf4e4cd77-61127076',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b32cf4eb5b18_21237587',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b32cf4eb5b18_21237587')) {function content_50b32cf4eb5b18_21237587($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value!=''){?>
<div class="hero-unit">
<table id="list2"></table>
<div id="pager2"></div>
<input type="BUTTON" id="addtask" value="Добавить" />
<input type="BUTTON" id="edittask" value="Редактировать" />
<div id="add_edit"></div>
<script type="text/javascript" src="controller/client/js/libre_tasks.js"></script>
</div>
<?php }else{ ?>
<div class="alert alert-error">Не достаточно прав!</div>
<?php }?><?php }} ?>