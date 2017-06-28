#!/bin/bash

set -e

for foo in 403 404 503
do
	wget --content-on-error -qO $foo.html https://zongl.info/$foo.php
done
