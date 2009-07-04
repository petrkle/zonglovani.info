#!/usr/bin/perl -w
# tree.pl. Creates a nested HTML list ('sitemap') of files in a directory.
# Copyright (C) 1998-2003 Daniel Naber
# version 2.0.6, 2003-01-22
# Homepage: http://www.danielnaber.de/tree/
# See README for more information

# COPYRIGHT:
# This program is free software; you can redistribute it and/or
# modify it under the terms of the GNU General Public License
# as published by the Free Software Foundation; either version 2
# of the License, or (at your option) any later version.
#
# This program is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
# GNU General Public License for more details.
#
# You should have received a copy of the GNU General Public License
# along with this program; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.

###############################################################
# User configuration
###############################################################

### The next 4 options are important to make tree.pl work. ###

$conf::cgi = 0;				# Set to 1 to run tree.pl as a CGI script
$conf::basedir_cgi = "/home/www";	# CGI mode only: list which directory
$conf::templatefile = "";	# The template (set to "" to disable it)
$conf::baseurl = "/";		# Set first part of any URL (leave empty if unsure)

### The options below have sensible defaults, if tree.pl doesn't work ###
### at all it's probably caused by wrong values for the options above. ###

# Default-files' names (files like index.html that are shown if you use
# the URL of a directory):
@conf::defaultfiles = ('index.html', 'index.htm', 'index.php');

# Here you can decide which files will be listed, depending on the
# files' suffix. Comment in the appropriate line:
# List all files:
#@conf::file_suffixes = ();
# Only list typical web files:
@conf::file_suffixes = ('html', 'htm', 'php');
# Only list typical multimedia files:
#@conf::file_suffixes = ('mp3', 'wav', 'avi', 'wmv', 'mpg', 'mpeg');
# Only list files that have no suffix:
#@conf::file_suffixes = ('');

# Which files and directories should be included? @conf::includefiles
# will be evaluated first, @conf::excludefiles will then be used
# to filter the remaining files. You can use '*' as joker:

# Default is @conf::includefiles = (), which means 'include everything':
@conf::includefiles = ();
# Comment in the next line to include only the default files (like index.html)
# and nothing else:
#@conf::includefiles = ('*/');

# Do not include these files/directories:
@conf::excludefiles = ('/mapa-stranek.html', '/kalendar/*.html', '/lide/*.html', '/forum/*.html');
# To exclude one directory use this:
#@conf::excludefiles = ('/secret/*');
# To exclude more than one directory use this:
#@conf::excludefiles = ('/secret/*', '/anothersecret/*');

# How should the files be linked? URL, TITLE, UPDATED, SIZE, DATE, and TIME
# will be replaced by actual values:
$conf::link =<<EOF;
<a href="URL">TITLE</a>
EOF

# Link all directories, even those without default files?
$conf::link_all_directories = 0;
# If the option above is not set, use this to show directories
# without a default file:
$conf::nolink =<<EOF;
TITLE
EOF

# How to mark files that were recently modified:
$conf::updatedtag = '<strong>updated</strong> ';
# Mark those files modified more recently than $conf::update_hours hours (0 = option off):
$conf::update_hours = 3*24;

# Date format. %Y = year, %m = month, %d = day
# On a Unix system use 'man strftime' to get a list of all 
# possible options.
$conf::date_format = "%e. %B %Y";
# Time format. %H = hour, %M = minute, %S = second.
$conf::time_format = "%H:%M";

# Ignore symbolic links?
$conf::ignore_links = 1;

# maximum length of the link, taken from <title>:
$conf::max_title_length = 200;

# The default template if no $conf::templatefile is specified:
$conf::template =<<__EOF;
##sitemap##
__EOF

###############################################################
# Main program
###############################################################

# Comment in the next line if you have problems with tree.pl
# as a CGI script. Any error messages should show up in the 
# browser then:
#use CGI::Carp qw(fatalsToBrowser);

use strict;
use POSIX qw(getcwd strftime);
use CGI qw(escape);

