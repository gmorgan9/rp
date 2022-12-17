<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    <title>Log In &lsaquo; CacheUp</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- custom styles -->
        <style>
            body {
                background-color: #f0f0f0;
            }
            .login-form {
                padding: 80px 0px;
                width: 320px;
                margin: auto;
            }
            .form {
                border-radius: 15px;
                margin-top: 20px;
                padding: 26px 24px 34px;
                background-color: white;
            }
            .btn {
                background-color: #325A73 !important;
                border: none !important;
                margin-right: auto;
            }
        </style>
    <!-- end custom styles -->
</head>
<body>

    <div class="login-form">
        <h1 class="logo text-center">
            <img src="assets/images/sm-logo-border.png" width="84px" height="84px" alt="">
        </h1>
        <form class="form" action="" method="POST">
            <div class="username">
                <label for="user_login">Username</label>
                <input type="text" id="user_login" name="username" class="form-control" autocapitalize="off">
            </div>
            <br>
            <div class="password">
                <label for="user_pass">Password</label>
                <input type="password" id="user_pass" name="password" class="form-control" autocapitalize="off">
            </div>
            <br>
            <div class="button text-end">
                <input type="submit" name="login" class="btn btn-primary" value="Log In">
            </div>
        </form>
        <br><br>
        <p><a href="">Forgot password?</a></p>
        <br>
        <p><a href="">← Go to CacheUp</a></p>
    </div>
    
</body>
</html>