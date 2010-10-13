#!/usr/bin/perl -w
use strict;

sub get_vypocet($){
	my($content) = @_;
	$content =~ s/.*<label for="antispam" class="kratkypopis">(.*):<\/label>.*/$1/s;
	my $antispam = lc($content);
	my @antispam = split(/ /,$antispam);

	my %cislice = (
	'jedna'=>'1',
	'dva'=>'2',
	'tři'=>'3',
	'pět'=>'5',
	'sedm'=>'7',
	'osm'=>'8',
	'devět'=>'9',
			);

	my %znamenka=(
	'plus'=>'+',
	'mínus'=>'-',
	'krát'=>'*',
	);

	my $vysledek = eval("$cislice{$antispam[0]} $znamenka{$antispam[1]} $cislice{$antispam[2]};");
	return $vysledek;
}

1;
