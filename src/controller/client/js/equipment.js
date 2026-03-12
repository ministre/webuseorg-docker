jQuery.extend(jQuery.jgrid.defaults, {ajaxSelectOptions: { cache: false }});

function LoadTable()
{
 jQuery("#tbl_equpment").jqGrid({
   	url:'controller/server/equipment.php?sorgider='+$("#orgs :selected").val(),
	datatype: "json",
   	colNames:[' ','Id','Помещение','Номенклатура','Группа','Производитель','Имя по бухгалтерии',
                  'Серийник','Инвентарник','Штрихкод','Организация','Человек','Оприходовано','Стоимость','Тек. стоимость','ОС','Списано','Карта','Комментарий','Ремонт',''],
   	colModel:[
   		{name:'active',index:'active', width:20, frozen : true,search: false},
   		{name:'equipment.id',index:'equipment.id', width:55, frozen : true,search: false},
                {name:'placesid',index:'placesid', width:155,stype:'select',                
                     searchoptions:{dataUrl: 'controller/server/getlistplaces.php?addnone=true&orgid='+$("#orgs :selected").val()}},                
                {name:'nomename',index:'getvendorandgroup.nomename', width:155},                
                {name:'getvendorandgroup.groupname',index:'getvendorandgroup.grnomeid', width:100,stype:'select',                
                     searchoptions:{dataUrl: 'controller/server/getlistgroupname.php?addnone=true'}},
                {name:'getvendorandgroup.vendorname',index:'getvendorandgroup.vendorname', width:60},
                {name:'buhname',index:'buhname', width:155,editable:true},
                {name:'sernum',index:'sernum', width:100,editable:true},
                {name:'invnum',index:'invnum', width:100,editable:true},
                {name:'shtrihkod',index:'shtrihkod', width:100,editable:true},
                {name:'org.name',index:'org.name', width:155},
                {name:'users.login',index:'users.login', width:100},                
                {name:'datepost',index:'datepost', width:80},
                {name:'cost',index:'cost', width:55,editable:true},
                {name:'currentcost',index:'currentcost', width:55,editable:true},
                {name:'os',index:'os', width:35,editable:true,formatter: 'checkbox',edittype: 'checkbox', editoptions: {value: 'Yes:No'},search: false},
                {name:'equipment.mode',index:'equipment.mode', width:55,editable:true,formatter: 'checkbox',edittype: 'checkbox', editoptions: {value: 'Yes:No'},search: false},
                {name:'eqmapyet',index:'eqmapyet', width:55,editable:true,formatter: 'checkbox',edittype: 'checkbox', editoptions: {value: 'Yes:No'},search: false},                
   		{name:'equipment.comment',index:'equipment.comment', width:200,editable:true,edittype:"textarea", editoptions:{rows:"3",cols:"10"},search: false},
                {name:'eqrepair',hidden:true,index:'eqrepair',width:35,editable:true,formatter: 'checkbox',edittype: 'checkbox', editoptions: {value: 'Yes:No'},search: false},
		{name:'myac', width:80, fixed:true, sortable:false, resize:false, formatter:'actions',formatoptions:{keys:true},search: false}
   	],
        onSelectRow: function(ids) {
               // $( "#infobox" ).draggable();
                $("#photoid").load("controller/server/getphoto.php?eqid="+ids);
                //$("#moveid").load("controller/server/getmoveinfo.php?eqid="+ids);
                jQuery("#tbl_move").jqGrid('setGridParam',{url:"controller/server/getmoveinfo.php?eqid="+ids});
                jQuery("#tbl_move").jqGrid({
                     url:'controller/server/getmoveinfo.php?eqid='+ids,
                     datatype: "json",
                     colNames:['Id','Дата','Организация','Помещение','Человек','Организация','Помещение','Человек','Комментарий',''],
                     colModel:[
                     	{name:'id',index:'id', width:25},
                        {name:'dt',index:'dt', width:95},
                     	{name:'orgname1',index:'orgname1', width:120},
                        {name:'place1',index:'place1', width:80},
                        {name:'user1',index:'user1', width:90},
                     	{name:'orgname2',index:'orgname2', width:120},
                        {name:'place2',index:'place2', width:80},
                        {name:'user2',index:'user2', width:90},                        
                     	{name:'comment',index:'comment', width:200,editable:true},
                     	{name: 'myac', width:60, fixed:true, sortable:false, resize:false, formatter:'actions',formatoptions:{keys:true}}
                     ],
                     autowidth: true,	
                     pager: '#pager2',
                     sortname: 'dt',
                     scroll:1,
                     shrinkToFit: true,        
                     viewrecords: true,
                     height: 200,
                     sortorder: "desc",
                     editurl:"controller/server/getmoveinfo.php?eqid="+ids,
                     caption:"История перемещений"
                     }).trigger('reloadGrid');	
              jQuery("#tbl_move").jqGrid('destroyGroupHeader');
              jQuery("#tbl_move").jqGrid('setGroupHeaders', {
              useColSpanStyle: true, 
              groupHeaders:[
              	{startColumnName: 'orgname1', numberOfColumns: 3, titleText: 'Откуда'},
              	{startColumnName: 'orgname2', numberOfColumns: 3, titleText: 'Куда'}
                ]	
              });              
	},
subGridRowExpanded: function(subgrid_id, row_id) {
		// we pass two parameters
		// subgrid_id is a id of the div tag created whitin a table data
		// the id of this elemenet is a combination of the "sg_" + id of the row
		// the row_id is the id of the row
		// If we wan to pass additinal parameters to the url we can use
		// a method getRowData(row_id) - which returns associative array in type name-value
		// here we can easy construct the flowing                
		var subgrid_table_id, pager_id;
		subgrid_table_id = subgrid_id+"_t";
		pager_id = "p_"+subgrid_table_id;
		$("#"+subgrid_id).html("<table border=1 id='"+subgrid_table_id+"' class='scroll'></table><div id='"+pager_id+"' class='scroll'></div>");
                //alert(subgrid_id+"!"+subgrid_table_id+"!"+pager_id);
		jQuery("#"+subgrid_table_id).jqGrid({
			url:"controller/server/paramlist.php?eqid="+row_id,
			datatype: "json",
			colNames: ['Id','Наименование','Параметр',''],
			colModel: [
				{name:"id",index:"num",width:80,key:true},
				{name:"name",index:"item",width:130},
				{name:"param",index:"qty",width:130,editable:true},
                                {name: 'myac', width:80, fixed:true, sortable:false, resize:false, formatter:'actions',formatoptions:{keys:true}}
			],
                        editurl:"controller/server/paramlist.php?eqid="+row_id,
		   	pager: pager_id,
		   	sortname: 'name',
		    sortorder: "asc",
                    scroll:1,
		    height: 'auto'
		});
		//jQuery("#"+subgrid_table_id).jqGrid('navGrid',"#"+pager_id,{edit:true,add:false,del:false,search:false})
	},
	subGridRowColapsed: function(subgrid_id, row_id) {
		// this function is called before removing the data
		var subgrid_table_id;
		subgrid_table_id = subgrid_id+"_t";
		jQuery("#"+subgrid_table_id).remove();
	},        
    subGrid: true,
    multiselect: true,
    height: 300,
    autowidth : true,
    shrinkToFit: false,                
    pager: '#pg_nav',
    sortname: 'equipment.id',
    rowNum:1000,
    //loadonce: true,
    scroll:1,
    viewrecords: true,
    sortorder: "asc",
    editurl:"controller/server/equipment.php",
    caption:"Оргтехника"
});

jQuery("#tbl_equpment").jqGrid('filterToolbar',{stringResult: true,searchOnEnter : false});
jQuery("#tbl_equpment").jqGrid('bindKeys',''); 
jQuery("#tbl_equpment").jqGrid('navGrid','#pg_nav',{edit:false,add:false,del:false,search:false});
jQuery("#tbl_equpment").jqGrid('setFrozenColumns');

jQuery("#tbl_equpment").jqGrid('navButtonAdd','#pg_nav',{
    caption: "Колонки",
    title: "Выбор колонок",
    onClickButton : function (){
        jQuery("#tbl_equpment").jqGrid('columnChooser');
    }
});
jQuery("#tbl_equpment").jqGrid('navButtonAdd','#pg_nav',{caption:"Добавить",                              
	onClickButton:function(){
            $("#pg_add_edit" ).dialog( "destroy" );
            $("#pg_add_edit").dialog({autoOpen: false,height: 480,width: 780,modal:true,title: "Добавление имущества" });
            $("#pg_add_edit" ).dialog( "open" );
            $("#pg_add_edit").load("controller/client/equipment.php?step=add&id=");					
	} 
});
jQuery("#tbl_equpment").jqGrid('navButtonAdd','#pg_nav',{caption:"Редактировать",
	onClickButton:function(){
		var gsr = jQuery("#tbl_equpment").jqGrid('getGridParam','selrow');
		if(gsr){
                          $("#pg_add_edit" ).dialog( "destroy" );
                          $("#pg_add_edit").dialog({autoOpen: false,height: 520,width: 780,modal:true,title: "Редактирование имущества" });
                          $("#pg_add_edit" ).dialog( "open" );                     
			  $("#pg_add_edit").load("controller/client/equipment.php?step=edit&id="+gsr);
		} else {
			alert("Сначала выберите строку!")
		}							
	} 
});
jQuery("#tbl_equpment").jqGrid('navButtonAdd','#pg_nav',{caption:"Перемещение",                              
	onClickButton:function(){
              var gsr = jQuery("#tbl_equpment").jqGrid('getGridParam','selrow');
		if(gsr){                     
                       $("#pg_add_edit" ).dialog( "destroy" );
                       $("#pg_add_edit").dialog({autoOpen: false,height: 380,width: 620,modal:true,title: "Перемещение имущества" });
                       $("#pg_add_edit" ).dialog( "open" );                                   
                       $("#pg_add_edit").load("controller/client/move.php?step=move&id="+gsr);
                       } else {
			alert("Сначала выберите строку!")
		}							
	} 	
});
jQuery("#tbl_equpment").jqGrid('navButtonAdd','#pg_nav',{caption:"Ремонт",                              
	onClickButton:function(){
        var id = jQuery("#tbl_equpment").jqGrid('getGridParam','selrow');
	if (id)	{
		var ret = jQuery("#tbl_equpment").jqGrid('getRowData',id);
                if (ret.eqrepair=="Yes") {alert ("ТМЦ уже находится в ремонте!");} else {
                       $("#pg_add_edit" ).dialog( "destroy" );
                       $("#pg_add_edit").dialog({autoOpen: false,height: 380,width: 620,modal:true,title: "Ремонт имущества" });
                       $("#pg_add_edit" ).dialog( "open" );                                   
                       $("#pg_add_edit").load("controller/client/repair.php?step=add&eqid="+id);
                    
                };
	} else {alert("Сначала выберите строку!");}	} 
});

jQuery("#tbl_equpment").jqGrid('navButtonAdd','#pg_nav',{caption:"Печать штрихкода",                              
	onClickButton:function(){
              var gsr = jQuery("#tbl_equpment").jqGrid('getGridParam','selrow');
		if(gsr){
                   //var id = jQuery("#tbl_equpment").jqGrid('getGridParam','selrow');
                   //var ret = jQuery("#tbl_equpment").jqGrid('getRowData',id);
                   //alert("id="+ret.id+" invdate="+ret.invdate+"...");
                var s;
                  s = jQuery("#tbl_equpment").jqGrid('getGridParam','selarrrow');
                  newWin=window.open('inc/ean13print.php?mass='+s,'printWindow'); 
                       } else {
			alert("Сначала выберите строку!")
		}							
	} 	
});

};
LoadTable();

    function GetListUsers(orgid,userid){
     $("#susers").load("controller/server/getlistusers.php?orgid="+orgid+"&userid="+userid);
    };
    function GetListPlaces(orgid,placesid){
       url="controller/server/getlistplaces.php?orgid="+orgid+"&placesid="+placesid;
       $("#splaces").load(url);
    };

    $("#orgs").click(function(){       
      $("#splaces").html="идет загрузка.."; // заглушка. Зачем?? каналы счас быстрые
      $("#susers").html="идет загрузка..";
      GetListPlaces($("#orgs :selected").val(),''); // перегружаем список помещений организации
      GetListUsers($("#orgs :selected").val(),'') // перегружаем пользователей организации
    });

$("#orgs").change(function(){
        //jQuery("#tbl_equpment").jqGrid('setRowData',0,{buhname:"sss"});
        //jQuery("#tbl_equpment").html="";
        jQuery("#tbl_equpment").GridUnload("#tbl_equpment");
        LoadTable();
        //jQuery("#tbl_equpment").jqGrid('setGridParam',{url:'controller/server/equipment.php?sorgider='+$("#orgs :selected").val()}).trigger('reloadGrid');        
	//alert("s");
       });

