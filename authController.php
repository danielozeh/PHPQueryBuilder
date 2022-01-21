<?php

namespace DanielOzeh;

/**
 * @author Daniel Ozeh hello@danielozeh.com.ng
 */

include 'authClass.php';
$auth_class = new AuthClass();

if(isset($_POST['q']) && $_POST['q'] != '') {
    $q = $_POST['q'];

    switch($q) {
        
        case 'login': 
            $email = $_POST['email'];
            $password = $_POST['password'];

            $login = $auth_class->login($email, $password);

            return $login;

        break;

        case 'register': 
            $email = $_POST['email'];
            $password = $_POST['password'];

            $register = $auth_class->register($email, $password);

            return $register;
        break;

        case 'update': 
            $email = $_POST['email'];
            $password = $_POST['password'];

            $register = $auth_class->update($email, $password);

            return $register;
        break;
    }
}