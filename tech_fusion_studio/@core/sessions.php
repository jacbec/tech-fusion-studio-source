<?php
session_name('techfusionstudio');
session_set_cookie_params(0, '/', '.techfusionstudio.comm');
session_start();

if(isset($_GET['logout']))
{
	session_set_cookie_params(-1209600, '/', '.techfusionstudio.comm');
	session_regenerate_id(true);
	session_unset();
	session_destroy();

	header("Location: http://forums.techfusionstudio.comm/login.php");
	exit;
}
?>
