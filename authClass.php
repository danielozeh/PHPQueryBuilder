<?php

namespace DanielOzeh;

/**
 * Auth Class
 * 
 * @author Daniel Ozeh hello@danielozeh.com.ng
 */

include 'dbconfig.php';

define('TIMEZONE', 'Africa/Lagos');
date_default_timezone_set(TIMEZONE);

include 'QueryBuilder.php';

class AuthClass {
    protected $query_builder;
    public $conn = FALSE;
    // Connects to the database
    // Stores connection resource in a variable
    // Throws exception if error occurs
    public function __construct() {
        $this->query_builder = new QueryBuilder();
        $now = new \DateTime();
        $mins = $now->getOffset() / 60;
        $sgn = ($mins < 0 ? -1 : 1);
        $mins = abs($mins);
        $hrs = floor($mins / 60);
        $mins -= $hrs * 60;
        $offset = sprintf('%+d:%02d', $hrs*$sgn, $mins);
        
        $result = new \PDO("mysql:host=localhost;dbname=query_builder", 'root', '');
        if(!$result) {
            throw new Exception('Could not connect to the database server');
        } else {
            $this->conn = $result;
            $this->conn->exec("SET time_zone='$offset';");
        }
    }
    // Method For Sanitizing SQL
    public function sanitize($var) {
        return $this->conn->quote($var);
    }
    

    public function login($email, $password) {
        
        $sql = $this->query_builder->select('email')->from('users')->where('email = :email', 'password = :password');
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'email' => $email,
            'password' => $password
        ]);

        $row = $stmt->rowCount();

        //var_dump($stmt);

        if($row == 1) {
            echo "Welcome";
            $data = array("message" => 'Login Successful', "category" => "success");
            return $data;
        }
        echo "Invalid Login";
        $data = array("message" => 'Invalid Login Details', "category" => "danger");
        return $data;
    }

    public function register($email, $password) {
        
        $sql = $this->query_builder->select('email')->from('users')->where('email = :email', 'password = :password');
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            'email' => $email,
            'password' => $password
        ]);

        $row = $stmt->rowCount();

        //var_dump($stmt);

        if($row == 1) {
            echo "Email already exist";
            $data = array("message" => 'Email Already Exist', "category" => "danger");
            return $data;
        }
        $sql2 = $this->query_builder->insert('users')->columns('email', 'password');
        $stmt2 = $this->conn->prepare($sql2);

        $stmt2->execute([
            'email' => $email,
            'password' => $password
        ]);
        echo "Inserted";
        return;
        
    }
}