<?php /* Smarty version Smarty-3.1.11, created on 2013-03-19 15:09:01
         compiled from "templates/bootstrap/useradmin.tpl" */ ?>
<?php /*%%SmartyHeaderCode:6344033450b3330f5d6e20-18247418%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '76dcf6c15533abef9b09c8b6f0a0bd05de658335' => 
    array (
      0 => 'templates/bootstrap/useradmin.tpl',
      1 => 1363691045,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6344033450b3330f5d6e20-18247418',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b3330f6394e0_54042365',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b3330f6394e0_54042365')) {function content_50b3330f6394e0_54042365($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="hero-unit">
    <table id="list2"></table>
    <div id="pager2"></div>    
    <div id="add_edit"></div>
    <script type="text/javascript" src="controller/client/js/libre_users.js"></script>
</div>
<?php }else{ ?>
<div class="alert alert-error">Не достаточно прав!</div>
<?php }?><?php }} ?>