#!/bin/bash
echo 'start'
date1=$(date +%Y-%m-%d)
time1=$(date +%H:%M:%S)
echo $date1+$time1
#dated=`date '+%Y-%m-%d %H:%M:%S'`
echo $date
git add .
git status
git commit -m $date1' '$time1' everyday last push'
git push

