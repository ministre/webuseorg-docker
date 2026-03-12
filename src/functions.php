<?

   // получаем URL откуда запущен сайт
   function GetSiteUrl(){
	$url=$_SERVER[HTTP_REFERER];
	$pieces = explode("?", $url);
	return $pieces[0];
   };
   
   // получаем имя ТМЦ по ID из equipment
   function GetTMCName($id){
    global $cfg;        
	$result = mysql_query("SELECT name FROM nome
   INNER JOIN (SELECT equipment.nomeid as eqnomeid FROM equipment WHERE id='$id') AS eq ON eq.eqnomeid=nome.id",$cfg->base_id);
	if ($result!='') {
         while ($myrow = mysql_fetch_array($result)){
		//echo "!$myrow[name]!";
		return $myrow[name];
	 };
	} else {die('Неверный запрос выборка имени номенклатуры по ID: ' . mysql_error());}
   };
   function smtpmail($to, $subject, $content, $attach=false)
    {
		global $cfg;
		
	//echo "!$cfg->emailadmin;	// от кого будем посылать почту<br>";
	//echo "!$cfg->smtphost;		// сервер SMTP<br>";
	//echo "!$cfg->smtpauth;		// требуется утенфикация?<br>";
	//echo "!$cfg->smtpport;		// SMTP порт<br>";
	//echo "!$cfg->smtpusername;	// SMTP имя пользователя для входа<br>";
	//echo "!$cfg->smtppass;		// SMTP пароль пользователя для входа<br>";
	//echo "!$cfg->emailreplyto;	// куда слать ответы<br>";
	//echo "!$cfg->sendemail;			<br>";		
		$mail = new PHPMailer(true);		
		$mail->IsSMTP();		
		  $mail->Host       = $cfg->smtphost;
		  $mail->SMTPDebug  = 0;
		  $mail->Encoding = '8bit';
		  $mail->CharSet = 'utf-8';		  
		  $mail->SMTPAuth   = $cfg->smtpauth;
		  $mail->Port       = $cfg->smtpport;
		  $mail->Username   = $cfg->smtpusername;
		  $mail->Password   = $cfg->smtppass;
		  $mail->AddReplyTo($cfg->emailadmin, $cfg->smtpusername);
		  $mail->AddAddress($to);                //кому письмо
		  $mail->SetFrom($cfg->emailadmin,  $cfg->smtpusername); //от кого (желательно указывать свой реальный e-mail на используемом SMTP сервере
		  $mail->AddReplyTo($cfg->emailadmin,  $cfg->smtpusername);
		$mail->Subject = htmlspecialchars($subject);
		//$mail->header="Content-type: text/html; Charset=UTF-8";
		$mail->MsgHTML($content);
		if($attach)  $mail->AddAttachment($attach);
		$mail->Send();
};
function SendMsg($fromemail,$toemail,$title,$txt)
{
  $header="Content-type: text/html; charset=\"utf-8\";";
  $header.= "From: $fromemail<$fromemail>;";
  return mail($toemail,$title,$txt,$header);  		
};

function ClearHtml($text) // чистим текст от мусора, козявок, иньекций и т.п.
{
       $text = trim( $text );
        $text = preg_replace( "/[^\x20-\xFF]/","",@strval( $text ) );
        $text = strip_tags( $text,"<span><strong><i><img><a><u><p><ul><ol><li><br><object>
                <embed><param><table><tr><td><th><h1><h2><h3><h4><h5><hr><div><code><pre>" );
        $text = mysql_escape_string( $text );
        return $text;
};

// проверяем аутенфикацию в AD 
function check_LDAP_user($username,$password,$ladpserver,$domain1,$domain2) // результат true если в AD такой пользователь есть
{
    global $db1,$_POST,$_SESSION;
    //echo "!$ladpserver,$domain1,$domain2!";
    $HDR_ERR="";
    if ((!$password) or (!$username)) {$HDR_ERR="false";} else
    {
        $filter= "(&(objectClass=top)(sAMAccountName=".$username."))";
        $basedn='dc=khortitsa,dc=$domain2';
        $dn="$domain1\\$username";
        $ldapconn = ldap_connect("$ladpserver");
        ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
            if (!$ldapconn)
            {
             $HDR_ERR.=ldap_error($ldapconn);
            }else
                {
                    $bind = @ldap_bind($ldapconn, $dn,$password);
                    if ($bind=="1"){
                                $HDR_ERR='true';
                            } else {
                                $HDR_ERR="false";
                                    }
                }
    }
    return ($HDR_ERR);
} ;

function GetRandomId($n) // результат - случайная строка из цифр длинной n
{
  $id="";
  for ($i = 1; $i <= $n; $i++)
  {
    $id=$id.chr(rand(48,56));
  }
    return $id;
};
function DoubleLogin($login){ // проверяем есть ли дубли логинов в базе. Результат - количество логинов
 global $smarty,$cfg;
        $cnt=0;
	$result = mysql_query("SELECT count(id) as cnt FROM users WHERE login='$login'",$cfg->base_id);
	if ($result!='') {
         while ($myrow = mysql_fetch_array($result)){
		$cnt=$myrow[cnt];
	 };
	} else {die('Неверный запрос DoubleLogin: ' . mysql_error());}
	return $cnt;
};
function DoubleEmail($email){ // проверяем есть ли дубли логинов в базе. Результат - количество логинов
 global $smarty,$cfg;
        $cnt=0;
	$result = mysql_query("SELECT count(id) as cnt FROM users WHERE email='$email'",$cfg->base_id);
	if ($result!='') {
         while ($myrow = mysql_fetch_array($result)){
		$cnt=$myrow[cnt];
	 };
	} else {die('Неверный запрос DoubleEmail: ' . mysql_error());}
	return $cnt;
};

function GetArrayUsers(){ // Возврат - массив активных пользователей  
		global $smarty,$cfg;
		$cnt=0;
		$mOrg = array();
  		$result = mysql_query("SELECT * FROM users WHERE active=1 ORDER by login",$cfg->base_id);
  		if ($result!='') {
				  while ($myrow = mysql_fetch_array($result)){
				   $mOrg[$cnt][id]=$myrow[id];
				   $mOrg[$cnt][login]=$myrow[login];
				   //echo "$mOrg[$cnt][login];";
				   $mOrg[$cnt][active]=$myrow[active];
				   $cnt++;
				  };				
				return $mOrg;
                    } else {
                             die('Неверный запрос GetArrayUsers: ' . mysql_error());
                            }
	};
function GetArrayUsersProfile(){ // Возврат - массив активных пользователей  
		global $smarty,$cfg;
		$cnt=0;
		$mOrg = array();
  		$result = mysql_query("select users.id as id,users_profile.fio as fio,users_profile.res2 as res2,users_profile.res4 as res4,users_profile.faza,users_profile.post,users_profile.enddate from users JOIN users_profile ON users.id=users_profile.usersid where users.active=1 order by users_profile.res4 desc ",$cfg->base_id);
  		if ($result!='') {
				  while ($myrow = mysql_fetch_array($result)){
				   $mOrg[$cnt][id]=$myrow[id];
                                   //echo "!$myrow[fio]!";
				   $mOrg[$cnt][fio]=$myrow[fio];                                   
                                   $mOrg[$cnt][faza]=$myrow[faza];
                                   $mOrg[$cnt][post]=$myrow[post];
                                   if ($myrow[enddate]=='0001-01-01'){$myrow[enddate]="-";} else {$myrow[enddate]=MySQLDateTimeToDateTime($myrow[enddate]);};
                                   $mOrg[$cnt][enddate]=$myrow[enddate];
                                   $pieces = explode(" ", $myrow[res4]);
                                   $d1=strtotime($myrow[res4]);
                                   if ($myrow[res2]=='5')
                                        {$d2=strtotime(date( 'Y-m-d 08:00:00'));} else 
                                            {$d2=strtotime(date('Y-m-d 09:00:00'));};
                                   $mOrg[$cnt][go]=$pieces[1];
                                   if ($d1>$d2) {$mOrg[$cnt][ddd]='1';} else {$mOrg[$cnt][ddd]='0';};
                                   if ($mOrg[$cnt][go]=="00:00:00") {$mOrg[$cnt][ddd]='1';};
                                   //$mOrg[$cnt][ddd]="$d1>>$d2";
				   //echo "$mOrg[$cnt][login];";
				   //$mOrg[$cnt][active]=$myrow[active];
				   $cnt++;
				  };				
				return $mOrg;
                    } else {
                             die('Неверный запрос GetArrayUsersProfile: ' . mysql_error());
                            }
	};
function GetArrayOrg(){ // Возврат - массив активных организаций  
		global $smarty,$cfg;
		$cnt=0;
		$mOrg = array();
  		$result = mysql_query("SELECT * FROM org WHERE active=1",$cfg->base_id);
  		if ($result!='') {
				  while ($myrow = mysql_fetch_array($result)){
				   $mOrg[$cnt][id]=$myrow[id];
				   $mOrg[$cnt][name]=$myrow[name];
				   $mOrg[$cnt][active]=$myrow[active];
				   $cnt++;
				  };				
				return $mOrg;
                    } else {
                             die('Неверный запрос GetArrayOrg: ' . mysql_error());
                            }
	};
// Преобразует дату типа mm/dd/2012 в формат MySQL 2012-01-01 00:00:00
function DateToMySQLDateTime($dt)
{
   $str_exp = explode("/", $dt);
   $dtt=$str_exp[2]."-".$str_exp[0]."-".$str_exp[1]." 23:59:59";
   return $dtt;
};

// Преобразует дату типа dd.mm.2012 в формат MySQL 2012-01-01 00:00:00
function DateToMySQLDateTime2($dt)
{
   $str_exp = explode(".", $dt);
   $str_exp2 = explode(" ", $str_exp[2]);
   $dtt=$str_exp2[0]."-".$str_exp[1]."-".$str_exp[0]." $str_exp2[1]:00";   
   return $dtt;
};


// Преобразует дату MySQL в  читабельный формат
function MySQLDateTimeToDateTime($dt)
{

   $str1 = explode("-", $dt);
   $str2 = explode(" ", $str1[2]);
   $dtt=$str2[0].".".$str1[1].".".$str1[0]." ".$str2[1];
   return $dtt;
};

// на выходе - массив из папок в укзанной папке
function GetArrayFilesInDir($dir)
{
//echo "!!$dir!!";
	$includes_dir = opendir("$dir");
	$files = array();
	while ( ($inc_file = readdir($includes_dir)) != false )
//	echo "-$inc_file-";
		if (strstr($inc_file,".")==false)
		{
			$files[] = $inc_file;
//			echo "$inc_file!";
		}
	sort($files);
	return $files;
		
};

?>