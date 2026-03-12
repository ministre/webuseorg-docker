jQuery("#list2").jqGrid({
   	url:'controller/server/libre_users.php?org_status=list',
	datatype: "json",
   	colNames:[' ','Id','Организация','Логин','Пароль','E-mail','Админ',''],
   	colModel:[
   		{name:'active',index:'active', width:20,search: false},
   		{name:'users.id',index:'users.id', width:55},
   		{name:'org.id',index:'org.id', width:100},
   		{name:'login',index:'login', width:100,editable:true},
   		{name:'pass',index:'pass', width:100,editable:true,edittype:"password",search: false},
   		{name:'email',index:'email', width:100,editable:true},		
   		{name:'mode',index:'mode', width:45,editable:true,edittype:"checkbox",editoptions: {value:"Да:Нет"},search: false},
		{name: 'myac', width:55, fixed:true, sortable:false, resize:false, formatter:'actions',formatoptions:{keys:true},search: false}
   	],
	autowidth: true,		
	height: 200,
	scroll:1,
   	rowNum:10,	
   	rowList:[10,20,30],
   	pager: '#pager2',
   	sortname: 'id',
        multiselect: true,
    viewrecords: true,
    sortorder: "asc",
    editurl:"controller/server/libre_users.php?org_status=edit",
    caption:"Справочник пользователей"
});
jQuery("#list2").jqGrid('navGrid','#pager2',{edit:false,add:false,del:false,search:false});
jQuery("#list2").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});

jQuery("#list2").jqGrid('navButtonAdd','#pager2',{caption:"Добавить",                              
	onClickButton:function(){
            $("#add_edit" ).dialog( "destroy" );
            $("#add_edit").dialog({autoOpen: false,height: 340,width: 550,modal:true,title: "Добавление пользователя" });
            $("#add_edit" ).dialog( "open" );
            $("#add_edit").load("controller/client/user_add_edit.php?step=add");	
	} 
});        
jQuery("#list2").jqGrid('navButtonAdd','#pager2',{caption:"Редактировать",
	onClickButton:function(){
		var gsr = jQuery("#list2").jqGrid('getGridParam','selrow');
		if(gsr){
                          $("#add_edit" ).dialog( "destroy" );
                          $("#add_edit").dialog({autoOpen: false,height: 340,width: 550,modal:true,title: "Редактирование пользователя" });
                          $("#add_edit" ).dialog( "open" );                     
       $("#add_edit").load("controller/client/user_add_edit.php?step=edit&id="+gsr);
		} else {
			alert("Сначала выберите строку!")
		}							
	} 
});
jQuery("#list2").jqGrid('navButtonAdd','#pager2',{caption:"Профиль",
	onClickButton:function(){
		var gsr = jQuery("#list2").jqGrid('getGridParam','selrow');
		if(gsr){
                          $("#add_edit" ).dialog( "destroy" );
                          $("#add_edit").dialog({autoOpen: false,height: 340,width: 550,modal:true,title: "Редактирование профиля" });
                          $("#add_edit" ).dialog( "open" );                     
       $("#add_edit").load("controller/client/profile_add_edit.php?userid="+gsr);
		} else {
			alert("Сначала выберите строку!")
		}							
	} 
});
jQuery("#list2").jqGrid('navButtonAdd','#pager2',{caption:"Печать стикера",
	onClickButton:function(){
              var gsr = jQuery("#list2").jqGrid('getGridParam','selrow');
		if(gsr){
                var s;
                  s = jQuery("#list2").jqGrid('getGridParam','selarrrow');
                  newWin=window.open('inc/stikerprint.php?mass='+s,'printWindow'); 
                       } else {
			alert("Сначала выберите строку!")
		}							
	} 	
});
