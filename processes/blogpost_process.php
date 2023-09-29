<?php

if (empty($_POST["userId"])) {
    die("Authour ID is required");
}
if (empty($_POST["authorTitle"])) { // Change "addressn" to "address"
    die("Article Title is required");
}
if (empty($_POST["authorFullText"])) {
    die("Your Blog is required");
}
if (empty($_POST["publication_date"])) {
    die("Date is required");
}


$mysqli = require __DIR__ . "/database.php";

$userId = $_POST["userId"];
$userQuery = "SELECT * FROM users WHERE userid = $userId";
if ($mysqli->query($userQuery)->num_rows === 0) {
    die("Author ID not found"); // User ID doesn't exist in the 'users' table
}

$sql = "INSERT INTO author ( authorTitle, photo, authorFullText, publication_date) 
        VALUES (?, ?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if (!$stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("ssss",
                  $_POST["authorTitle"],
                  $_POST["photo"],
                  $_POST["authorFullText"],
                  $_POST["publication_date"]);
                  
if ($stmt->execute()) {
    header("Location: blog.php");
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die("Article already exists"); // Article with the same data already exists
    } else {
        die("SQL error: " . $stmt->error);
    }
}
