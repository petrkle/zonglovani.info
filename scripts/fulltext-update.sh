#!/bin/bash

SEARCH_ADMIN=`grep "admin=" vyhledavani/set/auth.php | sed "s/.*='//;s/'.*//"`
SEARCH_ADMIN_PW=`grep SEARCH_ADMIN_PW site-secrets.php | sed "s/.*,'//;s/'.*//;"`
DATABASE=`grep "database=" vyhledavani/settings/database.php | sed "s/.*='//;s/'.*//"`
MYSQL_USER=`grep "mysql_user=" vyhledavani/settings/database.php | sed "s/.*='//;s/'.*//"`
MYSQL_PASS=`grep MYSQL_PASS site-secrets.php | sed "s/.*,'//;s/'.*//;"`
MYSQL_HOST=`grep "mysql_host=" vyhledavani/settings/database.php | sed "s/.*='//;s/'.*//"`
COOKIES="data/search.cookies"
LOG="data/index-log.html"

echo "use $DATABASE;\
TRUNCATE \`search_categories\`;\
TRUNCATE \`search_domains\`;\
TRUNCATE \`search_keywords\`;\
TRUNCATE \`search_links\`;\
TRUNCATE \`search_link_keyword0\`;\
TRUNCATE \`search_link_keyword1\`;\
TRUNCATE \`search_link_keyword2\`;\
TRUNCATE \`search_link_keyword3\`;\
TRUNCATE \`search_link_keyword4\`;\
TRUNCATE \`search_link_keyword5\`;\
TRUNCATE \`search_link_keyword6\`;\
TRUNCATE \`search_link_keyword7\`;\
TRUNCATE \`search_link_keyword8\`;\
TRUNCATE \`search_link_keyword9\`;\
TRUNCATE \`search_link_keyworda\`;\
TRUNCATE \`search_link_keywordb\`;\
TRUNCATE \`search_link_keywordc\`;\
TRUNCATE \`search_link_keywordd\`;\
TRUNCATE \`search_link_keyworde\`;\
TRUNCATE \`search_link_keywordf\`;\
TRUNCATE \`search_pending\`;\
TRUNCATE \`search_query_log\`;\
TRUNCATE \`search_sites\`;\
TRUNCATE \`search_site_category\`;\
TRUNCATE \`search_temp\`;\
INSERT INTO \`search-zonglovan\`.\`search_sites\` (\`site_id\` ,\`url\` ,\`title\` ,\`short_desc\` ,\`indexdate\` ,\`spider_depth\` ,\`required\` ,\`disallowed\` ,\`can_leave_domain\`)VALUES ('1', 'http://zongl.info/', 'slabikar', 'zongleruv slabikar', NULL , '-1', NULL, 'prihlaseni.php?next=\n*/obrazky.*html/\n*/horoskop.*html/' , NULL);\
	\\q" | \
	mysql -u $MYSQL_USER --password=$MYSQL_PASS -h $MYSQL_HOST $DATABASE

wget --keep-session-cookies --save-cookies $COOKIES --post-data="user=$SEARCH_ADMIN&pass=$SEARCH_ADMIN_PW" -qO /dev/null http://zongl.info/vyhledavani/set/auth.php
wget --load-cookies $COOKIES -qO $LOG "http://zongl.info/vyhledavani/set/spider.php?all=1"

[ -f $COOKIES ] && rm $COOKIES

mysqldump -u $MYSQL_USER --password=$MYSQL_PASS -h $MYSQL_HOST --opt $DATABASE | sed "s/zongl\.info/zonglovani.info/g" | bzip2 -9 > data/dump.sql.bz2

lftp -u www.zonglovani.info ftp://zonglovani.info -e "cd data; put data/dump.sql.bz2; exit" && wget --post-data="updatedb=jo&passwd=$MYSQL_PASS" -qO - "http://zonglovani.info/admin/db-import.php"
