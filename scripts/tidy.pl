#!/usr/bin/env perl

use strict;
use warnings;
use XML::Tidy;
use File::Slurp;
use Encode;

my $xml = read_file($ARGV[0]);

my $tidy_obj = XML::Tidy->new('xml' => decode_utf8($xml));
$tidy_obj->tidy("\t");

$xml = encode_utf8($tidy_obj->toString());

$xml =~ s/<popisek>\n/<popisek>/g;
$xml =~ s/\n<\/popisek>/<\/popisek>/g;

print $xml;
