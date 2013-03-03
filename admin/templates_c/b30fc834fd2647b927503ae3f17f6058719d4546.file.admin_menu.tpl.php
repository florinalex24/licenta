<?php /* Smarty version Smarty-3.1.13, created on 2013-02-27 10:56:03
         compiled from ".\templates\admin_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20224512cbf4733d526-43139583%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b30fc834fd2647b927503ae3f17f6058719d4546' => 
    array (
      0 => '.\\templates\\admin_menu.tpl',
      1 => 1361955360,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20224512cbf4733d526-43139583',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512cbf47346247_22404712',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512cbf47346247_22404712')) {function content_512cbf47346247_22404712($_smarty_tpl) {?><div id="admin_menu">
		<ul>
				<li><a href="admin_users.php">Adminitrare utilizatori</a></li>
				<li><a href="adauga_tip_unitate.php">Administrare tip unitate</a></li>
				<li><a href="adauga_costuri_unitate.php">Administrare costuri unitate</a></li>
				<li><a href="admin_tipuri_cladiri.php">Administrare tipuri cladiri</a></li>
				<li><a href="admin_costuri_cladiri.php">Administrare costuri cladiri</a></li>
				<li><a href="admin_optiuni_cladiri.php">Administrare optiuni cladiri</a></li>
				<li><a href="admin_tip_mp.php">Administrare tip materii prime</a></li>
				<li><a href="admin_cresteri_productie.php">Administrare cresteri productie materii prime</a></li>
		</ul>
</div>
<?php }} ?>