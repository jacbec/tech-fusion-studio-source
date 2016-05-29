<?php

class Validate 
{
    private $_passed = false,
            $_errors = "",
            $_db = null;

    public function __construct() 
	{
        $this->_db = DB::getInstance();
    }

    public function check($source, $items = array()) 
	{
        foreach ($items as $item => $rules) 
		{
            $name1 = $rules['name'];
            foreach ($rules as $rule => $rule_value) 
			{
                $value = trim($source[$item]);

                if($rule === 'required' && empty($value)) 
				{
                    $this->addError("{$name1} is required!");
                } 
				else if(!empty($value)) 
				{
                    switch($rule) 
					{
                        case 'min':
                            if(strlen($value) < $rule_value) 
							{
                                $this->addError("{$name1} must be more than {$rule_value} characters!");
                            }
                            break;
                        case 'max':
                            if(strlen($value) > $rule_value) 
							{
                                $this->addError("{$name1} must be less than {$rule_value} characters!");
                            }
                            break;
                        case 'preg':
                            if($rule_value === 'email') 
							{
                                if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i', $source[$rule_value])) 
								{
                          		        $this->addError("{$name1} is an invalid email address!");
                          	    } 
								else if($rule_value === 'username') 
								{
                                    if(!preg_match('/^[a-z\d-_]{2,20}$/i', $source[$rule_value])) 
									{
                                        $this->addError("{$name1} can only be (a-z, A-Z, 0-9, dashes(-), and underscores( _ )!");
                                    }
                                }
                            }
                            break;
                        case 'matches':
                            if($rule_value === 'email') 
							{
                                $name2 = 'Email';
                            } 
							else if($rule_value === 'password') 
							{
                                $name2 = 'Password';
                            }
							
                            if($value != $source[$rule_value]) 
							{
                                $this->addError("{$name1} must match {$name2}!");
                            }
                            break;
                        case 'unique':
                            $check = $this->_db->get($rule_value, array($item, '=', $value));
                            if($check->count()) 
							{
                                $this->addError("{$value} already in use!");
                            }
                            break;
                        default:

                            break;
                    }
                }
            }
        }

        if(empty($this->_errors)) 
		{
            $this->_passed = true;
        }
        return $this;
    }

    private function addError($error) 
	{
        $this->_errors .= "$error <br>";
    }

    public function errors() 
	{
        return "Error:<br> $this->_errors";
    }

    public function passed() 
	{
        return $this->_passed;
    }
}
?>
