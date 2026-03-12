{if $user_mode==1}
<div class="hero-unit">
    <div id="infoblock">
        1) Загружаемый файл должен иметь имя counterpart.xml<br>
        2) Загружаемый файл должен лежать в корне сайта<br>
        3) Если в талице knt есть контрагент с ERPCode=code, тогда происходит обновление
        4) Формат XML файла должен иметь следующую структуру:<br>            
<pre>        
&lt;?xml version="1.0" encoding="UTF-8" ?> 
 &lt;export>
  &lt;counterpart>
    &lt;name>ЭКМА-КОНФИ ООО&lt;/name> 
    &lt;fullname>ООО "ЭКМА-КОНФИ"&lt;/fullname> 
    &lt;code>000000509&lt;/code> 
    &lt;inn>6662007753&lt;/inn> 
    &lt;kpp>666201001&lt;/kpp> 
    &lt;buyer>Нет&lt;/buyer> 
    &lt;supplier>Да&lt;/supplier> 
  &lt;/counterpart>
  &lt;counterpart>
    ...
  &lt;/counterpart>
 &lt;/export>
</pre>                        
    </div>
    <button name=bexp id=bexp>Загрузить</button>
</div>
<script type="text/javascript" src="controller/client/js/import_knt.js"></script>
{else}
<div class="alert alert-error">Не достаточно прав!</div>
{/if}