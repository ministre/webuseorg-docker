<?php /* Smarty version Smarty-3.1.11, created on 2012-11-27 12:18:49
         compiled from "templates/standart/login_block.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130397880550593d9bb19175-19508666%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b4431b5e96fc5c98376fbd7dd9c95502a6a01813' => 
    array (
      0 => 'templates/standart/login_block.tpl',
      1 => 1354004327,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130397880550593d9bb19175-19508666',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50593d9bb1b463_12266341',
  'variables' => 
  array (
    'user_randomid' => 0,
    'enter_user_login' => 0,
    'enter_user_pass' => 0,
    'usercanregistrate' => 0,
    'cfg_ad' => 0,
    'cfg_domain1' => 0,
    'cfg_domain2' => 0,
    'user_login' => 0,
    'menu_user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50593d9bb1b463_12266341')) {function content_50593d9bb1b463_12266341($_smarty_tpl) {?><div class="box-heading">Пользователь</div>
<div class="box-content">
<?php if ($_smarty_tpl->tpl_vars['user_randomid']->value==''){?>
	<form action="?login_step=enter" method="post" name="form1" target="_self">
	  Логин :<input name="enter_user_login" type="text" id="enter_user_login" value="<?php echo $_smarty_tpl->tpl_vars['enter_user_login']->value;?>
"></br>
	  Пароль :<input name="enter_user_pass" type="password" id="enter_user_pass" value="<?php echo $_smarty_tpl->tpl_vars['enter_user_pass']->value;?>
"><br>
          <input type="submit"  name="Submit" value="Войти &gt;&gt;">
	</form>
	</br>
      <?php if ($_smarty_tpl->tpl_vars['usercanregistrate']->value==1){?>
	<div align=right><a href=?content_page=registration>Регистрация</a></div>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['cfg_ad']->value==1){?>
      <div align=right>вход через <?php echo $_smarty_tpl->tpl_vars['cfg_domain1']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['cfg_domain2']->value;?>
</div>
      <?php }?>
<?php }else{ ?>
 <div>Доброе пожаловать!</div>
 <div><?php echo $_smarty_tpl->tpl_vars['user_login']->value;?>
</div>
 <ul>
                    <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['menu_user']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
                       <?php echo $_smarty_tpl->getSubTemplate ("modules/menu/user/".((string)$_smarty_tpl->tpl_vars['menu_user']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]), $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

                    <?php endfor; endif; ?>                    
 </ul>
<?php }?>
</div>
<?php }} ?>