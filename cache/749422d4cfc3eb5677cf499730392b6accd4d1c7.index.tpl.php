<?php /*%%SmartyHeaderCode:14015511c9caa969f41-09775698%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '749422d4cfc3eb5677cf499730392b6accd4d1c7' => 
    array (
      0 => '.\\templates\\index.tpl',
      1 => 1360939790,
      2 => 'file',
    ),
    '0debd65d8a9db561a3ba3fd862046bf4e41cc1db' => 
    array (
      0 => '.\\configs\\test.conf',
      1 => 1358293578,
      2 => 'file',
    ),
    'f5a444a8a2736e9d4962ac8137a30513a96d0301' => 
    array (
      0 => '.\\configs\\language.conf',
      1 => 1360911869,
      2 => 'file',
    ),
    '10e0737838b4a574ef135d0c601e7b602cfaf37a' => 
    array (
      0 => '.\\templates\\header.tpl',
      1 => 1360853681,
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
  'nocache_hash' => '14015511c9caa969f41-09775698',
  'cache_lifetime' => 120,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_511e4b0fdea0b3_07048823',
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_511e4b0fdea0b3_07048823')) {function content_511e4b0fdea0b3_07048823($_smarty_tpl) {?><HTML>
<HEAD>
<TITLE>TO - me</TITLE>
  <script src="js/jquery.js" type="text/javascript"></script>
  <script src="js/form_functions.js" type="text/javascript"></script>


</HEAD>
<BODY bgcolor="#ffffff">
    <!--header section-->
            


	<script type="text/javascript">
		$(document).ready(function(){
			$("#login_form").loginForm();
		})
	</script>


Hello flio!
How are you?
<form method="POST" action="main.php" id="login_form">
	<div id="login_form">
		<div class="field_row">
			<div class="field_name">
				Nume:
			</div>
			<div class="field_text">
				<input type="text" name="username" id="username_login" class="text_field">
			</div>
		</div>
		
		<div class="field_row">
			<div class="field_name">
				Parola:
			</div>
			<div class="field_text">
				<input type="password" name="password" id="password_login" class="text_field">
			</div>
		</div>
		<div class="field_row">
			<div class="field_name">
				Login:
			</div>
			<div class="field_text">
				<input type="submit" value="Logheaza-te" id="submit-btn" class="submit-btn">
			</div>
		</div>
		<div class="field_row" style="display: none">
			<a href="recover_password.php">Ai uitat parola?</a> | <a href="create_account.php">Creaza cont</a>
		</div>
	</div>
</form>

<div id="creeaza cont" style="display: none">
	<div id="new_account_form">
		<div class="field_row">
			<div class="field_name">
				Numele tau:
			</div>
			<div class="field_text">
				<input type="text" name="username" class="required text name">
			</div>
		</div>
		
		<div class="field_row">
			<div class="field_name">
				Parola:
			</div>
			<div class="field_text">
				<input type="password" name="password" class="required text">
			</div>
		</div>
		<div class="field_row">
			<div class="field_name">
				Adresa de email:
			</div>
			<div class="field_text">
				<input type="text" name="email" class="required email text">
			</div>
		</div>

		<div class="field_row">
			<div class="field_name">
				Login:
			</div>
			<div class="field_text">
				<input type="submit" value="Creeaza cont" class="submit-btn">
			</div>
		</div>
	</div>
</div>
</BODY>
</HTML>

<?php }} ?>