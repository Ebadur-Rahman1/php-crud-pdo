<?php 
$host = "localhost";
$dbname = "php_crud_pdo";
$username = "root";
$password = "";

try{
    //Creating a PDO connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4",$username,$password,[
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
}
catch(PDOException $e){
    die("Database connection failed ". $e->getMessage());
}

?>