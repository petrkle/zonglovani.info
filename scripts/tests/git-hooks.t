#!/usr/bin/perl
use strict;
use warnings;
use Test::More tests => 3;

ok(-l ".git/hooks/pre-commit", "pre-commit je link");
ok(readlink(".git/hooks/pre-commit") =~ /\/home\/www\/zonglovani\.info\/scripts\/git-hooks\/pre-commit/, "správný pre-commit script");
ok(-x ".git/hooks/pre-commit", "pre-commit je spustitelný");
