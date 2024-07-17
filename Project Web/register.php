<?php

if ($_POST) {
    if (isset($_POST['register']) && $_POST['register'] == "Register") {
        /*   register means adding user to database , So to add user to database we need to do as the following:
         *   1- Get The data from the inputs
         *   2- Connect to Database
         *   3- Send Data To Database
         *   4- Return database result to user
         * 
         *   There are 2 methods to do so :
         */

        /*
         * Method 1: using OOP
         * The Best practive is using a seprate class to hold the data and perform it's function 
         * While this file acts as a controller between the view and the Model class
         */
        //step 1 : Get The data from the inputs
        include_once 'User.php';
        $user = new User();
        $user->setUsername($_POST['username']);
        $user->setPassword($_POST['password']);
        $user->setConfirmPassword($_POST['confirmpassword']);
        echo $_POST['password'];
        echo $_POST['confirmpassword'];
        $user->setEmail($_POST['email']);
        //step 2 , 3 & 4:
        
        if ($_POST['password']==($_POST['confirmpassword']))
        {
            echo'<script>alert("added successfully")</script>';
            echo '<script>location.href="index.html";</script>';
            $result = $user->register($user);
        }   
        else
            echo'<script>alert(""Passwords Doesnt match")</script>';
            echo '<script>location.href="index.html";</script>';



        /*
          //Method 2 : using spagethhi code
          //We will do it with the most simple way
          // step 1 : Get The data from the inputs
          $email = $_POST['registerEMail'];
          $username = $_POST['registerUsername'];
          $password = $_POST['registerPassword'];
          // step 2 : connect to database
          include_once 'databaseConfig.php';
          global $link;
          $conn = $link;
          // step 3 : send data to database
          // 3.1 create sql query
          $sql = "INSERT INTO users (username, password, email)"
          . " VALUES ('" . $username. "' , '" . $password. "', '" . $email. "')";
          echo $sql;
          echo '<br>';
          // 3.2 execute query
          if ($conn->query($sql) === TRUE) {
          //step 4 : return database result
          echo "New record created successfully";
          } else {
          //step 4 : return database result
          echo "Error: " . $sql . "<br>" . $conn->error;
          } */
        //echo 'controller activated';
    }
} 
