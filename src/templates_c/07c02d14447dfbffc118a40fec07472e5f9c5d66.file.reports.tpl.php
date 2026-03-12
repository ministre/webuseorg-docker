<?php /* Smarty version Smarty-3.1.11, created on 2012-12-11 08:31:49
         compiled from "templates/bootstrap/reports.tpl" */ ?>
<?php /*%%SmartyHeaderCode:100657858350b32b7aba3e39-35212147%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07c02d14447dfbffc118a40fec07472e5f9c5d66' => 
    array (
      0 => 'templates/bootstrap/reports.tpl',
      1 => 1355200105,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '100657858350b32b7aba3e39-35212147',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b32b7ac063f6_80851946',
  'variables' => 
  array (
    'ArrayOrg' => 0,
    'reg_orgid' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b32b7ac063f6_80851946')) {function content_50b32b7ac063f6_80851946($_smarty_tpl) {?><div class="hero-unit">
<form ENCTYPE="multipart/form-data" action="?content_page=reports&step=view" method="post" name="form1" target="_self">
<div class="row-fluid">
  <div class="span4">
      <label>Название отчета</label>
        <select name="sel_rep" id="sel_rep">
            <option value=1>Наличие ТМЦ</option>
            <option value=2>Наличие ТМЦ - только не ОС и не списанное</option>
        </select>
        <label>Человек</label>
        <div name="sel_plp" id="sel_plp"></div>      
  </div>
  <div class="span4">
        <label>Организация</label>
        <select name="sel_orgid" id="sel_orgid">
            <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['ArrayOrg']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['i']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['i']['total']);
?>
        	<option value=<?php echo $_smarty_tpl->tpl_vars['ArrayOrg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["id"];?>
<?php if ($_smarty_tpl->tpl_vars['reg_orgid']->value==$_smarty_tpl->tpl_vars['ArrayOrg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["id"]){?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['ArrayOrg']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["name"];?>
</option>
            <?php endfor; endif; ?>
        </select>      
          <label class="checkbox">
            <input type="checkbox" name="os" id="os" value="1"> Основные
          </label>
          <label class="checkbox">
            <input type="checkbox" name="mode" id="mode" value="1"> Списано
          </label>
          <label class="checkbox">
            <input type="checkbox" name="gr" id="gr" value="1"> По группам
          </label>        
  </div>
  <div class="span4">
    <label>Помещение</label>
    <div name="sel_pom" id="sel_pom"></div>      
          <label class="checkbox">
            <input type="checkbox" name="repair" id="repair" value="1"> В ремонте
          </label>    
  </div>    
</div>    
<p><input type="button" name=sbt id=sbt value="Сформировать">
<input type="button" id=btprint value="Распечатать"></p>
</form>
<table id="list2"></table>
<div id="pager2"></div>
</div>
<script type="text/javascript" src="controller/client/js/report.js"></script><?php }} ?>