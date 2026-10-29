<?php 

session_start();

	include("classes/connect.php");
	include("classes/login.php");
	include("classes/demo.php");

	demo_maybe_reset();

	if(isset($_GET['demo']) && demo_mode() && demo_login()){
		header("Location: " . ROOT . "home");
		die;
	}
 
	$email = "";
	$password = "";
	$email_err = "";
	$password_err = "";
	
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{


		$login = new Login();
		$result = $login->evaluate($_POST);
		
		$email = trim($_POST['email']);
		$password = trim($_POST['password']);

		if(empty(trim($_POST["password"]))){
			$password_err = "Please enter a password.";
		}
		if(empty(trim($_POST["email"]))){
			$email_err = "Please enter an email.";
		}
		
		if($result=="" && $password_err=="" && $email_err=="")
		{

			header("Location:" .ROOT. "profile");
			die;
		}

	}


	

?>

<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Log in | Donart</title>
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
			<div class="intro">
				<img src="<?=ROOT?>s1.png" alt="">
				<h2>Welcome to Donart</h2>
				<p>A social network for donors, volunteers and people looking for help. Share a cause, join a group, and connect with people who want to make a difference.</p>
			</div>

			<div class="card">
				<a class="brand" href="<?=ROOT?>login">
					<img src="<?=ROOT?>donartLogo.png" alt="">
					<h1>Donart</h1>
				</a>
				<p class="tagline">Log in to continue</p>

				<?php if(!empty($result) && empty($email_err) && empty($password_err)): ?>
					<div class="alert"><?php echo $result ?></div>
				<?php endif; ?>

				<form method="post" action="<?=ROOT?>login">
					<div class="field <?php echo !empty($email_err) ? 'invalid' : '' ?>">
						<input name="email" value="<?php echo htmlspecialchars($email) ?>" type="email" placeholder="Email" autocomplete="email">
						<?php if(!empty($email_err)): ?><span class="error"><?php echo $email_err ?></span><?php endif; ?>
					</div>
					<div class="field <?php echo !empty($password_err) ? 'invalid' : '' ?>">
						<input name="password" type="password" placeholder="Password" autocomplete="current-password">
						<?php if(!empty($password_err)): ?><span class="error"><?php echo $password_err ?></span><?php endif; ?>
					</div>
					<input type="submit" class="btn btn-primary" value="Log in">
				</form>

				<?php if(demo_mode()): ?>
					<a href="<?=ROOT?>login?demo=1" class="btn btn-demo">Try the demo</a>
					<p class="hint">or sign in as <b><?=DEMO_EMAIL?></b> / <b><?=DEMO_PASSWORD?></b></p>
				<?php endif; ?>

				<p class="switch">Don't have an account? <a href="<?=ROOT?>signup">Sign up</a></p>
			</div>
		</div>
	</body>
</html>
