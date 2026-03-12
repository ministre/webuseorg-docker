{if $user_mode!=""}
<div class="hero-unit">
<table id="list2"></table>
<div id="pager2"></div>
<input type="BUTTON" id="addtask" value="Добавить" />
<input type="BUTTON" id="edittask" value="Редактировать" />
<div id="add_edit"></div>
<script type="text/javascript" src="controller/client/js/libre_tasks.js"></script>
</div>
{else}
<div class="alert alert-error">Не достаточно прав!</div>
{/if}