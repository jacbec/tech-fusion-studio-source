<?php

class Token 
{
    public static function generate() 
	{
        return Session::set(Config::get('token/name'), md5(uniqid()));
    }

    public static function check($token) 
	{
        $token_name = Config::get('token/name');

        if(Session::exists($token_name) && $token === Session::get($token_name)) 
		{
            Session::delete($token_name);
            return true;
        }
		
        return false;
    }
}
?>
