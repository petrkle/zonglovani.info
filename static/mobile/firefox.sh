#!/bin/bash

ZSDIR="zongleruv-slabikar"

VERSION=$1

cat manifest.webapp | sed "s/\[VERSION\]/$VERSION/" > $ZSDIR/manifest.webapp

find $ZSDIR -name "*.html" -exec sed -i 's/^Jste zde:.*//;s/class="external"/class="external" target="_blank"/g' \{\} \;
