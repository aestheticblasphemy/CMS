<?php

// File Location: /_lib/_base/config.php

/** 
 * Assign configuration variables
 *
 * @author Anshul Thakur
 * @version 1.0
 * @since 1.0
 * @access public
 * @copyright Aesthetic Blasphemy
 *
 */

/* set version number */
defined("VERSION")? null : define("VERSION", "1.0");                             // apps version

/* assign php configuration variables */
ini_set("track_errors", "1");                          // error tracking

/* assign base system constants */
// DIRECTORY_SEPARATOR is a PHP pre-defined constant
// (\ for Windows, / for Unix)
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

//SITE_ROOT and SITE_DIR are the same thing
defined('SITE_ROOT') ? null : 
	define('SITE_ROOT', 'C:'.DS.'Users'.DS.'Craft'.DS.'Google Drive'.DS.'Content');

defined('LIB_PATH') ? null : define('LIB_PATH', SITE_ROOT.DS.'_lib'.DS);
defined('CSS_PATH') ? null : define('CSS_PATH', LIB_PATH.DS.'_css'.DS);
defined('BASE_PATH') ? null : define('BASE_PATH', LIB_PATH.DS.'_base'.DS);
defined('CLASS_PATH') ? null : define('CLASS_PATH', LIB_PATH.DS.'_classes'.DS);
defined('CORE_PATH') ? null : define('CORE_PATH', SITE_ROOT.DS.'core'.DS);


// load core objects
require_once(CLASS_PATH.DS.'class.session.php');
//require_once(CLASS_PATH.DS.'class.database.php');
//require_once(LIB_PATH.DS.'database_object.php');
//require_once(LIB_PATH.DS.'pagination.php');
//require_once(LIB_PATH.DS."phpMailer".DS."class.phpmailer.php");
//require_once(LIB_PATH.DS."phpMailer".DS."class.smtp.php");
//require_once(LIB_PATH.DS."phpMailer".DS."language".DS."phpmailer.lang-en.php");

// load database-related classes
//require_once(CLASS_PATH.DS.'class.users.php');
//require_once(LIB_PATH.DS.'photograph.php');
//require_once(LIB_PATH.DS.'comment.php');


defined('SITE_URL')? null: define("SITE_URL", 'http://gdroot.loc/root');     // base site url
defined('SITE_DIR')? 	null:	define("SITE_DIR", 'C:'.DS.'Users'.DS.'Craft'.DS.'Google Drive'.DS.'Content'.DS.'root'.DS); // base site directory
defined('BASE_DIR')? 	null:	define("BASE_DIR", $_SERVER["DOCUMENT_ROOT"]);         // base file directory
defined('SELF')? 	null:	define("SELF", $_SERVER["PHP_SELF"]);                  // self file directive
defined('FILEMAX')? 	null:	define("FILEMAX", 1500000);                             // file size max

/* assign base database constants */
defined('PREFIX')? 	null:	define("PREFIX", "ab");                              // database table prefix
defined('TIMEOUT')? 	null:	define("TIMEOUT", 3600);                               // timeout (seconds)
defined('ROWCOUNT')? 	null:	define("ROWCOUNT", 10);                                // rows to show per page
//define("DSN", "mysql://admin:l3tm3in@localhost/wrox"); // DSN for PEAR usage

/* assign base mail constants */
defined('SMTP_HOST')? 	null:	define("SMTP_HOST", "localhost");                      // SMTP hostname
defined('SMTP_PORT')? 	null:	define("SMTP_PORT","25");                              // SMTP port default=25
defined('FROM_NAME')? 	null:	define("FROM_NAME","Aesthetic Blasphemy");                        // newsletter from name
defined('FROM_EMAIL')? 	null:	define("FROM_EMAIL","noreply@aestheticblasphemy.com");      // newsletter from email

/* assign base entity constants */
defined('TITLE')? 	null:	define("TITLE", "Aesthetic Blasphemy");                        // base page title
defined('ENTITY')? 	null:	define("ENTITY", "Aesthetic Blasphemy");                          // entity name
defined('EMAIL')? 	null:	define("EMAIL", "admin@aestheticblasphemy.com");               // admin email


/* Assign MACROS to various Post Types*/

defined('BLOG_POST')?	null:	define("BLOG_POST", 1);			//Blog Post Type is 1
defined('ARTICLE')?	null:	define("ARTICLE", 2);			//Article Type is 2
defined('PHOTO_ENTRY')?	null:	define("PHOTO_ENTRY", 3);			//Photo Journal Entry Type is 3

/* The maximum depth of levels supported on the site*/
defined('MAX_LEVEL')?	null:	define("MAX_LEVEL", 4);

/* assign instance variables */
$EXCEPTS = array();                                    // exceptions array
$ERRORS = array();                                     // errors array
$FILES = array("jpg", "gif", "png");                   // file types array
$FORMOK = true;                                       // form status

