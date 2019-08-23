</body>
<footer>
	<?php $view = "<a href=\"admin_login.php\">Dexterous</a>"; ?>
	<div class="footers">
		Alright Reserve <?php echo ((basename($_SERVER['PHP_SELF']) != 'index.php') ? "Dexterous" : "$view"); ?> &copy; <?php echo date('Y');?>
	</div>
</footer>
</html>