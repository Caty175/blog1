<?php
// Fetch user data from the database and store it in the $users array
require_once './database.php'; // Adjust the path as needed

$sql = "SELECT userId, Full_Name, email, phone_Number, User_Name, UserType, AccessTime, Address FROM users";
$result = $mysqli->query($sql);

$users = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
}

// Export to CSV
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="users.csv"');

$output = fopen('php://output', 'w');
fputcsv($output, ['userId', 'Full_Name', 'email', 'phone_Number', 'User_Name', 'UserType', 'AccessTime', 'Address']);

foreach ($users as $user) {
    fputcsv($output, $user);
}

fclose($output);
?>
