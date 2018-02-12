<?php


namespace Application;

trait TSingleton
{
    /**@var $instance self*/
   protected static $instance = null;
   protected function __construct()
   {
   }
   protected function __wakeup()
   {}
   protected function __clone()
   {
   }

   /**
    *  return self
    */
   public static function instance()
   {
       if (static::$instance === null){
           static::$instance = new static();
       }
       return static::$instance;
   }
}