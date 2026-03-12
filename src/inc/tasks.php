<?
if ($user->id!="")
{     
    $SQL = "SELECT tasks.id,tasks.userid,tasks.touserid,tasks.dt,tasks.title,tasks.txt,tasks.status,tasks.maxdate,users.login FROM tasks INNER JOIN users ON tasks.touserid=users.id WHERE tasks.touserid='$user->id' and status<>0";
    $result = mysql_query( $SQL ) or die("Не могу выбрать список задач!".mysql_error());
    while($row = mysql_fetch_array($result)) {
    $dt=MySQLDateTimeToDateTime($row[maxdate]);
    $tasks_array[]="<a onclick=task_click('".$row[id]."')>".$row[title].". Выполнить до ".$dt."</a>";
    };
    $smarty->assign("tasks_array", $tasks_array);   // список задач

};
?>