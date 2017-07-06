<?php

if (!function_exists('getBaseUrl')) {
  function getBaseUrl() {
    return 'http'
      . ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 's' : '')
      . '://' . $_SERVER['HTTP_HOST']
      . getBaseFolder();
  }
}

if (!function_exists('getBaseFolder')) {
  function getBaseFolder() {
    return str_replace('//', '/', dirname($_SERVER['SCRIPT_NAME']) . '/');
  }
}
