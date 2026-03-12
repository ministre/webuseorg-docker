<?
class Tusers
{
        var $id;        // идентификатор пользователя
        var $randomid;  // случайны идентификатор (время от времени может менятся)
        var $orgid;     // принадлежность к организации
        var $login;     // логин
        var $pass;      // пароль
        var $email;     // электронная почта
        var $mode;      // 0 - пользователь 1- админ
	var $lastdt;    // дата и время последнего посещения
	var $active;    // 1-не помечен на удаление
	
function UpdateLastdt($id){ // обновляем данные о последнем посещении
		global $cfg;
		$lastdt=date( 'Y-m-d H:i:s');
  		$result = mysql_query("UPDATE users SET lastdt='$lastdt' WHERE id='$id'",$cfg->base_id);
  		if ($result==''){die('Неверный запрос Tusers.UpdateLastdt: ' . mysql_error());};                 	
}
function GetByLogin($login){ // получить данные о пользователе по логину
		global $cfg;
  		$result = mysql_query("SELECT * FROM users WHERE login='$login'",$cfg->base_id);
  		if ($result!=''){
                            while ($myrow = mysql_fetch_array($result)){
                             $this->id=$myrow[id];
                             $this->randomid=$myrow[randomid];
                             $this->orgid=$myrow[orgid];
                             $this->login=$myrow[login];
                             $this->pass=$myrow[pass];
                             $this->email=$myrow[email];
                             $this->mode=$myrow[mode];                             
                             $this->lastdt=$myrow[lastdt];
			     $this->active=$myrow[active];                             
                             };
                         } else {die('Неверный запрос Tusers.GetByLogin: ' . mysql_error());}
                 }
        
function GetByLoginPass($login,$pass){ // получить данные о пользователе по логину/паролю
		global $cfg;
  		$result = mysql_query("SELECT * FROM users WHERE (login='$login') and (pass='$pass')",$cfg->base_id);
  		if ($result!=''){
                            while ($myrow = mysql_fetch_array($result)){
                             $this->id=$myrow[id];
                             $this->randomid=$myrow[randomid];
                             $this->orgid=$myrow[orgid];
                             $this->login=$myrow[login];
                             $this->pass=$myrow[pass];
                             $this->email=$myrow[email];
                             $this->mode=$myrow[mode];                             
                             $this->lastdt=$myrow[lastdt];
			     $this->active=$myrow[active];   
                             };
                         } else {die('Неверный запрос Tusers.GetByLoginPass: ' . mysql_error());}
                 }
function GetById($id){ // получить данные о пользователе по идентификатору
		global $cfg;
  		$result = mysql_query("SELECT * FROM users WHERE id='$id'",$cfg->base_id);
  		if ($result!=''){
                            while ($myrow = mysql_fetch_array($result)){
                             $this->id=$myrow[id];
                             $this->randomid=$myrow[randomid];
                             $this->orgid=$myrow[orgid];
                             $this->login=$myrow[login];
                             $this->pass=$myrow[pass];
                             $this->email=$myrow[email];
			     //echo "---$this->email---";
                             $this->mode=$myrow[mode];                             
                             $this->lastdt=$myrow[lastdt];
			     $this->active=$myrow[active];   
                             };
                         } else {die('Неверный запрос Tusers.GetById: ' . mysql_error());}
                 }
function GetByRandomId($id){ // получить данные о пользователе по идентификатору
		global $cfg;
		//echo "$myrow[id];";		
  		$result = mysql_query("SELECT * FROM users WHERE randomid='$id'",$cfg->base_id);
  		if ($result!=''){
                            while ($myrow = mysql_fetch_array($result)){
                             $this->id=$myrow[id];
                             $this->randomid=$myrow[randomid];
                             $this->orgid=$myrow[orgid];
                             $this->login=$myrow[login];
                             $this->pass=$myrow[pass];
                             $this->email=$myrow[email];
                             $this->mode=$myrow[mode];			     
                             $this->lastdt=$myrow[lastdt];
			     $this->active=$myrow[active];   
                             };
                         } else {die('Неверный запрос Tusers.GetByRandomId: ' . mysql_error());}
                 }

function Add(){ // добавляем пользователя с текущими данными
		global $cfg;
                $sql="INSERT INTO users (id,randomid,orgid,login,pass,email,mode,lastdt,active) VALUES
                                      (NULL,'$this->randomid','$this->orgid','$this->login','$this->pass',
                                      '$this->email','$this->mode','$this->lastdt',1)";                
  		$result = mysql_query($sql,$cfg->base_id);
                
  		if ($result==''){die('Неверный запрос Tusers.Add: ' . mysql_error());}
    
}

};
?>
