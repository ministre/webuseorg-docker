<?php
class Tknt
{
    var $id;            // идентификатор контрагента
    var $name;          // краткое наименование
    var $comment;       // комментарий
    var $active;        // активный
    var $fullname;      // полное наименование
    var $ERPCode;       // связь с ERP системами при загрузке из XML (code)
    var $INN;           // ИНН
    var $KPP;           // КПП
    var $bayer;         // Покупатель=1
    var $supplier;      // Продавец=1
    var $dog;           // Контролировать договоры

function Add(){ // добавляем контрагента с текущими данными (все что заполнено)
		global $cfg;
                $sql="INSERT INTO knt (id,name,comment,active,fullname,ERPCode,INN,KPP,bayer,supplier,dog) VALUES
                                      (NULL,'$this->name','$this->comment','$this->active','$this->fullname',
                                      '$this->ERPCode','$this->INN','$this->KPP','$this->bayer','$this->supplier','$this->dog')";                
  		$result = mysql_query($sql,$cfg->base_id);                
  		if ($result==''){die('Неверный запрос Tknt.Add: ' . mysql_error());}
    
}
function Update(){ // добавляем контрагента с текущими данными (все что заполнено)
		global $cfg;
                //echo "$this->INN!";
                $sql="UPDATE knt SET name='$this->name',fullname='$this->fullname',INN='$this->INN',KPP='$this->KPP',bayer='$this->bayer',supplier='$this->supplier' WHERE ERPCode='$this->ERPCode'";                
  		$result = mysql_query($sql,$cfg->base_id);                
  		if ($result==''){die('Неверный запрос Tknt.Update: ' . mysql_error());}
    
}
function KntYetByERPCode($TERPCode){ // а есть ли такой в базе (проверка по ERPCode. Если есть - возврат 1, иначе 0
    global $cfg;
    //echo "$TERPCode";
    $res=0;
    $sql="SELECT id FROM knt WHERE ERPCode='$TERPCode'";
    $result = mysql_query($sql);
    if ($result!=''){
      while ($myrow = mysql_fetch_array($result)){
        $res=1;   
      };
    } else {die('Ошибка (KntYetByERPCode): ' . mysql_error());}            
    return $res;
}

};

?>
