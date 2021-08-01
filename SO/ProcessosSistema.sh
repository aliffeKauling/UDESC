#!/bin/bash

DATE=`date '+%Y-%m-%d-%H:%M:%S'`
DATE2=`date '+%Y-%m-%d'`
USRACT=`whoami`
USRARG=$1
if [ $# -eq 0 ]
then
totalps=`ps | wc -l`
totalpu=`ps -u "$USRACT" | wc -l`
threadt=`ps -u "$USRACT" -o nlwp= | awk '{ num_threads += $1 } END { print num_threads }'`
oldp=`ps -u "$USRACT" axu | sort -nk 9 | tail -1 | awk '{print $2}'`
proot=`ps -U root -u root u | wc -l`
echo "Data: $DATE" >> $DATE'_Processos_'$USRACT.txt
echo "Total de processos: $totalps" >> $DATE'_Processos_'$USRACT.txt
echo "Total de processos do Usuário: $totalpu" >> $DATE'_Processos_'$USRACT.txt
echo "Total de threads do Usuário: $threadt" >> $DATE'_Processos_'$USRACT.txt
echo "Processo mais antigo do Usuário(PID): $oldp" >> $DATE'_Processos_'$USRACT.txt
echo "Usuário atual: $USRACT" >> $DATE'_Processos_'$USRACT.txt
echo "Total de processos do root: $proot" >> $DATE'_Processos_'$USRACT.txt

else

totalps=`ps | wc -l`
totalpu=`ps -u "$1" | wc -l`
threadt=`ps -u "$USRARG" -o nlwp= | awk '{ num_threads += $1 } END { print num_threads }'`
oldp=`ps -u "$USRARG" axu | sort -nk 9 | tail -1 | awk '{print $2}'`
proot=`ps -U root -u root u | wc -l`
echo "Data: $DATE" >> $DATE'_Processos_'$USRARG.txt
echo "Total de processos: $totalps" >> $DATE'_Processos_'$USRARG.txt
echo "Total de processos do Usuário: $totalpu" >> $DATE'_Processos_'$USRARG.txt
echo "Total de threads do Usuário: $threadt" >> $DATE'_Processos_'$USRARG.txt
echo "Processo mais antigo do Usuário(PID): $oldp" >> $DATE'_Processos_'$USRARG.txt
echo "Usuário atual: $USRARG" >> $DATE'_Processos_'$USRARG.txt
echo "Total de processos do root: $proot" >> $DATE'_Processos_'$USRARG.txt


fi