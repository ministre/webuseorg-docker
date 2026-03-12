function task_click($id)
{
  $tmp=$("#task_info").html();
  if ($tmp==""){
  $("#task_info").load("controller/client/task_list.php?id="+$id);
  } else {$("#task_info").html("");};  
};