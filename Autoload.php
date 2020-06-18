<?php
function ControllerAutoload($classname){
    include 'Controllers/' . $classname . '.php';
}

spl_autoload_register('ControllerAutoload');
