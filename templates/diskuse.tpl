{if is_array($items)}

{if $page_numbers.total > 1 and count($items)>5}
<p class="strankovani">
Stránkování: {$pager_links}
</p>
{/if}
{foreach from=$items item=zprava}

<a name="{$zprava.cas|escape}"></a>
<table class="diskuse" cellspacing="0" cellpadding="0">
<tr>
<th>Uživatel</th>
<td><a href="{$smarty.const.LIDE_URL}{$zprava.autor|escape}.html" title="Podrobnosti o uživateli {$zprava.autor|escape}.">{$zprava.autor_hr|escape}</a></td>
<th>Datum</th>
<td>{$zprava.datum_hr|escape}</td>
<th>Čas</th>
<td>{$zprava.cas_hr|escape}</td>
</tr>
<tr><td colspan="6" class="wrap">{$zprava.text}</td></tr>
</table>
{/foreach}

{if $page_numbers.total > 1}
<p class="strankovani">
Stránkování: {$pager_links}
</p>
<script async src="/strankovani-{$smarty.const.JS_CHKSUM}.js" type="text/javascript"></script>
{/if}

{/if}
