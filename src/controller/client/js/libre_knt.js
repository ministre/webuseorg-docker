jQuery.extend(jQuery.jgrid.defaults, {ajaxSelectOptions: { cache: false }});
jQuery("#list2").jqGrid({
   	url:'controller/server/libre_knt.php?org_status=list',
	datatype: "json",
   	colNames:[' ','Id','Имя','Инн','Кпп','Пок','Прод','К.договор','ERPCode','Комментарий','Действия'],
   	colModel:[
   		{name:'active',index:'active', width:20,search: false},
   		{name:'id',index:'id', width:55,search: false},
   		{name:'name',index:'name', width:200,editable:true},
                {name:'INN',index:'INN', width:100,editable:true},
                {name:'KPP',index:'KPP', width:100,editable:true},
                {name:'bayer',index:'bayer', width:50,editable:true,formatter: 'checkbox',edittype: 'checkbox', editoptions: {value: 'Yes:No'},search: false},
                {name:'supplier',index:'supplier', width:50,editable:true,formatter: 'checkbox',edittype: 'checkbox', editoptions: {value: 'Yes:No'},search: false},
                {name:'dog',index:'dog', width:50,editable:true,formatter: 'checkbox',edittype: 'checkbox', editoptions: {value: 'Yes:No'},search: false},
                {name:'ERPCode',index:'ERPCode', width:100,editable:true,search: false},
   		{name:'comment',index:'comment', width:200,editable:true},
		{name:'myac', width:80, fixed:true, sortable:false, resize:false, formatter:'actions',formatoptions:{keys:true},search: false}
   	],
	autowidth: true,		
   	rowNum:20,	
   	rowList:[20,40,60],
   	pager: '#pager2',
   	sortname: 'id',
	scroll:1,
        viewrecords: true,
        sortorder: "asc",
        editurl:"controller/server/libre_knt.php?org_status=edit",
        caption:"Справочник контрагентов",        
onSelectRow: function(ids) { 
    
$("#list4").css('visibility','hidden');
$("#uploadButton").css('visibility','hidden');
//$("#list3").html("");
jQuery("#list3").jqGrid('setGridParam',{url:"controller/server/getcontrakts.php?idknt="+ids});
jQuery("#list3").jqGrid('setGridParam',{editurl:"controller/server/getcontrakts.php?idknt="+ids});
jQuery("#list3").jqGrid({
   	url:'controller/server/getcontrakts.php?idknt='+ids,
	datatype: "json",
   	colNames:[' ','Id','Номер','Название','Начало','Конец','Рабочий','Комментарий','Действия'],
   	colModel:[
   		{name:'active',index:'active', width:20},
   		{name:'id',index:'id', width:55},
                {name:'num',index:'num', width:50,editable:true},
   		{name:'name',index:'name', width:100,editable:true},
                {name:'datestart',index:'datestart', width:100,editable:true,editoptions:
                        {
                                dataInit:function(el){
                                    $(el).datepicker({
                                        format: 'dd.mm.yyyy hh:ii:ss',
                                        weekStart: 1,
                                        days: ["Вс","По","Вт","Ср","Чт","Пт","Сб"],
                                        months: ["Январь","Февраль","Март","Апрель","Мая","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"]
                                        });
                                    },
			},
                 },
                {name:'dateend',index:'dateend', width:100,editable:true,editoptions:
                        {
                                dataInit:function(el){
                                    $(el).datepicker({
                                        format: 'dd.mm.yyyy hh:ii:ss',
                                        weekStart: 1,
                                        days: ["Вс","По","Вт","Ср","Чт","Пт","Сб"],
                                        months: ["Январь","Февраль","Март","Апрель","Мая","Июнь","Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь"]
                                        });
                                    },
			},                    },
                {name:'work',index:'work', width:50,editable:true,formatter: 'checkbox',edittype: 'checkbox', editoptions: {value: 'Yes:No'}},
                {name:'comment',index:'comment', width:200,editable:true},
		{name:'myac', width:80, fixed:true, sortable:false, resize:false, formatter:'actions',formatoptions:{keys:true},search: false}
   	],
        
	autowidth: true,		
   	rowNum:10,	
   	rowList:[10,20,30],
   	pager: '#pager3',
   	sortname: 'id',
	scroll:1,
    viewrecords: true,
    sortorder: "asc",
    editurl:'controller/server/getcontrakts.php?idknt='+ids,
    caption:"Заключенные договора",
    onSelectRow: function(ids) {    
                    upload_me.setData({'contractid':ids});	
                    $("#list4").css('visibility','visible');
                    $("#uploadButton").css('visibility','visible');
                    //$("#loadfiles").html('<div id="uploadButton" class="button">Загрузить</div>');
                    jQuery("#list4").jqGrid('setGridParam',{url:"controller/server/getfilescontrakts.php?idcontract="+ids});
                    jQuery("#list4").jqGrid('setGridParam',{editurl:"controller/server/getfilescontrakts.php?idcontract="+ids});
                    jQuery("#list4").jqGrid({
                        url:'controller/server/getfilescontrakts.php?idcontract='+ids,
                        datatype: "json",
                        colNames:['Id','Имя файла','Действия'],
                        colModel:[
                            {name:'id',index:'id', width:55},
                            {name:'filename',index:'filename', width:100},
                            {name:'myac',  width:80, fixed:true, sortable:false, resize:false, formatter:'actions',formatoptions:{keys:true},search: false}
   	],
        	autowidth: true,		
                rowNum:10,	
                rowList:[10,20,30],
                pager: '#pager4',
                sortname: 'id',
                scroll:1,
                viewrecords: true,
                sortorder: "asc",
                editurl:'controller/server/getfilescontrakts.php?idcontract='+ids,
                caption:"Прикрепленные файлы"
                }).trigger('reloadGrid');	
                jQuery("#list4").jqGrid('navGrid','#pager3',{edit:false,add:false,del:false,search:false});
    }    
}).trigger('reloadGrid');	
jQuery("#list3").jqGrid('navGrid','#pager3',{edit:true,add:true,del:false,search:false},{},addOptions2,{},{multipleSearch:false},{closeOnEscape:true} );
}

});

var addOptions={
    top: 0, left: 0, width: 500,
    addCaption: "Добавить запись",
    bSubmit: "Сохранить",
    bCancel: "Отменить", 
    closeAfterAdd: true,
    closeOnEscape: true
};
var addOptions2={
    top: 0, left: 0, width: 500,height:350,
    addCaption: "Добавить запись",
    bSubmit: "Сохранить",
    bCancel: "Отменить", 
    closeAfterAdd: true,
    closeOnEscape: true
};

jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:true,del:false,search:false},{},addOptions,{},{multipleSearch:false},{closeOnEscape:true} );
jQuery("#list2").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});





