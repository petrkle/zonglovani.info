<h1>{$titulek}</h1>

<p>
Před vytvořením účtu si, prosím, přečti následující pravidla.
</p>

<h3>Výhody pro uživatele</h3>
{include file='vyhody-uctu.tpl'}

<h3>Povinnosti uživatele</h3>
<ul>
<li>Do žonglérova slabikáře budu psát jenom pravdivé informace, které neodporují zákonům ČR a dobrým mravům.</li>
<li>Vyvaruji se nadměrného používání smajlíků :-)</li>
</ul>

<h3>Povinnosti správce</h3>
<ul>
<li>Osobní údaje které zadáš při vytváření účtu NEBUDOU použity k rozesílání spamu ani předány třetím osobám.</li>
</ul>

<h3>Další pravidla</h3>
<ul>
<li>Uživatelům porušující tato pravidla bude zablokován účet.</li>
<li>Účty nepoužívané déle jak rok budou odstraněny.</li>
<li>Tvůj účet se objeví v <a href="{$smarty.const.LIDE_URL}" title="Seznam uživatelských účtů.">seznamu uživatelů</a> žonglérova slabikáře. Budou tě moct kontaktovat další žongléři. Nebo lidé kteří shánějí žongléry a chtějí jim zaplatit za vystoupení.</li>
<li>Účet můžeš kdykoliv zrušit.</li>
</ul>

<form action="{$SCRIPT_NAME}" method="post">
<p class="vpravo">
<input type="submit" name="ne" value="Nesouhlasím" class="knoflik" />
<input type="submit" name="jo" value="Souhlasím" class="knoflik" />
</p>

</form>
