<?php /*%%SmartyHeaderCode:1312511cf102234f29-06736463%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '325c040ac3eb2e57c3cb2db39552570ef3cca8a8' => 
    array (
      0 => '.\\templates\\main.tpl',
      1 => 1360852151,
      2 => 'file',
    ),
    '0debd65d8a9db561a3ba3fd862046bf4e41cc1db' => 
    array (
      0 => '.\\configs\\test.conf',
      1 => 1358293578,
      2 => 'file',
    ),
    '10e0737838b4a574ef135d0c601e7b602cfaf37a' => 
    array (
      0 => '.\\templates\\header.tpl',
      1 => 1360843680,
      2 => 'file',
    ),
    'a06d2ac261c24eedfba264ba6a99d01195a75ad8' => 
    array (
      0 => '.\\templates\\js_css.tpl',
      1 => 1360843283,
      2 => 'file',
    ),
    '1be7ff7fdee636597edd726ee98dfef4bfd55d1f' => 
    array (
      0 => '.\\templates\\footer.tpl',
      1 => 1358293578,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1312511cf102234f29-06736463',
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_511cf57f2e8088_72186715',
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511cf57f2e8088_72186715')) {function content_511cf57f2e8088_72186715($_smarty_tpl) {?><HTML>
<HEAD>
<TITLE>TO - me</TITLE>
  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="js/form_functions.js" type="text/javascript"></script>


</HEAD>
<BODY bgcolor="#ffffff">


	<script type="text/javascript">
		$(document).ready(function(){
			$("#login_form").loginForm();
		})
	</script>


<a href="admin/index.php">Admin</a>
</BODY>
</HTML>

<?php }} ?>