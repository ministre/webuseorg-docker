
$('#myTab a:first').click(function (e) {
	jQuery("#list2").GridUnload("#list2");	
	ListEqByPlaces("#list2","pager2");
});

$('#myTab a:last').click(function (e) {
	jQuery("#list2").GridUnload("#list2");	
	ListEqByMat("#list2","pager2");
});

$('#myTab a:first').tab('show'); // Выбор первой вкладки


var btnUpload=$('#uploadButton');
 var upload_me=new AjaxUpload(btnUpload, {
     action : 'controller/server/uploadimage.php',
     name : 'myfile',
     onComplete: function(file, response){
       if(response=="error"){$('#status').text='ошибка..';} else {
        $("#photoid").html('<img src=images/photo/'+response+'  width=200>');		     
     };       
   }
 });

ListEqByPlaces("#list2","pager2");
//ListEqByMat("#list2","pager2");

