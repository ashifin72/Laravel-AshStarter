<?php
  // app/Traits/MemoryCache.php

//  Author: jlem

  namespace App\Traits;

  trait MemoryCache
  {
    public static $cache = [];

    /**
     * Gets the cached result by key,
     * or executes the closure if cache key does not exist
     * @param \Closure $closure
     * @return mixed
     */
    protected function cache(\Closure $closure)
    {
      $backtrace = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT,2)[1];

      $class = $backtrace['class'];
      $method = $backtrace['function'];
      $args = $backtrace['args'];
      $key = $class . '::'. $method . '.' . md5(serialize($args));

      if (!array_key_exists($key, self::$cache)) {
        self::$cache[$key] = call_user_func_array($closure, $args);
      }

      return self::$cache[$key];
    }

    public static function clear()
    {
      self::$cache = [];
    }

  }
