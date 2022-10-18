
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
          crossorigin="anonymous">
    <!--css file-->
    <link rel="stylesheet" href="../style.css">
    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

    <div class="container-fluid p-0"> <!--navbar starts-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info"> <!--first child starts-->
            <div class="container-fluid">
                <img src="../images/logo.png" alt="logo_image" class="logo mx-3">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link"><h3>Welcome guest</h3></a>
                        </li>

                    </ul>
                </nav>
            </div>

        </nav> <!--first child ends-->

        <div class="bg-light"> <!--second child starts-->
            <h3 class="text-center p-2">Manage Details</h3>
        </div> <!--second child ends-->

        <div class="row"> <!--third child starts-->
            <div class="col-md-12 bg-secondary p-1 d-flex align-items-center">
                <div class="p-3">
                    <a href="#"><img src="../images/pineapple_juice.jpg" class="admin_image mx-4"></a>
                    <p class="text-light text-center">Admin Name</p>
                </div>
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info m-1 p-1">Insert Products</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1 p-1">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info m-1 p-1">Insert Categories</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1 p-1">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info m-1 p-1">Insert Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1 p-1">View Brands</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1 p-1">All orders</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1 p-1">All payments</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1 p-1">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info m-1 p-1">Logout</a></button>
                </div>
            </div>
        </div> <!--third child ends-->

        <div class="container my-3"> <!--fourth child starts-->
            <?php
                if (isset($_GET['insert_category'])) {
                    include ('insert_categories.php');
                }
            if (isset($_GET['insert_brand'])) {
                include ('insert_brands.php');
            }
            ?>
        </div> <!--fourth child ends-->

        <div class="bg-info p-3 text-center footer"> <!--Footer starts-->
            <p>All rights reserved @ - Designed by MMM-2022</p>
        </div> <!--Footer ends-->
    </div> <!--navbar ends-->



<!--bootstrap JS link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>




</html>
