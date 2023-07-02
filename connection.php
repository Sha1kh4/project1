<!DOCTYPE html>
<html>

<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>

<body>

	<div class="main">
		<input type="checkbox" id="chk" aria-hidden="true">

		<div class="signup">
			<form method="POST">
				<label for="chk" aria-hidden="true">Sign up</label>
				<input type="text" name="username" placeholder="User name" required="">
				<input type="email" name="email" placeholder="Email" required="">
				<input type="password" name="password" placeholder="Password" required="">
				<button type="submit" name="signup">Sign up</button>
			</form>
		</div>

		<div id="login"class="login">
			<form method="POST">
				<label for="chk" aria-hidden="true">Login</label>
				<input type="text" name="username" placeholder="Username" required="">
				<input type="password" name="password" placeholder="Password" required="">
				<button type="submit" name="login">Login</button>
			</form>
		</div>
		<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['signup'])) {
        // Signup form is submitted
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Validate and sanitize the form data (you can add your own validation rules)
        // ... your existing code for form validation ...

        // Save the user data to the database (you need to establish a database connection first)
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=users;charset=utf8", 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$username, $email, $password]);

            // Redirect to a success page
            header("Location: connection.php#login");
            exit();
        } catch (PDOException $e) {
            // Handle any database connection errors
            echo "Database connection failed: " . $e->getMessage();
        }
    } elseif (isset($_POST['login'])) {
        // Login form is submitted
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Validate and sanitize the form data (you can add your own validation rules)
        // ... your existing code for form validation ...

        // Retrieve the user data from the database (you need to establish a database connection first)
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=users;charset=utf8", 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $query = "SELECT * FROM users WHERE username = ? AND password = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$username, $password]);
            $user = $stmt->fetch();

            if ($user) {if ($user['status'] == 1) {
				// User has status 1, redirect to dash.php
				session_start();
				$_SESSION['useridlogin'] = $username; // Save the username as a session variable
				header("Location: dash.php");
				exit();
			} else {
				// User has status 0, redirect to index.php
				session_start();
				$_SESSION['useridlogin'] = $username; // Save the username as a session variable
				header("Location: index.php");
				exit();
			}
		} else {
			// Invalid username or password
			echo "<script>alert('Incorrect username or password')</script>";
		}
        } catch (PDOException $e) {
            // Handle any database connection errors
            echo "Database connection failed: " . $e->getMessage();
        }
    }
}

// Redirect to index.php if the user is not logged in
session_start();

?>


	</div>
</body>

</html>