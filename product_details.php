<?php
include ('includes/connect.php');
include ('./functions/common_function.php');
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
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="display_all.php">Products</a>
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
                <form class="d-flex" action="search_product.php" method="get">
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
        <div class="col-md-10">
            <div class='row'> <!--products starts-->
                <div class="col-md-4"> <!--card starts-->
                    <div class='card' >
                        <img src='#' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_description</p>
                            <a href='#' class='btn btn-info'>Add to cart</a>
                            <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>View more</a>
                        </div>
                    </div>
                </div> <!--card ends-->


                <div class="col-md-8"> <!--related images start-->
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-center text-info mb-5">Related products</h4>
                        </div>
                        <div class="col-md-6">
                            <img src='#' class='card-img-top' alt='$product_title'>
                        </div>
                        <div class="col-md-6">
                            <img src='#' class='card-img-top' alt='$product_title'>
                        </div>
                    </div>

                </div> <!--related images end-->
                <?php
                //calling function


                get_unique_categories();
                get_unique_brands();
                ?>
            </div> <!--products ends-->
        </div>
        <div class="col-md-2 bg-secondary p-0"> <!--sidenav starts-->
            <ul class="navbar-nav me-auto text-center"> <!--Brands starts-->
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
                </li>
                <?php
                getbrands();
                ?>
            </ul><!--Brands end-->

            <ul class="navbar-nav me-auto text-center"> <!--Categories starts-->
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
                </li>
                <?php
                getcategories();
                ?>

            </ul><!--Categories end-->

        </div> <!--sidenav ends-->
    </div> <!--fourth child ends-->


</div><!--/.container-fluid ends-->

<!--Footer starts-->
<?php include ('includes/footer.php') ?>
<!--Footer ends-->

<!--bootstrap JS link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>

</html>