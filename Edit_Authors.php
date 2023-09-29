<?php
session_start();

require_once "./database.php";



if (isset($_GET['id'])) {
    $authorId = $_GET['id'];

    // Retrieve author details from the database
    $sql = "SELECT * FROM users WHERE userId = $authorId";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $author = $result->fetch_assoc();
    } else {
        echo "Author not found";
        exit;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
        $full_name = $_POST['full_name'];
        $email = $_POST['email'];
        $phone_number = $_POST['phone_number'];
        $address = $_POST['address'];

        // Update author details in the database
        $update_sql = "UPDATE users SET 
                       Full_Name = '$full_name', 
                       Email = '$email', 
                       Phone_Number = '$phone_number', 
                       Address = '$address' 
                       WHERE userId = $authorId";

        if ($mysqli->query($update_sql) === TRUE) {
            echo "Author details updated successfully.";
            echo '<script>
                setTimeout(function() {
                    window.location.href = "admin_dashboard.php"; // Redirect to dash.php after 3 seconds
                }, 1200); 
            </script>';
            exit;
        } else {
            echo "Error updating author details: " . $conn->error;
        }
    }
} else {
    echo "Author ID not provided";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">

    <title>edit profile</title>
    <style>
    .blog-input-section {
    background-color: #f8f9fa; /* Light gray background color */
    padding: 50px 0; /* Add some padding for spacing */
}

.container {
    border: 1px solid #ddd; /* Add a border around the container */
    border-radius: 10px; /* Add rounded corners */
    background-color: #fff; /* White background color */
    padding: 20px; /* Add padding inside the container */
}

.form-group label {
    font-weight: bold; /* Make labels bold */
}

.form-group input,
.form-group textarea {
    width: 100%; /* Make input fields and textarea full width */
    padding: 10px; /* Add some padding */
    margin-bottom: 10px; /* Add space between fields */
    border: 1px solid #ccc; /* Add a border */
    border-radius: 5px; /* Add rounded corners */
}

.form-group textarea {
    height: 100px; /* Set a fixed height for the textarea */
}

.btn-primary {
    background-color: #007bff; /* Change primary button color */
    border: none; /* Remove border */
}

.btn-primary:hover {
    background-color: #0056b3; /* Darker color on hover */
}
</style>
</head>
<body>
    <header>
        <nav>
            <ul class="nav-bar">
                <h1 class ="logo">Life Unscripted</h1>
                <input type="checkbox" id="check">
                <span class="menu">
                <li><a href="edit_profile.php">Update Profile</a></li>
            <li><a href="dash.php">Manage Authors</a></li>
            <li><a href="index.php">View Articles</a></li>
                    <label for="check" class="close-menu"><i class="fas fa-times"></i> </label>
                </span>
                <span class="topnav">
                  <input type="checkbox" id="check">
                  <input type="text" placeholder="Search..">
                </span>
                <label for="check" class="open-menu"><i class="fas fa-bars"></i> </label>
                <a href="logout.php" class="btn btn-dark rounded-0 py-3 px-5">LOGOUT</a>
                

            </ul>
        </nav>
    </header>
    <h1>Welcome to Admin Dashboard</h1>
    <h1 class="text-center">Update Author</h1>

    <section class="blog-input-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="content d-flex align-items-center bg-light">

                    <!-- Form for updating author information -->
                    <form action="" method="post" class="signin-form" enctype="multipart/form-data">
                        <div class="form-group mb-3">
                            <label for="full_name">Full Name</label>
                            <input type="text" name="full_name" id="full_name" value="<?php echo isset($author['Full_Name']) ? $author['Full_Name'] : ''; ?>" required>
                            <br>

                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" value="<?php echo isset($author['email']) ? $author['email'] : ''; ?>" required>
                            <br>

                            <label for="phone_number">Phone Number</label>
                            <input type="tel" name="phone_number" id="phone_number" value="<?php echo isset($author['phone_Number']) ? $author['phone_Number'] : ''; ?>" required>
                            <br>

                            <label for="address">Address</label>
                            <textarea name="address" id="address" placeholder="Address"><?php echo isset($author['Address']) ? $author['Address'] : ''; ?></textarea>
                            <br>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary rounded px-3" name="update">Update</button>
                        </div>
                    </form> <!-- End of form -->
                </div>
            </div>
        </div>
    </div>
</section>
  
   
</body>
</html>
