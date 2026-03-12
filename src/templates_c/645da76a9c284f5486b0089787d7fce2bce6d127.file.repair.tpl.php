<?php /* Smarty version Smarty-3.1.11, created on 2013-01-11 11:52:22
         compiled from "templates/bootstrap/repair.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154981737750c5a6c3168846-93345578%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '645da76a9c284f5486b0089787d7fce2bce6d127' => 
    array (
      0 => 'templates/bootstrap/repair.tpl',
      1 => 1357890727,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154981737750c5a6c3168846-93345578',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50c5a6c316a0c4_94733013',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50c5a6c316a0c4_94733013')) {function content_50c5a6c316a0c4_94733013($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="hero-unit">
<table id="list_rep"></table>
<div id="pager_rep"></div>
<script type="text/javascript" src="controller/client/js/repair.js"></script>
</div>
<?php }else{ ?>
<div class="alert alert-error">Не достаточно прав!</div>
<?php }?><?php }} ?>