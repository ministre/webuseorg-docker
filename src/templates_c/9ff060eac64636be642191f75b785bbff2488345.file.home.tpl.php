<?php /* Smarty version Smarty-3.1.11, created on 2013-03-20 16:02:07
         compiled from "templates/bootstrap/home.tpl" */ ?>
<?php /*%%SmartyHeaderCode:112878754050b338219fc629-72347558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9ff060eac64636be642191f75b785bbff2488345' => 
    array (
      0 => 'templates/bootstrap/home.tpl',
      1 => 1363780921,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '112878754050b338219fc629-72347558',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.11',
  'unifunc' => 'content_50b33821a90177_25592231',
  'variables' => 
  array (
    'stiker_body' => 0,
    'ArrayUsersProfile' => 0,
    'ArrayUsers' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50b33821a90177_25592231')) {function content_50b33821a90177_25592231($_smarty_tpl) {?><div class="row-fluid">
    <div class="row-fluid">
      <div class="span6">
          <span class="label label-info">Полезная информация</span>
        <div class="well">		
		<p><?php echo $_smarty_tpl->tpl_vars['stiker_body']->value;?>
</p>		
	</div>          
          <span class="label label-info">Кого нет</span>
        <div class="well">		
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
                    <?php if ($_smarty_tpl->tpl_vars['ArrayUsersProfile']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["faza"]!="Работает"){?>
                        <a target='_blank' href=?content_page=eq_list&usid=<?php echo $_smarty_tpl->tpl_vars['ArrayUsersProfile']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["id"];?>
>
                        <i class="icon-user"></i><?php echo $_smarty_tpl->tpl_vars['ArrayUsersProfile']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["fio"];?>
</a> в <?php echo $_smarty_tpl->tpl_vars['ArrayUsersProfile']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["faza"];?>
 до <?php echo $_smarty_tpl->tpl_vars['ArrayUsersProfile']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["enddate"];?>
<br>
                    <?php }?>
                <?php endfor; endif; ?>
	</div>                  
      </div>
      <div class="span6">
        <span class="label label-info">Новости,обьявления</span>
        <div class="well" id=newslist name=newslist>
	</div>    
      <ul class="pager">
	<li class="previous"><a href="#" id=newsprev name=newsprev>&larr; Назад</a></li>
	<li class="next"><a href="#" id=newsnext name=newsnext>Вперед &rarr;</a></li>
	</ul>      
      </div>
    </div>
</div>	
<script type="text/javascript" src="controller/client/js/news_main.js"></script>
<div class="row-fluid">
    <div class="span12">               
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        <span class="label label-info">Пользователи системы (Нажмите чтобы развернуть)</span>
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse">
      <div class="accordion-inner">
	<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['i'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['i']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['name'] = 'i';
$_smarty_tpl->tpl_vars['smarty']->value['section']['i']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['ArrayUsers']->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
	 <i class="icon-user"></i><a target='_blank' href=?content_page=eq_list&usid=<?php echo $_smarty_tpl->tpl_vars['ArrayUsers']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["id"];?>
><?php echo $_smarty_tpl->tpl_vars['ArrayUsers']->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]["login"];?>
</a> 
        <?php endfor; endif; ?>
      </div>
    </div>
  </div>
    </div>        
</div>       
 <script>$(".collapseOne").collapse('hide');</script><?php }} ?>