  GetGrid();
  GetSubGrid();

function GetGrid()
{
jQuery("#list2").jqGrid({
   	url:'controller/server/libre_place.php?orgid='+$("#sel_orgid :selected").val(),
	datatype: "json",
   	colNames:[' ','Id','Наименование','Комментарий','Действия'],
   	colModel:[
   		{name:'active',index:'active', width:20},
   		{name:'id',index:'id', width:55},
   		{name:'name',index:'name', width:200,editable:true},
   		{name:'comment',index:'comment', width:200,editable:true},
		{name: 'myac', width:80, fixed:true, sortable:false, resize:false, formatter:'actions',formatoptions:{keys:true}}
   	],
	autowidth: true,			
   	rowNum:10,	   	
   	pager: '#pager2',
   	sortname: 'id',
	scroll:1,
	height: 140,
    viewrecords: true,
    sortorder: "asc",
    editurl:"controller/server/libre_place.php?orgid="+$("#sel_orgid :selected").val(),
    caption:"Помещения",
	onSelectRow: function(ids) {
                GetSubGrid();
		if(ids == null) {
			ids=0;
			if(jQuery("#list10_d").jqGrid('getGridParam','records') >0 )
			{
				jQuery("#list10_d").jqGrid('setGridParam',{url:"controller/server/libre_place_sub.php?placesid="+ids+"&orgid="+$("#sel_orgid :selected").val()});
				jQuery("#list10_d").jqGrid('setGridParam',{editurl:"controller/server/libre_place_sub.php?placesid="+ids+"&orgid="+$("#sel_orgid :selected").val()})
				.trigger('reloadGrid');				
			}
		} else {			
			jQuery("#list10_d").jqGrid('setGridParam',{url:"controller/server/libre_place_sub.php?placesid="+ids+"&orgid="+$("#sel_orgid :selected").val()});
			jQuery("#list10_d").jqGrid('setGridParam',{editurl:"controller/server/libre_place_sub.php?placesid="+ids+"&orgid="+$("#sel_orgid :selected").val()})
			.trigger('reloadGrid');			
		}
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
jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:true,del:false,search:false},{},addOptions,{},{multipleSearch:false},{closeOnEscape:true} );
};
function GetSubGrid()
{
var addOptions={
    top: 0, left: 0, width: 500,
    addCaption: "Добавить запись",
    bSubmit: "Сохранить",
    bCancel: "Отменить", 
    closeAfterAdd: true,
    closeOnEscape: true
};    
jQuery("#list10_d").jqGrid({
	height: 100,
	autowidth: true,				
   	url:'controller/server/libre_place_sub.php',
	datatype: "json",
   	colNames:['Id', 'Человек', 'Действия'],        
   	colModel:[
   		{name:'places_users.id',index:'places_users.id', width:55},
   		{name:'name',index:'name', width:200,editable:true,edittype:"select",editoptions:{
                    editrules: { required: true },
                    dataUrl: 'controller/server/getlistusers.php?orgid='+$("#sel_orgid :selected").val()
                    }},
		{name: 'myac', width:80, fixed:true, sortable:false, resize:false, formatter:'actions',formatoptions:{keys:true}}   		
   	],
   	rowNum:5,   	
   	pager: '#pager10_d',
   	sortname: 'places_users.id',
	scroll:1,
	viewrecords: true,
	sortorder: "asc",        
	caption:"Кто здесь сидит"
}).navGrid('#pager10_d',{add:true,edit:false,del:false,search:false},{},addOptions,{},{multipleSearch:false},{closeOnEscape:true});
};

$("#sel_orgid").click(function(){

  orgid=$("#sel_orgid :selected").val();
  orgid_txt=$("#sel_orgid :selected").text(); 
  
  GetGrid();
  GetSubGrid();
     
  jQuery("#list2").jqGrid('setCaption',"Помещения ("+orgid_txt+")");
  jQuery("#list2").jqGrid('setGridParam',{url:"controller/server/libre_place.php?orgid="+orgid}).trigger('reloadGrid');
  jQuery("#list2").jqGrid('setGridParam',{editurl:"controller/server/libre_place.php?orgid="+orgid}).trigger('reloadGrid');  

  jQuery("#list10_d").jqGrid('setGridParam',{url:"controller/server/libre_place_sub.php?orgid="+$("#sel_orgid :selected").val()});
  jQuery("#list10_d").jqGrid('setGridParam',{editurl:"controller/server/libre_place_sub.php?orgid="+$("#sel_orgid :selected").val()}).trigger('reloadGrid');
  
  jQuery("#list10_d").jqGrid('setGridParam',{
    colModel:[
   		{name:'places_users.id',index:'places_users.id', width:55},
   		{name:'name',index:'name', width:200,editable:true,edittype:"select",editoptions:{
                    editrules: { required: true },
                    dataUrl: 'controller/server/getlistusers.php?orgid='+$("#sel_orgid :selected").val()
                    }},
		{name: 'myac', width:80, fixed:true, sortable:false, resize:false, formatter:'actions',formatoptions:{keys:true}}   		
   	]
    }).trigger('reloadGrid');				  
  
});