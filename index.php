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
<!-- body -->
<body>
<header>
    <h1>Barbequeue</h1>
</header>

<div class="container">
        <div class="queue_display_container">
            <p class="queue_title">
                Current Queue
            </p>
            <table id="queue_table">
                <tr>
                    <th>Name</th>
                    <th>Number</th>
                </tr>
             <?php
                require_once('add_party.php');
                $query = "SELECT * FROM customers";

                $response = mysqli_query($dbc, $query) or die ("Error query");
                
                while ($row = mysqli_fetch_assoc($response)){
                        echo "<tr>";
                        echo "<td>" . $row['customer_name'] . "</td>";
                        echo "<td>" . $row['customer_id'] . "</td>";
                        echo "</tr>";
                }
                
                ?>
             </table>

        </div>
        <p class="queue_info">
            <b>The current wait time is:</b>
        </p>
        <p class="queue_info">
            <b>The number of parties in line: </b>
                <?php 
                $return = mysqli_fetch_assoc((mysqli_query($dbc, "SELECT COUNT(*) as total FROM customers")));
                echo $return['total']; 
                ?>
        </p>

        <?php mysqli_close($dbc); ?>
        <input type="submit" name="check_in_button"  onclick="changePage('queue_checkin.html')" value="Check in"/>
</div>


</body>
<!-- footer -->
<footer>
        <div class="copyright">
            Copyright. All Rights Reserved by 
            <a target="_blank" rel="nofollow" href="http://github.com/1996linama">Lina Ma</a>.
        </div>
</footer>


</html>
