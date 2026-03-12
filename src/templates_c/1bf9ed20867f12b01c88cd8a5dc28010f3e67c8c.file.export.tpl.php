<?php /* Smarty version Smarty-3.1.11, created on 2012-12-14 12:24:35
         compiled from "templates/bootstrap/export.tpl" */ ?>
<?php /*%%SmartyHeaderCode:190386620950b337e9e2f2a0-56516829%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1bf9ed20867f12b01c88cd8a5dc28010f3e67c8c' => 
    array (
      0 => 'templates/bootstrap/export.tpl',
      1 => 1354196297,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '190386620950b337e9e2f2a0-56516829',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b337ea07cd66_85561147',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b337ea07cd66_85561147')) {function content_50b337ea07cd66_85561147($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="hero-unit">
<div id="infoblock"></div>
<button name=bexp id=bexp>Создать файл</button>
<script type="text/javascript" src="controller/client/js/export_xml.js"></script>
</div>
<?php }else{ ?>
<div class="alert alert-error">Не достаточно прав!</div>
<?php }?><?php }} ?>