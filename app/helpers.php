<?php

function getBaseUrl() {
  return 'http'
    . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '')
    . '://' . $_SERVER['HTTP_HOST']
    . str_replace('//', '/', dirname($_SERVER['SCRIPT_NAME']) . '/');
}
