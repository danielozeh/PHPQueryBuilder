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

        break;
    }
}