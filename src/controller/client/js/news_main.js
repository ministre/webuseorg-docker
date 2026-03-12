var
 pznews=1;

$("#newsprev").click(function() {
    if (pznews>1) {
        pznews--;
        url="controller/server/getnews.php?num="+pznews;
        $("#newslist").load(url);    
    };
});

$("#newsnext").click(function() {
    pznews++;
    url="controller/server/getnews.php?num="+pznews;
    $prev=$("#newsnext").html();
    $("#newslist").load(url, function(responseText, textStatus, XMLHttpRequest) {
        if (responseText=='error') {
            pznews--;
            url="controller/server/getnews.php?num="+pznews;
            $("#newslist").load(url);            
            };
    });    
});

url="controller/server/getnews.php?num=1";
$("#newslist").load(url);    
