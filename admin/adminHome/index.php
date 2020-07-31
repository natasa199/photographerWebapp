<?php
require_once '../ControllerAdmin.php';
$controller = new ControllerAdmin();

$action=isset($_REQUEST['action'])?$_REQUEST['action']:'';

switch($_SERVER['REQUEST_METHOD']) {
    case "GET":
        switch ($action){
            case 'adminLogin':
                $controller->adminLogin();
                break;
            case 'adminHome':
                $controller->adminHome();
                break;
            case 'message':
                $controller->adminHome();
            break;
            case 'addPicture':
                $controller->adminAddPicture();
            break;
            case 'portfolio':
                $controller->adminPortfolio();
                break;
            case 'login':
                $controller->adminLoginValidation();
            break;
            case 'logout':
                $controller->logout();
            break;
            case 'deleteMessage':
                $controller->deleteMessage();
            break;
        }
        
    case "POST":
        switch ($action){
            case 'login':
                $controller->adminLoginValidation();
            break;
            case 'Insert':
                $controller->insertPictures();
        }
        
}
?>