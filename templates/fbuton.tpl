{if isset($nahled)}
<form method="get" action="http://www.facebook.com/sharer.php"><p><input type="hidden" name="u" value="http://{$smarty.server.SERVER_NAME}{$smarty.server.REQUEST_URI}"><input type="submit" value="Klikni ZDE a sdílej 
{$fbsdileni|default:"tento článek"} na Facebooku" style="font-weight:bold;padding:10px 25px;cursor:pointer;" /></p></form>
{/if}
