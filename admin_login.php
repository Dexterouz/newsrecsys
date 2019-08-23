<?php 
	$title = "Admin Login";
	include('_HEADER/header.php');

	session_start();

// including class.connection.php
	include 'class.connection.php';

//	including page class.admin.php
	include 'class.admin.php';

	if (isset($_POST['login'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		$admin = new Admin();
		$admin->login($username, $password);
	}

?>

<div class="headers">
		<span class="glyphicon glyphicon-user"></span><h2><?php echo $title;?></h2>
	</div>

	<form class="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<!-- display error Validation Message -->
		<?php include('error.php'); ?>
		<div class="input-groups">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-groups">
			<label>Password</label>
			<span glyphicon glyphicon-eye-open></span><input type="password" name="password">
		</div>
		<div class="input-groups">
			<button type="submit" name="login" class="btns">Login</button>
		</div>
	</form>
<?php 
	include('_FOOTER/footer.php');
?>