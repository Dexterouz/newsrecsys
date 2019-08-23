<?php

include 'unsubscribe.php';

class Recommend {
	private $conn;

	public function __construct() {
		// creating an object of class.connection.php
		$connect = new Connection();
		$this->conn = $connect->connectDB();
	}


	public function getArticleTopic($topic) {
		$query = "SELECT * FROM post_news WHERE post_topic = '" . $topic . "';";
		$run_query = mysqli_query($this->conn, $query);
		$articleTopic = mysqli_fetch_array($run_query);

		return $articleTopic;
	}

	public function getSubsEmail($cat) {
			$subsEmail = array();
			$query = "SELECT sub_email FROM subscribers WHERE sub_cat = '" . $cat . "'";
			$run_query = mysqli_query($this->conn, $query);
			$i = 0;
			while ($result = mysqli_fetch_array($run_query)) {
				$subsEmail[$i] = $result['sub_email'];
				$i++;
			}

			return $subsEmail;
		}

		public function generateArticleLink($topic, $author, $news_article, $date, $time) {
			$fileExtension = ".html";
			$seoKeyword = str_replace(" ", "-", $topic);
			$newsLink = "news/".$seoKeyword.$fileExtension; // or .php   
			$fileOpen = fopen($newsLink, 'w') or die("error in writing file");
			$time = strtotime($time);
			$articlePage ="
					<!DOCTYPE html>
					<html>
					<head>
					<meta charset=\"utf-8\">
					<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
						<title>$topic</title>
						<link rel=\"stylesheet\" type=\"text/css\" href=\"page\style.css\">
						<link rel=\"shortcut icon\" type=\"image/x-icon\" href=\"news\page\favicon.png\" />

					</head>
					<body class=\"body\">
					<header class=\"mainheader\">
						<img src=\"page\\newspix.png\">
						<nav>
							<ul>
								<li class=\"active\"><a href=\"../index.php\">Home</a></li>
							</ul>
						</nav>
					</header>
					<div class=\"maincontent\">
					<div class=\"content\">
						<article class=\"topcontent\">
							<header>
								<h2><a href=\"javascript:void(0)\" title=\"first post\">$topic</a></h2>
							</header>

							<footer>
							<p class=\"post-info\">Posted by $author
							</p>
							</footer>
							<footer>
							<p class=\"post-info\">Date Posted: $date <span class=\"space\">Time: ".date("h:i:sa",$time)."</span> 
							</p>
							</footer>
							<content>
								<p>
									".ucfirst("$news_article")."
								</p>
							</content>
						</article>
						</div>
						</div>
						<footer class=\"mainfooter\">
							<p>Copyright &copy; ".date('Y')." <a href=\"#\" title=\"newsrecsystem.com\">newsrecsystem.com</a></p>
						</footer>
						</body>
						</html>
						";

					fwrite($fileOpen, $articlePage);
					fclose($fileOpen);
			return $newsLink;
		}

		public function sendMail($article, $subsEmail) {
			$articleLink = $this->generateArticleLink($article['post_topic'],
				$article['post_author'], $article['post_article'],
				$article['post_date'], $article['post_time']);
			foreach ($subsEmail as $subEmail) {
				$to = $subEmail;
				$subject = $article['post_topic'];
				$message = "Here is the Headline <br/>".
							$article['post_topic']."
							<a href=\"../". $articleLink. "\">".$article['post_topic']."</a><br/><br/>
							To unsubscribe click <a href=\"../unsubscribe.php?sub_email=$subEmail\">Here</a>";
				$header = "From: Noreply@gmail.com";
				mail($to, $subject, $message, $header);
				}
		}
	}

?>