{if $tasks_array|@count > 0 }
<script type="text/javascript" src="controller/client/js/tasks_list.js"></script>
<div class="well">
	{section name=i loop=$tasks_array}
	<li>{$tasks_array[i]}</li>
	{/section}
        <div id="task_info"></div>
</div>
{/if}