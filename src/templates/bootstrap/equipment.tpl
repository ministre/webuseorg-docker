{if $user_mode==1}
<div class="hero-unit">
  <div class="row-fluid">
     <select name="orgs" id="orgs">
     {section name=i loop=$ArrayOrg}
       <option value={$ArrayOrg[i]["id"]}{if $reg_orgid==$ArrayOrg[i]["id"]} selected{/if}>{$ArrayOrg[i]["name"]}</option>
     {/section}
     </select>    
   <table id="tbl_equpment"></table>
   <div id="pg_nav"></div>
   <div id="pg_add_edit" name="pg_add_edit"></div>
   <script type="text/javascript" src="controller/client/js/equipment.js"></script>
</div>
 <div class="row-fluid">
 <div class="span2">
  <div id=photoid name=photoid></div>
 </div>
 <div class="span10">
  <table id="tbl_move"></table><div id="mv_nav"></div>
 </div>
 </div>
</div>
{else}
<div class="alert alert-error">Не достаточно прав!</div>
{/if}