	<?php 
	include 'class.connection.php';
	include 'class.recommend.php';

	session_start();

	// coding the news app system
	// class.system.php
	$_SESSION['errors'] = array();
	$_SESSION['p_error'] = array();
	
	class NewsAppSystem{

		public $topic;
		public $author;
		public $newsArticle;
		public $newsCategory;
		public $connect = "";

		public function __construct() {
			// creating an object of class.connection.php
			$connect = new Connection();
			$this->connect = $connect->connectDB();
		}


		// Beginning of function to post news content
		public function postNews($topic,$author,$newsArticle,$newsCategory,$newsSummary)
		{

				$topic = mysqli_real_escape_string($this->connect,$topic);
				$author = mysqli_real_escape_string($this->connect,$author);
				$newsArticle = mysqli_real_escape_string($this->connect,$newsArticle);
				$newsCategory = mysqli_real_escape_string($this->connect,$newsCategory);
				$newsSummary = mysqli_real_escape_string($this->connect,$newsSummary);

				//validate admin news post entry
				if (empty($topic)) {
					array_push($_SESSION['p_error'], "Topic is required");
				}
				if (empty($author)) {
					array_push($_SESSION['p_error'], "Author name is required");
				}
				if (empty($newsArticle)) {
					array_push($_SESSION['p_error'], "News article is required");
				}
				if (empty($newsSummary)) {
					array_push($_SESSION['p_error'], "News Summary is required");
				}
				if ($newsCategory == "none") {
					array_push($_SESSION['p_error'], "Specify News category");
				}


				// if there are no error save post in database
				if (count($_SESSION['p_error']) == 0) {
					$post_sql = 
					"INSERT INTO post_news(post_topic,post_author,post_summary,post_cat,post_article,post_date,post_time)
					VALUES ('".$topic."','".$author."','".$newsSummary."','".$newsCategory."','".$newsArticle."',now(),now())";

					$post_res = mysqli_query($this->connect,$post_sql) or die("Post News query failed: ".mysqli_error($this->connect));

					// subscription success message
					$success = "News Posted successfully";
					$_SESSION['success_alert'] = $success;


					// instantiating class.recommend.php
					$execute = new Recommend();
					
					$articleTopic = $execute->getArticleTopic($topic);

					$subsEmail = $execute->getSubsEmail($newsCategory);

					$execute->sendMail($articleTopic, $subsEmail);

			}
		}

		//function to save new subscriber in database
		public function subscriber($sub_name, $sub_email, $sub_cat){

				$sub_name = mysqli_real_escape_string($this->connect,$sub_name);
				$sub_email = mysqli_real_escape_string($this->connect,$sub_email);
				$sub_cat = mysqli_real_escape_string($this->connect,$sub_cat);

				//validating user data entry
				if (empty($sub_name)) {
					array_push($_SESSION['errors'], "Username is required");
				}
				if (empty($sub_email)) {
					array_push($_SESSION['errors'], "Email is required");
				}
				else if (!filter_var($sub_email,FILTER_VALIDATE_EMAIL)) {
					array_push($_SESSION['errors'], "Invalid email address");
				}

				// if there's no error save subscribers in database
				if (count($_SESSION['errors']) == 0) {
					$sub_sql = "INSERT INTO subscribers (sub_name, sub_email, sub_cat, sub_date, sub_time) VALUES ('".$sub_name."','".$sub_email."','".$sub_cat."',now(),now())";

					$sub_res = mysqli_query($this->connect,$sub_sql) or die("subscribers query failed ".mysqli_error($this->connect));

					// subscription successful message
					$success = "You have successfully subscribe";
					$_SESSION['success_alert'] = $success;
				}

			}

			// function for viewing news that were posted
			public function getPost()
			{
				$posts = array();

				$view_post_sql = "SELECT * FROM post_news ORDER BY post_date, post_time";

				$view_post_res = mysqli_query($this->connect,$view_post_sql) or die("view post query failed ".mysqli_error($this->connect));

			if (mysqli_num_rows($view_post_res) <1 ) {

            echo 
            "<div class=\"alert alert-info\">
              <p><center>No News Post available</center></p>
            </div>";
          }
          else{
          		$i = 0;
				while ($post_result = mysqli_fetch_array($view_post_res)) {
					$posts[$i] = $post_result;
					$i++;
				}
			}
			return $posts;
		}


			//function to view the subscribers
			public function getSubscribers()
			{
				$subs = array();
		
				$view_sub_sql = "SELECT * FROM subscribers ORDER BY sub_date, sub_time";

				$view_sub_res = mysqli_query($this->connect,$view_sub_sql) or die("View subscribers query failed ".mysqli_error($this->connect));

				if (mysqli_num_rows($view_sub_res) < 1) {
					echo 

					"<div class=\"alert alert-info\">
						<p><center>No Subscribers available</center></p>
					</div>";
				} else {
					$i = 0;
					while ($sub_result = mysqli_fetch_array($view_sub_res)) {
						$subs[$i] = $sub_result;
						$i++;
					}
				}

				return $subs;
			}
	}

 ?>