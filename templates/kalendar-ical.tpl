{* /* vim: set ff=dos: */ *}
BEGIN:VCALENDAR
VERSION:2.0
PRODID:-//zongleruv-slabikar
BEGIN:VTIMEZONE
TZID:Europe/Prague
X-LIC-LOCATION:Europe/Prague
BEGIN:DAYLIGHT
TZOFFSETFROM:+0100
TZOFFSETTO:+0200
TZNAME:CEST
DTSTART:19700329T020000
RRULE:FREQ=YEARLY;INTERVAL=1;BYDAY=-1SU;BYMONTH=3
END:DAYLIGHT
BEGIN:STANDARD
TZOFFSETFROM:+0200
TZOFFSETTO:+0100
TZNAME:CET
DTSTART:19701025T030000
RRULE:FREQ=YEARLY;INTERVAL=1;BYDAY=-1SU;BYMONTH=10
END:STANDARD
END:VTIMEZONE
{foreach from=$events item=udalost}
BEGIN:VEVENT
DTSTART:{$udalost.start_ical|escape}
DTEND:{$udalost.end_ical|escape}
SUMMARY:{$udalost.title|replace:',':'\\,'|escape}
DESCRIPTION:{$udalost.desc|escape|replace:';':'\\;'|replace:',':'\\,'}
LOCATION:{$udalost.misto|escape|replace:';':'\\;'|replace:',':'\\,'}
DTSTAMP:{$udalost.insert_ical|escape}
UID:{$udalost.id|escape}-zonglovani.info
{if $udalost.img}ATTACH:http://{$smarty.server.SERVER_NAME}/kalendar/obrazek-{$udalost.img|escape}
{/if}
END:VEVENT
{/foreach}
END:VCALENDAR
