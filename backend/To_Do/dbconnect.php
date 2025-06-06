<?php
$host='localhost';
$db='itblog_db';
$user='root';
$pass='';

$dsn="mysql:host=$host;dbname=$db";
$options=[
    PDO::ATTR_ERRMODE   => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC,
];
try{
    $pdo=new PDO($dsn,$user,$pass,$options);
    echo "Connected Successfully!!";
}catch(\PDOException $e){
    echo "Connection failed :".$e->getMessage();
}
?>