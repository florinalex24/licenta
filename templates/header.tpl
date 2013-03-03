<HTML>
<HEAD>
<TITLE>{$title} - {$Name}</TITLE>
{include file="js_css.tpl"}

</HEAD>
<BODY bgcolor="#ffffff">
    <!--header section-->
    {if isset($is_admin) && $is_admin==10}
        <a href="admin/index.php">Admin</a>
        <a href="logout.php">Logout</a>
    {else}
    {/if}
    
<div id="header">
 <div id="logo"></div>
</div>