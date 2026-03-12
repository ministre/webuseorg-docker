<?php /* Smarty version Smarty-3.1.11, created on 2012-11-26 10:52:12
         compiled from "templates/standart/config.tpl" */ ?>
<?php /*%%SmartyHeaderCode:287392125062f34778eac1-48302733%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52da590ab12b70d8fbb360933872aea65f526c45' => 
    array (
      0 => 'templates/standart/config.tpl',
      1 => 1353912728,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '287392125062f34778eac1-48302733',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5062f3478553d4_06180535',
  'variables' => 
  array (
    'user_mode' => 0,
    'sitename' => 0,
    'usercanregistrate' => 0,
    'cfg_ad' => 0,
    'cfg_ldap' => 0,
    'cfg_domain1' => 0,
    'cfg_domain2' => 0,
    'cfg_theme' => 0,
    'themes_arr' => 0,
    'emailadmin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5062f3478553d4_06180535')) {function content_5062f3478553d4_06180535($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="box">
	<div class="box-heading">Основные настройки</div>
	<div class="box-content">
<form action="?content_page=config&config=save" method="post" name="form1" target="_self">
Название портала:<br>
<input name="form_sitename" type="text" id="form_sitename" value="<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
" size=80><br>
<input type="checkbox" name="form_usercanregistrate" value="1" <?php if ($_smarty_tpl->tpl_vars['usercanregistrate']->value==1){?>checked="checked"<?php }?>>Пользователь может сам регистрироваться<br>
<input type="checkbox" name="form_cfg_ad" value="1" <?php if ($_smarty_tpl->tpl_vars['cfg_ad']->value==1){?>checked="checked"<?php }?>>Аутенфикация через AD<br>

<table width=100% border="0" cellpadding="2" cellspacing="2">
<tbody>
<tr>
  <td>Сервер LDAP:</td>
  <td><input name="form_cfg_ldap" type="text" id="form_cfg_ldap" value="<?php echo $_smarty_tpl->tpl_vars['cfg_ldap']->value;?>
"></td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td>Домен 1:</td>
  <td><input name="form_cfg_domain1" type="text" id="form_cfg_domain1" value="<?php echo $_smarty_tpl->tpl_vars['cfg_domain1']->value;?>
"></td>
  <td>Домен 2:</td>
  <td><input name="form_cfg_domain2" type="text" id="form_cfg_domain2" value="<?php echo $_smarty_tpl->tpl_vars['cfg_domain2']->value;?>
"></td>
</tr>
<tr>
  <td>Тема:</td>
  <td><input name="form_cfg_theme" type="text" id="form_cfg_theme" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['cfg_theme']->value;?>
">
  <br>
<select name="form_cfg_theme_sl" id="form_cfg_theme_sl">
<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['themes_arr']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	<option value=1><?php echo $_smarty_tpl->tpl_vars['themes_arr']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']];?>
</option>
<?php endfor; endif; ?>            
</select>    
  </td>
  <td></td>
  <td></td>
</tr>
<tr>
  <td>От кого почта:</td>
  <td><input name="form_emailadmin" type="text" id="form_emailadmin" value="<?php echo $_smarty_tpl->tpl_vars['emailadmin']->value;?>
" size=20></td>
  <td></td>
  <td></td>
</tr>

</tbody>
</table>
      <div align=center><input type="submit"  name="Submit" value="Сохранить изменения"></div>
</form>                        
	</div>
</div>
<script type="text/javascript" src="controller/client/js/config.js"></script>
<?php }else{ ?>
<div class="box">
	<div class="box-heading">Основные настройки</div>
	<div class="box-content">Не достаточно прав!</div>
</div>
<?php }?><?php }} ?>