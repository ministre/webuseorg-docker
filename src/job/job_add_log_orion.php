<?php
include("../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../config.php");			// загружаем основные настройки, которых нет в БД
include("../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
include("../functions.php");		// подгружаем функции (мини версия)


$cnt=0;
if (file_exists('../exp_log.xml')) {
    $xml = simplexml_load_file('../exp_log.xml');
    //var_dump($xml);    
               foreach($xml->plogdata as $plogdata){
                  $guid=$plogdata->guid;
                  $event=$plogdata->event;
                  $hozorgan=$plogdata->hozorgan;
                  $mode=$plogdata->mode;
                  $TimeVal=$plogdata->TimeVal;                  
                  $TimeVal=str_replace('.','/',$TimeVal);
                 // echo "$TimeVal ->";
                  $TimeVal = preg_replace('#(\d{2})/(\d{2})/(\d{4})\s(.*)#', '$3-$2-$1 $4', $TimeVal);
                  //echo "$TimeVal <br>";
                    $sql="INSERT INTO exp_log (id,TimeVal,guid,event,hozorgan,mode) VALUES (NULL,'$TimeVal','$guid',$event,$hozorgan,$mode)";                
                    $result = mysql_query($sql,$cfg->base_id);                
                    if ($result==''){echo 'Неверный запрос : ' . mysql_error().'<br>';}
                    //echo "Обновлен($cnt): $employees->fio<br>";
                    };               
} else {
        echo "Файл exp_log.xml не найден!";    
    };
    
if (file_exists('../exp_users.xml')) {
    $xml = simplexml_load_file('../exp_users.xml');
    //var_dump($xml);    
                  $sql="UPDATE users_profile SET res4='0000-00-00 00:00:00'";                
                  $result = mysql_query($sql,$cfg->base_id);                
                  if ($result==''){echo 'Неверный запрос (Обнуление времени входа) : ' . mysql_error().'<br>';};
    
               foreach($xml->plist as $plist){
                  $id=$plist->id;
                  $tabnumber=$plist->tabnumber;
                  $schedule=$plist->schedule;                  
                  echo "!$id;!$tabnumber!$schedule!";
                  $sql="UPDATE users_profile SET res1='$id',res2='$schedule' WHERE code='$tabnumber'";                
                  $result = mysql_query($sql,$cfg->base_id);                
                  if ($result==''){echo 'Неверный запрос : ' . mysql_error().'<br>';};
                  // когдажеж пользователь зашел!
                        $d = getdate(); // использовано текущее время
                        foreach ( $d as $key => $val )
                        $dt=$d[year].'-'.$d[mon].'-'.$d[mday].' 00:00:01';
                        //echo "[id]=$id<br>";
                      $sql="SELECT * FROM  exp_log WHERE hozorgan='$id' and TimeVal>'$dt' order by TimeVal LIMIT 1"; 
                      echo "$sql<br>";
                      $result = mysql_query($sql,$cfg->base_id);
                      if ($result!='') {
                        while ($myrow = mysql_fetch_array($result)){
                          echo "$myrow[TimeVal]--> $myrow[hozorgan]<br>";  
                          $sql="UPDATE users_profile SET res4='$myrow[TimeVal]' WHERE res1='$id'"; 
                          $result2 = mysql_query($sql,$cfg->base_id);                
                        };
                      } else {echo "Ошибка получения времени входа:".mysql_error()."<br>";};
                    //echo "Обновлен($cnt): $employees->fio<br>";
                    };               
} else {
        echo "Файл exp_users.xml не найден!";    
    };    
?>
