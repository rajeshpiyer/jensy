<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-Lottery</title>
    <link rel="stylesheet" href="css/style.css?version=51">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/styleFurther.css?version=51">
</head>

<body>

    <header>
        <div class="heading">
            <h1>e_lottery</h1>

            <a href="#" class="button">
                <div id="one"></div>
                <div id="two"></div>
                <div id="three"></div>
            </a>
        </div>

        <nav class="head">
            <div class="link">
                <div class="link1"></div>
                <a href="index.php" class="active">
                    Log Out
                </a>
            </div>
            <div class="link">
                <div class="link1"></div>
                <a href="#" id="active">
                    Buy Lottery
                </a>
            </div>
            <div class="link">
                <div class="link1"></div>
                <a href="checkResult.php" class="active">
                    Results
                </a>
            </div>
        </nav>



    </header>

    <main>


        <div class="box">

            <div class="head">
                <h3>Buy Lottery</h3>
            </div>
            <div class="main">
                <form class="basicInput" method="post" action="book_lotterycon.php">

                <div class="element">
                        <label for="lottery">Select Lottery<br> </label>
                        <select name="lottery" id="type">
                        <?php

                            $conn=mysqli_connect("localhost", "root", "", "kerala_lottery");

                            if(!$conn){
                                 die("Error: Failed to connect to database!");
                            }

                            $query = mysqli_query($conn, "SELECT `lottery_name` FROM `lottery` WHERE `category_id` = 3");
                            $i = 0;
                            while($fetch=mysqli_fetch_array($query)){
                                $val = $fetch['lottery_name'];
                                $i = $i+1;
                                echo "<option value=$val>$val</option><br/>";
                            }

                        ?>
                        </select>
                        <label for="id">Series</label>
                        <input type="text" name="series" class="text-box" placeholder="Eg:AA" required>
                        <label for="id">Lucky Number</label>
                        <input type="text" name="number" class="text-box" placeholder="4 digit number" required>
                        <input type="submit" class = "submitbtn" name="pick" value="pick">
                    </div>
                    

                </form>
            </div>
        </div>

        </div>

    </main>


    <footer>

        <p>&copy; 2022 e_lottery</p>
    </footer>

    <script src="js/script.js"></script>
</body>

</html>