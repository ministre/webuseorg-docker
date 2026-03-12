<?php /* Smarty version Smarty-3.1.11, created on 2013-01-11 12:30:40
         compiled from "templates/bootstrap/config.tpl" */ ?>
<?php /*%%SmartyHeaderCode:59863888450b3354cc30d11-84569462%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42b9b424dfddaac2afb20774bd1ee19940c9b5dd' => 
    array (
      0 => 'templates/bootstrap/config.tpl',
      1 => 1357893034,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '59863888450b3354cc30d11-84569462',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b3354cd109a1_18631697',
  'variables' => 
  array (
    'user_mode' => 0,
    'version' => 0,
    'sitename' => 0,
    'usercanregistrate' => 0,
    'cfg_ad' => 0,
    'cfg_ldap' => 0,
    'cfg_domain1' => 0,
    'cfg_domain2' => 0,
    'cfg_theme' => 0,
    'themes_arr' => 0,
    'sendemail' => 0,
    'smtphost' => 0,
    'emailadmin' => 0,
    'emailreplyto' => 0,
    'smtpauth' => 0,
    'smtpusername' => 0,
    'smtppass' => 0,
    'smtpport' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b3354cd109a1_18631697')) {function content_50b3354cd109a1_18631697($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="hero-unit">
<div class="alert alert-info">
  Ваша версия программы:  <?php echo $_smarty_tpl->tpl_vars['version']->value;?>
<br>	
  <div id=verc name=verc></div>
</div>	
<form action="?content_page=config&config=save" method="post" name="form1" target="_self">
<input name="form_sitename" type="text" id="form_sitename" value="<?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
" class="span12" placeholder="Название сайта..." size=80><br>
    <div class="well">
        <label class="checkbox">
            <input type="checkbox" name="form_usercanregistrate" value="1" <?php if ($_smarty_tpl->tpl_vars['usercanregistrate']->value==1){?>checked="checked"<?php }?>>Пользователь может сам регистрироваться
        </label>            
    </div>        
        
<div class="well">        
 <label class="checkbox">
   <input type="checkbox" name="form_cfg_ad" value="1" <?php if ($_smarty_tpl->tpl_vars['cfg_ad']->value==1){?>checked="checked"<?php }?>>Вход через Active Directory
 </label>                    
 <div class="row-fluid">
  <div class="span4">
      <span class="help-block">Сервер LDAP:</span>        
      <input class="span4" name="form_cfg_ldap" type="text" id="form_cfg_ldap" value="<?php echo $_smarty_tpl->tpl_vars['cfg_ldap']->value;?>
">
  </div>
  <div class="span4">
    <span class="help-block">Домен 1:</span>
    <input class="span4" name="form_cfg_domain1" type="text" id="form_cfg_domain1" value="<?php echo $_smarty_tpl->tpl_vars['cfg_domain1']->value;?>
">
  </div>
  <div class="span4">
    <span class="help-block">Домен 2:</span>
    <input name="form_cfg_domain2" type="text" id="form_cfg_domain2" value="<?php echo $_smarty_tpl->tpl_vars['cfg_domain2']->value;?>
">
  </div>  
 </div>  
</div>  
<div class="well">        
 <div class="row-fluid">
  <div class="span4">
      <span class="help-block">Текущая тема</span>        
      <input class="span4" name="form_cfg_theme" type="text" id="form_cfg_theme" readonly="readonly" value="<?php echo $_smarty_tpl->tpl_vars['cfg_theme']->value;?>
">
  </div>
  <div class="span8">
    <span class="help-block">Выберите</span>              
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
  </div>
 </div>      
</div>         
<div class="well">          
   <label class="checkbox">  
    <input type=checkbox name="form_sendemail" id="form_sendemail" value=1  <?php if ($_smarty_tpl->tpl_vars['sendemail']->value==1){?>checked="checked"<?php }?>> Рассылать уведомления на почту
  </lavel>    
 <div class="row-fluid">    
  <div class="span4">
    <span class="help-block">Сервер SMTP</span>
    <input name="form_smtphost" type="text" id="form_smtphost" value="<?php echo $_smarty_tpl->tpl_vars['smtphost']->value;?>
">
    <span class="help-block">От кого почта:</span> 
    <input name="form_emailadmin" type="text" id="form_emailadmin" value="<?php echo $_smarty_tpl->tpl_vars['emailadmin']->value;?>
">
    <span class="help-block">Куда шлем ответы:</span> 
    <input name="form_emailreplyto" type="text" id="form_emailreplyto" value="<?php echo $_smarty_tpl->tpl_vars['emailreplyto']->value;?>
">        
  </div>  
  <div class="span4">
      <label class="checkbox">    
       <input type=checkbox name="form_smtpauth" id="form_smtpauth" value=1  <?php if ($_smarty_tpl->tpl_vars['smtpauth']->value==1){?>checked="checked"<?php }?>>Требуется аутенфикация SMTP
      </label>
    <span class="help-block">SMTP имя пользователя:</span>    
    <input name="form_smtpusername" type="text" id="form_smtpusername" value="<?php echo $_smarty_tpl->tpl_vars['smtpusername']->value;?>
">
    <span class="help-block">SMTP пароль пользователя:</span>
    <input name="form_smtppass" type="password" id="form_smtppass" value="<?php echo $_smarty_tpl->tpl_vars['smtppass']->value;?>
">      
  </div>  
  <div class="span4">
   <span class="help-block">SMTP порт:</span>
   <input name="form_smtpport" type="text" id="form_smtpport" value="<?php echo $_smarty_tpl->tpl_vars['smtpport']->value;?>
">      
  </div>    
 </div>  
</div>    
<div align=center><input type="submit"  name="Submit" value="Сохранить изменения"></div>
</form>                        
</div>
<script type="text/javascript" src="controller/client/js/config.js"></script>
<?php }else{ ?>
<div class="alert alert-error">Не достаточно прав!</div>
<?php }?><?php }} ?>