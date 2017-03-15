<?php

function getBaseUrl() {
  return 'http'
    . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '')
    . '://' . $_SERVER['HTTP_HOST']
    . getBaseFolder();
}

function getBaseFolder() {
  return str_replace('//', '/', dirname($_SERVER['SCRIPT_NAME']) . '/');
}
