<?php

namespace system;

class SessionModel
{
    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return null;
        }
    }

    public function destroy($key)
    {
        unset($_SESSION[$key]);
    }
}