#!/usr/bin/perl -w

use strict;
use Test::Harness;

my @tests=glob('/home/www/zonglovani.info/scripts/tests/*.t');

runtests(@tests);