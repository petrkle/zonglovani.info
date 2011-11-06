<h1>{$titulek}</h1>

{include file='pravidla-ucet.tpl'}

{if $smarty.session.logged!=true}
<form action="{$SCRIPT_NAME}" method="post">
<p class="vpravo">
<input type="submit" name="ne" value="Nesouhlasím" class="knoflik" />
<input type="submit" name="jo" value="Souhlasím" class="knoflik" />
</p>
</form>
{/if}
