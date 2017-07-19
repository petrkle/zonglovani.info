<?php

function smarty_modifier_mailobfuscate($string)
{
    return "<a href=\"mailto:$string?subject=Žonglování\" class=\"email\">$string</a>";
}
