{if $user_mode==1}
<div class="hero-unit">
<div id="infoblock"></div>
<button name=bexp id=bexp>Создать файл</button>
<script type="text/javascript" src="controller/client/js/export_xml.js"></script>
</div>
{else}
<div class="alert alert-error">Не достаточно прав!</div>
{/if}