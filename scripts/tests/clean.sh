#!/bin/bash

ZONGL=/home/www/zonglovani.info

sudo chmod -R oug+w $ZONGL/{tmp,data}
sudo rm -f $ZONGL/tmp/templages_c/*
sudo sed -i "/WWW-Mechanize/d" $ZONGL/data/lide/pek/prihlaseni.txt
sudo rm -f /home/fakemail/*
sudo rm -rf $ZONGL/data/lide/tst*
sudo rm -rf $ZONGL/data/lide.by.mail/tst*
sudo rm -rf $ZONGL/data/lide.tmp/*
sudo find $ZONGL/data -not -user petr -delete
