<?php /* Smarty version Smarty-3.1.11, created on 2012-11-12 17:15:00
         compiled from "templates/standart/delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:78095502150a0f584dd7ce9-71758505%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1562d39a7ef11306aa995343a13edad4a1ebe0c' => 
    array (
      0 => 'templates/standart/delete.tpl',
      1 => 1352726031,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '78095502150a0f584dd7ce9-71758505',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50a0f584e35f78_31553462',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a0f584e35f78_31553462')) {function content_50a0f584e35f78_31553462($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="box">
<div class="box-heading">Удаление обьектов</div>
<div class="box-content">
<div id="infoblock"></div>
<button name=bdel id=bdel>Начать удаление</button>
<script type="text/javascript" src="controller/client/js/delete.js"></script>
</div>
</div>
<?php }?><?php }} ?>