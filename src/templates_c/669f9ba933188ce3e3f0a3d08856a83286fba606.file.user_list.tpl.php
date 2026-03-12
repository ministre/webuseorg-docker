<?php /* Smarty version Smarty-3.1.11, created on 2013-04-01 15:36:15
         compiled from "templates/bootstrap/user_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:140732974151493b672bb2a0-82216501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '669f9ba933188ce3e3f0a3d08856a83286fba606' => 
    array (
      0 => 'templates/bootstrap/user_list.tpl',
      1 => 1364816097,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '140732974151493b672bb2a0-82216501',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_51493b673f8807_07206265',
  'variables' => 
  array (
    'ArrayUsersProfile' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_51493b673f8807_07206265')) {function content_51493b673f8807_07206265($_smarty_tpl) {?><div class="row-fluid">
  <div class="span12">
      <table class="table">
  <caption>Пользователи системы</caption>
  <thead>
    <tr>
      <th>ФИО</th>
      <th>Должность</th>
      <th>Фаза</th>
      <th>Конец фазы</th>
      <th>Пришел</th>
    </tr>
  </thead>          
    <tbody>
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['ArrayUsersProfile']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
    <tr <?php if ($_smarty_tpl->tpl_vars['ArrayUsersProfile']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["ddd"]=="1"){?><?php if ($_smarty_tpl->tpl_vars['ArrayUsersProfile']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["faza"]=="Работает"){?>class="error"<?php }?><?php }?>>
      <td>	 <i class="icon-user"></i>
         <a target='_blank' href=?content_page=eq_list&usid=<?php echo $_smarty_tpl->tpl_vars['ArrayUsersProfile']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["id"];?>
>
             <?php echo $_smarty_tpl->tpl_vars['ArrayUsersProfile']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["fio"];?>

         </a> 
    </td>
      <td><?php echo $_smarty_tpl->tpl_vars['ArrayUsersProfile']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["post"];?>
</td>          
      <td><?php echo $_smarty_tpl->tpl_vars['ArrayUsersProfile']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["faza"];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['ArrayUsersProfile']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["enddate"];?>
</td>
      <td><?php echo $_smarty_tpl->tpl_vars['ArrayUsersProfile']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["go"];?>
</td>
    </tr>
        <?php endfor; endif; ?>      
        </tbody>
        </table>
  </div>
</div>    
<?php }} ?>