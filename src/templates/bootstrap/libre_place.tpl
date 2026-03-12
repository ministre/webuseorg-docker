{if $user_mode==1}
<div class="hero-unit">
Организация:
<select name="sel_orgid" id="sel_orgid">
{section name=i loop=$ArrayOrg}
	<option value={$ArrayOrg[i]["id"]}{if $reg_orgid==$ArrayOrg[i]["id"]} selected{/if}>{$ArrayOrg[i]["name"]}</option>
{/section}            
</select>    
<table id="list2"></table>
<div id="pager2"></div>

<table id="list10_d"></table>
<div id="pager10_d"></div>
<div id="add_edit"></div>
<script type="text/javascript" src="controller/client/js/libre_place.js"></script>
</div>
{else}
<div class="alert alert-error">Не достаточно прав!</div>
{/if}