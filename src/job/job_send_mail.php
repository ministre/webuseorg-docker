<?php
include("../inc/class/config.php");		// загружаем классы настроек
include("../inc/class/class.phpmailer.php");
$cfg=new Tconfig;
include("../config.php");			// загружаем основные настройки, которых нет в БД
include("../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
$cfg->GetFromBaseNoSmarty();
include("../functions.php");		// подгружаем функции (мини версия)



$ulist=GetArrayUsersProfile();
$stxt="";
for ($i = 0; $i <= count($ulist); $i++) {
    if (($ulist[$i][ddd]=='1') and ($ulist[$i][faza]=="Работает"))
    {
        $fio=$ulist[$i][fio];
        $post=$ulist[$i][post];        
        $go=$ulist[$i][go];        
        if ($go=="00:00:00"){$go= "точки входа нет";};
        $stxt=$stxt."$fio ($post). Вход: $go<br>";        
    }
    };
 if ($stxt!="")   {
   smtpmail("gribov.p@globalspirits.com", "Пришли не вовремя или вообще не пришли.Ежедневный отчет в 10.00", $stxt);
   smtpmail("rogozina.l@globalspirits.com", "Пришли не вовремя или вообще не пришли.Ежедневный отчет в 10.00", $stxt);
   smtpmail("Efimova.M@globalspirits.com", "Пришли не вовремя или вообще не пришли.Ежедневный отчет в 10.00", $stxt);
   smtpmail("Rodnina.n@globalspirits.com", "Пришли не вовремя или вообще не пришли.Ежедневный отчет в 10.00", $stxt);   
   smtpmail("Shalimov.v@globalspirits.com", "Пришли не вовремя или вообще не пришли.Ежедневный отчет в 10.00", $stxt);   
   smtpmail("Kolomoets.A@globalspirits.com", "Пришли не вовремя или вообще не пришли.Ежедневный отчет в 10.00", $stxt);
   smtpmail("Chernjakova.M@globalspirits.com", "Пришли не вовремя или вообще не пришли.Ежедневный отчет в 10.00", $stxt);
   smtpmail("Kochneva.M@globalspirits.com", "Пришли не вовремя или вообще не пришли.Ежедневный отчет в 10.00", $stxt);
   smtpmail("grigorev.s@globalspirits.com", "Пришли не вовремя или вообще не пришли.Ежедневный отчет в 10.00", $stxt);
   smtpmail("Titovskij.S@globalspirits.com", "Пришли не вовремя или вообще не пришли.Ежедневный отчет в 10.00", $stxt);
   smtpmail("suprunova.n@globalspirits.com", "Пришли не вовремя или вообще не пришли.Ежедневный отчет в 10.00", $stxt);
 };

?>