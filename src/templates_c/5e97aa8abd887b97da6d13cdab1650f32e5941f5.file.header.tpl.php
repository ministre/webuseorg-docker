<?php /* Smarty version Smarty-3.1.11, created on 2012-12-10 05:10:41
         compiled from "templates/bootstrap/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:138094272350b319105eeb93-22330381%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e97aa8abd887b97da6d13cdab1650f32e5941f5' => 
    array (
      0 => 'templates/bootstrap/header.tpl',
      1 => 1354945660,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '138094272350b319105eeb93-22330381',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b31910692f24_60597459',
  'variables' => 
  array (
    'sitename' => 0,
    'theme' => 0,
    'user_id' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b31910692f24_60597459')) {function content_50b31910692f24_60597459($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Учет ТМЦ в организации">
    <meta name="author" content="(c) 2012 by Gribov Pavel">
    
    <title><?php echo $_smarty_tpl->tpl_vars['sitename']->value;?>
</title>

    <meta name="generator" content="yarus" />
    
    <link rel="stylesheet" type="text/css" href="templates/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/css/bootstrap.css">

    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
    </style>    

    <link rel="stylesheet" type="text/css" href="templates/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/css/bootstrap-responsive.css">        
    <link rel="stylesheet" type="text/css" href="templates/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/css/ui.jqgrid.css">
    <link rel="stylesheet" type="text/css" href="templates/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/css/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="templates/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/css/datepicker.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->    
 
    <script type="text/javascript" src="jquery/jquery.js"></script>
    <script type="text/javascript" src="jquery/jquery-ui.js"></script>
    <script type="text/javascript" src="templates/<?php echo $_smarty_tpl->tpl_vars['theme']->value;?>
/js/datepicker.js"></script>
    <script type="text/javascript" src="jquery/jquery.jqGrid.js"></script>
    <script type="text/javascript" src="jquery/jquery.form.js"></script>
    <script type="text/javascript" src="jquery/tiny_mce/tiny_mce.js"></script>    
    <script>var curuserid='<?php echo $_smarty_tpl->tpl_vars['user_id']->value;?>
';</script>
</head>
<body><?php }} ?>