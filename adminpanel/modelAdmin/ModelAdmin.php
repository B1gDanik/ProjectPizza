<?php

class ModelAdmin
{
    public static function getAdminLogin()
    {
        $result = false;
        if (isset($_SESSION['sessionId'])) {
            $result = true;
        } else {

            $_SESSION['error'] = 'Неправильно имя пользователя или пароль';
            if (isset($_POST['email']) && isset($_POST['password']) && $_POST['email'] != "" && $_POST['password'] != "") {
                $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
                $password = filter_input(INPUT_POST, 'password');

                $sql = "SELECT * FROM `user` WHERE `epost` ='" . $email . "'";
                $database = new Database();
                $item = $database->getOne($sql);

                if ($item != null) {
                    $password = $_POST['password'];

                    if ($email == $item['epost'] && password_verify($password, $item['password'])) {
                        $_SESSION['sessionId'] = session_id();
                        $_SESSION['userId'] = $item['id'];
                        $_SESSION['name'] = $item['username'];
                        $_SESSION['role'] = $item['role'];
                        $_SESSION['email'] = $item['epost'];
                        $result = true;
                    }
                }
            }
        }
        return $result;

    }

    public static function getAdminLogout()
    {
        session_destroy();
        unset($_SESSION['sessionId']);
        unset($_SESSION['userId']);
        unset($_SESSION['name']);
        unset($_SESSION['role']);
        unset($_SESSION['email']);
    }

    public static function ChangePassword()
    {
        $result = array(false, "No correct password");

        if (isset($_POST['send'])) {
            $currentPassword = $_POST['currentPassword'];
            $newPassword = $_POST['newPassword'];
            $confirmPassword = $_POST['confirmPassword'];

            if ($newPassword == $confirmPassword && $newPassword != "") {
                $database = new Database();
                $item = $database->getOne("SELECT * FROM user WHERE epost = '" . $_SESSION['email'] . "'");
                if (password_verify($currentPassword, $item['password'])) {
                    $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
                    $database = new Database();
                    $item = $database->executeRun("UPDATE user SET password = '$passwordHash' WHERE user.id = " . $_SESSION['userId']);
                    $result = array(true, "Password changed!");
                }
            } else {
                $result = array(false, "No insert change password");
            }
        }

        return $result;
    }

}//end class



















