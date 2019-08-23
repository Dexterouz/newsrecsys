<?php  if(count($_SESSION['p_error']) > 0): ?>
<div class="alert alert-danger">
<?php foreach ($_SESSION['p_error'] as $error): ?>
		<p><?php echo $error; ?></p>
		<?php unset($error); ?>
<?php endforeach ?>
</div>
<?php endif ?>