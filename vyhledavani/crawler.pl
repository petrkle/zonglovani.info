#!/usr/bin/env perl
use 5.010;
use open qw(:locale);
use strict;
use utf8;
use warnings qw(all);

use Mojo::UserAgent;
use DBI;
use Config::Any;

my @conffile = ('/usr/local/etc/zongl.conf.pl');
my $cfg = Config::Any->load_files({files => \@conffile, use_ext => 1});
$cfg = $cfg->[0]{$conffile[0]};

our $dbh = DBI->connect("DBI:mysql:database=$cfg->{database};host=localhost", "$cfg->{user}", "$cfg->{password}", {'RaiseError' => 1});

$dbh->do("set names utf8");
$dbh->{mysql_enable_utf8} = 1;
$dbh->do("DROP TABLE IF EXISTS data;");
$dbh->do("CREATE TABLE data (id int primary key auto_increment, url varchar(1024), title varchar(1024), content longtext, img varchar(1024));");

my @startpoints = (
	"https://$cfg->{domain}/",
	"https://$cfg->{domain}/diskuse/stranka1.html",
);

# FIFO queue
my @urls = map { Mojo::URL->new($_) } @startpoints;

# Limit parallel connections
my $max_conn = 5;

# User agent following up to 5 redirects
my $ua = Mojo::UserAgent->new(max_redirects => 0);

my $t = $ua->transactor;
$ua   = $ua->transactor(Mojo::UserAgent::Transactor->new);
$ua->transactor->name($cfg->{ua});

# Keep track of active connections
my $active = 0;

Mojo::IOLoop->recurring(
    0 => sub {
        for ($active + 1 .. $max_conn) {

            # Dequeue or halt if there are no active crawlers anymore
            return ($active or Mojo::IOLoop->stop)
                unless my $url = shift @urls;

            # Fetch non-blocking just by adding
            # a callback and marking as active
            ++$active;
            $ua->get($url => \&get_callback);
        }
    }
);

# Start event loop if necessary
Mojo::IOLoop->start unless Mojo::IOLoop->is_running;

sub get_callback {
    my (undef, $tx) = @_;

    # Deactivate
    --$active;

    # Parse only OK HTML responses
    return
        if not $tx->res->is_status_class(200)
        or $tx->res->headers->content_type !~ m{^text/html\b}ix;

    # Request URL
    my $url = $tx->req->url;

    parse_html($url, $tx);

    return;
}

sub parse_html {
    my ($url, $tx) = @_;

    # Extract and enqueue URLs
    for my $e ($tx->res->dom('a[href]')->each) {

        # Validate href attribute
        my $link = Mojo::URL->new($e->{href});
        next if 'Mojo::URL' ne ref $link;

				next if $e->{rel} and $e->{rel} =~ /nofollow/;

        # "normalize" link
        $link = $link->to_abs($tx->req->url)->fragment(undef);
        next unless grep { $link->protocol eq $_ } qw(http https);

        # Don't go deeper than /a/b/c
        next if @{$link->path->parts} > 3;

				next if $link->to_string =~ /kalendar\/\d{4}-\d{2}\.html/;

				next if $link->to_string =~ /horoskop\/.+\.html/;

				next if $link->to_string =~ /obrazky\/.*\/\d{4}.html/;

				next if $link->to_string =~ /obrazky\/.*\/stranka\d\/$/;

        # Access every link only once
        state $uniq = {};
        ++$uniq->{$url->to_string};
        next if ++$uniq->{$link->to_string} > 1;

        # Don't visit other hosts
        next if $link->host !~ /$cfg->{domain}/;

        push @urls, $link;
    }

		my @removethis = (
		'script',
		'style',
		'div#paticka',
		'div#menu',
		'p.drobky',
		'div#hlavicka',
		'div.kamdal',
		'p.strankovani',
	);

		foreach my $foo (@removethis){
			for my $node ($tx->res->dom->find($foo)->each) {
					$node->remove;
			}
		}

		my $adresa = $url;
		$adresa =~ s/^https:\/\/$cfg->{domain}//;
		my $titulek = $tx->res->dom->at('html title')->text;
		my $img = $tx->res->dom->at('html head link[rel="image_src"]')->attr("href");
		$img =~ s/.*$cfg->{domain}\//\//;
		my $obsah = $tx->res->dom->at('html body')->all_text;
		my $sth = $dbh->prepare('INSERT INTO data VALUES (?, ?, ?, ?, ?);');
		$sth->execute(undef, $adresa, $titulek, $obsah, $img);

    return;
}
