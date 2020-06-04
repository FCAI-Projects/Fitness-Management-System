<?php
namespace PHPMVC\LIB;




class  Autoload
{
    public static function  autoload($className)
    {
       // echo $className.'<br>';
        $className=str_replace('PHPMVC','',$className);
        $className=strtolower($className);
        $className.='.php';
        //echo APP_PATH.'<br>';
        //echo APP_PATH.$className.'<br>';
        if(!file_exists(APP_PATH.$className))
        {
            return;
        }
        require_once APP_PATH.$className;

    }
}
spl_autoload_register(__NAMESPACE__.'\Autoload::autoload');
