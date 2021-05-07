<?php

require_once 'Config.php';

spl_autoload_register(function ($className) {

    require_once $className . '.php';
});
