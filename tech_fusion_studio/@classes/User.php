<?php

class User 
{
    private $_db,
            $_data,
            $_session_name,
            $_cookie_name,
            $_is_logged_in;

    public function __construct($user = null)
	{
        $this->_db = DB::getInstance();

        $this->_session_name = Config::get('session/name');
        $this->_cookie_name = Config::get('cookie/name');

        if(!$user) {
            if(Session::exists($this->_session_name)) 
			{
                $user = Session::get($this->_session_name);

                if($this->find($user)) 
				{
                    $this->_is_logged_in = true;
                } 
				else 
				{

                }
            }
        } 
		else 
		{
            $this->find($user);
        }
    }

    public function create($fields = array()) 
	{
        if(!$this->_db->insert('users', $fields)) 
		{
            throw new Exception('There was an error creating the profile');
        }
    }

    public function login($username = null, $password = null, $remember = false) 
	{
        if(!$username && !$password && $this->exists()) 
		{
            Session::set($this->_session_name, $this->data()->id);
        } 
		else 
		{
            $user = $this->find($username);

            if($user) 
			{
                if($this->data()->password === Hash::make($password, $this->data()->salt)) 
				{
                    Session::set($this->_session_name, $this->data()->id);

                    if($remember)
					{
                        $hash = Hash::unique();
                        $hash_check = $this->_db->get('users_session', array('user_id', '=', $this->data()->id));

                        if(!$hash_check->count())
						{
                            $this->_db->insert('users_session', array(
                                'user_id' => $this->data()->id,
                                'hash' => $hash
                            ));
                        } 
						else 
						{
                            $hash = $hash_check->first()->hash;
                        }
						
                        Cookie::set($this->_cookie_name, $hash, Config::get('cookie/expiry'));
                    }
					
                    return true;
                }
            }
        }
		
        return false;
    }

    public function logout() 
	{
        $this->_db->delete('users_session', array('user_id', '=', $this->data()->id));

        Session::delete($this->_session_name);
        Cookie::delete($this->_cookie_name);
    }

    public function update($id = null, $fields = array()) 
	{
        if(!$id && $this->isLoggedin()) 
		{
            $id = $this->data()->id;
        }

        if(!$this->_db->update('users', $id, $fileds)) 
		{
            throw new Exception('There was an error updating the profile');
        }
    }

    public function delete() 
	{

    }

    public function find($user = null) 
	{
        if($user) 
		{
            $field = (is_numeric($user)) ? 'id' : 'username';
            $data = $this->_db->get('users', array($field, '=', $user));

            if($data->count())
			{
                $this->_data = $data->first();
                return true;
            }
        }
		
        return false;
    }

    public function exists() 
	{
        return (!empty($this->_data)) ? true : false;
    }

    public function data() 
	{
        return $this->_data;
    }

    public function isLoggedin() 
	{
        return $this->_is_logged_in;
    }
}
?>
