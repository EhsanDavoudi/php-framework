<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title><?php echo $var['title'] ?></title>
</head>
<body class="home-class">

<nav class="navbar navbar-collapse bg-light p-3 mb-5">
    <div>
        <?php
        if ($_SERVER['REQUEST_URI'] === '/?mod=home&page=userIndex') {
        ?>
            <a class="active" href="/?mod=home&page=userIndex">
                <img alt="logo" class="" src="../assets/images/Frame.png" style="max-height: 70px; width: auto;">
            </a>
        <?php
        } else  {
        ?>
            <a class="active" href="/?mod=home&page=index">
                <img alt="logo" class="" src="../assets/images/Frame.png" style="max-height: 70px; width: auto;">
            </a>
        <?php
        }
        ?>
    </div>

    <div>
        <?php
        if ($_SERVER['REQUEST_URI'] === '/?mod=home&page=index' || $_SERVER['REQUEST_URI'] === "/") {
        ?>
            <a href="/?mod=user&page=register" class="btn btn-lg btn-primary ms-2">SignUp</a>
            <a href="/?mod=user&page=login" class="btn btn-lg btn-outline-info ms-2">Login</a>
        <?php
        } else if ($_SERVER['REQUEST_URI'] === '/?mod=home&page=userIndex') {
         ?>
            <a href="/?mod=user&page=logOut" class="btn btn-lg btn-outline-danger ms-2">Logout</a>
        <?php
        }
        ?>
    </div>
</nav>
<?php
if (isset($var['msg'])) {
    echo $var['msg'];
}
?>
