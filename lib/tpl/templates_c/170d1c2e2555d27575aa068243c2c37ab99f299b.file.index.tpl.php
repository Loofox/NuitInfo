<?php /* Smarty version Smarty-3.1.1, created on 2014-12-04 21:06:39
         compiled from "modules\index\tpl\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:76995480becfb10747-55805285%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '170d1c2e2555d27575aa068243c2c37ab99f299b' => 
    array (
      0 => 'modules\\index\\tpl\\index.tpl',
      1 => 1417722048,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '76995480becfb10747-55805285',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.1',
  'unifunc' => 'content_5480becfb7604',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5480becfb7604')) {function content_5480becfb7604($_smarty_tpl) {?><script>
$(function(){
	
$("a[href='?module=Redirect']").click(function(){
$('h2').prepend("<p id='load' style=';height:40pt;border:3px gray solid;border-radius:10px;text-align:center'>Patientez quelques secondes</p>");
	})	
	
})
</script>
<h2>Page index du site.</h2>

<h3>Personnalisation</h3>
<ul style='margin:30px'>
	<li>Cette page est générée à partir du module index et de son template index.tpl
	<li>Les entrées du menu principal sont configurées dans le fichier conf/Menus.ini.php</li>
	<li>L'apparence générale du site peut être modifiée dans le fichier templates/main.tpl</li>
	<li>Bootstrap 3 est utilisé pour le style, cf dossier styles</li>
	<li>L'apparence des champs de formulaire est modifiable à partir des templates : templates/champs</li>
	<li>Pour le reste, voir la <a href="doc">Documentation</a></li>
</ul>


<h3>Exemples de modules</h3>
<ol style='margin:30px'>
	<li>affichage d'un simple template</li>
	<li>affiche et "valide" un formulaire</li>
	<li>effectue un traitement silencieux et redirige vers la page d'accueil</li>
	<li>génère du contenu et l'envoie sous forme de fichier</li>
	<li>exemple ajax/jquery</li>	
</ol><?php }} ?>