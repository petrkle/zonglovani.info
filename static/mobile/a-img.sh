#!/bin/bash

find zongleruv-slabikar -type f -name "*.html" -exec sed -i 's/<a \(href[^>]*\) class="external" \([^>]*\)><img/<a \1 \2><img/g' \{\} \;
