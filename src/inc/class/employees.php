<?php
class Temployees
{
    var $id;            // идентификатор 
    var $usersid;       // связь с пользователем
    var $faza;          // в какой фазе пользователь (например в отпуске)
    var $code;          // связь с ERP
    var $enddate;       // дата когда фаза кончится
    var $post;          // Должность

function Add(){ // добавляем профиль работника с текущими данными (все что заполнено)
		global $cfg;
                $sql="INSERT INTO users_profile (id,usersid,faza,code,enddate,post) VALUES
                                      (NULL,'$this->usersid','$this->faza','$this->code','$this->enddate',
                                      '$this->post')";                
  		$result = mysql_query($sql,$cfg->base_id);                
  		if ($result==''){die('Неверный запрос Temployees.Add: ' . mysql_error());}
    
}
function Update(){ // обновляем профиль работника с текущими данными (все что заполнено)
		global $cfg;                
                $sql="UPDATE users_profile SET fio='$this->fio',faza='$this->faza',code='$this->code',enddate='$this->enddate',post='$this->post' WHERE code='$this->code'";                
  		$result = mysql_query($sql,$cfg->base_id);                
  		if ($result==''){die('Неверный запрос Temployees.Update: ' . mysql_error());}
    
}
function GetByERPCode(){ // обновляем профиль работника с текущими данными (все что заполнено)
		global $cfg;      
                $result = mysql_query("SELECT * FROM users_profile WHERE code='$this->code'",$cfg->base_id);                
  		if ($result!=''){                    
                    while ($myrow = mysql_fetch_array($result)){
                    $this->id=$myrow[id];
                    $this->usersid=$myrow[usersid];                    
                    $this->fio=$myrow[fio];
                    $this->faza=$myrow[faza];
                    $this->enddate=$myrow[enddate];
                    $this->post=$myrow[post];
                };};
  		if ($result==''){die('Неверный запрос Temployees.GetByERPCode: ' . mysql_error());}
    
}

function EmployeesYetByERPCode($TERPCode){ // а есть ли такой в базе (проверка по ERPCode. Если есть - возврат 1, иначе 0
    global $cfg;
    //echo "$TERPCode";
    $res=0;
    $sql="SELECT * FROM users_profile WHERE code='$TERPCode'";
    $result = mysql_query($sql);
    if ($result!=''){
      while ($myrow = mysql_fetch_array($result)){
        $res=1;   
      };
    } else {die('Ошибка (EmployeesYetByERPCode): ' . mysql_error());}            
    return $res;
}

};

?>
