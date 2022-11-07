<?php
	session_start();
         $host="localhost";  
        
        $conn=mysqli_connect("localhost", "root", "", "kerala_lottery");
        if (mysqli_connect_error()) {
    		die('Connect error('. mysqli_connect_error().')'. mysqli_connect_error());
	    }

        else{	

	        // $user_id = $_SESSION['user_id'];

            $lottery= $_POST['lottery'];        
            $checkLottery = "SELECT `lottery_id` from `lottery` where `lottery_name`='$lottery'";
            $result1=mysqli_query($conn, $checkLottery);
            $fetch1 = mysqli_fetch_array($result1);

            $lottery_id = $fetch1['lottery_id'];
            
            $date = date("Y-m-d");
            // $date = date("l jS \of F Y h:i:s A");
            
            
            //$random_no = 1234;


            $sql="INSERT INTO `draw`(`lottery_id`,`date`)
	            values($lottery_id,'$date');";

                if ($conn->query($sql)==TRUE){
                    $categoryQuery = "SELECT `category_id` from `lottery` where `lottery_id`='$lottery_id'";
                    $result2=mysqli_query($conn, $categoryQuery);
                    $fetch2 = mysqli_fetch_array($result2);
                    $category_id = $fetch2['category_id'];

                    $prizeQuery = "SELECT `prize_amount` from `prize` where `category_id`='$category_id'";
                    $result3=mysqli_query($conn, $prizeQuery);
                    $fetch3 = mysqli_fetch_array($result3);

                    $prize_amount = $fetch3['prize_amount'];

                    $drawQuery = "SELECT `draw_id` from `draw` where `lottery_id`='$lottery_id' and `date` = '$date'";
                    $result4=mysqli_query($conn, $drawQuery);
                    $fetch4 = mysqli_fetch_array($result4);
                    
                    $draw_id = $fetch4['draw_id'];
                    

                    do{

                    $random_no = rand(1,9);

                    $bookingQuery = "SELECT `booking_id`,`user_id`,`number` from `lottery_booking` where `number`%10='$random_no'";
                    $result5=mysqli_query($conn, $bookingQuery);
                    $fetch5 = mysqli_fetch_array($result5);
                    
                    $booking_id = $fetch5['booking_id'];
                    $userid = $fetch5['user_id'];
                    $number = $fetch5['number'];
                    }while($booking_id == null);

                    $usernameQuery = "SELECT `f_name` from `users` where `user_id`='$userid'";
                    $result6=mysqli_query($conn, $usernameQuery);
                    $fetch6 = mysqli_fetch_array($result6);
                    $username = $fetch6['f_name'];

                    if($booking_id != null)
                    {

                        $sql="INSERT INTO `result`(`lottery_id`,`booking`, `prize_id`, `draw_id`,`username`)
	                    values($lottery_id, $number, $prize_amount, $draw_id,'$username');";
                        if ($conn->query($sql)==TRUE){
                            $sql="DELETE FROM `lottery_booking`
	                            WHERE `lottery_id` = $lottery_id;";
                                if ($conn->query($sql)==TRUE){
                                    $success = "Draw Successful";
                                    header("Location: draw_lottery.php?id=".urlencode($success));
                                }
                                else{
		                            echo "Error: ".$sql."<br>".$conn->error;
	                            }
                        }
                        else{
		                    echo "Error: ".$sql."<br>".$conn->error;
	                    }
                    }

                    else
                    {
                        $success = "Draw Failure";
                                    header("Location: draw_lottery.php?id=".urlencode($success));
                    }

	            }
	            else{
		            echo "Error: ".$sql."<br>".$conn->error;
	            }

        }


?>