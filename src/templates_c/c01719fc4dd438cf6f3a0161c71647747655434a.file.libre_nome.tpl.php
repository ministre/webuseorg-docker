<?php /* Smarty version Smarty-3.1.11, created on 2012-10-23 12:40:58
         compiled from "templates/standart/libre_nome.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1262747181508655d7a0d5b1-13547863%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c01719fc4dd438cf6f3a0161c71647747655434a' => 
    array (
      0 => 'templates/standart/libre_nome.tpl',
      1 => 1350981427,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1262747181508655d7a0d5b1-13547863',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_508655d7a7c673_41374272',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_508655d7a7c673_41374272')) {function content_508655d7a7c673_41374272($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="box">
<div class="box-heading">Справочник номенклатуры</div>
<div class="box-content">
<table id="list2"></table>
<div id="pager2"></div>
<input type="BUTTON" id="adduser" value="Добавить" />
<input type="BUTTON" id="edituser" value="Редактировать" />
<div id="add_edit"></div>
<script type="text/javascript" src="controller/client/js/libre_nome.js"></script>
</div>
</div>
<?php }?><?php }} ?>