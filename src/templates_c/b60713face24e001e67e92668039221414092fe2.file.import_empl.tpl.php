<?php /* Smarty version Smarty-3.1.11, created on 2013-03-19 13:17:07
         compiled from "templates/bootstrap/import_empl.tpl" */ ?>
<?php /*%%SmartyHeaderCode:159978972451482a927c2ff9-37673930%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b60713face24e001e67e92668039221414092fe2' => 
    array (
      0 => 'templates/bootstrap/import_empl.tpl',
      1 => 1363684138,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '159978972451482a927c2ff9-37673930',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51482a92839ac0_20981760',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51482a92839ac0_20981760')) {function content_51482a92839ac0_20981760($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="hero-unit">
    <div id="infoblock">
        1) Загружаемый файл должен иметь имя employees.xml<br>
        2) Загружаемый файл должен лежать в корне сайта<br>
        3) Если в талице users есть контрагент с ERPCode=code, тогда происходит обновление, иначе добавляется учетка со случайным паролем, и логином построенным на основе fio.<br>
        4) Включенными остаются только те учетки, которые есть в файле. У остальных проставляется active=0<br>
        4) Формат XML файла должен иметь следующую структуру:<br>            
<pre>        
&lt;?xml version="1.0" encoding="UTF-8" ?<?php ?>> 
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
<?php }else{ ?>
<div class="alert alert-error">Не достаточно прав!</div>
<?php }?><?php }} ?>