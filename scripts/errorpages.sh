#!/bin/bash

set -e

for foo in 403 404 503
do
	php scripts/$foo.php > $foo.html
done
