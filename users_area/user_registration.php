
<?php include ('../includes/connect.php');
      include ('../functions/common_function.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User registration</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
          crossorigin="anonymous">

    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--css file-->
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container-fluid">
    <h2 class="text-center m-3"> New User Registration </h2>
    <div class="row d-flex align-items-center justify-content-center">
        <div class="col-lg-12 col-xl-6">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="form-outline m-4">  <!--Username field starts-->
                    <label for="user_username" class="form-label">Username</label>
                    <input type="text" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required" name="user_username"/>
                </div>  <!--Username field ends-->

                <div class="form-outline m-4">  <!--Email field starts-->
                    <label for="user_email" class="form-label">Email</label>
                    <input type="email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required" name="user_email"/>
                </div>  <!--Email field ends-->

                <div class="form-outline m-4">  <!--Image field starts-->
                    <label for="user_image" class="form-label">Image</label>
                    <input type="file" id="user_image" class="form-control" required="required" name="user_image"/>
                </div>  <!--Image field ends-->

                <div class="form-outline m-4">  <!--Password field starts-->
                    <label for="user_password" class="form-label">Password</label>
                    <input type="password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required" name="user_password"/>
                </div>  <!--Password field ends-->

                <div class="form-outline m-4">  <!--Confirm password field starts-->
                    <label for="conf_user_password" class="form-label">Confirm Password</label>
                    <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm Password" autocomplete="off" required="required" name="conf_user_password"/>
                </div>  <!--Confirm password field ends-->

                <div class="form-outline m-4">  <!--Address field starts-->
                    <label for="user_address" class="form-label">Address</label>
                    <input type="text" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required" name="user_address"/>
                </div>  <!--Username field ends-->

                <div class="form-outline m-4">  <!--Contact field starts-->
                    <label for="user_contact" class="form-label">Contact</label>
                    <input type="text" id="user_contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required="required" name="user_contact"/>
                </div>  <!--Contact field ends-->

                <div class="mt-4 pt-2 mx-4">
                    <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register"/>
                    <p class="small fw-bold mt-2 pt-1">Already have an account? <a href="user_login.php" class="text-danger">Login</a></p>
                </div>
            </form>

        </div>

    </div>

</div>
</body>

</html>

<!--PHP code-->

<?php
if (isset($_POST['user_register'])) {
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    //insert_query
    move_uploaded_file($user_image_tmp,"./user_images/$user_image");
    $insert_query = "insert into `user_table` (username, user_email, user_password, user_image, 
                     user_ip, user_address, user_mobile) values ('$user_username','$user_email',
                     '$user_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
    $sql_execute = mysqli_query($con,$insert_query);
    if ($sql_execute) {
        echo "<script>alert('Data inserted successfully! ')</script>";
    } else{
        die(mysqli_error($con));

    }

}


?>