# Prototypes:
sub main();
sub init();
sub crawl($);
sub include_file($$);
sub get_file_title($$);
sub cleanup($);
sub has_defaultfile($);
sub add_slash($);
sub get_prefix();
sub get_file_link($);
sub getsize($);
sub make_full_path($$);
sub load_part($);
sub is_it_modified($);
sub get_file_date($);
sub get_file_time($);
sub get_now_date();
sub my_uri_escape($);

main();
exit;

###############################################################
# Subroutines
###############################################################

sub main()
{

	# Possibly overwrite the base directory option:
	# SECURITY: only if not used as CGI! people could list anything otherwise
	if( $ARGV[0] && ! $conf::cgi ) {
		$conf::basedir = $ARGV[0];
	} elsif( $conf::cgi ) {
		$conf::basedir = $conf::basedir_cgi;
	} else {
		print "Usage: $0 <directory>\n";
		exit;
	}

	# Sanity checks:
	if( ! -d $conf::basedir ) {
		die "Error: $0: '$conf::basedir' does not exist, is not a directory or is not readable.\n";
	}

	my $start_dir = POSIX::getcwd();
	init();
	my $html = crawl($conf::basedir);
	# repair a bug in the generated XHTML:
	$html =~ s/<ul>\s*<\/ul>//igs;
	if( ! $html ) {
		# occurs if $conf::basedir is empty
		$html = "<li>This site map is empty</li>";
	}

	if( $conf::cgi ) {
		print "Content-Type: text/html\n\n";
	}
	
	my $load_error = 0;
	my $template = "";
	if( $conf::templatefile ) {
		chdir($start_dir) || die "Cannot chdir() to '$start_dir': $!";
		if ( ! open(INP, $conf::templatefile) ) {
			warn "Could not open template file '$conf::templatefile': $!\n";
			$load_error = 1;
		} else {
			undef $/;
			$template = (<INP>);
			close(INP);
		}
	} 
	if( ! $conf::templatefile || $load_error ) {
		$template = $conf::template;
	}

	# Replace the tokens in the template and print it:
	$template =~ s/##sitemap##/<ul>\n$html\n<\/ul>/igs;
	$template =~ s/##date##/get_now_date();/igse;
	print $template;
}

# Prepare the configuration values.
sub init()
{
	# Enable '*' as wildcard in @conf::excludefiles and @conf::includefiles
	foreach my $pat (@conf::excludefiles, @conf::includefiles) {
		$pat =~ s#\*#.*?#g;
	}
}

