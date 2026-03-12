var btnUpload=$('#uploadButton');
 var upload_me=new AjaxUpload(btnUpload, {
     action : 'controller/server/uploadanyfiles.php',
     name : 'myfile',
     onComplete: function(file, response){
       if(response!=""){
           //$('#status').text='ошибка..';           
           alert("Ошибка загрузки:"+response);
       } else {jQuery("#list4").jqGrid().trigger('reloadGrid');};
   }
 });