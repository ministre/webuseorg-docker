{if $user_mode==1}
<script type="text/javascript" src="jquery/ajaxupload.js"></script>    
<div class="row-fluid">
  <div class="span12">
      <table id="list2"></table>
        <div id="pager2"></div>
  </div>
</div>    
<div class="row-fluid">
  <div class="span8">
        <table id="list3"></table>
        <div id="pager3"></div>
  </div>
  <div class="span3">
        <table id="list4" style="visibility:hidden"></table>
        <div id="pager4"></div>
  </div>    
  <div class="span1">
      <br><br>
            <div id="uploadButton" class="btn btn-primary button" style="visibility:hidden">Загрузить</div>
            <div id="status"></div>
  </div>    
    
</div>        
    <script type="text/javascript" src="controller/client/js/libre_knt.js"></script>
   <script type="text/javascript" src="templates/{$theme}/js/libre_knt_mod.js"></script>
{else}
<div class="alert alert-error">Не достаточно прав!</div>
{/if}