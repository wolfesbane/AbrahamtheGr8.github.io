<?php
session_start();

include "db_conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = validate($_POST['uname']);
    $password = validate($_POST['password']);
    $confirm_password = validate($_POST['confirm_password']);

    if (empty($username) || empty($password) || empty($confirm_password)) {
        $error_message = "All fields are required.";
    } elseif ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {
        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Perform the database insertion
        $sql = "INSERT INTO users (user_name, password) VALUES ('$username', '$hashed_password')";
        mysqli_query($conn, $sql);

        // Redirect to login page after successful signup
        header("Location: login.php");
        exit();
    }
}

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="form2">
        <h2>Signup</h2>
        <?php
        if (isset($error_message)) {
            echo "<p style='color: red;'>$error_message</p>";
        }
        ?>
        <!-- <label for="username">Username:</label> -->
        <input type="text" name="uname" placeholder="Username" required> <br>

        <!-- <label for="password">Password:</label> -->
        <input type="password" name="password" placeholder="Password" required> <br>

        <!-- <label for="confirm_password">Confirm Password:</label> -->
        <input type="password" name="confirm_password" placeholder="Confirm Password" required> <br>

        <p>Already have an account? <a href="login.php">Login here</a></p>

        <button type="submit">Signup</button>
    </form>
</body>
</html>
