<?php /* Smarty version Smarty-3.1.11, created on 2013-03-19 17:48:25
         compiled from "templates/bootstrap/eq_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:201976738750b32dc0d62d89-86991471%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b3b487682b35b337b5754270d71b477adf7c26b' => 
    array (
      0 => 'templates/bootstrap/eq_list.tpl',
      1 => 1363700902,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '201976738750b32dc0d62d89-86991471',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b32dc0dda4d1_22859525',
  'variables' => 
  array (
    'user_mode' => 0,
    'theme' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b32dc0dda4d1_22859525')) {function content_50b32dc0dda4d1_22859525($_smarty_tpl) {?><?php if ($_smarty_tpl->tpl_vars['user_mode']->value!=''){?>
<script type="text/javascript" src="jquery/ajaxupload.js"></script>
        <div class="row-fluid">
        <div class="span12" id=prof_user>                      
        </div>
        </div>
    <ul class="nav nav-tabs" id="myTab">
      <li><a href="#plc" data-toggle="tab">Помещение</a></li>
      <li><a href="#mto" data-toggle="tab">Ответственость</a></li>
    </ul>
    <div class="row-fluid">
        <div class="span2">          
                <div id="photoid" name="photoid" align="center"><img src=images/noimage.jpg width=200></div>
                <div id="uploadButton" class="button" <?php if ($_smarty_tpl->tpl_vars['user_mode']->value!="1"){?>style="visibility:hidden"<?php }?>>Загрузить</div>
                <input name=geteqid TYPE='hidden' id=geteqid value="">                      
        </div>
        <div class="span10">
            <table id="list2"></table><div id="pager2"></div>
        </div>            
    </div>
    <table id="tbl_move"></table><div id="pager4"></div>
    <script type="text/javascript" src="controller/client/js/ajupl.js"></script>    
    <script type="text/javascript" src="controller/client/js/eq_list.js"></script>
    <script type="text/javascript" src="templates/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/js/eq_list_mod.js"></script>
<?php }else{ ?>
<div class="alert alert-error">Не достаточно прав!</div>
<?php }?><?php }} ?>