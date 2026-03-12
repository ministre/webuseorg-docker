$("#addtask").click(function(){
  $("#add_edit").load("controller/client/task_add_edit.php?mode=add");	
});
$("#edittask").click(function(){
   var gr = jQuery("#list2").jqGrid('getGridParam','selrow'); 
   if( gr != null ){
       $("#add_edit").load("controller/client/task_add_edit.php?mode=edit&id="+gr);
      }
     else alert("Не выбрана строка!");	
});
jQuery("#list2").jqGrid({
   	url:'controller/server/libre_tasks.php',
	datatype: "json",
   	colNames:['Id','Кому','Дата','Тема','Статус','Выполнить','',],
   	colModel:[
   		{name:'id',index:'id', width:40},
		{name:'touserid',index:'touserid', width:100},
		{name:'dt',index:'dt', width:110},
   		{name:'title',index:'title', width:200,editable:true},
   		{name:'status',index:'status', width:70,editable:true,edittype:"select",editoptions:{value:"0:Завершено;1:В работе;2:Остановлено"}},
   		{name:'maxdate',index:'maxdate', width:110,sorttype:"date"},		
		{name:'myac', width:50, fixed:true, sortable:false, resize:false, formatter:'actions',formatoptions:{keys:true}}
   	],
	autowidth: true,			
   	rowNum:10,	
   	rowList:[10,20,30],
   	pager: '#pager2',
   	sortname: 'id',
	viewrecords: true,
	sortorder: "asc",
	editurl:"controller/server/libre_tasks.php",
	caption:"Таблица задач"
});
jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false});
