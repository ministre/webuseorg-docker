<?
function GetRandomId($n) // результат - случайная строка из цифр длинной n
{
  $id="";
  for ($i = 1; $i <= $n; $i++)
  {
    $id=$id.chr(rand(48,56));
  }
    return $id;
};

// Преобразует дату типа mm/dd/2012 в формат MySQL 2012-01-01 00:00:00
function DateToMySQLDateTime($dt)
{
   $str_exp = explode("/", $dt);
   $dtt=$str_exp[2]."-".$str_exp[0]."-".$str_exp[1]." 23:59:59";
   return $dtt;
};

// Преобразует дату типа dd.mm.2012 в формат MySQL 2012-01-01 00:00:00
function DateToMySQLDateTime2($dt)
{
   $str_exp = explode(".", $dt);
   $dtt=$str_exp[2]."-".$str_exp[1]."-".$str_exp[0]." 23:59:59";
   return $dtt;
};


// Преобразует дату MySQL в  читабельный формат
function MySQLDateTimeToDateTime($dt)
{

   $str1 = explode("-", $dt);
   $str2 = explode(" ", $str1[2]);
   $dtt=$str2[0].".".$str1[1].".".$str1[0]." ".$str2[1];
   return $dtt;
};
?>