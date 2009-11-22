{if is_array($uzivatele)}
{if $smarty.session.logged!=true}
<p>Po <a href="{$smarty.const.LIDE_URL}pravidla.php" title="Založení nového účtu.">vytvoření účtu</a> budeš moct zadávat události do <a href="{$smarty.const.CALENDAR_URL}">kalendáře</a> a psát do <a href="{$smarty.const.DISKUSE_URL}" title="Diskuse o žonglování">diskuse</a>. Budou tě moct kontaktovat další žongléři. Nebo lidé kteří shánějí žongléry a chtějí jim zaplatit za vystoupení.</p>
<p>
<a href="{$smarty.const.LIDE_URL}pravidla.php" title="Vytvořit uživatelský účet." class="add">Vytvořit nový účet</a>.
</p>
<h3>Seznam uživatelů</h3>
{/if}
<ul>
{foreach from=$uzivatele item=uzivatel}
<li><a href="{$smarty.const.LIDE_URL}{$uzivatel}.html" title="Profil uživatele {$uzivatel}">{$uzivatel}</a></li>
{/foreach}
</ul>
{/if}
