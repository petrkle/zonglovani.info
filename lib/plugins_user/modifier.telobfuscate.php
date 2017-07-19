<?php

function smarty_modifier_telobfuscate($string)
{
    return "<a href=\"tel:$string\" class=\"tel\">$string</a>";
}
