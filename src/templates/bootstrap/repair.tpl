{if $user_mode==1}
<div class="hero-unit">
<table id="list_rep"></table>
<div id="pager_rep"></div>
<script type="text/javascript" src="controller/client/js/repair.js"></script>
</div>
{else}
<div class="alert alert-error">Не достаточно прав!</div>
{/if}