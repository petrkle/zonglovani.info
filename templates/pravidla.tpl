<h1>{$titulek}</h1>

{if $smarty.session.logged!=true}
<p>
Před založením účtu si, prosím, přečti následující pravidla.
</p>
{/if}

<h3>Výhody pro uživatele</h3>
{include file='vyhody-uctu.tpl'}
{include file='pravidla-ucet.tpl'}

{if $smarty.session.logged!=true}
<form action="{$SCRIPT_NAME}" method="post">
<p class="vpravo">
<input type="submit" name="ne" value="Nesouhlasím" class="knoflik" />
<input type="submit" name="jo" value="Souhlasím" class="knoflik" />
</p>
</form>
{/if}
