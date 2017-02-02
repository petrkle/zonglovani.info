#!/bin/bash
set -e

SUM=`cat js/*.js | cksum | cut -d" " -f1`

sed -i "s/define('JS_CHKSUM', '[0-9]\+');/define('JS_CHKSUM', '$SUM');/" init.php
