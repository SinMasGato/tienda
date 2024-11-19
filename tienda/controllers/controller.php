<?php
spl_autoload_register(function ($clase) {
    if (file_exists('controllers/' . $clase . '.php')) {
        require_once 'controllers/' . $clase . '.php';
    } else if (file_exists('models/' . $clase . '.php')) {
        require_once 'models/' . $clase . '.php';
    }
});