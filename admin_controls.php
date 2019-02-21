<?php
header("Refresh: 40");
    session_start();
    include "controls.php";
    include "sys.php";
?>
<!DOCTYPE html>
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
                <li><a href="admin_controls.php" class="active"><span>Show Queue</span></a></li>
                <li><a href="table_controls.php"><span>Show Tables</span></a></li>
                <li><a href=""><span>Staff</span></a></li>
                <li><a action="onClickForClearQueue()"><span>Restart Day</span></a></li>
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
                            <li> <button id="clear_queue" class="action"> Clear Queue </button> </li>
                        </ul>
                    </div> <!-- end of actions menu container -->
                    <div id="options_container">
                        
                        <div id="assign_container">
                            <div id="assign_inputs_container">
                            <form method="post" action="">
                                    <label class="script_small"> Assign Customer </label>
                                    <select name="customers_assign" class="options">
                                        <option value=""></option>
                                        <?php populateCustomerOptions($dbc) ?>
                                    </select>
                                    <label class="script_small"> to Table </label>
                                    <select name="table_assign" class="options">
                                        <?php populateAvailableTableOptions($dbc) ?>
                                    </select>
                                </div>
                            <input type="submit" class="options" value="Assign"/>
                            </form>
                        </div> <!-- end of customers assign container -->
                        <div id="remove_container">
                            <form method="post" name="remove_customer" action="admin_controls.php">
                            <label class="script_small"> Remove Customer from Queue</label>
                            <label class="script_smaller"> for failure to show, cancellation, or etc. </label>
                                <select name="remove_selection" class="options">
                                    <option value=""></option>
                                    <?php populateCustomerOptions($dbc) ?>
                                </select>
                            <input type="submit" class="options" value="Remove"/>
                            </form>
                        </div> <!-- end of customers remove container -->
                        <div id="alter_container">
                            <form method="post" action="admin_controls.php">
                            <label class="script_small"> Alter Customer Information </label>
                                <select name="customers_assign" class="options">
                                    <option value=""></option>
                                    <?php populateCustomerOptions($dbc) ?>
                                </select>
                                <!-- <input type="text" name="phone_number" class="options"/> -->
                                <input type="radio" name="seating_preference" value='T' class="options"/>
                                Table
                                <input type="radio" name="seating_preference" value='B' class="options"/>
                                Bar 
                                <input type="radio" name="seating_preference" value='E' class="options"/>
                                Either
                            <input type="submit" class="options" value="Alter"/>
                            </form>
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
                <div id="display_header_container">
                    <table id="queue_table">
                        <tr>
                            <th>Queue Number</th>
                            <th>Name</th>
                            <th>Party Size</th>
                            <th>Phone Number</th>
                            <th>Preference</th>
                            <th>Time</th>
                        </tr>
                    </div>
                <div id="display_content_container">

            <?php
                require_once('sys.php');

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

                if(isset($_POST['remove_selection']) && $_POST['remove_selection'] != ""){
                    echo $_POST['remove_selection'];
                    removeCustomer($dbc, $_POST['remove_selection']);
                }
            
                if(isset($_GET['action'])){
                    if($_GET['action'] == "clear_queue"){
                        clearQueue($dbc);
                   
                    }
                }

                printQueueTable($dbc, executeSortRequest('customers', $sortRequestStack));

            ?>
            </table>
                </div>
            </div> <!-- end of display container -->
        </div> <!-- end of workspace container --> 

</div>

    <script src="main.js"></script>
    </body>

</html>