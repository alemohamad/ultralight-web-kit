<?php

function is_cli() {
  return !isset($_SERVER['HTTP_HOST']);
}

/**
 * Checks a configuration.
 */
function check($boolean, $message, $help = '', $fatal = false) {
  echo $boolean ? "  OK        " : sprintf("[[%s]] ", $fatal ? ' ERROR ' : 'WARNING');
  echo sprintf("$message%s\n", $boolean ? '' : ': FAILED');

  if (!$boolean) {
    echo "            *** $help ***\n";
    if ($fatal) {
      die("\nYou must fix this problem before resuming the check.\n");
    }
  }
}

function show_single_warning($message) {
  echo "[[WARNING]] $message \n";
}

/**
 * Gets the php.ini path used by the current PHP interpretor.
 *
 * @return string the php.ini path
 */
function get_ini_path() {
  if ($path = get_cfg_var('cfg_file_path')) {
    return $path;
  }

  return 'WARNING: not using a php.ini file';
}

function echo_title($title) {
  echo "\n** $title **\n\n";
}

if (!is_cli()) {
  echo '<html><body><pre>';
}

echo "*******************************************\n";
echo "*                                         *\n";
echo "*  Ultralight Web Kit requirements check  *\n";
echo "*                                         *\n";
echo "*******************************************\n\n";

echo_title("Website: " . $_SERVER['SERVER_NAME']);

echo sprintf("php.ini used by PHP: %s\n\n", get_ini_path());

echo_title("PHP settings");
echo sprintf("  max_execution_time:  %s\n", ini_get('max_execution_time'));
echo sprintf("  upload_max_filesize: %s\n", ini_get('upload_max_filesize'));
echo sprintf("  post_max_size:       %s\n\n", ini_get('post_max_size'));

if (is_cli()) {
  echo "** WARNING **\n";
  echo "*  The PHP CLI can use a different php.ini file\n";
  echo "*  than the one used with your web server.\n";
  if ('\\' == DIRECTORY_SEPARATOR) {
    echo "*  (especially on the Windows platform)\n";
  }
  echo "*  If this is the case, please launch this\n";
  echo "*  utility from your web server.\n";
  echo "** WARNING **\n";
}

// mandatory
echo_title("Mandatory requirements");
$server = $_SERVER['SERVER_SOFTWARE'];
$server_is_ok = ( (stripos($server, 'Apache') === 0) || (stripos($server, 'nginx') === 0) || (stripos($server, 'Microsoft-IIS') === 0) );
check($server_is_ok, sprintf('Web server is suitable (%s)', $server), 'You should change the server to Apache or Nginx', true);
check(version_compare(phpversion(), '5.4', '>='), sprintf('PHP version is at least 5.4 (%s)', phpversion()), 'Current version is '.phpversion(), true);
check(extension_loaded('fileinfo'), 'Fileinfo PHP extension loaded', 'Install and enable Fileinfo extension', true);
check(extension_loaded('mcrypt'), 'Mcrypt PHP extension loaded', 'Install and enable Mcrypt extension', true);

// warnings
echo_title("Optional checks");
check(version_compare(phpversion(), '5.6', '>='), sprintf('PHP version is greater than 5.6 (%s)', phpversion()), 'PHP version could be upgraded to 5.6 or greater', false);
if (function_exists('apache_get_modules')) {
  check(in_array('mod_rewrite', apache_get_modules()), 'Apache Mod_Rewrite is enabled', 'Apache Mod_Rewrite is not enabled', false);
}
else {
  show_single_warning('You have to manually check if the server has the Rewrite module installed and enabled.');
}
check(class_exists('PDO'), 'PDO is installed', 'Install PDO (mandatory for Eloquent)', false);
if (class_exists('PDO')) {
  $drivers = PDO::getAvailableDrivers();
  check(count($drivers), 'PDO has some drivers installed: '.implode(', ', $drivers), 'Install some PDO drivers (mandatory for Eloquent)');
}
check(class_exists('DomDocument'), 'PHP-XML module is installed', 'Install and enable the php-xml module (required by Eloquent)', false);
check(class_exists('XSLTProcessor'), 'XSL module is installed', 'Install and enable the XSL module (recommended for Eloquent)', false);
check(function_exists('token_get_all'), 'The token_get_all() function is available', 'Install and enable the Tokenizer extension (highly recommended)', false);
check(function_exists('mb_strlen'), 'The mb_strlen() function is available', 'Install and enable the mbstring extension', false);
check(function_exists('iconv'), 'The iconv() function is available', 'Install and enable the iconv extension', false);
check(function_exists('mail'), 'The mail() function is available', 'The mail() function has been disabled', false);
check(function_exists('utf8_decode'), 'The utf8_decode() is available', 'Install and enable the XML extension', false);
check(function_exists('json_encode'), 'The json_encode() is available', 'Install and enable the JSON extension', false);
check(extension_loaded('gd'), 'The GD library is available', 'Install the gd library or compile php with gd support.', false);
check(extension_loaded('intl'), 'The internationalization library is available', 'Install the pecl/intl library or compile PHP with intl support. intl must be loaded.', false);
check(extension_loaded('zip'), sprintf('The php_zip library is available'), 'Install the php_zip extension. http://pecl.php.net/package/zip', false);

$accelerator = 
  (function_exists('apc_store') && ini_get('apc.enabled'))
  ||
  function_exists('eaccelerator_put') && ini_get('eaccelerator.enable')
  ||
  function_exists('xcache_set')
;
check($accelerator, 'A PHP accelerator is installed', 'Install a PHP accelerator like APC (highly recommended)', false);

check(!ini_get('short_open_tag'), 'php.ini has short_open_tag set to off', 'Set it to off in php.ini', false);
check(!ini_get('magic_quotes_gpc'), 'php.ini has magic_quotes_gpc set to off', 'Set it to off in php.ini', false);
check(!ini_get('register_globals'), 'php.ini has register_globals set to off', 'Set it to off in php.ini', false);
check(!ini_get('session.auto_start'), 'php.ini has session.auto_start set to off', 'Set it to off in php.ini', false);

if (!is_cli()) {
  echo '</pre></body></html>';
}
