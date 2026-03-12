$().ready(function () {
  var url = 'http://xn--90acbu5aj5f.xn--p1ai/files/curverweborg.php';
  $.get(url, function (data) {
    $("#verc").html("Версия на сайте: "+data);
  });
});

$("#form_cfg_theme_sl").click(function(){
       $("#form_cfg_theme").val($("#form_cfg_theme_sl option:selected").html());       
    });