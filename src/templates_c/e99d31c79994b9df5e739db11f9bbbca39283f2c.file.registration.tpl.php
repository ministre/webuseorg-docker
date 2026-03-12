<?php /* Smarty version Smarty-3.1.11, created on 2012-11-30 16:43:26
         compiled from "templates/bootstrap/registration.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141125196950b34fa79ffb54-64465476%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e99d31c79994b9df5e739db11f9bbbca39283f2c' => 
    array (
      0 => 'templates/bootstrap/registration.tpl',
      1 => 1354279402,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141125196950b34fa79ffb54-64465476',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b34fa7aad739_61494775',
  'variables' => 
  array (
    'ArrayOrg' => 0,
    'reg_orgid' => 0,
    'reg_login' => 0,
    'reg_pass' => 0,
    'reg_email' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b34fa7aad739_61494775')) {function content_50b34fa7aad739_61494775($_smarty_tpl) {?><div class="hero-unit">
    <div class="row-fluid">
      <div class="span12">
          <span class="label label-info">Регистрация нового пользователя</span>
          <form class="well" action="?login_step=reg" method="post" name="form1" target="_self">
             <label>Организация:</label>
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
            <div class="row-fluid">
                <div class="span4">
                        <label>Логин:</label>
                        <input name="reg_login" type="text" id="reg_login" value="<?php echo $_smarty_tpl->tpl_vars['reg_login']->value;?>
">
                </div>
                <div class="span4">
                    <label>Пароль:</label>
                    <input name="reg_pass" type="password" id="reg_pass" value="<?php echo $_smarty_tpl->tpl_vars['reg_pass']->value;?>
">
                </div>
                <div class="span4">
                    <label>E-mail:</label>
                    <input name="reg_email" type="text" id="reg_email" value="<?php echo $_smarty_tpl->tpl_vars['reg_email']->value;?>
">
                </div>
            </div>          
            <div align=center><input type="submit"  name="Submit" value="Зарегистироваться"></div>                
          </form>
      </div>        
    </div>    
</div>
</div><?php }} ?>