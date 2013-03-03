{config_load file="test.conf" section="setup"}
{include file="header.tpl" title="TO"}
{literal}
	<script type="text/javascript">
		$(document).ready(function(){
			$("#login_form").loginForm();
		})
	</script>
{/literal}


{include file="footer.tpl"}
