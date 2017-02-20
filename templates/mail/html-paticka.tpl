{if !isset($hide_signature)}
<p>Petr</p>
<table border="0" cellspacing="2" cellpadding="2">
	<tr><td colspan="2"><hr style="color:#000;background-color:#000;height:1px;border:0;"/></td></tr>
	<tr>
		<td><a href="https://{$smarty.const.ZS_DOMAIN}/"><img src="cid:5micku.png@{if isset($cid_sender_domain)}{$cid_sender_domain}{else}{$smarty.const.ZS_DOMAIN}{/if}" width="108" height="104"/></a></td>
		<td>
			<table border="0" cellspacing="2" cellpadding="2">
				<tr><td>Petr Kletečka</td></tr>
				<tr><td><a href="mailto:admin@{$smarty.const.ZS_DOMAIN}">admin@{$smarty.const.ZS_DOMAIN}</a></td></tr>
				<tr><td><a href="https://{$smarty.const.ZS_DOMAIN}/kontakt.html">www.{$smarty.const.ZS_DOMAIN}/kontakt.html</a></td></tr>
			</table>
		</td>
	</tr>
</table>
{/if}

</body>
</html>
