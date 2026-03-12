{if $user_mode==1}
<div class="hero-unit">
<table id="list2"></table>
<div id="pager2"></div>
<div id="pg_add_edit" name="pg_add_edit"></div>
<script type="text/javascript" src="controller/client/js/news.js"></script>
</div>
{else}
<div class="alert alert-error">Не достаточно прав!</div>
{/if}