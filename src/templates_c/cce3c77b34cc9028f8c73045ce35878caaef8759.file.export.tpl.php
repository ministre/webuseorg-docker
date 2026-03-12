<?php /* Smarty version Smarty-3.1.11, created on 2012-11-21 10:28:19
         compiled from "templates/standart/export.tpl" */ ?>
<?php /*%%SmartyHeaderCode:45679597750ac7408174586-58259408%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cce3c77b34cc9028f8c73045ce35878caaef8759' => 
    array (
      0 => 'templates/standart/export.tpl',
      1 => 1353479245,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '45679597750ac7408174586-58259408',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50ac74081dcb34_62401711',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50ac74081dcb34_62401711')) {function content_50ac74081dcb34_62401711($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="box">
<div class="box-heading">Экспорт списка оргтехники</div>
<div class="box-content">
<div id="infoblock"></div>
<button name=bexp id=bexp>Создать файл</button>
<script type="text/javascript" src="controller/client/js/export_xml.js"></script>
</div>
</div>
<?php }?><?php }} ?>