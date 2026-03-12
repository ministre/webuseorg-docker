<?php
include("../inc/class/config.php");		// загружаем классы настроек
$cfg=new Tconfig;
include("../config.php");			// загружаем основные настройки, которых нет в БД
include("../inc/connect.php");			// соеденяемся с БД, получаем $cfg->base_id
include("../inc/class/users.php");		// загружаем классы 
include("../inc/class/employees.php");		// загружаем классы 
include("../functions.php");		// подгружаем функции (мини версия)
include("../controller/server/login.php");		// подгружаем функции (мини версия)
//////////////
// ВНИМАНИЕ! ЗДЕСЬ нужно подставить orgid организации в которую грузим список
$orgid="1";
//////////////
$emp=new Temployees;
$us=new Tusers;

$cnt=0;
if (file_exists('../employees.xml')) {
    $xml = simplexml_load_file('../employees.xml');
    //var_dump($xml);
    $sql="UPDATE users SET active=0 WHERE orgid='$orgid'";                
    $result = mysql_query($sql,$cfg->base_id);                
    if ($result==''){die('Неверный запрос : ' . mysql_error());}
    
               foreach($xml->employees as $employees){
                  // echo "$counterpart->name";                                     
                   $cnt++;
                        $yet=$emp->EmployeesYetByERPCode($employees->code);
                        if ($yet==1){
                                $emp->code=$employees->code;
                                $emp->fio=$employees->fio;
                                $emp->faza=$employees->faza;
                                $emp->enddate=DateToMySQLDateTime2($employees->enddate);
                                //echo "$employees->enddate ! $emp->enddate";
                                $emp->post=$employees->post;
                                $emp->Update();
                                $emp->GetByERPCode();
                                //$usr->GetById($emp->usersid);
                                //$usr->active=1;
                                    $sql="UPDATE users SET active=1 WHERE id='$emp->usersid'";                
                                    $result = mysql_query($sql,$cfg->base_id);                
                                
                                //echo "!$usr->login!$emp->usersid!$emp->code!";
                                echo "Обновлен($cnt): $employees->fio<br>";
                    }
                    else {
                                //echo "!$user->orgid!";
                                $us->active=1;
                                $us->mode=0;
                                $us->orgid=$orgid;
                                $us->randomid=GetRandomId(60);
                                $us->pass=GetRandomId(10);
                                $us->login=$employees->fio;
                                $us->Add();
                                $us->GetByRandomId($us->randomid);

                                $emp->code=$employees->code;
                                $emp->fio=$employees->fio;
                                $emp->faza=$employees->faza;
                                $emp->enddate=DateToMySQLDateTime2($employees->enddate);
                                //echo "$employees->enddate ! $emp->enddate";
                                $emp->post=$employees->post;                                
                                $emp->usersid=$us->id;
                                $emp->Add();
                                    $sql="UPDATE users SET active=1 WHERE id='$emp->usersid'";                
                                    $result = mysql_query($sql,$cfg->base_id);                
                                
//                              $knt->ERPCode=$counterpart->code;
//                              $knt->INN=$counterpart->inn;
//                              $knt->KPP=$counterpart->kpp;
//                              $knt->active=1;
//                              $knt->bayer=$counterpart->buyer;
//                              $knt->comment="";
//                              $knt->dog=1;
//                              $knt->fullname=$counterpart->fullname;
//                              $knt->name=$counterpart->name;
//                              $knt->supplier=$counterpart->supplier;
//                              $knt->Add();
                              echo "Добавлен($cnt): $employees->fio<br>";
                    };
               };    
} else {
        echo "Файл не найден!";    
    };
?>
