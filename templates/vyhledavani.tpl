<form action="{$smarty.const.SEARCH_URL}" method="get">
<fieldset>
	<legend>Vyhledávání</legend>
	<p>
	<input type="text" name="query" id="query" value="{if isset($q)}{$q|escape}{/if}" accesskey="4" required />	
	<input type="submit" value="Najít" />
	</p>
</fieldset>
</form>
