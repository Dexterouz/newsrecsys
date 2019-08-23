<?php 
	$title = "Subscribe";
	include('_HEADER/header.php');
	include 'class.system.php';

			if (isset($_POST['subscribe'])) {
				
					$sub_name = $_POST['username'];
					$sub_email = $_POST['email'];
					$sub_cat = $_POST['cat'];
					$sub = new NewsAppSystem();
					$sub->subscriber($sub_name, $sub_email, $sub_cat);
			}
?>
<div class="headers">
		<h2><?php echo $title;?></h2>
	</div>

	<form class="form" role="form" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<!-- display error Validation Message -->
		<?php include('error.php'); ?>
		
		<!-- validation success Message -->
		<?php if (isset($_SESSION['success_alert'])): ?>
			<div class=" alert alert-success">
				<p><?php echo $_SESSION['success_alert']; ?></p>

				<!-- unset the session variable -->
				<?php unset($_SESSION['success_alert']); ?>
			</div>
		<?php endif ?>
		
		<div class="input-groups">
			<label>Username</label>
			<input type="text" name="username">
		</div>
		<div class="input-groups">
			<label>Email</label>
			<input type="text" name="email">
		</div>
		<input type="hidden" name="cat" value="<?php echo $_GET['cat']; ?>">
		<div class="input-groups">
			<button type="submit" name="subscribe" class="btns">Subscribe</button>
		</div>
	</form>
<?php include('_FOOTER/footer.php'); ?>