$("#bexp").click(function(){
    $.get("controller/server/import_knt.php", function(data){
            $("#infoblock").html(data);      
        });              
       return false;
    });