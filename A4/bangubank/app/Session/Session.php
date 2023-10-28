<?php

namespace App\Session;
class session
{
    public static function startSession()
    {
        session_start();
    }

    public static function setSessionVariable($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function getSessionVariable($key)
    {
        return $_SESSION[$key];
    }

    public static function unset()
    {
        session_unset();
    }

    public static function destroy()
    {
        session_destroy();
    }

}