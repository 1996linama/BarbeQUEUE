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
                <li><a href="" class="active"><span>Show Queue</span></a></li>
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
                            <li> <button id="assign_customer" class="action"> Assign Customer To Table </button> </li>
                            <li> <button id="remove_customer" class="action"> Remove Customer From Queue </button> </li> 
                            <li> <button id="alter_customer" class="action"> Alter Customer Information </button> </li>
                        </ul>
                    </div> <!-- end of actions menu container -->
                    <div id="options_container">
                        
                        <div id="assign_container">
                            This is content right here.
                        </div> <!-- end of customers assign container -->
                        <div id="remove_container">
                            No content here.
                        </div> <!-- end of customers remove container -->
                        <div id="alter_container">
                            Are you sure?
                        </div> <!-- end of customers alter container -->
                    </div> <!-- end of options container --> 
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
                        <input class="actions_sort" type="submit" value="Sort"/>
                    </form>
                    </div> <!-- end of actions container -->
            </div>  <!-- end of actions container -->    
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
                printQueueTable($dbc, executeSortRequest($sortRequestStack));

            ?>
            </table>

            </div> <!-- end of display container -->
        </div> <!-- end of workspace container --> 

</div>

    <script src="main.js"></script>
    </body>

</html>