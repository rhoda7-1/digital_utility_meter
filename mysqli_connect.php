<?php

// define constant variables
define('DB_NAME', 'epiz_26826331_Analog');
define('DB_USER', 'epiz_26826331');
define('DB_PASSWORD', 'T8dLYVLIn2');
define('DB_HOST','sql201.epizy.com');

try{

    // connection variable
    $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    // encoded language
    mysqli_set_charset($con, 'utf8');


}catch (Exception $ex){
    print "An Exception occurred. Message: " . $ex->getMessage();
} catch (Error $e){
    print "The system is busy please try later";
}