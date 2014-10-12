#!/bin/bash

find zongleruv-slabikar -type f -name "*.html" -exec sed -i 's/<a \(href[^>]*\) class="external" \([^>]*\)><img src="\([^"]*\)" style="/<a \1 \2><img src="\3" style="border:solid 2px #009;/g' \{\} \;
