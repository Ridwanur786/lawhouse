<?php
class Session
    {
    public static function init(){
        if (version_compare(phpversion(), '5.4.0', '<')) {
            if (session_id() == '') {
                    session_start();
            }
        } else {
            if (session_status() == PHP_SESSION_NONE) {
                if (!headers_sent())
                {
                    session_start();
                }
            }
        }
    }
        public static function set($key, $value)
        {
            $_SESSION[$key]= $value;
        }
        public static function get($key)
{
    if (isset($_SESSION[$key]))
    {
        return $_SESSION[$key];
    }else
    {
        return false;
    }
}
        public static function checkSession()
        {
            self::init();
            if (self::get('login')== false)
            {
                self::destroySession();
                if (!headers_sent())
                {
                    header("Location:login.php");
                }
            }
        }
    public static function checkLogin()
    {
        self::init();
        if (self::get('login')== true)
        {
            if (!headers_sent())
            {
                header("Location:index.php");
            }
        }
    }
        public static function destroySession()
        {
           //session_unset();
            if (isset($_SESSION))
            {
                session_destroy();
                header("Location:login.php");
            }
        }
    }