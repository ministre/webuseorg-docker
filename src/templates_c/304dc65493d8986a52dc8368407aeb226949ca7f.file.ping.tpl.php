<?php /* Smarty version Smarty-3.1.11, created on 2013-01-10 17:05:33
         compiled from "templates/bootstrap/ping.tpl" */ ?>
<?php /*%%SmartyHeaderCode:207060272950eeb2c3cef143-75897086%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '304dc65493d8986a52dc8368407aeb226949ca7f' => 
    array (
      0 => 'templates/bootstrap/ping.tpl',
      1 => 1357822892,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '207060272950eeb2c3cef143-75897086',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50eeb2c3df0e31_57042082',
  'variables' => 
  array (
    'user_mode' => 0,
    'ArrayOrg' => 0,
    'reg_orgid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50eeb2c3df0e31_57042082')) {function content_50eeb2c3df0e31_57042082($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="hero-unit">
Организация:
<select name="sel_orgid" id="sel_orgid">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['ArrayOrg']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
	<option value=<?php echo $_smarty_tpl->tpl_vars['ArrayOrg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["id"];?>
<?php if ($_smarty_tpl->tpl_vars['reg_orgid']->value==$_smarty_tpl->tpl_vars['ArrayOrg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["id"]){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ArrayOrg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["name"];?>
</option>
<?php endfor; endif; ?>            
</select>    
<input id="test_ping" class="btn btn-primary" name="test_ping" value="Проверить">
<div class="row-fluid">
  <div class="span12" id="ping_add">
  </div> 
</div>
</div>
<script type="text/javascript" src="controller/client/js/ping.js"></script>
<?php }else{ ?>
<div class="alert alert-error">Не достаточно прав!</div>
<?php }?><?php }} ?>