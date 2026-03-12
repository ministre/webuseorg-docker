$("#test_ping").click(function(){
  $("#ping_add").html("<img src=images/loading.gif>");    
  $("#ping_add").load('controller/server/ping.php?orgid='+$("#sel_orgid :selected").val(), function() {
    });
});