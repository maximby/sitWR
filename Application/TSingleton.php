<?php


namespace Backend\Application;

trait TSingleton
{
   protected static $instance = null;
   protected function __construct()
   {
   }
   protected function __wakeup()
   {}
   protected function __clone()
   {
   }

   public static function instance()
   {
       if (static::$instance === null){
           static::$instance = new static();
       }
       return static::$instance;
   }
}