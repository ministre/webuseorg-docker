<?php /* Smarty version Smarty-3.1.11, created on 2013-02-06 14:46:24
         compiled from "templates/bootstrap/news_read.tpl" */ ?>
<?php /*%%SmartyHeaderCode:48090528150b5aa331f2ff4-19355213%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'eb2e5aeaea5375d7c215c8ab3f0af24058a01f2d' => 
    array (
      0 => 'templates/bootstrap/news_read.tpl',
      1 => 1360147572,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '48090528150b5aa331f2ff4-19355213',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b5aa331f5041_26239954',
  'variables' => 
  array (
    'news_dt' => 0,
    'news_title' => 0,
    'news_body' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b5aa331f5041_26239954')) {function content_50b5aa331f5041_26239954($_smarty_tpl) {?><div class="row-fluid">
    <div class="span12">
        <span class="label label-info"><?php echo $_smarty_tpl->tpl_vars['news_dt']->value;?>
</span>
	<div class="well">
            <h5><?php echo $_smarty_tpl->tpl_vars['news_title']->value;?>
</h5>
            <p><?php echo $_smarty_tpl->tpl_vars['news_body']->value;?>
</p>
	</div>
    </div>        
</div>   <?php }} ?>