<?php
session_start();
require_once 'Autoload.php';
require_once 'Config/db.php';
require_once 'Config/Parameters.php';
require_once 'Helpers/Utilidades.php';

function ShowError()
{
    $error = new ErrorController();
    $error->Error();
}

if (isset($_GET['controller'])) {
    $Ncontrolador = $_GET['controller'] . 'controller';
}elseif (!isset($_GET['controller']) && !isset($_GET['action'])){
    $Ncontrolador = Controller_default;
}else{
    ShowError();
    exit();
}

if (class_exists($Ncontrolador)){
    $Controlador = new $Ncontrolador();

    if (isset($_GET['action']) && method_exists($Controlador, $_GET['action'])){
        $action = $_GET['action'];
        $Controlador->$action();
    }elseif (!isset($_GET['controller']) && !isset($_GET['action'])){
        $Action_default = Action_default;
        $Controlador->$Action_default();
    }else{
        ShowError();
    }
}else{
    ShowError();
}

if (!isset($_SESSION['Admin'])){
    require_once 'Views/Layout/footer.php';
}else{
    require_once 'Views/Layout/footer2.php';
}
