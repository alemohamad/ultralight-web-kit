<?php

define("UPLOAD_FOLDER", "uploads");

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
    $path = str_replace('//', '/', dirname($_SERVER['SCRIPT_NAME']) . '/');
    $path = str_replace('\\', '', $path); // fix for windows server
    return $path;
  }
}

if (!function_exists('getRootFolder')) {
  function getRootFolder() {
    return dirname(dirname(__FILE__)) . '/';
  }
}

if (!function_exists('getUploadFolder')) {
  function getUploadFolder() {
    return getRootFolder() . UPLOAD_FOLDER . '/';
  }
}

if (!function_exists('getUploadUrl')) {
  function getUploadUrl() {
    return getBaseUrl() . UPLOAD_FOLDER . '/';
  }
}
