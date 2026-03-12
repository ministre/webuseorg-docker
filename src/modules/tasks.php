<?
// Выполняем токма если юзер зашел!
if ($user->randomid!="")
{
    if (isset($_GET["step"])) {$step=$_GET["step"];} else {$step="";};
    if ($step!="")
    {
     // проверяем, чистим козявки (еще раз!)
     $touserid=ClearHtml($_POST["touserid"]);
     if ($touserid==""){$err[]="Не выбран пользователь!";};
     $dt=ClearHtml($_POST["dt"]);
     $dt=DateToMySQLDateTime2($dt);
     if ($dt==""){$err[]="Не выбрана дата начала задачи!";};
     $title=ClearHtml($_POST["title"]);
     if ($title==""){$err[]="Не введен заголовок задачи!";};
     $txt=ClearHtml($_POST["txt"]);
     $maxdate=ClearHtml($_POST["maxdate"]);
     $maxdate=DateToMySQLDateTime2($maxdate);
     if ($maxdate==""){$err[]="Не выбрана дата завершения задачи!";};
     $status=$_POST["status"];
     if ($status==""){$err[]="Не выбран начальный статус!";};        
    };
    // Добавляем задачу
    if ($step=="add")
    {
     if (count($err)==0)
     {
      // Добавляем таки!
      $sql="INSERT INTO tasks (id,userid,touserid,dt,title,txt,status,maxdate) VALUES
                                      (NULL,'$user->id','$touserid','$dt','$title',
                                      '$txt','$status','$maxdate')";                
  		$result = mysql_query($sql,$cfg->base_id);                
  		if ($result==''){die('Не смог добавить задачу!: ' . mysql_error());}
                // посылаем на почту уведомление
                $touser= new Tusers;
                $touser->GetById($touserid);
                //$res=SendMsg($cfg->emailadmin,$touserid->email,"Уведомление о поставленой задаче!".$title,$txt);
		if ($cfg->sendemail==1){
		    //echo "!$touserid!$touserid->email!$title,$txt";
		    smtpmail("$touser->email","Уведомление о поставленой задаче:".$title,$txt);
		    };
                //if ($res==false){
                  //  $err[]="Не удалось отправить сообщение на $touser->email о поставленой задаче!";
                    //};
     };
    };
    // Обновляем задачу
    if ($step=="edit")
    {
     if (count($err)==0)
     {
      // Обновляем
      $id=$_GET["id"];
      $sql="UPDATE tasks SET touserid='$touserid',dt='$dt',title='$title',txt='$txt',status='$status',maxdate='$maxdate' WHERE id='$id'";
      $result = mysql_query($sql,$cfg->base_id);                
      if ($result==''){die('Не смог обновить задачу!: ' . mysql_error());}
     };
    };    
};
?>