<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
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
                <a href="#" id="active">
                    Lottery
                </a>
            </div>
            <div class="link">
                <div class="link1"></div>
                <a href="add_prize.php" class="active">
                    Prize
                </a>
            </div>
            <div class="link">
                <div class="link1"></div>
                <a href="draw_lottery.php" class="active">
                    Draw
                </a>
            </div>
            <div class="link">
                <div class="link1"></div>
                <a href="add_category.php" class="active">
                    Category
                </a>
            </div>
            <div class="link">
                <div class="link1"></div>
                <a href="checkResult.php" class="active">
                    Result
                </a>
            </div>
            <div class="link">
                <div class="link1"></div>
                <a href="index.php" class="active">
                    Logout
                </a>
            </div>
        </nav>



    </header>

    <main>


        <div class="box">

            <div class="head">
                <h3>Add Lottery</h3>
            </div>
            <div class="main">
                <form class="basicInput" method="post" action="add_lottery_Con.php">

                    <div class="element">
                        <label for="id">Lottery Name </label>
                        <input type="text" name="lname" class="text-box" placeholder="Lottery Name" required>
                    </div>     
                    
                    <div class="element">
                        <label for="type">Week Day (If weekly)<br> </label>
                        <select name="weekday" id="type">
                            <option value="1">Sunday</option>
                            <option value="2">Monday</option>
                            <option value="3">Tuesday</option>
                            <option value="4">Wednesday</option>
                            <option value="5">Thursday</option>
                            <option value="6">Friday</option>
                            <option value="7">Saturday</option>
                        </select>
                    </div>

                    <div class="element">
                        <label for="date">Date(If Bumber)</label>
                        <input type="date" name="date" id="date">
                    </div>  
                    
                    <div class="element">
                        <label for="type">Category<br> </label>
                        <select name="category" id="type">
                        <?php

                            $conn=mysqli_connect("localhost", "root", "", "kerala_lottery");

                            if(!$conn){
                                 die("Error: Failed to connect to database!");
                            }

                            $query = mysqli_query($conn, "SELECT `category_name` FROM `categories`");
                            $i = 0;
                            while($fetch=mysqli_fetch_array($query)){
                                $val = $fetch['category_name'];
                                $i = $i+1;
                                echo "<option value=$val>$val</option><br/>";
                            }

                        ?>
                        </select>
                    </div>

                    <input type="submit" class = "submitbtn" name="submit" value="submit">

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