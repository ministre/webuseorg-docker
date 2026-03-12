<?php /* Smarty version Smarty-3.1.11, created on 2012-09-26 12:18:27
         compiled from "templates/standart/registration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:15937244295061aae17d7d36-46981929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4233a42f55f1bb034f20519a973f9dbd495cb08a' => 
    array (
      0 => 'templates/standart/registration.tpl',
      1 => 1348647504,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '15937244295061aae17d7d36-46981929',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5061aae17d8c73_03632751',
  'variables' => 
  array (
    'reg_email' => 0,
    'reg_login' => 0,
    'reg_pass' => 0,
    'ArrayOrg' => 0,
    'reg_orgid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5061aae17d8c73_03632751')) {function content_5061aae17d8c73_03632751($_smarty_tpl) {?><div class="box">
	<div class="box-heading">Регистрация нового пользователя</div>
	<div class="box-content">
<form action="?login_step=reg" method="post" name="form1" target="_self">
<table width=100% border="0" cellpadding="2" cellspacing="2">
<tbody>
<tr>
  <td>E-mail:</td>
  <td><input name="reg_email" type="text" id="reg_email" value="<?php echo $_smarty_tpl->tpl_vars['reg_email']->value;?>
"></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td>Логин:</td>
  <td><input name="reg_login" type="text" id="reg_login" value="<?php echo $_smarty_tpl->tpl_vars['reg_login']->value;?>
"></td>
  <td>Пароль:</td>
  <td><input name="reg_pass" type="password" id="reg_pass" value="<?php echo $_smarty_tpl->tpl_vars['reg_pass']->value;?>
"></td>
</tr>
<tr>
<td>Организация:</td>
<td>
<select name=reg_orgid>
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
  </td>
  <td></td>
  <td></td>

</tr>
</tbody>
</table>
      <div align=center><input type="submit"  name="Submit" value="Зарегистироваться"></div>
</form>                        
	</div>
</div><?php }} ?>