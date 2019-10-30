<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('FOLDER_CONTEST','static/images/contest');

define('EDIT','Edit');
define('CREATE','Create');
define('DELETE','Delete');
define('VIEW','View');

defined('DOMAIN_NEW') OR define('DOMAIN_NEW', 'aodaihousing.com/ja/');
// defined('DOMAIN_NEW') OR define('DOMAIN_NEW', 'demo.aodaihousing.com');
defined('DOMAIN_OLD') OR define('DOMAIN_OLD', 'aodaihousing.com');
defined('IS_REDIRECT_PAGE') OR define('IS_REDIRECT_PAGE', 'is_redirect_new_domain=true');

define('PATH_URL_IMAGES', 'https://aodaihousing.com/ja/');
// define('PATH_URL_IMAGES', 'http://demo.aodaihousing.com/');

/* End of file constants.php */
/* Location: ./application/config/constants.php */