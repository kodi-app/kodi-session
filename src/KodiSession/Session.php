<?php

namespace KodiSession;

class Session
{
    public function get($name,$defaultValue = null) {
        return isset($_SESSION[$name]) ?? $defaultValue;
    }

    public function set($name,$value,$defaultValue = null) {
        $_SESSION[$name] = ($value != null) ?? $defaultValue;
    }
}