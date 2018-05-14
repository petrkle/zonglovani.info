#!/bin/bash

set -e

for foo in 403 404 410 503
do
	php scripts/$foo.php > $foo.html
done

php scripts/css-width.php > css/photo.css
