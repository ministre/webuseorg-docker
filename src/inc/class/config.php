<?
class Tconfig
{
	var $mysql_host; 	// настройки соединения с MySQL
	var $mysql_user;
	var $mysql_pass;
	var $mysql_base;
	var $base_id;

	var $sitename; 		// название сайта
	var $ad; 		// использовать для аутенфикации Active Directory 0-нет 1-да
	var $domain1; 		// домен AD первого уровня (например com)
	var $domain2; 		// домен AD второго уровня (например khortitsa)
	var $ldap; 		// сервер ldap
	var $usercanregistrate; // может ли пользователь регистрироваться на сайте сам 1-да
	var $useraddfromad; 	// добавлять ли учетку автоматически при заходе пользователь через AD. 1-да
	var $theme;		// тема по умолчанию
	var $emailadmin;	// от кого будем посылать почту
	var $smtphost;		// сервер SMTP
	var $smtpauth;		// требуется утенфикация?
	var $smtpport;		// SMTP порт
	var $smtpusername;	// SMTP имя пользователя для входа
	var $smtppass;		// SMTP пароль пользователя для входа
	var $emailreplyto;	// куда слать ответы
	var $sendemail;		// а вообще будем посылать почту?

	var $version;		// версия платформы
	
	// не пишется в базу
	var $themes_arr;		// содержит массив доступных тем оформления
	var $menu_user;			// массив файлов с пользовательским меню
	var $menu_admin;		// массив файлов с админа меню
	var $menu_doc;			// массив файлов с документами
	var $menu_handbook;		// массив файлов со справочниками


function GetFromBaseNoSmarty()
	{		
  		$result = mysql_query("SELECT * FROM config",$this->base_id);
  		if ($result!='')
  		{while ($myrow = mysql_fetch_array($result))
  		 {
  		 	 $this->ad=$myrow[ad];
  		 	 $this->domain1=$myrow[domain1];
  		 	 $this->domain2=$myrow[domain2];
  		 	 $this->sitename=$myrow[sitename];
  		 	 $this->usercanregistrate=$myrow[usercanregistrate];
  		 	 $this->useraddfromad=$myrow[useraddfromad];
  		 	 $this->ldap=$myrow[ldap];
  		 	 $this->theme=$myrow[theme];
			 $this->emailadmin=$myrow[emailadmin];
			 $this->smtphost=$myrow[smtphost];		// сервер SMTP
			 $this->smtpauth=$myrow[smtpauth];		// требуется утенфикация?
			 $this->smtpport=$myrow[smtpport];		// SMTP порт
			 $this->smtpusername=$myrow[smtpusername];	// SMTP имя пользователя для входа
			 $this->smtppass=$myrow[smtppass];		// SMTP пароль пользователя для входа
			 $this->emailreplyto=$myrow[emailreplyto];	// куда слать ответы
			 $this->sendemail=$myrow[sendemail];		// а вообще будем посылать почту?			 
			 $this->version=$myrow[version];					 
  		 };
  		 } else {die('Неверный запрос Tconfig.GetFromBase: ' . mysql_error());}
	}
function GetFromBase()
	{
		global $smarty;
  		$result = mysql_query("SELECT * FROM config",$this->base_id);
  		if ($result!='')
  		{while ($myrow = mysql_fetch_array($result))
  		 {
  		 	 $this->ad=$myrow[ad];
  		 	 $this->domain1=$myrow[domain1];
  		 	 $this->domain2=$myrow[domain2];
  		 	 $this->sitename=$myrow[sitename];
  		 	 $this->usercanregistrate=$myrow[usercanregistrate];
  		 	 $this->useraddfromad=$myrow[useraddfromad];
  		 	 $this->ldap=$myrow[ldap];
  		 	 $this->theme=$myrow[theme];
			 $this->emailadmin=$myrow[emailadmin];
			 $this->smtphost=$myrow[smtphost];		// сервер SMTP
			 $this->smtpauth=$myrow[smtpauth];		// требуется утенфикация?
			 $this->smtpport=$myrow[smtpport];		// SMTP порт
			 $this->smtpusername=$myrow[smtpusername];	// SMTP имя пользователя для входа
			 $this->smtppass=$myrow[smtppass];		// SMTP пароль пользователя для входа
			 $this->emailreplyto=$myrow[emailreplyto];	// куда слать ответы
			 $this->sendemail=$myrow[sendemail];		// а вообще будем посылать почту?			 			 
  		 	 $this->version=$myrow[version];
  		 	 $smarty->assign('sitename', $this->sitename);
 		 	 $smarty->assign('theme', $this->theme);
			 $smarty->assign('usercanregistrate', $this->usercanregistrate);
			 $smarty->assign('cfg_ad', $this->ad);
			 $smarty->assign('cfg_domain1', $this->domain1);
			 $smarty->assign('cfg_domain2', $this->domain2);
			 $smarty->assign('cfg_ldap', $this->ldap);
			 $smarty->assign('cfg_theme', $this->theme);
			 $smarty->assign('emailadmin', $this->emailadmin);
			 $smarty->assign(smtphost,$myrow[smtphost]);		// сервер SMTP
			 $smarty->assign(smtpauth,$myrow[smtpauth]);		// требуется утенфикация?
			 $smarty->assign(smtpport,$myrow[smtpport]);		// SMTP порт
			 $smarty->assign(smtpusername,$myrow[smtpusername]);	// SMTP имя пользователя для входа
			 $smarty->assign(smtppass,$myrow[smtppass]);		// SMTP пароль пользователя для входа
			 $smarty->assign(emailreplyto,$myrow[emailreplyto]);	// куда слать ответы
			 $smarty->assign(sendemail,$myrow[sendemail]);		// а вообще будем посылать почту?			 
			 $smarty->assign(version,$myrow[version]);
  		 };
  		 } else {die('Неверный запрос Tconfig.GetFromBase: ' . mysql_error());}
	}
function SetToBase()
	{
	global $base_id;
 	$this->domain1=ClearHtml($this->domain1);
 	$this->domain2=ClearHtml($this->domain2);
 	$this->sitename=ClearHtml($this->sitename);
	    $sql="UPDATE config SET ad='$this->ad',
  	    domain1='$this->domain1',domain2='$this->domain2',sitename='$this->sitename',theme='$this->theme',
  	    usercanregistrate='$this->usercanregistrate',ldap='$this->ldap',emailadmin='$this->emailadmin',
	    smtphost='$this->smtphost',smtpauth='$this->smtpauth',smtpport='$this->smtpport',smtpusername='$this->smtpusername',
	    smtppass='$this->smtppass',emailreplyto='$this->emailreplyto',sendemail='$this->sendemail'";
  	    $result = mysql_query($sql,$this->base_id);
  		if (!$result) {die('Неверный запрос Tconfig.SetToBase: ' . mysql_error());}
	}
}


?>