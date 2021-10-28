<?php
class ControllerAdmin {	

    public static function loginForm() {
        include_once('viewAdmin/loginForm.php');
    }

    public static function startAdmin() {
        $resultLogIn=ModelAdmin::getAdminLogin();
        if(isset($_SESSION['error'])) {
            include_once('viewAdmin/loginForm.php');
        }else{
            include_once('viewAdmin/dashboard.php');
        }
    }

    public static function logoutAdmin() {
        ModelAdmin::getAdminLogout();
        header('Location:../');
    }

    public static function error404() {
        include_once('viewAdmin/error404.php');
    }

    public static function profileTable()
    {
        include_once 'viewAdmin/profileTable.php';
    }

    public static function profileEditResult()
    {
        $result = ModelAdmin::ChangePassword();
        include_once 'viewAdmin/profileTable.php';
    }

}//end class
?>
















