<?php /* Smarty version Smarty-3.1.11, created on 2012-11-27 12:45:42
         compiled from "templates/standart/eq_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:105508714350a4706c2f7dd7-66889358%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '22047283a08f9789a91b63bad5196b9020aad693' => 
    array (
      0 => 'templates/standart/eq_list.tpl',
      1 => 1354005914,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '105508714350a4706c2f7dd7-66889358',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50a4706c3567b9_35435627',
  'variables' => 
  array (
    'user_mode' => 0,
    'theme' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50a4706c3567b9_35435627')) {function content_50a4706c3567b9_35435627($_smarty_tpl) {?><script type="text/javascript" src="jquery/ajaxupload.js"></script>
<div class="box">
<div class="box-heading">Ответственность по помещениям</div>
<div class="box-content">
    <table>
        <tr><td>
    <table id="list2"></table>
    <div id="pager2"></div>
    </td><td>    
            <div id="photoid" name="photoid" align="center"><img src=images/noimage.jpg width=200></div>
            <div id="uploadButton" class="button" <?php if ($_smarty_tpl->tpl_vars['user_mode']->value!="1"){?>style="visibility:hidden"<?php }?>>Загрузить</div>
              <input name=geteqid TYPE='hidden' id=geteqid value="">            
    </td>
    </tr>
    </table>
</div>
<div class="box-heading">Материальная ответственность</div>
<div class="box-content">
    <table id="list3"></table>
    <div id="pager3"></div>
</div>
<table id="tbl_move"></table>
<script type="text/javascript" src="controller/client/js/eq_list.js"></script>
<script type="text/javascript" src="templates/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/js/eq_list_mod.js"></script>
</div><?php }} ?>