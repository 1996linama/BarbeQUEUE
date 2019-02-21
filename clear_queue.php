<?php
include "controls.php";
include "add_party.php";
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    clearQueue($dbc);
 }
?>