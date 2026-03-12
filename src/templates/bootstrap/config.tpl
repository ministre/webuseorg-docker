{if $user_mode==1}
<div class="hero-unit">
<div class="alert alert-info">
  Ваша версия программы:  {$version}<br>	
  <div id=verc name=verc></div>
</div>	
<form action="?content_page=config&config=save" method="post" name="form1" target="_self">
<input name="form_sitename" type="text" id="form_sitename" value="{$sitename}" class="span12" placeholder="Название сайта..." size=80><br>
    <div class="well">
        <label class="checkbox">
            <input type="checkbox" name="form_usercanregistrate" value="1" {if $usercanregistrate==1}checked="checked"{/if}>Пользователь может сам регистрироваться
        </label>            
    </div>        
        
<div class="well">        
 <label class="checkbox">
   <input type="checkbox" name="form_cfg_ad" value="1" {if $cfg_ad==1}checked="checked"{/if}>Вход через Active Directory
 </label>                    
 <div class="row-fluid">
  <div class="span4">
      <span class="help-block">Сервер LDAP:</span>        
      <input class="span4" name="form_cfg_ldap" type="text" id="form_cfg_ldap" value="{$cfg_ldap}">
  </div>
  <div class="span4">
    <span class="help-block">Домен 1:</span>
    <input class="span4" name="form_cfg_domain1" type="text" id="form_cfg_domain1" value="{$cfg_domain1}">
  </div>
  <div class="span4">
    <span class="help-block">Домен 2:</span>
    <input name="form_cfg_domain2" type="text" id="form_cfg_domain2" value="{$cfg_domain2}">
  </div>  
 </div>  
</div>  
<div class="well">        
 <div class="row-fluid">
  <div class="span4">
      <span class="help-block">Текущая тема</span>        
      <input class="span4" name="form_cfg_theme" type="text" id="form_cfg_theme" readonly="readonly" value="{$cfg_theme}">
  </div>
  <div class="span8">
    <span class="help-block">Выберите</span>              
    <select name="form_cfg_theme_sl" id="form_cfg_theme_sl">
    {section name=i loop=$themes_arr}
	<option value=1>{$themes_arr[i]}</option>
    {/section}            
    </select>    
  </div>
 </div>      
</div>         
<div class="well">          
   <label class="checkbox">  
    <input type=checkbox name="form_sendemail" id="form_sendemail" value=1  {if $sendemail==1}checked="checked"{/if}> Рассылать уведомления на почту
  </lavel>    
 <div class="row-fluid">    
  <div class="span4">
    <span class="help-block">Сервер SMTP</span>
    <input name="form_smtphost" type="text" id="form_smtphost" value="{$smtphost}">
    <span class="help-block">От кого почта:</span> 
    <input name="form_emailadmin" type="text" id="form_emailadmin" value="{$emailadmin}">
    <span class="help-block">Куда шлем ответы:</span> 
    <input name="form_emailreplyto" type="text" id="form_emailreplyto" value="{$emailreplyto}">        
  </div>  
  <div class="span4">
      <label class="checkbox">    
       <input type=checkbox name="form_smtpauth" id="form_smtpauth" value=1  {if $smtpauth==1}checked="checked"{/if}>Требуется аутенфикация SMTP
      </label>
    <span class="help-block">SMTP имя пользователя:</span>    
    <input name="form_smtpusername" type="text" id="form_smtpusername" value="{$smtpusername}">
    <span class="help-block">SMTP пароль пользователя:</span>
    <input name="form_smtppass" type="password" id="form_smtppass" value="{$smtppass}">      
  </div>  
  <div class="span4">
   <span class="help-block">SMTP порт:</span>
   <input name="form_smtpport" type="text" id="form_smtpport" value="{$smtpport}">      
  </div>    
 </div>  
</div>    
<div align=center><input type="submit"  name="Submit" value="Сохранить изменения"></div>
</form>                        
</div>
<script type="text/javascript" src="controller/client/js/config.js"></script>
{else}
<div class="alert alert-error">Не достаточно прав!</div>
{/if}