<?php /* Smarty version Smarty-3.1.11, created on 2013-01-17 12:29:46
         compiled from "templates/bootstrap/libre_org.tpl" */ ?>
<?php /*%%SmartyHeaderCode:74868990050b330fbbdc9d8-60202186%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6ee65b6051e7dc2045f51f494384f837695e6ece' => 
    array (
      0 => 'templates/bootstrap/libre_org.tpl',
      1 => 1358411384,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '74868990050b330fbbdc9d8-60202186',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b330fbc40e46_28087132',
  'variables' => 
  array (
    'user_mode' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b330fbc40e46_28087132')) {function content_50b330fbc40e46_28087132($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value==1){?>
<script type="text/javascript" src="jquery/ajaxupload.js"></script>    
<div class="container-fluid">
<table id="list2"></table>
<div id="pager2"></div>
</div>
<div class="container-fluid">
<h2>План помещения</h2>    
  <div class="row-fluid">
    <div class="span2">
      <div id="uploadButton" class="button btn btn-primary">Загрузить*</div><br>
      *только формат PNG
    </div>
    <div class="span10">
                <div id="photoid" name="photoid" align="center"><img class="img-rounded" src=images/noimage.jpg width=100%<?php ?>></div>                
                <input name=geteqid TYPE='hidden' id=geteqid value="">                      
    </div>
  </div>
</div>    
<script type="text/javascript" src="controller/client/js/libre_org.js"></script>
<?php }else{ ?>
<div class="alert alert-error">Не достаточно прав!</div>
<?php }?><?php }} ?>