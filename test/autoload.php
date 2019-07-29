<?php
define('__PATH__', dirname(dirname(__FILE__)).DIRECTORY_SEPARATOR);
spl_autoload_register(function($classname){
    $classnameArray = explode('\\', $classname);
    if($classnameArray[0] == 'geometry'){
        $classFile = implode(DIRECTORY_SEPARATOR, array_merge(
            [__PATH__.'src'],
            array_slice($classnameArray, 2, count($classnameArray)-2),
            [$classnameArray[count($classnameArray)-1].'.php']
        ));
        if(file_exists($classFile)){
            include_once($classFile);
        }
    }
});