<?php
include 'db_connection.php';
session_start();

$id = $_GET['id'];

$stmt = $conn->prepare("SELECT * from users WHERE id = :id");
$stmt->execute(['id' => $id]);
$user = $stmt->fetch();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];

    try {
        $sql = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->execute(['name' => $name, 'email' => $email, 'id' => $id]);

        $_SESSION['message'] = "User updated successfully!";
        $_SESSION['message_type'] = "alert-info"; 

        
    } catch (PDOException $e) {
        $_SESSION['message'] = "Error: " . $e->getMessage();
        $_SESSION['message_type'] = "alert-danger";
    }

    header("Location: index.php");
        exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>

<body>
    <h2>Edit User</h2>
    <form action="" method="post">
        <input type="text" name="name" value="<?= $user['name'] ?>" required>
        <input type="email" name="email" value="<?= $user['email'] ?>" required>
        <button type="submit">Update</button>
    </form>
</body>

</html>