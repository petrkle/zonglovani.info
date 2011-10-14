#!/bin/bash

export IFS='
'

for foo in `cat url.3`
do
	./xml2tex.php $foo
done > tri-micky.tex

for foo in `cat url.4`
do
	./xml2tex.php $foo
done > ctyri-micky.tex

for foo in `cat url.5`
do
	./xml2tex.php $foo
done > pet-micku.tex

pdflatex -no-file-line-error zongleruv-slabikar.tex
