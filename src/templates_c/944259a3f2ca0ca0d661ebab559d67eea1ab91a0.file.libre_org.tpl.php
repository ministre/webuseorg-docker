<?php /* Smarty version Smarty-3.1.11, created on 2012-10-21 08:18:21
         compiled from "templates/standart/libre_org.tpl" */ ?>
<?php /*%%SmartyHeaderCode:54436443750643440908f54-23219451%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '944259a3f2ca0ca0d661ebab559d67eea1ab91a0' => 
    array (
      0 => 'templates/standart/libre_org.tpl',
      1 => 1350792251,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '54436443750643440908f54-23219451',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50643440909da6_42821300',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50643440909da6_42821300')) {function content_50643440909da6_42821300($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="box">
<div class="box-heading">Справочник организаций</div>
<div class="box-content">
<table id="list2"></table>
<div id="pager2"></div>
<script type="text/javascript" src="controller/client/js/libre_org.js"></script>
</div>
</div>
<?php }?><?php }} ?>