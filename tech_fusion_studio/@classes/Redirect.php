<?php

class Redirect 
{
    public static function to($location = null)
	{
        if($location) 
		{
            if(is_numeric($location)) 
			{
                switch($location) 
				{
                    case 404:
						//echo '<META HTTP-EQUIV="Refresh" Content="0; URL=HTTP/1.1 404 Not Found">';
                        header('HTTP/1.1 404 Not Found');
                        include '../@includes/errors/404.php';
                        break;
                }
            }
			
            //echo '<META HTTP-EQUIV="Refresh" Content="0; URL=' .$location .'">';
            header('Location: ' .$location);
            exit();
        }
    }
}
?>
