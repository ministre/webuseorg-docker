<?php /* Smarty version Smarty-3.1.11, created on 2012-12-10 05:29:28
         compiled from "templates/bootstrap/libre_vendor.tpl" */ ?>
<?php /*%%SmartyHeaderCode:73575599250b33373147b30-88879853%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '40c49f4541820f6c6c2686e2c6eb619e6e2baae9' => 
    array (
      0 => 'templates/bootstrap/libre_vendor.tpl',
      1 => 1354459276,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '73575599250b33373147b30-88879853',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b333731b8834_28728508',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b333731b8834_28728508')) {function content_50b333731b8834_28728508($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="hero-unit">    
<table id="list2"></table>
<div id="pager2"></div>
<script type="text/javascript" src="controller/client/js/libre_vendor.js"></script>
</div>
<?php }else{ ?>
<div class="alert alert-error">Не достаточно прав!</div>
<?php }?><?php }} ?>