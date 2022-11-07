<?php
	session_start();
         $host="localhost";  
        
        $conn=mysqli_connect("localhost", "root", "", "kerala_lottery");
	
	    $category= $_POST['category'];
        $date= $_POST['date'];
        $lname= $_POST['lname'];
        $weekday= $_POST['weekday'];
        $query = mysqli_query($conn, "SELECT `category_id` FROM `categories` WHERE `category_name`='$category'");
		$fetch=mysqli_fetch_array($query);
        $category_id = $fetch['category_id'];
 
        $host="localhost";  
        
    	$conn=mysqli_connect("localhost", "root", "", "kerala_lottery");
		if (mysqli_connect_error()) {
    		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	    }
      	else{

	        $checkUser = "SELECT * from lottery where lottery_name='$lname'";
            $result=mysqli_query($conn, $checkUser);
	        $count = mysqli_num_rows($result);
	        if($count > 0){
			    echo"Lottery already exist";
	        }


            else{
	            $sql="INSERT INTO `lottery`(`category_id`,`lottery_name`,`day`)
	            values('$category_id','$lname',$weekday);";
	            if ($conn->query($sql)==TRUE){
		            //echo "New record is inserted successfully";	
                    header("Location: index.php?err=".urlencode("Submission Successful"));
	            }
	            else{
		            echo "Error: ".$sql."<br>".$conn->error;
	            }
                        				
            }
        }

?>