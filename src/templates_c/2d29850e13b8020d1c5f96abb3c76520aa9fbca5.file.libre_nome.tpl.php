<?php /* Smarty version Smarty-3.1.11, created on 2012-12-10 05:29:42
         compiled from "templates/bootstrap/libre_nome.tpl" */ ?>
<?php /*%%SmartyHeaderCode:192045299050b33430f34088-52549073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d29850e13b8020d1c5f96abb3c76520aa9fbca5' => 
    array (
      0 => 'templates/bootstrap/libre_nome.tpl',
      1 => 1354459276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '192045299050b33430f34088-52549073',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b334310651a3_59887116',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b334310651a3_59887116')) {function content_50b334310651a3_59887116($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="hero-unit">
<table id="list2"></table>
<div id="pager2"></div>
<div id="add_edit"></div>
<script type="text/javascript" src="controller/client/js/libre_nome.js"></script>
</div>
<?php }else{ ?>
<div class="alert alert-error">Не достаточно прав!</div>
<?php }?><?php }} ?>