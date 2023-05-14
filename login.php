<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<h1>Login Page</h1>
	<form method="post" action="login.php">
		<label>Username:</label>
		<input type="text" name="username"><br>
		<label>Password:</label>
		<input type="password" name="password"><br>
		<input type="submit" value="Login">
	</form>
</body>
</html>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
	// Connect to MySQL
	$conn = mysqli_connect("localhost", "root", "", "example_db");
	
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Sanitize input data
	$username = mysqli_real_escape_string($conn, $_POST["username"]);
	$password = mysqli_real_escape_string($conn, $_POST["password"]);
	
	// Hash the password
	$hashed_password = password_hash($password, PASSWORD_DEFAULT);
	
	// Check if the user exists in the database
	$sql = "SELECT * FROM users WHERE username='$username'";
	$result = mysqli_query($conn, $sql);
	
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		
		// Verify the password
		if (password_verify($password, $row["password"])) {
			// Login successful
			echo "Login successful. Welcome, " . $row["username"] . "!";
		} else {
			// Login failed
			echo "Invalid username or password.";
		}
	} else {
		// Login failed
		echo "Invalid username or password.";
	}
	
	// Close the MySQL connection
	mysqli_close($conn);
}
?>
