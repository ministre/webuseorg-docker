<?php /* Smarty version Smarty-3.1.11, created on 2012-11-27 15:50:01
         compiled from "templates/standart/news.tpl" */ ?>
<?php /*%%SmartyHeaderCode:85921013450b4a8449ca031-26453229%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1a65084dcc5f2b8726970e1acbd3f24432c76db2' => 
    array (
      0 => 'templates/standart/news.tpl',
      1 => 1354016997,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '85921013450b4a8449ca031-26453229',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b4a844a356b5_16653498',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b4a844a356b5_16653498')) {function content_50b4a844a356b5_16653498($_smarty_tpl) {?><div class="box">
	<div class="box-heading">Новости</div>
	<div class="box-content">
<?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<table id="list2"></table>
<div id="pager2"></div>
<div id="pg_add_edit" name="pg_add_edit"></div>
<script type="text/javascript" src="controller/client/js/news.js"></script>
<?php }?>
</div>
</div>        <?php }} ?>