<?
if (isset($_GET["config"])) {
    if ($_GET["config"]=='save'){
      $cfg->sitename        =ClearHtml($_POST["form_sitename"]);
      $cfg->usercanregistrate=ClearHtml($_POST["form_usercanregistrate"]);
      $cfg->ad              =ClearHtml($_POST["form_cfg_ad"]);
      $cfg->ldap            =ClearHtml($_POST["form_cfg_ldap"]);
      $cfg->domain1         =ClearHtml($_POST["form_cfg_domain1"]);
      $cfg->domain2         =ClearHtml($_POST["form_cfg_domain2"]);
      $cfg->theme           =ClearHtml($_POST["form_cfg_theme"]);
      $cfg->emailadmin      =ClearHtml($_POST["form_emailadmin"]);
	$cfg->smtphost     =ClearHtml($_POST["form_smtphost"]);;		// сервер SMTP
	$cfg->smtpauth     =ClearHtml($_POST["form_smtpauth"]);;		// требуется утенфикация?
	$cfg->smtpport     =ClearHtml($_POST["form_smtpport"]);;		// SMTP порт
	$cfg->smtpusername     =ClearHtml($_POST["form_smtpusername"]);;	// SMTP имя пользователя для входа
	$cfg->smtppass     =ClearHtml($_POST["form_smtppass"]);;		// SMTP пароль пользователя для входа
	$cfg->emailreplyto     =ClearHtml($_POST["form_emailreplyto"]);;	// куда слать ответы
	$cfg->sendemail     =ClearHtml($_POST["form_sendemail"]);;		// а вообще будем посылать почту?
//echo "!$cfg->sendemail!";
      $cfg->SetToBase();
         $smarty->assign('sitename', $cfg->sitename);
 	 $smarty->assign('theme', $cfg->theme);
         $smarty->assign('usercanregistrate', $cfg->usercanregistrate);
	 $smarty->assign('cfg_ad', $cfg->ad);
	 $smarty->assign('cfg_domain1', $cfg->domain1);
	 $smarty->assign('cfg_domain2', $cfg->domain2);
	 $smarty->assign('cfg_ldap', $cfg->ldap);
         $smarty->assign('cfg_theme', $cfg->theme);
	 $smarty->assign('emailadmin', $cfg->emailadmin);
	 $smarty->assign(smtphost,$cfg->smtphost);		// сервер SMTP
	 $smarty->assign(smtpauth,$cfg->smtpauth);		// требуется утенфикация?
	 $smarty->assign(smtpport,$cfg->smtpport);		// SMTP порт
	 $smarty->assign(smtpusername,$cfg->smtpusername);	// SMTP имя пользователя для входа
	 $smarty->assign(smtppass,$cfg->smtppass);		// SMTP пароль пользователя для входа
	 $smarty->assign(emailreplyto,$cfg->emailreplyto);	// куда слать ответы
	 $smarty->assign(sendemail,$cfg->sendemail);		// а вообще будем посылать почту?			 
	 
    };
};

$cfg->themes_arr=GetArrayFilesInDir("templates");
$smarty->assign('themes_arr', $cfg->themes_arr);

$cfg->menu_user=GetArrayFilesInDir("modules/menu/user");
$smarty->assign('menu_user', $cfg->menu_user);

$cfg->menu_handbook=GetArrayFilesInDir("modules/menu/handbook");
$smarty->assign('menu_handbook', $cfg->menu_handbook);

$cfg->menu_admin=GetArrayFilesInDir("modules/menu/admin");
$smarty->assign('menu_admin', $cfg->menu_admin);

$cfg->menu_doc=GetArrayFilesInDir("modules/menu/doc");
$smarty->assign('menu_doc', $cfg->menu_doc);


?>