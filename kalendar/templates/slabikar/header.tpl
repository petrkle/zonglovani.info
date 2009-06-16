<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset={CHARSET}" />
	<title>{CALENDAR_NAME} - {DISPLAY_DATE}</title>
  	<link rel="stylesheet" type="text/css" href="{DEFAULT_PATH}/templates/{TEMPLATE}/slabikar.css" />
	<!-- switch rss_available on -->
	<link rel="alternate" type="application/rss+xml" title="RSS" href="{DEFAULT_PATH}/rss/rss.php?cal={CAL}&amp;rssview={CURRENT_VIEW}">
	<!-- switch rss_available off -->		
	{EVENT_JS}
</head>
<body>
<form name="eventPopupForm" id="eventPopupForm" method="post" action="includes/event.php" style="display: none;">
  <input type="hidden" name="date" id="date" value="" />
  <input type="hidden" name="time" id="time" value="" />
  <input type="hidden" name="uid" id="uid" value="" />
  <input type="hidden" name="cpath" id="cpath" value="" />
  <input type="hidden" name="event_data" id="event_data" value="" />
</form>
<form name="todoPopupForm" id="todoPopupForm" method="post" action="includes/todo.php" style="display: none;">
  <input type="hidden" name="todo_data" id="todo_data" value="" />
  <input type="hidden" name="todo_text" id="todo_text" value="" />
</form>

<div id="hlavicka">
<a name="nahore" id="nahore"></a>
<div style="background: url('/img/k/kalendar.png') no-repeat 95% 10px;"><a href="/" title="Žonglérův slabikář - úvodní stránka."><img src="/img/l/logo.gif" width="442" height="71" title="Žonglérův slabikář - úvodní stránka." alt="Žonglérův slabikář - úvodní stránka." />
</a>
</div>
</div>

<div id="stranka">
<div id="ramecek">
<div id="obsah">
