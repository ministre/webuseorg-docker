{if $err|@count > 0 }
<div class="alert alert-error">
	<ul>
	{section name=i loop=$err}
	<li>{$err[i]}</li>
	{/section}
	</ul>
</div>
{/if}