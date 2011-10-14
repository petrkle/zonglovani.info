\section{literal}{{/literal}{$trik.about.nazev}{literal}}{/literal}

{assign var='imagenum' value='0'}
{foreach from=$trik.kroky item=krok key=k name=postup}
{if isset($krok.nadpis)}
\subsection{literal}{{/literal}{$krok.nadpis}{literal}}{/literal}
{/if}
{if isset($krok.obrazek)}
		\begin{literal}{{/literal}minipage{literal}}{/literal}[h]{literal}{{/literal}.4\textwidth{literal}}{/literal}
    \includegraphics[width=1\textwidth]{literal}{{/literal}img/{$krok.obrazek|truncate:1:""}/{$krok.obrazek}{literal}}{/literal}
		\end{literal}{{/literal}minipage{literal}}{/literal}
{assign var='sobrazkem' value=1}
{else}
{assign var='sobrazkem' value=0}
{/if}
{if isset($krok.popisek)}
{if $sobrazkem==1}
\hfill
\begin{literal}{{/literal}minipage{literal}}{/literal}[h]{literal}{{/literal}.5\textwidth{literal}}{/literal}
{$krok.popisek}
\end{literal}{{/literal}minipage{literal}}{/literal}

{else}
\begin{literal}{{/literal}minipage{literal}}{/literal}[h]{literal}{{/literal}1\textwidth{literal}}{/literal}
{$krok.popisek}
\end{literal}{{/literal}minipage{literal}}{/literal}

{/if}
{/if}
{/foreach}
