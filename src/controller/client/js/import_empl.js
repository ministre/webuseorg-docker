$("#bexp").click(function(){
    $.get("controller/server/import_empl.php", function(data){
            $("#infoblock").html(data);      
        });              
       return false;
    });