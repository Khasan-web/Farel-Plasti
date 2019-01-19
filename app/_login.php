<?php 
include "includes/connection/db.php";
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

$admin_data = mysqli_query($con, "SELECT * FROM `admin`");
$admin = mysqli_fetch_assoc($admin_data);

if ($_COOKIE['auth_key']) {
    if ($admin['auth_key'] == $_COOKIE['auth_key']) {
        $password = $admin['password'];
        header("Location: /_admin.php?username=$admin[username]&password=$password&auth=$admin[auth_key]");
    }
}
if (isset($_GET['submit'])) {
    $auth_key = str_shuffle($permitted_chars);
    setcookie('auth_key', $auth_key, time() + (86400 * 5), "/");
    mysqli_query($con, "UPDATE `admin` SET `auth_key`= '$auth_key'");

    $admin_data = mysqli_query($con, "SELECT * FROM `admin`");
    $admin = mysqli_fetch_assoc($admin_data);

    $username = $_GET['username'];
    $_GET['password'] = sha1($_GET['password']);
    $password = $_GET['password'];
    if ($password == $admin['password'] && $username == $admin['username']) {
        header("Location: /_admin.php?username=$admin[username]&password=$password&auth=$admin[auth_key]");
    }
}

?>
<?php require "includes/cookie.php"?>
<!DOCTYPE html>
<html lang="<?= $_GET['lang']?>">

<head>
	<?php require "includes/head.php";?>
	<title>Login | Farel Plastic</title>
</head>

<body>
	<?php require "includes/navbar.php";?>
    <section id="login">
        <h2 class="not-found-title m-0"><span class="amber-text">Admin panel</span> Login</h2>
        <form action="<?= $page?>" method="get">
            <div class="row mt-5">
                <div class="input-field col l2 m6 s12 offset-l5">
                    <input id="username" name="username" type="text" class="validate">
                    <label for="username">Username</label>
                </div>
                <div class="input-field col l2 m6 s12 offset-l5">
                    <input id="password" name="password" type="password" class="validate">
                    <label for="password">Password</label>
                </div>
            </div>
            <div class="center-align">
                <button type="submit" name="submit" class="btn amber">Submit</button>
            </div>
            <?php
                if (isset($_GET['submit'])) {
                    if ($password != $admin['password'] && $username != $admin['username']) {
                        ?>
                            <p class="not-found-title m-0 error red-text">Username or passsword is incorrect</p>
                        <?
                    }
                }
            ?>
        </form>
    </section>

	<?php require "includes/footer.php"?>
</body>

</html>