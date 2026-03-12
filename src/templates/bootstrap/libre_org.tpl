{if $user_mode==1}
<script type="text/javascript" src="jquery/ajaxupload.js"></script>    
<div class="container-fluid">
<table id="list2"></table>
<div id="pager2"></div>
</div>
<div class="container-fluid">
<h2>План помещения</h2>    
  <div class="row-fluid">
    <div class="span2">
      <div id="uploadButton" class="button btn btn-primary">Загрузить*</div><br>
      *только формат PNG
    </div>
    <div class="span10">
                <div id="photoid" name="photoid" align="center"><img class="img-rounded" src=images/noimage.jpg width=100%></div>                
                <input name=geteqid TYPE='hidden' id=geteqid value="">                      
    </div>
  </div>
</div>    
<script type="text/javascript" src="controller/client/js/libre_org.js"></script>
{else}
<div class="alert alert-error">Не достаточно прав!</div>
{/if}