# The main crawl function, calls itself recursively.
$main::level = 0;	# count depth level for indentation
sub crawl($)
{
	my $dir = shift;
	$dir = $dir.add_slash($dir);
	my $file;
	my $html = "";

	$main::level++;
	chdir($dir) or (warn "Cannot chdir to '$dir': $!" and return);
	opendir(DIR, $dir) or (warn "Cannot open '$dir': $!" and return);
	my @contents = readdir(DIR);
	closedir(DIR);

	# Links may be ignored completely:
	if( $conf::ignore_links ) {
		@contents = grep { not -l } @contents; 
	}
	# No hidden files and ".." directories:
	@contents = grep {!/^\./} @contents;

	# Get directories:
	my @dirs = grep {-d} @contents;
	# Get files:
	my @files = grep {-f} @contents;

	my $prefix = get_prefix();

	my @aname = split(/\//, $dir);
	my $fuj = pop(@aname);
	$fuj =~ s/^my-test$/top/;

	$html .= "$prefix<li><a name=\"$fuj\"></a>".get_file_link($dir)."\n";
	$html .= "$prefix<ul>\n";
	
	# Go through all files in this directory except default files. Sorting 
	# by filename does not make much sense, but at least the order is defined then:
	foreach my $f (sort(@files)) {
		my ($suffix) = ($f =~ m/.*\.(.*?)$/);
		next if ( is_defaultfile($f) );
		next if ( ! include_file($f, $dir) );
		$file = make_full_path($dir, $f);
		$html .= "$prefix<li>".get_file_link($file)."</li>\n";
	}

	# Go through all directories in this directory:
	foreach my $d (sort(@dirs)) {
		next if ( ! include_file($d, $dir) );
		my $this_dir = make_full_path($dir, $d);
		$html .= crawl($this_dir);
	}

	$html .= "$prefix</ul>\n";
	$html .= "$prefix</li>\n";

	$main::level--;
	return $html;
}

# Return 1 if a file/dir should be included in the generated tree,
# return 0 otherwise.
sub include_file($$)
{
	my $f = shift;
	my $dir = shift;

	# Ignore uninteresting suffixes for files:
	if( -f $f ) {
		my ($suffix) = ($f =~ m/.*\.(.*?)$/);
		#if( !$suffix ) {
		#	return 0;
		#}
		if( scalar(@conf::file_suffixes) > 0 ) {
			if( !grep(/^$suffix$/, @conf::file_suffixes) ) {
				return 0;
			}
		}
	}

	my $check_path = $f;
	$check_path = $dir.$f;
	# Add slash so that '/dirname/*' can match:
	if( -d $check_path ) {
		$check_path = $check_path."/";
	}
	$check_path =~ s/$conf::basedir//;
	# pretend that $conf::basedir is the root directory:
	if( $check_path !~ m/^\// ) {
		$check_path = "/".$check_path;
	}

	my $include_file = 1;
	# possibly include only certain files:
	if( scalar(@conf::includefiles) >= 1 ) {
		$include_file = 0;
		foreach my $inc_pat (@conf::includefiles) {
			if( $check_path =~ m/^$inc_pat$/ ) {
				$include_file = 1;
				last;
			}
		}
	}
	# possibly exclude certain files:
	if( $include_file && scalar(@conf::excludefiles) >= 1 ) {
		foreach my $inc_pat (@conf::excludefiles) {
			if( $check_path =~ m/^$inc_pat$/ ) {
				$include_file = 0;
				last;
			}
		}
	}
	# debug: warn "$include_file <= $dir, $f\n";
	return $include_file;
}

# Build an XHTML link to file.
sub get_file_link($)
{
	my $file = shift;
	my $link = $conf::link;
	
	# maybe it doesn't make sense to link a directory without a default file:
	my $default_file = has_defaultfile($file);
	if( !$conf::link_all_directories && -d $file && !$default_file ) {
		$link = $conf::nolink;
	}

	# adding a "/" to the end of the directory if necessary saves the user one redirect:
	$file .= add_slash($file);

	# Set the correct filename so we can later load the file to get the title:
	if( -d $file && $default_file ) {
		$file = $file.$default_file;
	}

	# URL:
	my $url = $file;	# no need to escape because of my_uri_escape()
	$url =~ s/$conf::basedir(\/|\\)?//;
	my ($short_url) = ($url =~ m/.*\/(.*)/);
	$short_url = $url if( ! $short_url );
	$link =~ s/URL/$conf::baseurl.my_uri_escape($url);/igse;

	my $title = cleanup(get_file_title($file, $short_url));
	$link =~ s/TITLE/$title/gs;

	# Recently modified?:
	my $update;
	if( is_it_modified($file) ) {
		$update = $conf::updatedtag;
	} else {
		$update = "";
	}
	$link =~ s/UPDATED/$update/gs;
	
	# Date and time:
	my $date = get_file_date($file);
	$link =~ s/DATE/$date/gs;
	my $time = get_file_time($file);
	$link =~ s/TIME/$time/gs;
	
	# Size:
	$link =~ s/SIZE/getsize($file)/gse;
	
	$link =~ s/\r|\n//igs;
	return $link;
}

# Remove HTML and HTML special characters from a string. This way one can secureley
# use tree.pl to make a sitemap of other people's pages that might contain
# javascript in their title's (or even filenames!):
sub cleanup($)
{
	my $str = shift;
	$str =~ s/&(?!((\w{2,7})|(#\d{2,3}));)/&amp;/igs;
	$str =~ s/</&lt;/igs;
	$str =~ s/>/&gt;/igs;
	return $str;
}

# Get the <title>...</title> of a file or return its filename
# if it has no title.
sub get_file_title($$)
{
	my $file = shift;
	my $short_url = shift;
	# Title or URL, if title is not available:
	if( -d $file ) {
		return $short_url;
	}
	my $file_content_part = load_part($file);
	my ($title) = ($file_content_part =~ m#<title>(.*?)</title>#is);
	if( ! $title ) {
		$title = $short_url;
		$title = "/" if( ! $title );
	}
	if( length($title) > $conf::max_title_length ) {
		$title = substr($title, 0, $conf::max_title_length) . "...";
	}
	return $title;
}

# Return the name of the default file if this directory has
# one, return undef otherwise.
sub has_defaultfile($)
{
	my $dir = shift;
	foreach my $def_file (@conf::defaultfiles) {
		if( -e "$dir/$def_file" ) {
			return $def_file;
		}
	}
	return;
}

# Return "/" if the file is a directory but does not end
# with a slash, return "" otherwise.
sub add_slash($)
{
	my $file = shift;
	if( -d $file && $file !~ m/\/$/ ) {
		return "/";
	} else {
		return "";
	}
}

# Checks if a file (without path!) is a default file
# as configured by the user. Returns 1 or 0.
sub is_defaultfile($)
{
	my $file = shift;
	if ( grep(/^\Q$file\E$/, @conf::defaultfiles) ) {
		return 1;
	} else {
		return 0;
	}

}

# Get a string for indenting the XHTML source, according
# to the depth of the nested list.
sub get_prefix()
{
	my $prefix = "\t" x $main::level;
	return $prefix;
}

# Get the filesize in KB. For files < 1 KB return 1, unless the file
# is 0 bytes.
sub getsize($)
{
	my $file = shift;
	my $size = int((-s $file)/1024);
	if( $size == 0 && ! (-s $file == 0) ) {
		$size = 1;
	}
	return $size;
}

# Take a directory and a file and return the file and its path,
sub make_full_path($$)
{
	my $dir = shift;
	my $file = shift;
	my $full_path;
	$full_path = $dir."/".$file;
	$full_path =~ s/\/\//\//og;
	return $full_path;
}

# Load part of a file until </title> is reached (to save time for big files).
sub load_part($)
{
	my $file = shift;
	my $string = "";
	return '' if( -B $file );
	open(INPUT, "<$file") ||
		(warn "Error: $0: Cannot open '$file': $!" and return "");
	while(<INPUT>) {
		$string .= $_;
		last if( $_ =~ m#</title\s*>#is );
	}
	close(INPUT);
	return $string;
}

# Check if file was modified recently. Return 1 or 0.
sub is_it_modified($)
{
	my $filename = shift;
	my ($mtime) = (stat($filename))[9];
	if( $conf::update_hours && ((time() - $mtime) < ($conf::update_hours*60*60)) ) {
		return 1;
	} else {
		return 0;
	}
}

# Get formatted date of a file's last modification.
sub get_file_date($)
{
	my $filename = shift;
	my $date_time = (stat($filename))[9];
	return POSIX::strftime($conf::date_format, localtime($date_time));
}

# Get formatted time of a file's last modification.
sub get_file_time($)
{
	my $filename = shift;
	my $date_time = (stat($filename))[9];
	return POSIX::strftime($conf::time_format, localtime($date_time));
}

# Get formatted current date.
sub get_now_date()
{
	return POSIX::strftime($conf::date_format, localtime(time()));
}

# Escape some special characters in URLs. This function escapes each part
# of the path (i.e. parts delimited by "/") on its own.
sub my_uri_escape($)
{
	my $str = shift;
	my $ends_in_string = ($str =~ m/\/$/);
	my @parts = split("/", $str);
	foreach my $part (@parts) {
		$part = CGI::escape($part);
	}
	$str = join("/", @parts);
	if( $ends_in_string ) {
		$str .= "/";
	}
	return $str;
}
