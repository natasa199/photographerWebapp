<?php
require_once '../photographer/ControllerPhotographer.php';
$controller = new ControllerPhotographer();

$action=isset($_REQUEST['action'])?$_REQUEST['action']:'';

switch($_SERVER['REQUEST_METHOD']) {
    case "GET":
        switch ($action){
            case 'home':
                $controller->home();
                break;
            case 'portfolio':
                $controller->portfolio();
                break;
            case 'contact':
                $controller->contact();
                break;
            case 'submit':
                $controller->contactValiation();
            break;
        }
        
    case "POST":
        switch ($action){
            case 'submit':
                $controller->contactValiation();
            break;
        }
        
}
?>