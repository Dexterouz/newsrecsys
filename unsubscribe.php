<?php 
$unsub_con = mysqli_connect("localhost","root","","newsappsystem");
if (isset($_GET['sub_email'])) {
	$safe_id = mysqli_real_escape_string($unsub_con,$_GET['sub_email']);

	$unsub_query = "DELETE FROM subscribers WHERE sub_email=\"$safe_id\"";

	$unsub_res = mysqli_query($unsub_con,$unsub_query);
	
	header("Location:message.html");
	exit();
}
 ?>