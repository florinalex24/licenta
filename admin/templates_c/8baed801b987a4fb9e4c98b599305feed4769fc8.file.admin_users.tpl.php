<?php /* Smarty version Smarty-3.1.13, created on 2013-02-28 15:30:50
         compiled from ".\templates\admin_users.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20372512cbf7ddca702-16004829%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8baed801b987a4fb9e4c98b599305feed4769fc8' => 
    array (
      0 => '.\\templates\\admin_users.tpl',
      1 => 1362058248,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20372512cbf7ddca702-16004829',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_512cbf7de74292_23892389',
  'variables' => 
  array (
    'users' => 0,
    'user_type' => 0,
    'users_array' => 0,
    'i' => 0,
    'user' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_512cbf7de74292_23892389')) {function content_512cbf7de74292_23892389($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array('title'=>"User administration"), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("admin_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>


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


<div id="form_title">Administrare utilizatori</div>
<div id="admin_users"></div>
<!--<?php  $_smarty_tpl->tpl_vars['users_array'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['users_array']->_loop = false;
 $_smarty_tpl->tpl_vars['user_type'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['users']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['users_array']->key => $_smarty_tpl->tpl_vars['users_array']->value){
$_smarty_tpl->tpl_vars['users_array']->_loop = true;
 $_smarty_tpl->tpl_vars['user_type']->value = $_smarty_tpl->tpl_vars['users_array']->key;
?>
		<?php if ($_smarty_tpl->tpl_vars['user_type']->value==10){?>
				<div class="account_type">Cont de administrator</div>
		<?php }elseif($_smarty_tpl->tpl_vars['user_type']->value==0){?>
				<div class="account_type">Cont de user</div>
		<?php }?>
		
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
								<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(1, null, 0);?>
								<?php  $_smarty_tpl->tpl_vars['user'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['user']->_loop = false;
 $_smarty_tpl->tpl_vars['id'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['users_array']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['user']->key => $_smarty_tpl->tpl_vars['user']->value){
$_smarty_tpl->tpl_vars['user']->_loop = true;
 $_smarty_tpl->tpl_vars['id']->value = $_smarty_tpl->tpl_vars['user']->key;
?>
										<tr>
												<td><?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['user']->value['username'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['user']->value['email'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['user']->value['type'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['user']->value['activ'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['user']->value['ip'];?>
</td>
												<td><?php echo $_smarty_tpl->tpl_vars['user']->value['cont_creat'];?>
</td>
										</tr>
								<?php } ?>
						</tbody>
				</table>
		</div>
<?php } ?>-->
<?php echo $_smarty_tpl->getSubTemplate ("footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>