<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Sign up / Login Form</title>
  <link rel="stylesheet" href="login.css" defer>

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="login">
				<form action="login.php" method="post">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="uid" placeholder="Username/Email" required="">
					<input type="password" name="pwd" placeholder="Password" required="">
					<button type="submit" name="submit">Login</button>
				</form>
			</div>
	</div>
<!-- PHP code to throw out errors for the user -->
	<?php
		if (isset($_GET["error"])) {
			if ($_GET["error"] == "emptyinput") {
				echo "<p>Fill in all fields<p>";
			}
			else if ($_GET["error"] == "invalidUid") {
				echo "<p>Choose a proper username<p>";
			}
			else if ($_GET["error"] == "wronglogin") {
				echo "<p>Incorrect login Info<p>";
			}
			else if ($_GET["error"] == "invalidemail") {
				echo "<p>Choose a proper email<p>";
			}
			else if ($_GET["error"] == "paswordsdontmatch") {
				echo "<p>Paswords don't match<p>";
			}
			else if ($_GET["error"] == "stmtfailed") {
				echo "<p>Something went wrong, try again!<p>";
			}
			else if ($_GET["error"] == "usernametaken") {
				echo "<p>Username is already taken!<p>";
			}
			else if ($_GET["error"] == "none") {
				echo "<p>You've signed up!<p>";
			}
		}
	?>
</body>
</html>
<!-- partial -->
  
</body>
</html>
