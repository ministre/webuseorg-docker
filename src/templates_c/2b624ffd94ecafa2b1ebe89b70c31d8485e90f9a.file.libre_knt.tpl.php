<?php /* Smarty version Smarty-3.1.11, created on 2013-03-19 08:44:46
         compiled from "templates/bootstrap/libre_knt.tpl" */ ?>
<?php /*%%SmartyHeaderCode:107483559450b3323ec36e33-77463238%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2b624ffd94ecafa2b1ebe89b70c31d8485e90f9a' => 
    array (
      0 => 'templates/bootstrap/libre_knt.tpl',
      1 => 1363668283,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107483559450b3323ec36e33-77463238',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b3323eca7331_17133953',
  'variables' => 
  array (
    'user_mode' => 0,
    'theme' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b3323eca7331_17133953')) {function content_50b3323eca7331_17133953($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<script type="text/javascript" src="jquery/ajaxupload.js"></script>    
<div class="row-fluid">
  <div class="span12">
      <table id="list2"></table>
        <div id="pager2"></div>
  </div>
</div>    
<div class="row-fluid">
  <div class="span8">
        <table id="list3"></table>
        <div id="pager3"></div>
  </div>
  <div class="span3">
        <table id="list4" style="visibility:hidden"></table>
        <div id="pager4"></div>
  </div>    
  <div class="span1">
      <br><br>
            <div id="uploadButton" class="btn btn-primary button" style="visibility:hidden">Загрузить</div>
            <div id="status"></div>
  </div>    
    
</div>        
    <script type="text/javascript" src="controller/client/js/libre_knt.js"></script>
   <script type="text/javascript" src="templates/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/js/libre_knt_mod.js"></script>
<?php }else{ ?>
<div class="alert alert-error">Не достаточно прав!</div>
<?php }?><?php }} ?>