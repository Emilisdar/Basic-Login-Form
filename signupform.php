<!DOCTYPE html>
<html lang="en" >
<head>
<head>
  <meta charset="UTF-8">
  <title>CodePen - Sign up / Login Form</title>
  <link rel="stylesheet" href="signup.css" deref>

</head>
<body>
<!-- partial:index.partial.html -->
<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
	<link rel="stylesheet" type="text/css" href="slide navbar style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form action="signup.php" method="post">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="name" placeholder="Name" required="">
					<input type="text" name="email" placeholder="Email" required="">
					<input type="text" name="uid" placeholder="Username" required="">
                    <input type="password" name="pwd" placeholder="Password" required="">
                    <input type="password" name="pwdRpt" placeholder="Repeat password" required="">
					<button type="submit" name="submit">Sign up</button>
				</form>
			</div>
	</div>

	<?php
		if (isset($_GET["error"])) {
			if ($_GET["error"] == "emptyinput") {
				echo "<p>Fill in all fields<p>";
			}
			else if ($_GET["error"] == "invalidUid") {
				echo "<p>Choose a proper username<p>";
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
