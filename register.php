<?php 
include 'authController.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Login</title>
</head>
<body>
    <form method="POST">
        <input type="hidden" name="q" value="register">
        <label for="">Email</label>
        <input type="email" name="email">
        <br>

        <label for="">Password</label>
        <input type="password" name="password">

        <br><br>

        <button>Insert </button>
    </form>
</body>
</html>