<?php  
class Routes
{
    protected static $uri = array();
    protected static $method = array();
    protected static $callback = array();

    static function __callStatic($method, $args)
    {
        self::$uri[] = "/" . trim($args[0],'/');
        self::$method[] = strtolower($method);
        self::$callback[] = $args[1];
    }

    static function dispatch()
    {
        if(isset($_SERVER['REQUEST_URI']))
        {
            $path = array_slice(explode('/',trim($_SERVER['REQUEST_URI'],'/')),1);
            $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
            foreach (self::$uri as $key => $value) 
            {
                $flag = true;
                $uri = array_slice(explode('/', $value),1);
                if($value == "/")
                {
                    $uri = array();
                }
                $paramId = null;
                if($requestMethod != self::$method[$key])
                {
                    $flag = false;
                    continue;
                }
                if(count($path) == count($uri))
                {
                    if(in_array('{id}', $uri))
                    {
                        array_pop($uri);
                        $paramId = array_pop($path);
                    }

                    for ($i=0; $i < count($uri); $i++) { 
                        if($path[$i] != $uri[$i])
                        {
                            $flag = false;
                            break;
                        }
                    }

                }
                else {
                    $flag = false;
                }

                if($flag == true)
                {
                    $callback = self::$callback[$key];
                    $callback = explode('@', $callback);
                    list($controller, $action) = $callback;
                    $obj = new $controller;
                    if(method_exists($obj, $action))
                    {
                        if(isset($paramId))
                            $obj->$action($paramId);
                        else
                            $obj->$action();
                    }
                    return;
                }

            }
            
        }

        //error
        $controller = "PagesController";
        $action = "error";
        $obj = new $controller;
        $obj->$action();
    }

}
?>