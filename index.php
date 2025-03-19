<?php

session_start();

if(!isset($_SESSION['email'])) {

    header('Location: pages/login.php');
}

?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="d-flex flex-column h-100">

    <?php include 'components/navbar.php'; ?>


    <?php
    if (isset($_GET['home'])) {
        include 'pages/home.php';
    }
    ?>

    <?php
    if (isset($_GET['contact'])) {
        include 'pages/contact.php';
    }
    ?>

    <?php
    if (isset($_GET['about'])) {
        include 'pages/about.php';
    }
    ?>

    <?php include 'components/footer.php'; ?>
</body>

</html>