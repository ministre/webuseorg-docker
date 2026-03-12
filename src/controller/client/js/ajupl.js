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
