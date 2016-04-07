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

/*
|--------------------------------------------------------------------------
| User Types
|--------------------------------------------------------------------------
|
|
*/
define('ADMINISTRATOR', '1');
define('SUPERVISOR', '2');
define('OPERATIONS', '3');

/*
|--------------------------------------------------------------------------
| General Response Messages
|--------------------------------------------------------------------------
|
|
*/
define('RESP_STATUS', 'resp_status');
define('RESP_MSG', 'resp_msg');
define('RESP_ERROR', 'resp_error');
define('RESP_DATA', 'resp_data');

define('LISTING_SUCCESS', 'Data listed successfully');
define('NO_RECORDS', 'No records found');
define('CREATED_SUCCESS', 'Data created successfully');
define('CREATE_FAILED', 'Cannot create data');
define('UPDATED_SUCCESS','Data updated successfully');
define('ALREADY_UPDATED','Data already updated');
define('UPDATE_FAILED', 'Cannot update data');
define('DELETED_SUCCESS', 'Data deleted successfully');
define('DELETE_FAILED', 'Cannot delete data');
define('NOT_AUTHORISED', 'You are not authorised to perform this action');
define('LOGIN_SUCCESS', 'Login Successfull');
define('LOGOUT_SUCCESS', 'Logout Successfull');
define('INVALID_LOGIN', 'Invalid credentials');
define('INVALID_SESSION', 'Login in to perform this action');
define('VALIDATION_ERROR', 'Please fill out missing fields');


/*
|--------------------------------------------------------------------------
| Widely used HTTP Status Codes
|--------------------------------------------------------------------------
|
|
*/
define('HTTP_CONTINUE', '100');
define('HTTP_SWITCHING_PROTOCOLS', '101');
define('HTTP_PROCESSING', '102');            // RFC2518

// Success

/**
 * The request has succeeded
 */
define('HTTP_OK', '200');

/**
 * The server successfully created a new resource
 */
define('HTTP_CREATED', '201');
define('HTTP_ACCEPTED', '202');
define('HTTP_NON_AUTHORITATIVE_INFORMATION', '203');

/**
 * The server successfully processed the request, though no content is returned
 */
define('HTTP_NO_CONTENT', '204');
define('HTTP_RESET_CONTENT', '205');
define('HTTP_PARTIAL_CONTENT', '206');
define('HTTP_MULTI_STATUS', '207');          // RFC4918
define('HTTP_ALREADY_REPORTED', '208');      // RFC5842
define('HTTP_IM_USED', '226');               // RFC3229

// Redirection

define('HTTP_MULTIPLE_CHOICES', '300');
define('HTTP_MOVED_PERMANENTLY', '301');
define('HTTP_FOUND', '302');
define('HTTP_SEE_OTHER', '303');

/**
 * The resource has not been modified since the last request
 */
define('HTTP_NOT_MODIFIED', '304');
define('HTTP_USE_PROXY', '305');
define('HTTP_RESERVED', '306');
define('HTTP_TEMPORARY_REDIRECT', '307');
define('HTTP_PERMANENTLY_REDIRECT', '308');  // RFC7238

// Client Error

/**
 * The request cannot be fulfilled due to multiple errors
 */
define('HTTP_BAD_REQUEST', '400');

/**
 * The user is unauthorized to access the requested resource
 */
define('HTTP_UNAUTHORIZED', '401');
define('HTTP_PAYMENT_REQUIRED', '402');

/**
 * The requested resource is unavailable at this present time
 */
define('HTTP_FORBIDDEN', '403');

/**
 * The requested resource could not be found
 *
 * Note: This is sometimes used to mask if there was an UNAUTHORIZED (401) or
 * FORBIDDEN (403) error, for security reasons
 */
define('HTTP_NOT_FOUND', '404');

/**
 * The request method is not supported by the following resource
 */
define('HTTP_METHOD_NOT_ALLOWED', '405');

/**
 * The request was not acceptable
 */
define('HTTP_NOT_ACCEPTABLE', '406');
define('HTTP_PROXY_AUTHENTICATION_REQUIRED', '407');
define('HTTP_REQUEST_TIMEOUT', '408');

/**
 * The request could not be completed due to a conflict with the current state
 * of the resource
 */
define('HTTP_CONFLICT', '409');
define('HTTP_GONE', '410');
define('HTTP_LENGTH_REQUIRED', '411');
define('HTTP_PRECONDITION_FAILED', '412');
define('HTTP_REQUEST_ENTITY_TOO_LARGE', '413');
define('HTTP_REQUEST_URI_TOO_LONG', '414');
define('HTTP_UNSUPPORTED_MEDIA_TYPE', '415');
define('HTTP_REQUESTED_RANGE_NOT_SATISFIABLE', '416');
define('HTTP_EXPECTATION_FAILED', '417');
define('HTTP_I_AM_A_TEAPOT', '418');                                               // RFC2324
define('HTTP_UNPROCESSABLE_ENTITY', '422');                                        // RFC4918
define('HTTP_LOCKED', '423');                                                      // RFC4918
define('HTTP_FAILED_DEPENDENCY', '424');                                           // RFC4918
define('HTTP_RESERVED_FOR_WEBDAV_ADVANCED_COLLECTIONS_EXPIRED_PROPOSAL', '425');   // RFC2817
define('HTTP_UPGRADE_REQUIRED', '426');                                            // RFC2817
define('HTTP_PRECONDITION_REQUIRED', '428');                                       // RFC6585
define('HTTP_TOO_MANY_REQUESTS', '429');                                           // RFC6585
define('HTTP_REQUEST_HEADER_FIELDS_TOO_LARGE', '431');                             // RFC6585

// Server Error

/**
 * The server encountered an unexpected error
 *
 * Note: This is a generic error message when no specific message
 * is suitable
 */
define('HTTP_INTERNAL_SERVER_ERROR', '500');

/**
 * The server does not recognise the request method
 */
define('HTTP_NOT_IMPLEMENTED', '501');
define('HTTP_BAD_GATEWAY', '502');
define('HTTP_SERVICE_UNAVAILABLE', '503');
define('HTTP_GATEWAY_TIMEOUT', '504');
define('HTTP_VERSION_NOT_SUPPORTED', '505');
define('HTTP_VARIANT_ALSO_NEGOTIATES_EXPERIMENTAL', '506');                        // RFC2295
define('HTTP_INSUFFICIENT_STORAGE', '507');                                        // RFC4918
define('HTTP_LOOP_DETECTED', '508');                                               // RFC5842
define('HTTP_NOT_EXTENDED', '510');                                                // RFC2774
define('HTTP_NETWORK_AUTHENTICATION_REQUIRED', '511');

