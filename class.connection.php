<?php 
	class Connection{

		public $connection;
		// create database connection function
		function connectDB(){
			$connection = mysqli_connect("localhost","root","","newsappsystem");

			if (mysqli_connect_errno()) {
				printf("Connection Failed %s\n",mysqli_connect_error());
				exit();
			}
			else
			{
				return $connection;
			}
		}
	}

 ?>