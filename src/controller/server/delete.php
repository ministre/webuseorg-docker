<?
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id

if (file_exists('../../delete.xml')) {
    $xml = simplexml_load_file('../../delete.xml');
    //var_dump($xml);
    echo "<hr>";
        foreach($xml->table as $data)
        {
         echo "Обработка таблицы: $data[name] ($data[comment])<br/>";
         $SQL = "SELECT * FROM $data[name] WHERE active=0";
         $result3 = mysql_query( $SQL ) or die("Не могу выбрать список из $data[name]!".mysql_error());
         while ($row3 = mysql_fetch_array($result3))
  	 {
         echo "(id=$row3[0])<br>";
         $res_test=0;
         foreach($data->reqtable as $rectable)
         {          
          echo "- проверяю зависимость $rectable[name] ($rectable[comment]) (в $rectable[name].$rectable->tokey нет значений $data[name].$rectable->fromkey)<br>";
          $tabsr=$data[name]; // Таблица которая помечена на удаление
          $tabtest=$rectable[name]; // Таблица где ищем вхождения
          $tabsr_id=$rectable->fromkey; // имя идентификатора таблицы помеченой на удаление
          $tabsr_key=$rectable->tokey; // имя ключа который ищем чтоб небыло в таблице вхождений

                    $tmp=$row3[0];
                    $SQL = "SELECT * FROM $tabtest WHERE $tabsr_key=$tmp";
                    //echo "-$SQL-";
                    $result2 = mysql_query( $SQL ) or die("Не могу выбрать список из $tabtest!".mysql_error());
                    $i=0;
                    while ($row2 = mysql_fetch_array($result2))
                        {
                            $i++;$res_test++;
                            echo "-- зависимость в таблице с ID=$row2[0]<br>";
                        };
                        if ($i==0){echo "---OK<br>";} else {echo "---FALSE<br>";}
         };
         if ($res_test==0){
            $SQL = "DELETE FROM $data[name] WHERE id=$row3[0]";
            $result4 = mysql_query( $SQL ) or die("Не могу удалить из $data[name]!".mysql_error());
            echo "Вердикт: удалено.<br>";
                     foreach($data->clear as $clear)
                        {          
                         $tbl_clear=$clear[tbl_clear];
                         $key_clear=$clear[usersid];
                         $SQL = "DELETE FROM $tbl_clear WHERE $key_clear=$tmp";
                         $result4 = mysql_query( $SQL ) or die("Не могу удалить из $data[name]!".mysql_error());
                         echo "--очистил зависимые в таблице $tbl_clear по $key_clear=$id<br>";
                        };

            } else
         {echo "Вердикт: удалите зависимости<br>";};
         };
        };
} else {
    exit('Ошибка открытия схемы delete.xml');
}

?>