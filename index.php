<?php
include ('includes/connect.php');

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>E-commerce web sayt</title>
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
    <!--navbar-->
    <div class="container-fluid p-0"> <!--/.container-fluid starts-->

        <nav class="navbar navbar-expand-lg bg-info"> <!--first child starts-->
            <div class="container-fluid">
                <img src="./images/logo.png" alt="logo_shopping" class="logo">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Total Price:100/-</a>
                        </li>

                    </ul>
                    <form class="d-flex" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-light" type="submit">Search</button>
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

        <div class="row"> <!--fourth child starts-->
            <div class="col-md-10">
                <div class="row"> <!--products starts-->
                    <div class="col-md-4 mb-2">
                        <div class="card" >
                            <img src="./images/apple.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-info">Add to cart</a>
                                <a href="#" class="btn btn-secondary">View more</a>
                            </div>
                        </div>
                    </div>
                </div> <!--products ends-->
            </div>
            <div class="col-md-2 bg-secondary p-0"> <!--sidenav starts-->
                <ul class="navbar-nav me-auto text-center"> <!--Brands starts-->
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
                    </li>
                    <?php
                    $select_brands = "select * from `brands`";
                    $result_brands = mysqli_query($con,$select_brands);

                    while ($row_data = mysqli_fetch_assoc($result_brands)) {
                        $brand_title = $row_data['brand_title'];
                        $brand_id = $row_data['brand_id'];
                        echo "<li class='nav-item'>
                        <a href='index.php?brand=$brand_id' class='nav-link text-light'>$brand_title</a>
                        </li>";
                    }
                    ?>
                    </ul><!--Brands end-->

                <ul class="navbar-nav me-auto text-center"> <!--Categories starts-->
                    <li class="nav-item bg-info">
                        <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                    </li>
                    <?php
                    $select_categories = "select * from `categories`";
                    $result_categories = mysqli_query($con,$select_categories);

                    while ($row_data = mysqli_fetch_assoc($result_categories)) {
                        $category_title = $row_data['category_title'];
                        $category_id =  $row_data['category_id'];
                        echo "<li class='nav-item'>
                        <a href='index.php?category=$category_id' class='nav-link text-light'>$category_title</a>
                        </li>";
                    }
                    ?>

                </ul><!--Categories end-->

            </div> <!--sidenav ends-->
        </div> <!--fourth child ends-->


    </div><!--/.container-fluid ends-->

    <div class="bg-info p-3 text-center"> <!--Footer starts-->
        <p>All rights reserved @ - Designed by MMM-2022</p>
    </div> <!--Footer ends-->

    <!--bootstrap JS link-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
                    crossorigin="anonymous"></script>
    </body>

</html>