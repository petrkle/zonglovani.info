#!/usr/bin/perl -w
use strict;
use Email::MIME;
use HTML::TreeBuilder;
use HTML::FormatText;

sub get_vypocet{
	my $content = shift;
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

sub get_html_part {
    my $part = shift;
    my $content_type = $part->content_type;
    my $body = $part->body;
    if ($content_type =~ m#text/html#) {
        return html2text($body);
    } elsif ($content_type =~ m#multipart/#) {
        for my $subpart ($part->parts) {
            my $text = get_html_part($subpart);
            return $text if defined $text;
        }
    }
    return;
}

sub html2text {
    my $html = shift;
		my $tree = HTML::TreeBuilder->new_from_content(decode_utf8($html));
    return $tree->format(HTML::FormatText->new);
}
1;
