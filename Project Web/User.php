<?php

include_once 'databaseConfig.php';

class User {

    private $id;
    private $username;
    private $password;
    private $ConfirmPassword;
    private $email;
    public $database;

    function getId() {
        return $this->id;
    }

    function getUsername() {
        return $this->username;
    }

    function getPassword() {
        return $this->password;
    }

    function getEmail() {
        return $this->email;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setUsername($username) {
        $this->username = $username;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    /* this is the best practise for MVC coding but it's our of our course scope so we will type it's logic in the register.php */

    function register($user) {
        $this->connectToDatabase();
        $sql = "INSERT INTO user (username, password, email)"
                . " VALUES ('" . $user->getUsername() . "' , '" . $user->getPassword() . "', '" . $user->getEmail() . "')";
        // 3.2 execute query
        echo $sql;
        return $this->database->query($sql);
    }

    function login($user) {
        $this->connectToDatabase();
        $sql = "select * from user where username='" . $user->getUsername() . "' and password='" . $user->getPassword() . "'";
        echo $sql;
// 3.2 execute query and save results 
        $res = $this->database->query($sql);
        if ($res->num_rows > 0) {
            return true;
        } else {
            return FALSE;
        }
    }

    function connectToDatabase() {
        global $link;
        $this->database = $link;
        return $this->database;
    }

	/**
	 * @return mixed
	 */
	function getConfirmPassword() {
		return $this->ConfirmPassword;
	}
	
	/**
	 * @param mixed $ConfirmPassword 
	 * @return User
	 */
	function setConfirmPassword($ConfirmPassword): self {
		$this->ConfirmPassword = $ConfirmPassword;
		return $this;
	}
}
