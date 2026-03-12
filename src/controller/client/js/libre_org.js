jQuery("#list2").jqGrid({
   	url:'controller/server/libre_org.php?org_status=list',
	datatype: "json",
   	colNames:[' ','Id','Имя организации','Действия'],
   	colModel:[
   		{name:'active',index:'active', width:20},
   		{name:'id',index:'id', width:55},
   		{name:'name',index:'name', width:400,editable:true},
		{name: 'myac', width:80, fixed:true, sortable:false, resize:false, formatter:'actions',formatoptions:{keys:true}}
   	],
        
        onSelectRow: function(ids) {		
            $("#photoid").load("controller/server/getphotoorg.php?eqid="+ids);
	    $("#geteqid").val(ids);
	    upload_me.setData({'geteqid':ids});	
        },        
        
	autowidth: true,		
   	rowNum:10,	
   	rowList:[10,20,30],
   	pager: '#pager2',
   	sortname: 'id',
	scroll:1,
    viewrecords: true,
    sortorder: "asc",
    editurl:"controller/server/libre_org.php?org_status=edit",
    caption:"Справочник организаций"
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


var btnUpload=$('#uploadButton');
 var upload_me=new AjaxUpload(btnUpload, {
     action : 'controller/server/uploadimageorg.php',
     name : 'myfile',
     onComplete: function(file, response){
       if(response=="error"){$('#status').text='ошибка..';} else {
        $("#photoid").html('<img src=images/maps/'+response+'  width=100%>');		     
     };       
   }
 });
