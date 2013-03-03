{config_load file="test.conf" section="setup"}
{config_load file="language.conf" section="language"}
{include file="header.tpl" title="TO"}
{literal}
	<script type="text/javascript">
		$(document).ready(function(){
			$("#login_form").loginForm();
			$("#recover_password_form").recoverForm();
			$("#create_user_form").validateUserForm();
			$("#create_user_form").submitRegisterForm();
			$("#create_account").showCreateAccountForm();
		})
	</script>
{/literal}

	<div id="container">
		<div id="title"><h1>Moldavia at War</h1></div>
	{translate}hello_world{/translate}
	{translate}how_are_you{/translate}
	<form method="POST" action="main.php" id="login_form">
		<div id="login_form">
			<div class="field_row">
				<div class="field_name">
					{translate}login_name{/translate}
				</div>
				<div class="field_text">
					<input type="text" name="username" id="username_login" class="text">
				</div>
			</div>
			
			<div class="field_row">
				<div class="field_name">
					{translate}login_password{/translate}
				</div>
				<div class="field_text">
					<input type="password" name="password" id="password_login" class="text">
				</div>
			</div>
			<div class="field_row">
				<div class="field_name">
					&nbsp;
				</div>
				<div class="field_text">
					<input type="submit" value="{translate}login_login{/translate}" id="submit-btn" class="submit-btn">
				</div>
			</div>
			<div class="field_row">
				<a href="recover_password.php">{translate}forgot_password{/translate}</a> | <a href="#" id="create_account">{translate}create_account{/translate}</a>
			</div>
			<div class="field_row">
				<div class="error_form"></div>
			</div>

		</div>
</form>
	<form method="post" action="index.php" id="create_user_form">
		<div id="creeaza_cont">
				<div class="field_row">
					<div class="field_name">
						Numele tau:
					</div>
					<div class="field_text">
						<input type="text" name="username" class="required text name">
						<div class="error-text"><label for="username"><span></span></label></div>
					</div>
				</div>
				
				<div class="field_row">
					<div class="field_name">
						Parola:
					</div>
					<div class="field_text">
						<input type="password" name="password" class="required password text">
						<div class="error-text"><label for="password"><span></span></label></div>						
					</div>
				</div>
				<div class="field_row">
					<div class="field_name">
						Adresa de email:
					</div>
					<div class="field_text">
						<input type="text" name="email" class="required email text">
						<div class="error-text"><label for="email"><span></span></label></div>
					</div>
				</div>
		
				<div class="field_row">
					<div class="field_name">
						Login:
					</div>
					<div class="field_text">
						<input type="submit" name="create_account" value="Creeaza cont" class="submit-btn">
						<input type="button" name="cancel_create" value="Cancel" class="submit-btn">
					</div>
				</div>
				<div class="field_row">
					<div class="field_name">
						&nbsp;
					</div>
					<div class="field_text">
						<div class="error_form"></div>
						{if isset($form_error) && $form_error==1}
							<div class="p_error_form">{translate}form_error{/translate}</div>
						{/if}
						{if isset($form_ok) && $form_ok==1}
							<div class="form_ok">{translate}register_ok{/translate}</div>
							 {/if}
						{if isset($query_err) && $query_err==1}
							<div class="form_ok">{translate}query_error{/translate}</div>
							 {/if}
						 
					</div>				
				</div>
		</div>
	</form>
	
	<form method="post" action="index.php" id="recover_password_form">
		<div id="recover_password">
				<div class="field_row">
					<div class="field_name">
						Adresa de email
					</div>
					<div class="field_text">
						<input type="text" name="email" class="required text email">
						<div class="error-text"><label for="email"><span></span></label></div>
					</div>
				</div>
				
				<div class="field_row">
					<div class="field_name">
					</div>
					<div class="field_text">
						<input type="submit" name="recover_password" value="Recuperare" class="submit-btn">
						<input type="button" name="cancel_create" value="Anuleaza" class="submit-btn">
					</div>
				</div>
				<div class="field_row">
					<div class="field_name">
						&nbsp;
					</div>
					<div class="field_text">
						<div class="error_form"></div>
						<div class="recover_hash"><a href="index.php?recover">Recuperare parola</div>
					</div>				
				</div>
		</div>
	</form>

	</div>
{include file="footer.tpl"}
