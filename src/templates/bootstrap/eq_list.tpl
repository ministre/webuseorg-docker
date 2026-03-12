{if $user_mode!=""}
<script type="text/javascript" src="jquery/ajaxupload.js"></script>
        <div class="row-fluid">
        <div class="span12" id=prof_user>                      
        </div>
        </div>
    <ul class="nav nav-tabs" id="myTab">
      <li><a href="#plc" data-toggle="tab">Помещение</a></li>
      <li><a href="#mto" data-toggle="tab">Ответственость</a></li>
    </ul>
    <div class="row-fluid">
        <div class="span2">          
                <div id="photoid" name="photoid" align="center"><img src=images/noimage.jpg width=200></div>
                <div id="uploadButton" class="button" {if $user_mode!="1"}style="visibility:hidden"{/if}>Загрузить</div>
                <input name=geteqid TYPE='hidden' id=geteqid value="">                      
        </div>
        <div class="span10">
            <table id="list2"></table><div id="pager2"></div>
        </div>            
    </div>
    <table id="tbl_move"></table><div id="pager4"></div>
    <script type="text/javascript" src="controller/client/js/ajupl.js"></script>    
    <script type="text/javascript" src="controller/client/js/eq_list.js"></script>
    <script type="text/javascript" src="templates/{$theme}/js/eq_list_mod.js"></script>
{else}
<div class="alert alert-error">Не достаточно прав!</div>
{/if}