<!DOCTYPE html>
<?php
    session_start();

?>
<html>
<head>
    <title>BarbeQUEUE Admin Controls</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div id="container">
        <h2>Barbequeue Admin Controls</h2>
        <hr/>
        <div id="nav_container">
            <ul id="admin_nav_menu">
                <li><a href="" class="current"><span>Home</span></a></li>
                <li><a href=""><span>Show Queue</span></a></li>
                <li><a href=""><span>Show Tables</span></a></li>
                <li><a href=""><span>Staff</span></a></li>
                <li><a href=""><span>Restart Day</span></a></li>
                <li><a href=""><span>Log Out</span></a></li>
            </ul>
        </div> <!-- end of nav container -->
        <div id="workspace_container">
            <div id="input_container">
                <p class="controls_title"> Queue Controls </p>
                <div id="actions_container">
                    Hello
                </div> <!-- end of actions container -->
                <div id="options_container">
                    Options
                </div> <!-- end of options container --> 
            </div> <!-- end of input container -->
            <div id="display_container">

            <table id="queue_table">
                <tr>
                    <th>Queue Number</th>
                    <th>Name</th>
                    <th>Party Size</th>
                    <th>Phone Number</th>
                    <th>Seating Preference</th>
                    <th>Time</th>
                </tr>
            <?php
                require_once('add_party.php');
                $query = "Select * FROM customers";
                $response = mysqli_query($dbc, $query);
                while($row = mysqli_fetch_assoc($response)){
                    echo "<tr>";
                    echo "<td>" . $row['customer_id'] . "</td>";
                    echo "<td>" . $row['customer_name'] . "</td>";
                    echo "<td>" . $row['party_size'] . "</td>";
                    echo "<td>" . $row['phone_number'] . "</td>";
                    echo "<td>" . $row['seating_choice'] . "</td>";
                    echo "<td>" . $row['time'] . "</td>";

                    echo "</tr>";


                }


            ?>
            </table>

            



            </div> <!-- end of display container -->
        </div> <!-- end of workspace container --> 

</div>




    </body>

</html>