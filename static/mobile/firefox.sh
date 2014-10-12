#!/bin/bash

ZSDIR="zongleruv-slabikar"

VERSION=$1

cat manifest.webapp | sed "s/\[VERSION\]/$VERSION/" > $ZSDIR/manifest.webapp
