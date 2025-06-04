<?php 
    include '../dbconnect.php';
    define('BASE_URL','/IT_Blog/backend'); 


    //Routes 
    function route($file){
        return BASE_URL .'/'.$file;
    }
?>