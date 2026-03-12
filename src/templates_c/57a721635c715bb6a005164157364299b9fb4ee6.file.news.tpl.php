<?php /* Smarty version Smarty-3.1.11, created on 2012-12-10 05:11:00
         compiled from "templates/bootstrap/news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:113221362450b490c477f832-18493242%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '57a721635c715bb6a005164157364299b9fb4ee6' => 
    array (
      0 => 'templates/bootstrap/news.tpl',
      1 => 1354459276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '113221362450b490c477f832-18493242',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b490c47e02c4_30229337',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b490c47e02c4_30229337')) {function content_50b490c47e02c4_30229337($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="hero-unit">
<table id="list2"></table>
<div id="pager2"></div>
<div id="pg_add_edit" name="pg_add_edit"></div>
<script type="text/javascript" src="controller/client/js/news.js"></script>
</div>
<?php }else{ ?>
<div class="alert alert-error">Не достаточно прав!</div>
<?php }?><?php }} ?>