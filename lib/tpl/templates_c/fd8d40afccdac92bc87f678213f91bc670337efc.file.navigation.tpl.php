<?php /* Smarty version Smarty-3.1.1, created on 2014-12-04 21:06:39
         compiled from "templates\navigation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:243985480becfde2708-76801586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd8d40afccdac92bc87f678213f91bc670337efc' => 
    array (
      0 => 'templates\\navigation.tpl',
      1 => 1417722048,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '243985480becfde2708-76801586',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'menus' => 0,
    'data' => 0,
    'm' => 0,
    'shref' => 0,
    'sm' => 0,
    'Bloc_Login' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5480becfe80cd',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5480becfe80cd')) {function content_5480becfe80cd($_smarty_tpl) {?>		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="?">MiniFWK</a>
			</div>
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
				<?php  $_smarty_tpl->tpl_vars['data'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['data']->_loop = false;
 $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['menus']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['data']->key => $_smarty_tpl->tpl_vars['data']->value){
$_smarty_tpl->tpl_vars['data']->_loop = true;
 $_smarty_tpl->tpl_vars['m']->value = $_smarty_tpl->tpl_vars['data']->key;
?>
					<?php if (!is_array($_smarty_tpl->tpl_vars['data']->value)){?>
						<li><a id='A_<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
' href='<?php echo $_smarty_tpl->tpl_vars['data']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</a></li>
					<?php }else{ ?>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
 <b class="caret"></b></a>
							<ul class="dropdown-menu">
							<?php  $_smarty_tpl->tpl_vars['shref'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['shref']->_loop = false;
 $_smarty_tpl->tpl_vars['sm'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['shref']->key => $_smarty_tpl->tpl_vars['shref']->value){
$_smarty_tpl->tpl_vars['shref']->_loop = true;
 $_smarty_tpl->tpl_vars['sm']->value = $_smarty_tpl->tpl_vars['shref']->key;
?>	
								<li>
								<a href='<?php echo $_smarty_tpl->tpl_vars['shref']->value;?>
'><?php echo $_smarty_tpl->tpl_vars['sm']->value;?>
</a>
								</li>
							<?php } ?>			        
							</ul>
						</li>
					<?php }?>
				<?php } ?>
				</ul>		
				<ul class="nav navbar-nav navbar-right">
					<li><a href="Doc">Documentation</a></li>			
				</ul>
				<?php echo $_smarty_tpl->tpl_vars['Bloc_Login']->value;?>
			
		</nav><?php }} ?>