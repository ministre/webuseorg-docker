<?php /* Smarty version Smarty-3.1.11, created on 2013-03-20 17:41:45
         compiled from "templates/bootstrap/import_knt.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20629782285142cf8fe34a68-74739564%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '29552edd767b7db4ebffae53b4e958c1962fdaf0' => 
    array (
      0 => 'templates/bootstrap/import_knt.tpl',
      1 => 1363683672,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20629782285142cf8fe34a68-74739564',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_5142cf8ff033f4_22103572',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5142cf8ff033f4_22103572')) {function content_5142cf8ff033f4_22103572($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<div class="hero-unit">
    <div id="infoblock">
        1) Загружаемый файл должен иметь имя counterpart.xml<br>
        2) Загружаемый файл должен лежать в корне сайта<br>
        3) Если в талице knt есть контрагент с ERPCode=code, тогда происходит обновление
        4) Формат XML файла должен иметь следующую структуру:<br>            
<pre>        
&lt;?xml version="1.0" encoding="UTF-8" ?<?php ?>> 
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
<?php }else{ ?>
<div class="alert alert-error">Не достаточно прав!</div>
<?php }?><?php }} ?>