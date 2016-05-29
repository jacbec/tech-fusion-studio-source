<?php
session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
    'host' => 'your.domain.com',
    'user' => 'user',
    'pass' => 'password',
    'db' => 'database name'
    ),
    'cookie' => array(
        'name' => 'hash',
        'expiry' => 604800
    ),
    'session' => array(
        'name' => 'user',
        'page' => 'page'
    ),
    'token' => array(
        'name' => 'token'
    ),
    'date' => array(
        'today' => date('F d\, Y')
    )
);

spl_autoload_register(function($class) 
{
    require_once '../@classes/' .$class .'.php';
});

require_once '../@functions/sanitize.php';

if(isset($_GET['login'])) 
{
    $user = new User();
    if($user->isLoggedin()) 
	{
        $user->logout();
	    Redirect::to('http://forums.techfusionstudio.comm/profile.php?login');
    }
}

if(isset($_GET['logout'])) 
{
	$user = new User();
	$user->logout();
	Redirect::to('http://forums.techfusionstudio.comm/profile.php?login');
}

if(Cookie::exists(Config::get('cookie/name')) && !Session::exists(Config::get('session/name')))
{
    $hash = Cookie::get(Config::get('cookie/name'));
    $hash_check = DB::getInstance()->get('users_session', array('hash', '=', $hash));

    if($hash_check->count()) 
	{
        $user = new User($hash_check->first()->user_id);
        $user->login();
    }
}
?>
