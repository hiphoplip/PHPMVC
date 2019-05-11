<?php 
class Request
{
  	public static function getParams()
  	{
  		if(isset($_SERVER['REQUEST_METHOD']))
  		{
  			if ($_SERVER['REQUEST_METHOD'] == "POST")
		    {
		      	$body = array();
		      	foreach($_POST as $key => $value)
		      	{
		        	$body[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
		      	}
		      	return $body;
		    }
  		}
	    
	    return array();
  	}

}
?>