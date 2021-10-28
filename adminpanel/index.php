<?php
session_start();
//session_destroy();
    require_once '../inc/database.php';
	include_once'modelAdmin/ModelAdmin.php';
    include_once'controllerAdmin/ControllerAdmin.php';

    include_once 'modelAdmin/ModelProduct.php';
    include_once 'modelAdmin/ModelCategory.php';
    include_once 'modelAdmin/ModelNews.php';

    include_once 'controllerAdmin/ControllerProduct.php';
    include_once 'controllerAdmin/ControllerCategory.php';
    include_once 'controllerAdmin/ControllerNews.php';


    include'routeAdmin/routing.php';
?>
