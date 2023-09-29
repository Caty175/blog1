<?php
class forms{
    public function sign_in_form(){
        ?>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" href="css/stylelogin.css">
    
</head>
<body>
    
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <nav class="navigation">
                        <h2 class="logo">Life Unscripted</h2>
                        <a href="index.html">Home</a>
                        <a href="#">Start Blogging</a>
                        <a href="#">About</a>
                        <a href="#">Contact</a>
                    </nav>
                </div>
            </div>
         <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(images/bg-1.jpg);">
                        </div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                            </div>
                            <form action="signIn.php" method="post" class="signin-form" novalidate>
                                <div class="form-group mb-3">
                                    <label for="fullname">Full Name</label>
                                    <input type="text" class="form-control" placeholder="Full Name" name="fullname" id="fullname" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="address">Address</label>
                                    <input type="text" class="form-control" placeholder="Address" name="address" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="phoneNo">Phone Number</label>
                                    <input type="text" class="form-control" placeholder="Phone Number" name="phoneNo" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="email">Email</label>
                                    <input type="text" class="form-control" placeholder="Email" name="email" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="Username">Username</label>
                                    <input type="text" class="form-control" placeholder="Username" name="Username" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password_confirmation">Confirm Password</label>
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="usertype">User Type</label>
                                    <select class="form-control" name="usertype" id="usertype" required>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    }
    public function login_form(){
      ?>
      <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" href="css/stylelogin.css">
    
</head>
<body>
      <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="img" style="background-image: url(images/bg-1.jpg);"></div>
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4">Sign In</h3>
                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
                                    </p>
                                </div>
                            </div>
                            <form action="login.php" method="post" class="login-form">
                                <!-- User Type Dropdown -->
                                <div class="form-group mb-3">
                                    <label for="usertype">User Type</label>
                                    <select class="form-control" name="usertype" id="usertype" required>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                                <!-- Email or Username Input -->
                                <div class="form-group mb-3">
                                    <label class="label" for="email">Email or Username</label>
                                    <input type="text" class="form-control" placeholder="Email or Username" name="email" required>
                                </div>
                                <!-- Password Input -->
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                                </div>
                                <!-- Submit Button -->
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign In</button>
                                </div>
                                <!-- Remember Me and Forgot Password Links -->
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>
                                </div>
                            </form>
                            <p class="text-center">Not a member? <a data-toggle="tab" href="signIn.php">Sign Up</a></p>
                        </div>
                    </div>
    </div>

    <?php
  }
  
    public function Blog_Input_form(){
        ?>
            <section class="blog-input-section">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-8">
                  <h1 class="text-center">Blog Input Form</h1>
                  <form action="blogpost.php" method="post" class="signin-form" enctype="multipart/form-data">
                      <div class="form-group mb-3">
                          <label for="userId">Author's Blog ID</label>
                          <input type="text" class="form-control" placeholder="Author ID" name="userId" required>
                      </div>
                      <div class="form-group mb-3">
                          <label for="authorTitle">Article Title</label>
                          <input type="text" class="form-control" placeholder="Article Title" name="authorTitle" required>
                      </div>
                      <div class="form-group mb-3">
                          <label for="photo">Article Photo</label>
                          <input type="file" accept="image/*" id="photo" name="photo" required>
                      </div>
                      <!-- Display partial photo preview -->
                      <div id="preview">
                          <img id="photoPreview" src="#" alt="Photo Preview">
                      </div>
                      <div class="form-group">
                          <label for="authorFullText">Article Text</label>
                          <textarea class="form-control" rows="7" id="authorFullText" name="authorFullText" placeholder="Enter the full text of the article" required></textarea>
                      </div>
                      <div class="form-group mb-3">
                          <label for="publication_date">Date of Publication</label>
                          <input type="date" class="form-control" placeholder="Date of Publication" name="publication_date" required>
                      </div>
                      <div class="form-group">
                          <button type="submit" class="form-control btn btn-primary rounded submit px-3">SUBMIT</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </section>

  <?php
  }
  
    public function edit_author_form(){
        ?>

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


<?php
}
}


?>