<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| Display Debug backtrace
|--------------------------------------------------------------------------
|
| If set to TRUE, a backtrace will be displayed along with php errors. If
| error_reporting is disabled, the backtrace will not display, regardless
| of this setting
|
*/
defined('SHOW_DEBUG_BACKTRACE') OR define('SHOW_DEBUG_BACKTRACE', TRUE);

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
defined('FILE_READ_MODE')  OR define('FILE_READ_MODE', 0644);
defined('FILE_WRITE_MODE') OR define('FILE_WRITE_MODE', 0666);
defined('DIR_READ_MODE')   OR define('DIR_READ_MODE', 0755);
defined('DIR_WRITE_MODE')  OR define('DIR_WRITE_MODE', 0755);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/
defined('FOPEN_READ')                           OR define('FOPEN_READ', 'rb');
defined('FOPEN_READ_WRITE')                     OR define('FOPEN_READ_WRITE', 'r+b');
defined('FOPEN_WRITE_CREATE_DESTRUCTIVE')       OR define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 'wb'); // truncates existing file data, use with care
defined('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE')  OR define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 'w+b'); // truncates existing file data, use with care
defined('FOPEN_WRITE_CREATE')                   OR define('FOPEN_WRITE_CREATE', 'ab');
defined('FOPEN_READ_WRITE_CREATE')              OR define('FOPEN_READ_WRITE_CREATE', 'a+b');
defined('FOPEN_WRITE_CREATE_STRICT')            OR define('FOPEN_WRITE_CREATE_STRICT', 'xb');
defined('FOPEN_READ_WRITE_CREATE_STRICT')       OR define('FOPEN_READ_WRITE_CREATE_STRICT', 'x+b');

/*
|--------------------------------------------------------------------------
| Exit Status Codes
|--------------------------------------------------------------------------
|
| Used to indicate the conditions under which the script is exit()ing.
| While there is no universal standard for error codes, there are some
| broad conventions.  Three such conventions are mentioned below, for
| those who wish to make use of them.  The CodeIgniter defaults were
| chosen for the least overlap with these conventions, while still
| leaving room for others to be defined in future versions and user
| applications.
|
| The three main conventions used for determining exit status codes
| are as follows:
|
|    Standard C/C++ Library (stdlibc):
|       http://www.gnu.org/software/libc/manual/html_node/Exit-Status.html
|       (This link also contains other GNU-specific conventions)
|    BSD sysexits.h:
|       http://www.gsp.com/cgi-bin/man.cgi?section=3&topic=sysexits
|    Bash scripting:
|       http://tldp.org/LDP/abs/html/exitcodes.html
|
*/
defined('EXIT_SUCCESS')        OR define('EXIT_SUCCESS', 0); // no errors
defined('EXIT_ERROR')          OR define('EXIT_ERROR', 1); // generic error
defined('EXIT_CONFIG')         OR define('EXIT_CONFIG', 3); // configuration error
defined('EXIT_UNKNOWN_FILE')   OR define('EXIT_UNKNOWN_FILE', 4); // file not found
defined('EXIT_UNKNOWN_CLASS')  OR define('EXIT_UNKNOWN_CLASS', 5); // unknown class
defined('EXIT_UNKNOWN_METHOD') OR define('EXIT_UNKNOWN_METHOD', 6); // unknown class member
defined('EXIT_USER_INPUT')     OR define('EXIT_USER_INPUT', 7); // invalid user input
defined('EXIT_DATABASE')       OR define('EXIT_DATABASE', 8); // database error
defined('EXIT__AUTO_MIN')      OR define('EXIT__AUTO_MIN', 9); // lowest automatically-assigned error code
defined('EXIT__AUTO_MAX')      OR define('EXIT__AUTO_MAX', 125); // highest automatically-assigned error code


// LOAD TEMPLATE PLUGIN
defined('PLUG_CHARTJS')			OR define('PLUG_CHARTJS', 'chartjs');
defined('PLUG_TEMPUSDOMINUS') 	OR define('PLUG_TEMPUSDOMINUS', 'tempusdominus');
defined('PLUG_JQVMAP')   		OR define('PLUG_JQVMAP', 'jqvmap');
defined('PLUG_JQUERYUI') 		OR define('PLUG_JQUERYUI','jquery-ui');
defined('PLUG_JQUERYKNOB') 		OR define('PLUG_JQUERYKNOB','jquery-knob');
defined('PLUG_SUMMERNOTE') 		OR define('PLUG_SUMMERNOTE','summernote');
defined('PLUG_SPARKLINE') 		OR define('PLUG_SPARKLINE','sparkline');
defined('PLUG_SELECT2')  		OR define('PLUG_SELECT2', 'select2');
defined('PLUG_ICHECK')   		OR define('PLUG_ICHECK', 'icheck');
defined('PLUG_DATERANGEPICKER') OR define('PLUG_DATERANGEPICKER', 'daterangepicker');
defined('PLUG_DATEPICKER') 		OR define('PLUG_DATEPICKER', 'datepicker');
defined('PLUG_COLORPICKER')		OR define('PLUG_COLORPICKER', 'colorpicker');
defined('PLUG_DUALLISTBOX')		OR define('PLUG_DUALLISTBOX', 'duallistbox');
defined('PLUG_INPUTMASK')		OR define('PLUG_INPUTMASK', 'inputmask');
defined('PLUG_SWITCH')			OR define('PLUG_SWITCH', 'switch');
defined('PLUG_JQUERYVALIDATION')OR define('PLUG_JQUERYVALIDATION', 'jquery-validation');
defined('PLUG_CUSTOMFILEINPUT')	OR define('PLUG_CUSTOMFILEINPUT', 'custom-file-input');
defined('PLUG_TOASTR')			OR define('PLUG_TOASTR', 'toastr');
defined('PLUG_SWEETALERT')		OR define('PLUG_SWEETALERT', 'sweetalert');
defined('PLUG_DATATABLE')		OR define('PLUG_DATATABLE', 'datatable');
defined('PLUG_JSGRID')			OR define('PLUG_JSGRID', 'jsgrid');
defined('PLUG_FULLCALENDAR')	OR define('PLUG_FULLCALENDAR', 'fullcalendar');

// ACCESS PAGE
// defined('PLUG_FULLCALENDAR')	OR define('PLUG_FULLCALENDAR', 'fullcalendar');

