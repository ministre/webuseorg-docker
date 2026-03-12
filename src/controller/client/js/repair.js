jQuery("#list_rep").jqGrid({
   	url:'controller/server/repair.php?step=list&eqid=1',
	datatype: "json",
   	colNames:['Id','Контрагент','ТМЦ','Дата начала','Дата конца','Стоимость','Комментарий','Статус','Действия'],
   	colModel:[
   		{name:'rpid',index:'rpid', width:35},
                {name:'namekont',index:'namekont', width:100,editable:false},
                {name:'namenome',index:'namenome', width:100,editable:false},
                {name:'dt',index:'dt', width:80,editable:false},
                {name:'dtend',index:'dtend', width:80,editable:false},
                {name:'cost',index:'cost', width:80,editable:true},
                {name:'comment',index:'comment', width:80,editable:true},
                {name:'rstatus',index:'rstatus', width:100,editable:true,edittype:"select",editoptions:{value:"1:Ремонт;0:Сделано"}},
		{name: 'myac', width:80, fixed:true, sortable:false, resize:false, formatter:'actions',formatoptions:{keys:true}}
   	],
	autowidth: true,		
   	rowNum:10,	
   	rowList:[10,20,30],
   	pager: '#pager_rep',
   	sortname: 'dt',
	scroll:1,
    viewrecords: true,
    sortorder: "asc",
    editurl:"controller/server/repair.php?step=edit",
    caption:"Реестр ремонтов"
});

var addOptions={
    top: 0, left: 0, width: 500,
    addCaption: "Добавить запись",
    bSubmit: "Сохранить",
    bCancel: "Отменить", 
    closeAfterAdd: true,
    closeOnEscape: true
};



//jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false},{},addOptions,{},{multipleSearch:false},{closeOnEscape:true} );