<?
class Torg{
    var $id;        // уникальный идентификатор
    var $name;      // имя организации
    var $active;    // 1- активна,0-помечена на удаление
    
function GetFromBaseById($orgid){     // плучаем данные по организации по идентификатору
		global $smarty,$cfg;
  		$result = mysql_query("SELECT * FROM org WHERE id='$orgid'",$cfg->base_id);
  		if ($result!='')
  		{while ($myrow = mysql_fetch_array($result))
  		 {
  		 	 $this->name=$myrow[name];
  		 	 $this->active=$myrow[active];
  		 };
  		 } else {die('Неверный запрос Torg.GetFromBaseById: ' . mysql_error());}
	}


};
