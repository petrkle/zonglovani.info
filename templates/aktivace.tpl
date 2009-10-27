<p>
{if !isset($chyba)}
Na tvůj e-mail ({$smarty.session.reg_email|escape}) byla odeslána zpráva potřebná k dokončení registrace.
{else}
Jejda. Vytváření účtu selhalo.
{/if}
</p>
