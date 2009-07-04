<ul>
<li>Vytvoøit <a href="pravidla.php" title="Vytvoøit nový úèet.">nový úèet</a>.</li>
<li>Obnovit <a href="zapomenute-heslo.php" title="Zapomenuté heslo.">zapomenuté heslo</a>.</li>
<li><a href="prihlaseni.php" title="Formuláø pro pøihlá¹ení.">Pøihlá¹ení</a> do ¾onglérova slabikáøe.</li>
</ul>
{if is_array($uzivatele)}
<h3>Seznam u¾ivatelù</h3>
<ul>
{foreach from=$uzivatele item=uzivatel}
<li><a href="{$smarty.const.LIDE_URL}{$uzivatel}.html" title="Profil u¾ivatele {$uzivatel}">{$uzivatel}</a></li>
{/foreach}
</ul>
{/if}
