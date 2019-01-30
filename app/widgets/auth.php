<?php include "/includes/connection/db.php"?>
<?php
    $admin_data = mysqli_query($con, "SELECT * FROM `admin`");
    $admin = mysqli_fetch_assoc($admin_data);
    if ($_GET['username'] != $admin['username'] || $_GET['password'] != $admin['password'] || $_GET['auth'] != $admin['auth_key']) {
        if ($_COOKIE['auth_key']) {
            unset($_COOKIE['auth_key']);
            setcookie('auth_key', null, -1, '/');
        }
        header("Location: /_login");
    }
    if (isset($_GET['logout'])) {
        unset($_COOKIE['auth_key']);
        setcookie('auth_key', null, -1, '/');
        mysqli_query($con, "UPDATE `admin` SET `auth_key`= null");
        header("Location: /_login");
    }
?>