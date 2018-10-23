<?php
/**
 * Created by PhpStorm.
 * User: vitom
 * Date: 10/21/2018
 * Time: 7:59 PM
 */

session_start();

if(!isset($_SESSION['id'])){
    header('WWW-Authenticate: Basic realm="Test Authentication System"');
    header('HTTP/1.0 401 Unauthorized');
    echo "You must enter a valid login ID and password to access this resource\n";
    exit;
}