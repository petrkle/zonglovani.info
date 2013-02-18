#!/bin/bash

SUM=`cat css/*.css | cksum | cut -d" " -f1`

sed -i "s/define('CSS_CHKSUM','[0-9]\+');/define('CSS_CHKSUM','$SUM');/" init.php
