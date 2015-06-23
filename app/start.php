<?php
 /*
$_SERVER['DOCUMENT_ROOT']=$_SERVER['DOCUMENT_ROOT'].'/drupal';
 
define('DRUPAL_ROOT', $_SERVER['DOCUMENT_ROOT']);
$base_url = 'http://'.$_SERVER['HTTP_HOST'];
include_once DRUPAL_ROOT . '/includes/bootstrap.inc';
// Bootstrap merely for session purposes:
#drupal_bootstrap(DRUPAL_BOOTSTRAP_SESSION);
// Bootstrap for all purposes (e.g. theme() function):
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL); 
 
 
var_dump($_SESSION);
 */

require __DIR__ . '/../vendor/autoload.php';

if($GLOBALS['form_st']) {
	$dropboxKey = $GLOBALS['form_st']['values']['username'];
	$dropboxSecret = $GLOBALS['form_st']['values']['password'];
//$dropboxKey='stjr8co3s8s06cl';
//$dropboxSecret='nla01dj3k588u2x';
	$appName = 'HrvojeDrop';

	$appInfo = new Dropbox\AppInfo($dropboxKey, $dropboxSecret);
//store csrf token
	$csrfTokenStore = new Dropbox\ArrayEntryStore($_SESSION, 'dropbox-auth-csrf-token');
//define auth details
	$webAuth = new Dropbox\WebAuth($appInfo, $appName, 'http://localhost/drupal/dropbox_finish.php', $csrfTokenStore);

	$db = new PDO('mysql:host=localhost;dbname=drupal_db', 'root', '');

	$user = $db->prepare("SELECT * FROM users WHERE id = :user_id");
	$user->execute(['user_id' => $_SESSION['user_id']]);
	$user = $user->fetchObject();
}
else

 
/*

	
	$db = new PDO('mysql:host=localhost;dbname:dbdb', 'root', '');
		
		$user = $db->prepare("SELECT * FROM users WHERE id = :user_id");
		$user->execute(['user_id' => $_SESSION['user_id']]);
		$user = $user->fetchObject();
		*/
		