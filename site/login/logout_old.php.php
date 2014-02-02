<?php //require_once("../../includes/initialize.php"); ?>
<?php	

	if(!isset($_SESSION))
{
	session_start();
}
	unset($_SESSION['sUSER']);
	$_SESSION['logged_in']= false;
	$_SESSION['user']="anonymous";
	
	$params = session_get_cookie_params();
	
	print_r($params);
	setcookie(session_name(), '', 0, $params['path'], $params['domain'], $params['secure'], isset($params['httponly']));
	session_destroy();

	if(isset($_GET))
	{
		if(isset($_GET['ref']))
		{
			header("Location: {$_GET['ref']}");
			die();
		}
	}
?>