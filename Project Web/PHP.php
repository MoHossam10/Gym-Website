<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <div id ="main">
            <h1>Login</h1>
            <form method="POST">
            Username<input type="text" name="username" class="text" required>
            password<input type="password" name="password" class="text" required>
            <input type="submit" name="submit" id="sub">
            </form>
        </div>
    </body>
</html>
<?php
    define('DB_SERVER', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'mysql');
     
    /* Attempt to connect to MySQL database */
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
     
    // Check connection
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    mysqli_connect("localhost","root","");
    //mysqli_select_db($mysqli,"login");
    if(isset($_POST['submit']))
    {
    $un=$_POST['username'];
    $pw=$_POST['password'];
    $sql=mysqli_query($mysqli,"login",);
    $sql->free_result($sql);
    if($row=mysqli_fetch_array($sql)){
        
    if($pw==$row['password'])
    {
        header("location:index.html");
        exit();
    }
    else
        echo "Invalid Password";
        }
        else 
        echo "Invalid username";
    }  
?>