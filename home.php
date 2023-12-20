<?php
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="welcome">
        <h1 class="welcome">Welcome <?php echo $_SESSION['user_name']; ?>! </h1>
        <p>Nothing to see here, <a href="logout.php" class="lgout">Logout</a></p>
        
        </div>
    </body>
    </html>

    <?php
}
else {
    header("Location: index.php");
    exit();
}
?>
