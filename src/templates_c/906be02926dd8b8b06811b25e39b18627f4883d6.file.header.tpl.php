<?php /* Smarty version Smarty-3.1.11, created on 2012-11-27 16:05:57
         compiled from "templates/standart/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1108060979505864946ffaa5-85136247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '906be02926dd8b8b06811b25e39b18627f4883d6' => 
    array (
      0 => 'templates/standart/header.tpl',
      1 => 1354017954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1108060979505864946ffaa5-85136247',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50586494711078_99274033',
  'variables' => 
  array (
    'sitename' => 0,
    'theme' => 0,
    'user_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50586494711078_99274033')) {function content_50586494711078_99274033($_smarty_tpl) {?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="ru-RU">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />

<title><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</title>

<meta name="generator" content="yarus" />
<link rel="stylesheet" type="text/css" href="templates/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/css/stylesheet.css">
<link rel="stylesheet" type="text/css" href="templates/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/css/ui.jqgrid.css">
<link rel="stylesheet" type="text/css" href="templates/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/css/jquery-ui.css">    
<script type="text/javascript" src="jquery/jquery.js"></script>
<script type="text/javascript" src="jquery/jquery-ui.js"></script>
<script type="text/javascript" src="templates/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/js/jquery-ui-timepicker-addon.js"></script>
<script type="text/javascript" src="jquery/jquery.jqGrid.js"></script>
<script type="text/javascript" src="jquery/tiny_mce/tiny_mce.js"></script>    
<script>curuserid='<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
';</script>
</head>
<body>
<div id="container">
<div id="header">
    <div id="logo"><img src="templates/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/images/globalspirits-logo.png" height=50px></div>
    <div class="links"><a href=index.php?login_step=logout>Выйти</a></div>
</div><?php }} ?>