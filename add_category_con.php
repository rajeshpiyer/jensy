<?php
	session_start();
	
	    $categoryname= $_POST['cname'];
        $lotsperyear= $_POST['lotspy'];
        $price= $_POST['price'];
 
        $host="localhost";  
        
                                   	$conn=mysqli_connect("localhost", "root", "", "kerala_lottery");

                    				if (mysqli_connect_error()) {
		                				die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	                				}
                    				else{

	                    				$checkUser = "SELECT * from categories where category_name='$categoryname'";
	                    				$result=mysqli_query($conn, $checkUser);
	                    				$count = mysqli_num_rows($result);
	                    				if($count > 0){
			                    			echo"Category already exist";
	                    				}


                        				else{
	                        				$sql="INSERT INTO `categories`(`category_name`,`lots_per_year`,`price`)
	                        				values('$categoryname',$lotsperyear,$price);";
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