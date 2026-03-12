{if $user_mode!=""}
<div class="hero-unit">
    <div class="row-fluid">
        <div class="span12">   
          <table id="list2"></table>
          <div id="pager2"></div>            
          <div id=info_contract>
          </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="controller/client/js/contract_control.js"></script>    
{else}
<div class="alert alert-error">Не достаточно прав!</div>
{/if}