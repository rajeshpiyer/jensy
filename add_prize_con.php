<?php
	session_start();
         $host="localhost";  
        
        $conn=mysqli_connect("localhost", "root", "", "kerala_lottery");
	
	    $category= $_POST['category'];
        $prize_no= $_POST['prize_no'];
        $prize_count= $_POST['prize_count'];
        $prize_amount= $_POST['prize_amount'];
        $query = mysqli_query($conn, "SELECT `category_id` FROM `categories` WHERE `category_name`='$category'");
		$fetch=mysqli_fetch_array($query);
        $category_id = $fetch['category_id'];
 
        $host="localhost";  
        
    	$conn=mysqli_connect("localhost", "root", "", "kerala_lottery");
		if (mysqli_connect_error()) {
    		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	    }
      	else{

	        $checkUser = "SELECT * from prize where category_id='$category_id' and prize_no='$prize_no'";
            $result=mysqli_query($conn, $checkUser);
	        $count = mysqli_num_rows($result);
	        if($count > 0){
			    echo"Prize for this category  already exist";
	        }


            else{
	            $sql="INSERT INTO `prize`(`category_id`,`prize_no`,`prize_amount`,`prize_count`)
	            values('$category_id','$prize_no','$prize_amount','$prize_count');";
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