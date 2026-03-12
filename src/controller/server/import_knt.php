<?php
include("../../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../../config.php");			// загружаем основные настройки, которых нет в БД
include("../../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
include("../../inc/class/knt.php");		// загружаем классы 
$knt=new Tknt;
if (file_exists('../../counterpart.xml')) {
    $xml = simplexml_load_file('../../counterpart.xml');
    //var_dump($xml);
               foreach($xml->counterpart as $counterpart){
                  // echo "$counterpart->name";                                     
                        $yet=$knt->KntYetByERPCode($counterpart->code);
                        if ($yet==1){
                              $knt->ERPCode=$counterpart->code;
                              $knt->INN=$counterpart->inn;
                              //echo "!$knt->INN!";
                              $knt->KPP=$counterpart->kpp;
                              $knt->bayer=$counterpart->buyer;
                              $knt->fullname=$counterpart->fullname;
                              $knt->name=$counterpart->name;
                              $knt->supplier=$counterpart->supplier;                            
                              $knt->Update();
                              echo "Обновлен: $counterpart->name<br>";
                    } else {
                              $knt->ERPCode=$counterpart->code;
                              $knt->INN=$counterpart->inn;
                              $knt->KPP=$counterpart->kpp;
                              $knt->active=1;
                              $knt->bayer=$counterpart->buyer;
                              $knt->comment="";
                              $knt->dog=1;
                              $knt->fullname=$counterpart->fullname;
                              $knt->name=$counterpart->name;
                              $knt->supplier=$counterpart->supplier;
                              $knt->Add();
                              echo "Добавлен: $knt->name<br>";
                    };
               };    
} else {
        echo "Файл не найден!";    
    };
?>
