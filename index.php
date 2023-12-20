<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="login.php" method="post" class="form1">
        <h2>LOGIN</h2>
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"> <?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label for="useranme"></label>
        <input type="text" name="uname" placeholder="Username" id=""> <br>
        <label for="password"></label>
        <input type="password" name="password" placeholder="Password" id=""> <br>
        <a href="signup.php">No account, sign up?</a>

        <button type="submit">Login</button>
    </form>
</body>
</html>