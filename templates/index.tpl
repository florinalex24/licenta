{config_load file="test.conf" section="setup"}
{config_load file="language.conf" section="language"}
{include file="header.tpl" title="TO"}
{literal}
	<script type="text/javascript">
		$(document).ready(function(){
			$("#login_form").loginForm();
			$("#create_user_form").validateUserForm();
			$("#create_user_form").submitRegisterForm();
		})
	</script>
{/literal}

{translate}hello_world{/translate}
{translate}how_are_you{/translate}
<form method="POST" action="main.php" id="login_form">
	<div id="login_form">
		<div class="field_row">
			<div class="field_name">
				{translate}login_name{/translate}
			</div>
			<div class="field_text">
				<input type="text" name="username" id="username_login" class="text_field">
			</div>
		</div>
		
		<div class="field_row">
			<div class="field_name">
				{translate}login_password{/translate}
			</div>
			<div class="field_text">
				<input type="password" name="password" id="password_login" class="text_field">
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
			<a href="recover_password.php">{translate}forgot_password{/translate}</a> | <a href="create_account.php">{translate}create_account{/translate}</a>
		</div>
	</div>
</form>
<form method="post" action="index.php" id="create_user_form">
	<div id="creeaza cont">
		<div id="new_account_form">
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
	</div>
</form>
{include file="footer.tpl"}
