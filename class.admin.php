<?php 
	// including class.connection.php
	// include 'class.connection.php';

	$_SESSION['errors'] = array();

	class Admin{

		public $name;
		public $userName;
		public $password;
		public $connect = "";

		public function __construct() {
			// creating an object of class.connection.php
			$connect = new Connection();
			$this->connect = $connect->connectDB();
		}

		// function for logging in admin
		public function login($username, $password){

			$userName = mysqli_real_escape_string($this->connect,$username);
			$password = mysqli_real_escape_string($this->connect,$password);

			// validating user input
			if (empty($userName)) {
				array_push($_SESSION['errors'], "Username is required");
			}
			if (empty($password)) {
				array_push($_SESSION['errors'], "Password is required");
			}


			if (count($_SESSION['errors']) == 0) {
				$admin_sql = "SELECT * FROM admin WHERE username='".$userName."' AND password='".$password."'";
				$admin_res = mysqli_query($this->connect,$admin_sql) or die("Admin query failed".mysqli_error($this->connect));

				if (mysqli_num_rows($admin_res) == 1) {

				while ($fetch_name = mysqli_fetch_array($admin_res)) {
						$admin_name = stripslashes($fetch_name['name']);
					}
						$_SESSION['login_admin'] = $admin_name;
						// Redirect to admin panel page
						header("Location: admin_panel.php");
				}
				else{
					array_push($_SESSION['errors'], "Invalid username/password");
				}
			}
			if(isset($_SESSION['login_admin']))
			{
				return $_SESSION['login_admin'];
			}
		}

		// logout function for logging out admin 
		public function logout()
		{
			if (isset($_GET['logout'])) {
				session_destroy();
				unset($_SESSION['login_admin']);
				// redirect if admin login session is destroy
				header("Location: admin_login.php");
			}
		}

		// function for deleting posted news
		public function deletePost($id)
		{
				//create safe value for use
				$safe_id = mysqli_real_escape_string($this->connect, $id);

				$delete_post_sql = "DELETE FROM post_news WHERE post_id=\"$safe_id\"";

				$delete_post_res = mysqli_query($this->connect,$delete_post_sql) or die(mysqli_error($this->connect));
		}

		// function for deleting subscribers
		public function deleteSubscriber($id)
		{
				//create safe value for use
				$safe_id = mysqli_real_escape_string($this->connect,$id);

				$delete_sub_sql = "DELETE FROM subscribers WHERE sub_id=\"$safe_id\"";

				$delete_sub_res = mysqli_query($this->connect,$delete_sub_sql) or die(mysqli_error($this->connect));
		}
}
 ?>