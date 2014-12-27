#!/usr/bin/perl

use strict;

my $name = shift @ARGV || die "\nLack of commit name\n\n";

foreach my $arg ( @ARGV ) {
  $name .= " $arg";
}

system("git add *.php\n");
system("git add *.pl\n");
system("git add *.css\n");
system("git commit -m '$name'\n");
