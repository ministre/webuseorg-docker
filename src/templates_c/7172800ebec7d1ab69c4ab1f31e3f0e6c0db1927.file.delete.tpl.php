<?php /* Smarty version Smarty-3.1.11, created on 2012-12-05 16:02:35
         compiled from "templates/bootstrap/delete.tpl" */ ?>
<?php /*%%SmartyHeaderCode:116076306550b33736b93278-89085673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7172800ebec7d1ab69c4ab1f31e3f0e6c0db1927' => 
    array (
      0 => 'templates/bootstrap/delete.tpl',
      1 => 1354196297,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116076306550b33736b93278-89085673',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b33736c061a6_29988261',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b33736c061a6_29988261')) {function content_50b33736c061a6_29988261($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="hero-unit">
<div id="infoblock"></div>
<button name=bdel id=bdel>Начать удаление</button>
<script type="text/javascript" src="controller/client/js/delete.js"></script>
</div>
<?php }else{ ?>
<div class="alert alert-error">Не достаточно прав!</div>
<?php }?><?php }} ?>