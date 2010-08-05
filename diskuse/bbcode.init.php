<?php

	$bbcode = new BBCode;
	$bbcode->SetEnableSmileys(false);
	
	$bbcode->ClearRules();
	$bbcode->AddRule('b',
Array(
'simple_start' => '<b>',
'simple_end' => '</b>',
'class' => 'inline',
'allow_in' => Array('listitem', 'block', 'columns', 'inline', 'link'),
'content' => BBCODE_REQUIRED,
'plain_start' => '<b>',
'plain_end' => '</b>')
		);

	$bbcode->AddRule('i',
Array(
'simple_start' => '<i>',
'simple_end' => '</i>',
'class' => 'inline',
'allow_in' => Array('listitem', 'block', 'columns', 'inline', 'link'),
'content' => BBCODE_REQUIRED,
'plain_start' => '<i>',
'plain_end' => '</i>')
		);

$bbcode->AddRule('url', Array(
	'mode' => BBCODE_MODE_CALLBACK,
	'method' => 'MyDoURL',
	'class' => 'block',
	'allow_in' => Array('listitem', 'block', 'columns'),
));

$bbcode->AddRule('email', Array(
	'mode' => BBCODE_MODE_CALLBACK,
	'method' => 'MyDoEmail',
	'class' => 'block',
	'allow_in' => Array('listitem', 'block', 'columns'),
));

function MyDoEmail($bbcode, $action, $name, $default, $params, $content) {
if ($action == BBCODE_CHECK) return true;
$email = is_string($default) ? $default : $bbcode->UnHTMLEncode(strip_tags($content));
if ($bbcode->IsValidEmail($email))
return str_replace('@','<img src="http://'.$_SERVER['SERVER_NAME'].'/img/z/zavinac.serif.png" alt="@" width="16" height="15" />',$content);
else return htmlspecialchars($params['_tag']) . $content . htmlspecialchars($params['_endtag']);
}

function MyDoURL($bbcode, $action, $name, $default, $params, $content) {
	if ($action == BBCODE_CHECK) return true;
		$url = is_string($default) ? $default : $bbcode->UnHTMLEncode(strip_tags($content));
	if ($bbcode->IsValidURL($url)) {
		if(preg_match('/^\//',$url) or preg_match('/^http:\/\/zongl(|ovani)\.info.*/',$url)){
			$pridavky='';
		}else{
			$pridavky=' class="external" rel="nofollow" onclick="pageTracker._trackPageview(\'/goto/'.htmlspecialchars(preg_replace('/^http:\/\//','',$url)).'\');"';
		}
	return '<a href="'. $prefix . htmlspecialchars($url) . '"' . $pridavky . '>' . $content . '</a>';
	}else{
		 return htmlspecialchars($params['_tag']) . $content . htmlspecialchars($params['_endtag']);
	}
}

?>
