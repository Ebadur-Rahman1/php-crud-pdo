<?php
include "db_connection.php";
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    try {
        $sql = "INSERT INTO users(name,email) VALUES(:name, :email)";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['name' => $name, 'email' => $email]);

        $_SESSION['message'] = "User added successfully!";
        $_SESSION['message_type'] = "alert-success";


    } catch (PDOException $e) {
        $_SESSION['message'] = "Error: " . $e->getMessage();
        $_SESSION['message_type'] = "alert-danger";
    }
    header("Location: index.php");
    exit;
}