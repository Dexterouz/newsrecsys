<?php 
	include 'class.recommend.php';
	include 'class.connection.php';
	$conn = new Connection();
	$display_page = new Recommend();

	// variable to hold the display page
	// $display_block = "";

	// for pagination
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}
	if ($page == "" || $page == "1") {
		$page1 = 0;
	}
	else{
		$page1=($page*2)-2;
	}
	$sql_query = "SELECT * FROM post_news ORDER BY post_date DESC, post_time DESC LIMIT $page1,2";
	$sql_res = mysqli_query($conn->connectDB(),$sql_query);
 ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Daily Headlines on Sports, Politics & Entertainment</title>
	<link rel="shortcut icon" type="image/x-icon" href="news\page\favicon.png" />
	<link rel="stylesheet" type="text/css" href="news\page\style.css">
</head>
<body class="body">
<header class="mainheader">
	<img src="news\page\newspix.png">
	<nav>
		<ul>
			<li class="active"><a href="index.php">Home</a></li>
			<li class="dropdown">
				<a href="javascript:void(0)" class="dropbtn">Subscribe</a>
					<div class="dropdown-content">
						<a href="subscribe.php?cat=entertainment">Entertainment</a>
						<a href="subscribe.php?cat=gossips">Gossips</a>
						<a href="subscribe.php?cat=politics">Politics</a>
						<a href="subscribe.php?cat=sports">Sports</a>
						<a href="subscribe.php?cat=science_tech">Science&amp;Technology</a>
					</div>
			</li>
			<li><a href="about.html">About</a></li>
			<li><a href="contact.html">Contact</a></li>
		</ul>
	</nav>
</header>
<div class="maincontent">
	<div class="content">
		<?php 
	while ($fetch_data = mysqli_fetch_array($sql_res)) {
			$post_topic = $fetch_data['post_topic'];
			$post_category = $fetch_data['post_cat'];
			$post_author = $fetch_data['post_author'];
			$post_summary = $fetch_data['post_summary'];
			$post_article = $fetch_data['post_article'];
			$post_date = $fetch_data['post_date'];
			$post_time = $fetch_data['post_time'];
			$articleLink = $display_page->generateArticleLink($post_topic, $post_author, $post_article,$post_date,$post_time);
			echo "
					<article class=\"topcontent\">
						<header>
							<h2><a href=\"javascript:void(0)\" title=\"first post\">".$fetch_data['post_topic']."</a></h2>
						</header>

						<footer>
							<p class=\"post-info\">This post was written by ".$fetch_data['post_author']."</p>
							<p class=\"post-info\"><span style=\"color:black;\">".ucfirst($post_category)."</span></p>
						</footer>
						<content>
							<p>
								".wordwrap(ucfirst($fetch_data['post_summary']))."
								<a href=\"".$articleLink."\"><br/>Read More...</a>

							</p>
						</content>
					</article>
					"; 
			}
		 ?>
		 <?php 
		 $page_res = mysqli_query($conn->connectDB(),"SELECT * FROM post_news ORDER BY post_date DESC");
		 $count_rows = mysqli_num_rows($page_res);
		$init_count = $count_rows/2;
		$init_count = ceil($init_count);
		 for ($i=1; $i <= $init_count; $i++) { 
		 		?><div class="page-align">
		 			<a href="index.php?page=<?php echo $i; ?>" class="pagination"><?php echo $i." "; ?></a>
		 		</div><?php
		 }

		  ?>
<footer class="mainfooter">
	<p>Copyright &copy; <?php echo date('Y'); ?> <a href="newsrecsystem.com" title="newsrecsystem">newsrecsystem.com</a></p>
</footer>
</body>
</html>