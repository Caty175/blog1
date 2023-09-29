<?php
session_start();
require_once('database.php');

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userId = $_POST['userId'];
    setcookie('userId', $userId, time() + (86400 * 30), "/");

    $password = $_POST['passwordn']; // Corrected variable name
    $newPassword = $_POST['newPassword'];

    $stmt = $mysqli->prepare('SELECT password FROM users WHERE userId = ?');
    $stmt->bind_param('s', $userId);
    $stmt->execute();
    $stmt->bind_result($password_hash); // Corrected variable name
    $stmt->fetch();
    $stmt->close();

    if ($password_hash !== null) {
        if (password_verify($password, $password_hash)) {
            $new_password_hash = password_hash($newPassword, PASSWORD_DEFAULT); // Corrected function name

            $update_stmt = $mysqli->prepare('UPDATE users SET password = ? WHERE userId = ?');
            $update_stmt->bind_param('ss', $new_password_hash, $userId);
            $update_result = $update_stmt->execute();

            if ($update_result) {
                echo "Password updated successfully.";
            } else {
                echo "Password update failed: " . $mysqli->error; // Provide specific error message
            }

            $update_stmt->close();
        } else {
            echo "Current password is incorrect.";
        }
    } else {
        echo "User not found.";
    }

    $mysqli->close();
}
?>
