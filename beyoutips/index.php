<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <div class="bottom">
        <div class="tutup"></div>
            <div class="imgBx">
            </div>
            <div class="skew"></div>
            <div class="card">
                <div class="banner-card">
                    <h1>Welcome</h1>
                    <h3>Login To Beyoutips</h3>
                </div>
                <div class="form">
                    <form action="sistem/submit.php" method="post">
                        <div class="inputBx">
                            <h4>Username</h4>
                            <div class="mid">:</div>
                            <input type="text" name="username" class="input-control">
                        </div>
                        <div class="inputBx">
                            <h4>Password</h4>
                            <div class="mid">:</div>
                            <input type="password" name="password" class="input-control">
                        </div>
                        <div class="button">
                            <input type="submit" name="submit" value="Login">
                            <a href="daftar.php">Belum Mempunyai Account ?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>