<?php
    include_once 'add_party.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title> BarbeQUEUE </title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <script src="main.js"></script>
</head>
<body>
<header>
    <h1>Get BarbeQUEUED!</h1>

</header>

<div class="container">


        <div class="queue_display_container">
            <p class="title">
                Queue
            </p>
        
            <?php
                require_once('add_party.php');
                $query = "SELECT * FROM customers";

                $response = mysqli_query($dbc, $query) or die ("Error query");
                
                while ($row = mysqli_fetch_assoc($response)){
                        
                        echo $row['customer_name'];
                        
                        echo "<br>";
                }
                

                mysqli_close($dbc);

                ?>


        </div>
        <p class="wait">
            <b>The current wait time is:</b>
        </p>
        <input type="submit" name="checkInButton" action="signin.html" onclick="changePage('signin.html')" value="Check in"/>
</div>


</body>
</html>
