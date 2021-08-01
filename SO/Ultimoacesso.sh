#!/bin/bash


yd=`date +%Y-%m-%d -d "1 day ago"`
twd=`date +%Y-%m-%d -d "2 day ago"`
td=`date +%Y-%m-%d`
ad=`pwd`
edt=`date +%Y-%m-%d -d "$2 +1 day"`
fd=`find . -type f -newerat "$yd" ! -newerat "$edt"`


if [ ! -z "$1" ]
  then
	if [[ $1 =~ ^[0-9]{4}-[0-9]{2}-[0-9]{2}$ ]] && date -d "$1" >/dev/null
		then :
	else echo "Data está no formato incorreto(YYYY-MM-DD)"
		exit 0
	fi
fi

if [ ! -z "$2" ]
  then
	if [[ $2 =~ ^[0-9]{4}-[0-9]{2}-[0-9]{2}$ ]] && date -d "$2" >/dev/null
		then :
	else echo "Data está no formato incorreto(YYYY-MM-DD)"
		exit 0
	fi
fi

if [ ! -z "$3" ]
  then
	if [ ! -d "$3" ]; then
	echo "Diretório $3 não existe!"
		exit 0
	fi
fi

if [ ! -z "$1" ] && [ ! -z "$2" ] && [ ! -z "$3" ]
	then
		fdi=`find "$3" -type f -newerat "$1" ! -newerat "$edt"`
		echo "$3 | $fdi" >> 'AcessoRecente_$2~$1.txt
	else
	  echo "$ad | $fd" >> AcessoRecente_$twd~$td.txt
fi