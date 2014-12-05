<?php /* Smarty version Smarty-3.1.1, created on 2014-12-05 03:42:49
         compiled from "templates\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:231135480becfcd0e60-20734777%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '6aae8c641d21506c83b2eef3095b796e7ec90482' => 
    array (
      0 => 'templates\\main.tpl',
      1 => 1417745543,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '231135480becfcd0e60-20734777',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5480becfd9ec9',
  'variables' => 
  array (
    'titre' => 0,
    'module' => 0,
    'messages' => 0,
    'bloc_contenu' => 0,
    'affichages' => 0,
    'erreurs' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5480becfd9ec9')) {function content_5480becfd9ec9($_smarty_tpl) {?><!-- start template-->
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</title>
		<script src='js/jquery-1.10.2.min.js'></script>
		<script src='js/jquery-ui-1.10.3.custom.min.js'></script>	
		<script src='styles/bootstrap/js/bootstrap.min.js'></script>	
		<script src='js/default.js'></script>	
		<link rel='stylesheet' href='styles/ui-lightness/jquery-ui-1.10.3.custom.min.css' />
		<link rel='stylesheet' href='styles/bootstrap/css/bootstrap.min.css' />	
		<link rel='stylesheet' href='styles/defaut.css' />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>

	<?php echo $_smarty_tpl->getSubTemplate ("navigation.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


    <div class="container">
		<ol class="breadcrumb">
			<li><a href="?module">Home</a></li>
			<li><a href="?module=<?php echo $_smarty_tpl->tpl_vars['module']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['module']->value;?>
</a></li>
			<li class="active"><?php echo $_smarty_tpl->tpl_vars['titre']->value;?>
</li>
		</ol>

		<?php if ($_smarty_tpl->tpl_vars['messages']->value){?>
			<div class="bs-callout bs-callout-primary">
				<?php echo $_smarty_tpl->tpl_vars['messages']->value;?>

			</div>
		<?php }?>


		<div id='module'>
			<?php echo $_smarty_tpl->tpl_vars['bloc_contenu']->value;?>

		</div>			
				<?php if ($_smarty_tpl->tpl_vars['affichages']->value){?>
			<div class='alert alert-info'>
				<h4>Affichages divers</h4>
				<p>
				<?php echo $_smarty_tpl->tpl_vars['affichages']->value;?>

				</p>
			</div>
			<?php }?>
			<?php if ($_smarty_tpl->tpl_vars['erreurs']->value){?>
			<div class='alert alert-warning'>
				<h4>Erreurs diverses</h4>			
				<p>
				<?php echo $_smarty_tpl->tpl_vars['erreurs']->value;?>

				</p>
			</div>
			<?php }?>
	</div>
	</body>
		
</html>
<!-- end template--><?php }} ?>