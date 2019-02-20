<!DOCTYPE html>
<?php
    session_start();
    include "controls.php";
    $query;

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
                <li><a href=""><span>Home</span></a></li>
                <li><a href="" class="current"><span>Show Queue</span></a></li>
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
                    <div id="actions_menu_container">
                        <ul id="actions_menu">
                            <li> Assign Customer To Table </li>
                            <li> Remove Customer From Queue </li> 
                            <li> Alter Customer Information </li>
                        </ul>
                    </div>
                    <div id="actions_sort_container">
                        <label class="script"> Sort By </label>
                        <form method="post" action="admin_controls.php">
                        <label id="sort_type"> Name </label>
                        <select name="sort_customer_name" class="actions_sort">
                            <option value="" ></option>
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                        <label id="sort_type"> Party Size </label>
                        <select name="sort_party_size" class="actions_sort">
                            <option value=""></option>
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                        <label id="sort_type"> Queue Position </label>
                        <select name="sort_customer_id" class="actions_sort">
                            <option value=""></option>
                            <option value="asc">Ascending</option>
                            <option value="desc">Descending</option>
                        </select>
                        <input class="actions_sort" type="submit" value="sort"/>
                    </form>
                    </div> <!-- end of actions sort container -->
                </div>  <!-- end of actions container -->    
                <div id="options_container">
                    content
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

                $sortRequestStack = array();

                if(isset($_POST['sort_customer_name']) && $_POST['sort_customer_name'] != ""){
                    array_push($sortRequestStack, 'customer_name', $_POST['sort_customer_name']);
                } 

                if(isset($_POST['sort_party_size']) && $_POST['sort_party_size'] != ""){
                    array_push($sortRequestStack, 'party_size', $_POST['sort_party_size']);
                } 

                if(isset($_POST['sort_customer_id']) && $_POST['sort_customer_id'] != ""){
                    array_push($sortRequestStack, 'customer_id', $_POST['sort_customer_id']);
                
                } 
                printTable($dbc, executeSortRequest($sortRequestStack));

            ?>
            </table>


            </div> <!-- end of display container -->
        </div> <!-- end of workspace container --> 

</div>


    </body>

</html>