<?php
include('../includes/connect.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-commerce Website - Checkout page</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
          crossorigin="anonymous">

    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--css file-->
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<!--navbar-->
<div class="container-fluid p-0"> <!--/.container-fluid starts-->

    <nav class="navbar navbar-expand-lg bg-info"> <!--first child starts-->
        <div class="container-fluid">
            <img src="../images/logo.png" alt="logo_shopping" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../display_all.php">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>

                </ul>
                <form class="d-flex" action="../search_product.php" method="get">
                    <input class="form-control me-2" type="search" name="search_data" placeholder="Search" aria-label="Search">
                    <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">

                </form>
            </div>
        </div>
    </nav><!--first child ends-->



    <nav class="navbar navbar-expand-lg navbar-light bg-secondary"> <!--second child starts-->
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Welcome Guest</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Login</a>
            </li>

        </ul>

    </nav> <!--second child ends-->

    <div class="bg-light"> <!--third child starts-->
        <h3 class="text-center">Hidden</h3>
        <p class="text-center">Communication is at the heart of e-commerce and community</p>

    </div> <!--third child ends-->

    <div class="row mx-2 p-1"> <!--fourth child starts-->
        <div class="col-md-12">
            <div class='row'> <!--products starts-->
                <?php
                if (!isset($_SESSION['username'])) {
                    include('user_login.php');
                }
                else{
                    include('../payment.php');
                }

                ?>
            </div> <!--products ends-->
        </div>
        <div class="col-md-2 bg-secondary p-0"> <!--sidenav starts-->


        </div> <!--sidenav ends-->
    </div> <!--fourth child ends-->


</div><!--/.container-fluid ends-->

<!--Footer starts-->
<?php
include('../includes/footer.php') ?>
<!--Footer ends-->

<!--bootstrap JS link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>

</html>