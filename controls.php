<?php

function executeSortRequest($request){    
    if($request == null || empty($request)){
        return "Select * FROM customers";
    }

    $statement = "SELECT * FROM customers ORDER BY ";
    
    for($i = 0; $i < count($request); ++$i){
           $statement .= $request[$i] . " " . $request[++$i];
           echo $i;
           if($i >= 1 && $i < count($request) - 1){
               $statement .= ", ";
           }
    }
    return $statement;
}


function printTable($dbc, $query){
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
}

?>