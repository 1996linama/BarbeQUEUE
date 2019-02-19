<!DOCTYPE html>
<html>
    <head>
        <title> Queue Successful </title>
        <script src="main.js"></script>
    </head>

    <body>
    
    <?php
        require_once('add_party.php');
        $customer_name;
        $party_size;
        $phone_number;
        $seating_choice;


        if(isset($_POST['submit'])){
            $customer_name = $_POST['customerName'];
            $party_size = $_POST['partySize'];
            $phone_number = $_POST['phoneNumber'];
            
            
            if(isset($_POST['seatingChoice'])){
                switch($_POST['seatingChoice']){
                    case 'table':
                        $seating_choice = 'T';        
                        break;
                    case 'bar':
                        $seating_choice = 'B';
                        break;
                    case 'tableOrBar':
                    default:
                        $seating_choice = 'E';
                        break;
                }
            } else {
                $seating_choice = 'E';
            }

        } else {
            echo 'Failure';
            mysqli_stmt_close($statement);
            mysqli_close($dbc);
        }

        $query = "INSERT INTO customers VALUES (?, ?, ?, ?, now(), now(), null)";

        $statement = mysqli_prepare($dbc, $query);
        mysqli_stmt_bind_param($statement, "siss", $customer_name, $party_size, $phone_number, 
        $seating_choice);

        mysqli_stmt_execute($statement);

        if(mysqli_stmt_affected_rows($statement) == 1){
            mysqli_stmt_close($statement);
            mysqli_close($dbc);
        } else {
            echo mysqli_stmt_affected_rows($statement);
            echo 'Error';
            mysqli_stmt_close($statement);
            mysqli_close($dbc);
        }
    
    echo strtoupper("<h1>Welcome $customer_name</h1>");
    echo ("Thank you. <br>");
    echo ("Your estimated waiting time is : <br>" );

    $return = mysqli_query($dbc, "SELECT customer_id as id FROM customers WHERE customer_name='$customer_name'");

    echo ("Your place in the line is ");
    echo $return['id'];
    
    ?>

    <b>Note:</b> All members of the party must be present to be seated.
    <input type="submit" name="return" onclick="changePage('index.php')" value="Return"/>

    </body>

<footer>
    <div class="copyright">
        Copyright. All Rights Reserved by 
        <a target="_blank" rel="nofollow" href="http://github.com/1996linama">Lina Ma</a>.
    </div>
</footer>

</html>
