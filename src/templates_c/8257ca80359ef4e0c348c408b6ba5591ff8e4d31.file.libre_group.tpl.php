<?php /* Smarty version Smarty-3.1.11, created on 2012-12-10 05:29:35
         compiled from "templates/bootstrap/libre_group.tpl" */ ?>
<?php /*%%SmartyHeaderCode:153311376350b333bb6775c6-26589429%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8257ca80359ef4e0c348c408b6ba5591ff8e4d31' => 
    array (
      0 => 'templates/bootstrap/libre_group.tpl',
      1 => 1354459276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '153311376350b333bb6775c6-26589429',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b333bb6e7566_00976915',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b333bb6e7566_00976915')) {function content_50b333bb6e7566_00976915($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="hero-unit">
<table id="list2"></table>
<div id="pager2"></div>
<table id="list10_d"></table>
<div id="pager10_d"></div>
<script type="text/javascript" src="controller/client/js/libre_group.js"></script>
</div>
<?php }else{ ?>
<div class="alert alert-error">Не достаточно прав!</div>
<?php }?>}<?php }} ?>