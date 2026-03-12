{if $user_mode==1}
<div class="hero-unit">
Организация:
<select name="sel_orgid" id="sel_orgid">
{section name=i loop=$ArrayOrg}
	<option value={$ArrayOrg[i]["id"]}{if $reg_orgid==$ArrayOrg[i]["id"]} selected{/if}>{$ArrayOrg[i]["name"]}</option>
{/section}            
</select>    
<input id="test_ping" class="btn btn-primary" name="test_ping" value="Проверить">
<div class="row-fluid">
  <div class="span12" id="ping_add">
  </div> 
</div>
</div>
<script type="text/javascript" src="controller/client/js/ping.js"></script>
{else}
<div class="alert alert-error">Не достаточно прав!</div>
{/if}