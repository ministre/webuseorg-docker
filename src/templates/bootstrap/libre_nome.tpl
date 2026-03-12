{if $user_mode==1}
<div class="hero-unit">
<table id="list2"></table>
<div id="pager2"></div>
<div id="add_edit"></div>
<script type="text/javascript" src="controller/client/js/libre_nome.js"></script>
</div>
{else}
<div class="alert alert-error">Не достаточно прав!</div>
{/if}