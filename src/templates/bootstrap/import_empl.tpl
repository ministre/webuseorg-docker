{if $user_mode==1}
<div class="hero-unit">
    <div id="infoblock">
        1) Загружаемый файл должен иметь имя employees.xml<br>
        2) Загружаемый файл должен лежать в корне сайта<br>
        3) Если в талице users есть контрагент с ERPCode=code, тогда происходит обновление, иначе добавляется учетка со случайным паролем, и логином построенным на основе fio.<br>
        4) Включенными остаются только те учетки, которые есть в файле. У остальных проставляется active=0<br>
        4) Формат XML файла должен иметь следующую структуру:<br>            
<pre>        
&lt;?xml version="1.0" encoding="UTF-8" ?> 
 &lt;export>
  &lt;employees>
    &lt;faza>В командировке&lt;/faza> 
    &lt;fio>Пупкин Василий Иванович&lt;/fio> 
    &lt;code>000000509&lt;/code> 
    &lt;enddate>31.03.2013 0:00:00&lt;/enddate> 
    &lt;post>Купажист&lt;/post> 
  &lt;/employees>
  &lt;employees>
    ...
  &lt;/employees>
 &lt;/export>
</pre>                        
    </div>
    <button name=bexp id=bexp>Загрузить</button>
</div>
<script type="text/javascript" src="controller/client/js/import_empl.js"></script>
{else}
<div class="alert alert-error">Не достаточно прав!</div>
{/if}