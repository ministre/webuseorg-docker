<?php /* Smarty version Smarty-3.1.11, created on 2013-03-19 09:12:07
         compiled from "templates/bootstrap/contract_control.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17185562615147ef5b81fd60-76606360%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '77fdf1a1423ea5e4dfb5785c8c89e708d6178c63' => 
    array (
      0 => 'templates/bootstrap/contract_control.tpl',
      1 => 1363669773,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17185562615147ef5b81fd60-76606360',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5147ef5b882e90_48552666',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5147ef5b882e90_48552666')) {function content_5147ef5b882e90_48552666($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value!=''){?>
<div class="hero-unit">
    <div class="row-fluid">
        <div class="span12">   
          <table id="list2"></table>
          <div id="pager2"></div>            
          <div id=info_contract>
          </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="controller/client/js/contract_control.js"></script>    
<?php }else{ ?>
<div class="alert alert-error">Не достаточно прав!</div>
<?php }?><?php }} ?>