<?php /* Smarty version Smarty-3.1.11, created on 2012-10-21 08:09:48
         compiled from "templates/standart/libre_knt.tpl" */ ?>
<?php /*%%SmartyHeaderCode:163402267550837451f3e325-56438270%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5cdf0b5da093d5f173babbe8286918dd3bc3fff0' => 
    array (
      0 => 'templates/standart/libre_knt.tpl',
      1 => 1350792535,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163402267550837451f3e325-56438270',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50837452058058_76510158',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50837452058058_76510158')) {function content_50837452058058_76510158($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="box">
<div class="box-heading">Справочник контрагентов</div>
<div class="box-content">
<table id="list2"></table>
<div id="pager2"></div>
<script type="text/javascript" src="controller/client/js/libre_knt.js"></script>
</div>
</div>
<?php }?><?php }} ?>