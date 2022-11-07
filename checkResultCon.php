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
        
            $date = $_POST['date'];
            $checkDraw = "SELECT `draw_id` from `draw` where `lottery_id`='$lottery_id' and `date` = '$date';";
            $result2=mysqli_query($conn, $checkDraw);
            $fetch2 = mysqli_fetch_array($result2);

            $draw_id = $fetch2['draw_id'];
            
            // $date = date("jS F Y ");
            
            // echo "<script>alert('$draw_id')</script>";
            
            $book = "SELECT `booking`,`prize_id`,`username` from `result` where `draw_id`='$draw_id';";
            $result3=mysqli_query($conn, $book);
            $fetch3 = mysqli_fetch_array($result3);

            $number = $fetch3['booking'];
            $_SESSION['number'] = $number;
            $prize = $fetch3['prize_id'];
            $_SESSION['prize'] = $prize;
            $name = $fetch3['username'];
            $_SESSION['name'] = $name;
            // echo "<script>alert('Hello')</script>";
            // echo "<script>alert('$book')</script>";
            //header("Location: checkResult.php?id=".urlencode($number.$prize.$name));
            header("Location: view_result.php?");
            
            // $random_no = rand(1000, 9999);
            /*$random_no = 5674;


            $sql="INSERT INTO `draw`(`lottery_id`,`date`)
	            values($lottery_id,'$date');";

                if ($conn->query($sql)==TRUE){
                    $categoryQuery = "SELECT `category_id` from `lottery` where `lottery_id`='$lottery_id'";
                    $result2=mysqli_query($conn, $categoryQuery);
                    $fetch2 = mysqli_fetch_array($result2);
                    $category_id = $fetch2['category_id'];

                    $prizeQuery = "SELECT `prize_id` from `prize` where `category_id`='$category_id'";
                    $result3=mysqli_query($conn, $prizeQuery);
                    $fetch3 = mysqli_fetch_array($result3);

                    $prize_id = $fetch3['prize_id'];

                    $drawQuery = "SELECT `draw_id` from `draw` where `lottery_id`='$lottery_id' and `date` = '$date'";
                    $result4=mysqli_query($conn, $drawQuery);
                    $fetch4 = mysqli_fetch_array($result4);
                    
                    $draw_id = $fetch4['draw_id'];

                    $bookingQuery = "SELECT `booking_id` from `lottery_booking` where `number`='$random_no'";
                    $result5=mysqli_query($conn, $bookingQuery);
                    $fetch5 = mysqli_fetch_array($result5);
                    
                    $booking_id = $fetch5['booking_id'];

                    $sql="INSERT INTO `result`(`lottery_id`,`booking_id`, `prize_id`, `draw_id`)
	                values($lottery_id, $booking_id, $prize_id, $draw_id);";
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
	            else{
		            echo "Error: ".$sql."<br>".$conn->error;
	            }*/

        }


?>