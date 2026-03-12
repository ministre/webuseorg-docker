<?php /* Smarty version Smarty-3.1.11, created on 2012-10-23 08:38:43
         compiled from "templates/standart/libre_group.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14956638250853f8ccc8704-53583694%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9af565f01ef5402bb98d9f0e41f309b484737d0c' => 
    array (
      0 => 'templates/standart/libre_group.tpl',
      1 => 1350967044,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14956638250853f8ccc8704-53583694',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50853f8cd373f0_13904658',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50853f8cd373f0_13904658')) {function content_50853f8cd373f0_13904658($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="box">
<div class="box-heading">Группы номенклатуры</div>
<div class="box-content">
<table id="list2"></table>
<div id="pager2"></div>

<table id="list10_d"></table>
<div id="pager10_d"></div>

<script type="text/javascript" src="controller/client/js/libre_group.js"></script>
</div>
</div>
<?php }?><?php }} ?>