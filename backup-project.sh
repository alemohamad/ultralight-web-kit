#!/bin/bash

clear

BOLD=$(tput bold)
NORMAL=$(tput sgr0)
RED='\033[0;31m'
GREEN='\033[0;32m'
LIGHT_GRAY='\033[0;37m'
YELLOW='\033[1;33m'

echo -e " _______ __ __               __ __         __     __   "
echo -e "|   |   |  |  |_.----.---.-.|  |__|.-----.|  |--.|  |_ "
echo -e "|   |   |  |   _|   _|  _  ||  |  ||  _  ||     ||   _|"
echo -e "|_______|__|____|__| |___._||__|__||___  ||__|__||____|"
echo -e "                                   |_____|     ${BOLD}Web Kit "
echo -e " "

ORIGIN=$(pwd)
CURRENT=${PWD##*/}
CURRENT=$(tr '[:upper:]' '[:lower:]'<<<"$CURRENT")
CURRENT=${CURRENT// /-}
DATE=`date +%Y%m%d`
ZIP="$DATE-$CURRENT"
DESTINY="$ORIGIN/$ZIP"

(
  # CREATE DESTINY FOLDER
  if [ -d $DESTINY ]; then
    rm -rf $DESTINY
  fi
  mkdir -p $DESTINY;

  # COPY FOLDERS
  cp -r $ORIGIN/app $DESTINY/app
  if [ -d $DESTINY/assets ]; then
    cp -r $ORIGIN/assets $DESTINY/assets
  fi
  if [ -d $DESTINY/vendor ]; then
    cp -r $ORIGIN/vendor $DESTINY/vendor
  fi

  # COPY FILES
  if [ ! -f $ORIGIN/.env ]; then
    cp $ORIGIN/.env.example $ORIGIN/.env
    cp $ORIGIN/.env $DESTINY/.env
    rm $ORIGIN/.env
  else
    cp $ORIGIN/.env $DESTINY/.env
  fi
  cp $ORIGIN/index.php $DESTINY/index.php
  cp $ORIGIN/.htaccess $DESTINY/.htaccess
  cp $ORIGIN/web.config $DESTINY/web.config
  cp $ORIGIN/sitemap.xml $DESTINY/sitemap.xml
  cp $ORIGIN/robots.txt $DESTINY/robots.txt
  cp $ORIGIN/humans.txt $DESTINY/humans.txt

  # COMPRESS FOLDER
  if [ ! -f $ZIP.zip ]; then
    rm $ZIP.zip
  fi
  zip -r $ZIP.zip $ZIP

  # DELETE DESTINY FOLDER
  rm -rf $DESTINY
) > /dev/null 2>&1

echo -e "${GREEN}The project is now ${BOLD}ready${NORMAL}${GREEN} to be shared!"
echo -e "${YELLOW}Generated file: ${NORMAL}${BOLD}${ZIP}.zip"
echo -e " "
