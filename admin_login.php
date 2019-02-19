<?php
 if(isset($_POST['adminInfo'])){
    require "add_party.php";
    $username = $_POST['username'];
    $password = $_POST['password'];
    $access = mysqli_query($dbc, "SELECT * FROM admins WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($access) == 1){
        $_SESSION['username'] = $username;
        header('Location: admin_controls.php');
    } else {
        echo "The username and password is invalid";
    }

}

?>

<!DOCTYPE html>
<html>
<head>
    <title>BarbeQUEUE Admin Log In </title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <div class="container">
    <h1> Admin Log In </h1>
    <div class="adminForm">
    <form method="post" action="admin_login.php" name="admin">
    <p>
        <label for="username">Username</label>
    </p>
        <input type="text" name="username" class="adminInput"/>
    <p>
        <label for="password">Password</label>
    </p>
    <p>
<<<<<<< HEAD
        <input type="password" name="password" class="adminInput"/>
=======
        <input type="password" name="password"/>
>>>>>>> Minor Changes.
    </p>
        <input type="submit" name="adminInfo" onsubmit="admin_controls.php" class="adminInput" value="Log in"/>
    </form>
    </div> <!-- log in form ends --> 
</body>
</html>