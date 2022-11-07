<?php
	session_start();
         $host="localhost";  
        
        $conn=mysqli_connect("localhost", "root", "", "kerala_lottery");
	
	    $user_id = $_SESSION['user_id'];
        $lottery= $_POST['lottery'];
        $series= $_POST['series'];
        $number= $_POST['number'];
        $checkLottery = "SELECT `lottery_id` from `lottery` where `lottery_name`='$lottery'";
        $result1=mysqli_query($conn, $checkLottery);
        $fetch1 = mysqli_fetch_array($result1);
        $lottery_id = $fetch1['lottery_id'];
 
        $host="localhost";  
        
    	$conn=mysqli_connect("localhost", "root", "", "kerala_lottery");
		if (mysqli_connect_error()) {
    		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	    }
      	else{

	        $checkUser = "SELECT * from `lottery_booking` where `number`='$number' and `lottery_id`=$lottery_id and `series`='$series' ";
            $result=mysqli_query($conn, $checkUser);
	        $count = mysqli_num_rows($result);
	        if($count > 0){
			    echo"Lottery already taken";
				header("Location: book_lottery.php");
	        }


            else{
	            $sql="INSERT INTO `lottery_booking`(`user_id`,`lottery_id`,`number`,`series`)
	            values($user_id,$lottery_id,$number,'$series');";
	            if ($conn->query($sql)==TRUE){
		            echo "Lottery purchased successfully";	
                    header("Location: book_lottery.php?err=".urlencode("Purchase Successful"));
	            }
	            else{
		            echo "Error: ".$sql."<br>".$conn->error;
	            }
                        				
            }
        }

?>