{if $zverokruh}

<form action="{$smarty.server.REQUEST_URI}" method="post">
<table class="horotable">
<tr>
<td colspan="4"><label><input type="radio" name="znameni" value="n" {if $znameni=='n'} checked="checked"{/if} /> Nezadáno</label></td>
</tr>

{foreach from=$zverokruh item=znam key=klic}
<tr>
<td><input type="radio" name="znameni" value="{$klic|escape}"{if $znameni==$klic} checked="checked"{/if} id="zn-{$klic}"/></td>
<td><label for="zn-{$klic}">{$znam.popis}</label></td>
<td><label for="zn-{$klic}"><span style="padding: 0 20px;">{obrazek soubor="horoskop-$klic-maly.png" popisek=$znam.popis}</span></label></td>
<td><label for="zn-{$klic}">{$znam.od_den}. {$znam.od_mesic}. - {$znam.do_den}. {$znam.do_mesic}.</label></td>
</tr>
{/foreach}
</table>

<p class="vpravo">
<input type="submit" name="odeslat" value="Nastavit" class="knoflik" tabindex="3" />
</p>
</form>
{/if}
