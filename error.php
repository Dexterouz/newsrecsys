<?php  if(count($_SESSION['errors']) > 0): ?>
<div class="alert alert-danger">
<?php foreach ($_SESSION['errors'] as $error): ?>
		<p><?php echo $error; ?></p>
		<?php unset($error); ?>
<?php endforeach ?>
</div>
<?php endif ?>