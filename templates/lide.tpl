<ul>
<li>Vytvo�it <a href="pravidla.php" title="Vytvo�it nov� ��et.">nov� ��et</a>.</li>
<li>Obnovit <a href="zapomenute-heslo.php" title="Zapomenut� heslo.">zapomenut� heslo</a>.</li>
<li><a href="prihlaseni.php" title="Formul�� pro p�ihl�en�.">P�ihl�en�</a> do �ongl�rova slabik��e.</li>
</ul>
{if is_array($uzivatele)}
<h3>Seznam u�ivatel�</h3>
<ul>
{foreach from=$uzivatele item=uzivatel}
<li><a href="{$smarty.const.LIDE_URL}{$uzivatel}.html" title="Profil u�ivatele {$uzivatel}">{$uzivatel}</a></li>
{/foreach}
</ul>
{/if}
