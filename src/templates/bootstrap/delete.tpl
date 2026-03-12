{if $user_mode==1}
<div class="hero-unit">
<div id="infoblock"></div>
<button name=bdel id=bdel>Начать удаление</button>
<script type="text/javascript" src="controller/client/js/delete.js"></script>
</div>
{else}
<div class="alert alert-error">Не достаточно прав!</div>
{/if}