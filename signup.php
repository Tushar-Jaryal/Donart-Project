<?php 

	session_start();

	include("classes/connect.php");
	include("classes/signup.php");
	include("classes/demo.php");

	demo_maybe_reset();

	$result = array();

	$first_name = "";
	$last_name = "";
	$gender = "";
	$email = "";
	$password = "";
	$confirm_password = "";

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{


		$signup = new Signup();
		$result = $signup->evaluate($_POST);
		if(empty($result)){
			header("Location: " . ROOT . "login");
				die; 
		}
		$first_name = $_POST['first_name'] ?? "";
		$last_name = $_POST['last_name'] ?? "";
		$gender = $_POST['gender'] ?? "";
		$email = $_POST['email'] ?? "";
		$password = $_POST['password'] ?? "";
		$confirm_password = $_POST['password2'] ?? "";

	}


	

?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sign up | Donart</title>
		<link rel="icon" href="<?=ROOT?>donartLogo.png">
		<link rel="stylesheet" href="<?=ROOT?>auth.css">
	</head>

	<body>
		<?php demo_banner(); ?>

		<div class="circle xxlarge shade1"></div>
		<div class="circle xlarge shade2"></div>
		<div class="circle large shade3"></div>
		<div class="circle medium shade4"></div>
		<div class="circle small shade5"></div>

		<div class="page">
			<div class="card">
				<a class="brand" href="<?=ROOT?>login">
					<img src="<?=ROOT?>donartLogo.png" alt="">
					<h1>Donart</h1>
				</a>
				<p class="tagline">Sign up because your choice matters</p>

				<form method="post" action="<?=ROOT?>signup">
					<div class="field <?php echo !empty($result['first_name_err']) ? 'invalid' : '' ?>">
						<input name="first_name" value="<?php echo htmlspecialchars($first_name) ?>" type="text" placeholder="First name" autocomplete="given-name">
						<?php if(!empty($result['first_name_err'])): ?><span class="error"><?php echo $result['first_name_err'] ?></span><?php endif; ?>
					</div>
					<div class="field <?php echo !empty($result['last_name_err']) ? 'invalid' : '' ?>">
						<input name="last_name" value="<?php echo htmlspecialchars($last_name) ?>" type="text" placeholder="Last name" autocomplete="family-name">
						<?php if(!empty($result['last_name_err'])): ?><span class="error"><?php echo $result['last_name_err'] ?></span><?php endif; ?>
					</div>
					<div class="field <?php echo !empty($result['gender_err']) ? 'invalid' : '' ?>">
						<select name="gender">
							<option value="" hidden>Gender</option>
							<option value="Male" <?php echo $gender == "Male" ? "selected" : "" ?>>Male</option>
							<option value="Female" <?php echo $gender == "Female" ? "selected" : "" ?>>Female</option>
						</select>
						<?php if(!empty($result['gender_err'])): ?><span class="error"><?php echo $result['gender_err'] ?></span><?php endif; ?>
					</div>
					<div class="field <?php echo !empty($result['email_err']) ? 'invalid' : '' ?>">
						<input name="email" value="<?php echo htmlspecialchars($email) ?>" type="email" placeholder="Email" autocomplete="email">
						<?php if(!empty($result['email_err'])): ?><span class="error"><?php echo $result['email_err'] ?></span><?php endif; ?>
					</div>
					<div class="field <?php echo !empty($result['password_err']) ? 'invalid' : '' ?>">
						<input name="password" value="<?php echo htmlspecialchars($password) ?>" type="password" placeholder="Password" autocomplete="new-password">
						<?php if(!empty($result['password_err'])): ?><span class="error"><?php echo $result['password_err'] ?></span><?php endif; ?>
					</div>
					<div class="field <?php echo !empty($result['confirm_err']) ? 'invalid' : '' ?>">
						<input name="password2" value="<?php echo htmlspecialchars($confirm_password) ?>" type="password" placeholder="Retype password" autocomplete="new-password">
						<?php if(!empty($result['confirm_err'])): ?><span class="error"><?php echo $result['confirm_err'] ?></span><?php endif; ?>
					</div>
					<input class="btn btn-primary" type="submit" value="Sign up">
				</form>

				<p class="switch">Already have an account? <a href="<?=ROOT?>login">Log in</a></p>
			</div>
		</div>
	</body>
</html>
