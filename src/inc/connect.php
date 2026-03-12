<?
# Проверяем соеденение с MySQL и получаем base_id, который используем в дальнейшем
# во всем портале для соеденения с базой
//echo "$cfg->mysql_host,$cfg->mysql_user,$cfg->mysql_pass";
//die();

$cfg->base_id=mysql_connect($cfg->mysql_host,$cfg->mysql_user,$cfg->mysql_pass);


# Если соеденения нет, то выводим сообщение об ошибке и предлагаем
# проинсталлировать портал
if (!$cfg->base_id)
  {
   echo "<b>Ошибка:</b> Нет соединения с базой MySQL. Возможно не верно настроен конфигурационный файл.<br>";
   die();
  };

# Здесь уже соединение есть, но проверяем доступность базы данных
if (mysql_select_db($cfg->mysql_base)==false)
    {
     echo "<b>Ошибка:</b> не могу подключить базу $cfg->base_name. Возможно CMS не установлена. Смотрите файл <a href=install/readme.txt>readme.txt</a> или <a href=install/index.php>начать установку</a>. <br>";
     die();
    };
?>