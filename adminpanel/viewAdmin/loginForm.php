<?php
//правa админа CODE
if (isset($_SESSION['userId']) && isset($_SESSION['role']) && $_SESSION['role'] == 'admin') {
    header('Location: dashboard');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title>Pizza Hut - dashboard</title>
    <!-- Main Styles -->
    <link rel="stylesheet" href="assets/styles/style.css">
</head>
<body>
<div id="wrapper">
    <div class="login-content">
        <div class="row small-spacing">
            <div class="col-xs-12">
                <div class="box-content">
                    <div class="login-form"><!--login form-->
                        <h3>Вход в аккаунт</h3>
                        <form action="loginResult" method="POST">
                            <div class="form-group">
                                <label>Э-майл</label>
                                <input class="form-control" type="email" name="email" placeholder="Email Address"
                                       required/>
                            </div>
                            <div class="form-group">
                                <label>Пароль</label>
                                <input class="form-control" type="password" name="password" placeholder="Password"
                                       required/>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success" type="submit" name="login">
                                    Войти
                                </button>
                            </div>
                        </form>
                    </div><!--/login form-->
                </div>
            </div>
            <?php
            if (isset($_SESSION['error'])) {
                echo '<p>' . $_SESSION['error'] . '</p>';
                unset($_SESSION['error']);
            }
            ?>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.main-content -->
</div><!--/#wrapper -->
</body>
</html>
