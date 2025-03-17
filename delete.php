<?php
include 'db_connection.php';
session_start();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    try{
        $sql = "Delete FROM users WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['id'=>$id]);
       
        $_SESSION['message'] = "User deleted successfully!";
        $_SESSION['message_type'] = "alert-warning";

    }catch(PDOEXception $e){
        $_SESSION['message'] = "Error: " . $e->getMessage();
        $_SESSION['message_type'] = "alert-danger";
    }

    header("Location: index.php");
    exit;
}

?>