<?php

class ConfigArray{
    protected static $config = [];

    public static function getConfig($key)
    {
        if (false === key_exists($key, static::$config)) {
            throw new ErrorException("Not found config called $key");
        }

        return static::$config[$key];
    }

    public static function setConfig($key, $value)
    {
        static::$config[$key] = $value;
    }
};
