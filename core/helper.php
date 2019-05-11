<?php  
function to($path)
{
    $root = explode('/', $_SERVER['PHP_SELF']);
    return "/".$root[1]."/".trim($path,'/');
}

function asset($path)
{
    return to($path);
}

function action($path)
{
    return to($path);
}

function redirect($url, $permanent = false)
{
    header('Location: ' . to($url), true, $permanent ? 301 : 302);
    exit();
}

function setSession($key, $value)
{
	$_SESSION['phpmvc'][$key] = $value;
}

function getSession($key)
{
	return isset($_SESSION['phpmvc'][$key]) ? $_SESSION['phpmvc'][$key] : null;
}
?>
