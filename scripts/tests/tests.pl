#!/usr/bin/perl

use strict;
use warnings;
use Test::Harness;

my $testdir = '/home/www/zonglovani.info/scripts/tests';

my %args = (
	   failures => 1,
	   color => 1,
	   jobs => 4,
		 rules => {
		 seq => [
						 { par => "$testdir/*.t" },
					  ]
		 }
);

my $harness = TAP::Harness->new( \%args );

my @tests=glob("$testdir/*.t");

$harness->runtests(@tests);
system "sudo", "/bin/bash", "$testdir/clean.sh";
