<?php 
$autoloadController = function ($classname) {
    $filename = dirname(__DIR__) . '/controller/' . $classname . '.php';
    
    if (file_exists($filename)) {
        include $filename;
    }

};

$autoloadModels = function ($classname) {
    $filename = dirname(__DIR__) . '/models/' . $classname . '.php';
    
    if (file_exists($filename)) {
        include $filename;
    }
    
};

spl_autoload_register($autoloadController);
spl_autoload_register($autoloadModels);

?>