<?php /* Smarty version Smarty-3.1.11, created on 2012-10-19 15:05:51
         compiled from "templates/standart/tasks.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1978871851507f9cad541488-25176190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6da5d1685265c933736095115fdd5914a1c7773d' => 
    array (
      0 => 'templates/standart/tasks.tpl',
      1 => 1350644749,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1978871851507f9cad541488-25176190',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_507f9cad5b9f62_52670174',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_507f9cad5b9f62_52670174')) {function content_507f9cad5b9f62_52670174($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value!=''){?>
<div class="box">
<div class="box-heading">Менеджер задач</div>
<div class="box-content">   
<table id="list2"></table>
<div id="pager2"></div>
<input type="BUTTON" id="addtask" value="Добавить" />
<input type="BUTTON" id="edittask" value="Редактировать" />
<div id="add_edit"></div>
<script type="text/javascript" src="controller/client/js/libre_tasks.js"></script>
</div>
</div>
<?php }?><?php }} ?>