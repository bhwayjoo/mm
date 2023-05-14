<?php
session_start();
$host = "localhost";
$username = "<root>";
$password = "<>";
$database_name = "<lol>";
$mysqli = new mysqli($host, $username, $password, $database_name);
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $mysqli->query($query);
    if ($result->num_rows == 1) {
        $_SESSION["username"] = $username;
        header("Location: welcome.php");
        exit();
    } else {
        echo "Invalid username or password";
    }
}
?>
<form method="post">
<label>Username:</label>
<input type="text" name="username"><br>
<label>Password:</label>
<input type="password" name="password"><br>
<input type="submit" value="Login">
</form>
