<?php
	session_start();


	$conn=mysqli_connect("localhost", "root", "", "kerala_lottery");
 
	if(!$conn){
		die("Error: Failed to connect to database!");
	}

 
		$email = $_POST['idLogin'];
		$password = $_POST['passLogin'];
 
		
		$query = mysqli_query($conn, "SELECT * FROM `users` WHERE `email`='$email' && `password`='$password'");
		$fetch=mysqli_fetch_array($query);
		$count=mysqli_num_rows($query);
 
		if($count > 0){
			$_SESSION['user_id']=$fetch['user_id'];
           if($password == 'admin'){
                header("Location: draw_lottery.php");
				$_SESSION['user_id'] = $fetch['user_id'];
		   }

           else{
                header("Location: book_lottery.php");
				$_SESSION['user_id'] = $fetch['user_id'];
            }
	        $_SESSION['user']=$fetch['f_name'];
	  
		}else{
			$failure = "Invalid username or password";
            header("Location: index.php?id=".urlencode($failure));
		}
?>