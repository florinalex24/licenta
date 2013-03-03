{include file="header.tpl" title="User administration"}
{include file="admin_menu.tpl"}
{literal}
		<script type="text/javascript">
			$(document).ready(function () {
				$('#admin_users').jtable({
					title: 'Administrare utilizatori',
					actions: {
						listAction: '../jq_php/admin_users_list.php',
						createAction: '../jq_php/admin_user_add.php',
						updateAction: '../jq_php/admin_user_update.php',
						deleteAction: '../jq_php/admin_user_delete.php'
					},
					fields: {
						id: {
							key: true,
							list: false
						},
						nrcrt: {
								title: 'Nr crt',
								width: '3%',
								create: false,
								edit: false							

						},
						username: {
							title: 'Nume cont',
							width: '10%'
						},
						password: {
						     title: 'Parola',
							 width: '5%',
							 list: false,
							 type: 'password',
						},
						email: {
							title: 'Email',
							width: '10%'
						},
						id_account: {
							title: 'Tip cont',
							width: '5%',
							options: "../jq_php/get_account_type.php",
							create: false,
							edit: false
						},
						activ: {
							title: 'Cont activ?(1-da;0-nu)',
							width: '10%',
							options:{"0":"Nu","1":"Da"},
						},
						ip: {
							title: 'Date conectare',
							width: '10%',
						    create: false,
							edit: false							
						},
						data_insert: {
							title: 'Data creare cont',
							width: '10%',
							create: false,
							edit: false,
						},
						
					},
					formCreated: function (event, data) {
						data.form.find('input[name="username"]').addClass('validate[required,ajax[ajaxNameCallPhp]]');
						data.form.find('input[name="email"]').addClass('validate[required,custom[email],ajax[ajaxNameCallPhp]]]');
						data.form.find('input[name="password"]').addClass('validate[required]');
		                data.form.validationEngine();
		            },
				    formSubmitting: function (event, data) {
						return data.form.validationEngine('validate');
						},
				    formClosed: function (event, data) {
						data.form.validationEngine('hide');
						data.form.validationEngine('detach');
				    }
				});
				$('#admin_users').jtable("load");
			});
		</script>
{/literal}

<div id="form_title">Administrare utilizatori</div>
<div id="admin_users"></div>
<!--{foreach from=$users key=user_type item=users_array}
		{if $user_type==10}
				<div class="account_type">Cont de administrator</div>
		{elseif $user_type==0}
				<div class="account_type">Cont de user</div>
		{/if}
		
		<div id="users_table">
				<table border="1" cellpadding="0" cellspacing="0">
						<thead>
								<tr>
										<td>Nr crt</td>
										<td>Nume cont</td>
										<td>Email</td>
										<td>Tip</td>
										<td>Cont activ? (0-nu,1-da)</td>
										<td>Date conectare</td>
										<td>Data creare cont </td>
								</tr>
						</thead>
						<tbody>
								{$i=1}
								{foreach from=$users_array key=id item=user}
										<tr>
												<td>{$i++}</td>
												<td>{$user['username']}</td>
												<td>{$user['email']}</td>
												<td>{$user['type']}</td>
												<td>{$user['activ']}</td>
												<td>{$user['ip']}</td>
												<td>{$user['cont_creat']}</td>
										</tr>
								{/foreach}
						</tbody>
				</table>
		</div>
{/foreach}-->
{include file="footer.tpl"}
