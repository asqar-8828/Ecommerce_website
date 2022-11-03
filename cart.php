<?php
include ('includes/connect.php');
include ('./functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>E-commerce cart details</title>
    <!--bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
          crossorigin="anonymous">

    <!--font awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--css file-->
    <link rel="stylesheet" href="./style.css">
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
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup>
                                <?php cart_item(); ?>
                            </sup></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav><!--first child ends-->

    <!--        calling cart function -->
    <?php
    cart();
    ?>

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

    <div class="container"> <!--fourth child table-->
        <div class="row">
            <form action="" method="post">
            <table class="table table-bordered text-center">

                    <!-- php code to display dynamic data -->
                    <?php

                    $total_price = 0;
                    $get_ip_add = getIPAddress();
                    $cart_query = "select * from `cart_details` where ip_address = '$get_ip_add'";
                    $result = mysqli_query($con,$cart_query);
                    $result_query = mysqli_num_rows($result);
                    if ($result_query > 0) {
                        echo "
                        <thead>
                    <tr>
                        <th>Product title</th>
                        <th>Product image</th>
                        <th>Quantity</th>
                        <th>Total price</th>
                        <th>Remove</th>
                        <th colspan='2'>Operations</th>
                    </tr>
                </thead>
                <tbody>
                        ";
                    while ($row=mysqli_fetch_array($result)) {
                        $product_id = $row['product_id'];
                        $select_products = "select * from `products` where product_id='$product_id' ";
                        $result_products = mysqli_query($con,$select_products);
                        while ($row_products_price = mysqli_fetch_array($result_products)){
                            $products_price = array($row_products_price['product_price']);
                            $price_table = $row_products_price['product_price'];
                            $product_title = $row_products_price['product_title'];
                            $product_image1 = $row_products_price['product_image1'];
                            $products_values = array_sum($products_price);
                            $total_price += $products_values;

                    ?>
                    <tr>
                        <td><?php echo $product_title; ?></td>
                        <td><img src="./admin_area/product_images/<?php echo $product_image1; ?>" alt="" class="cart_img"></td>
                        <td><input type="text" name="qty" class="form-input w-50"></td>
                        <?php
                        $get_ip_add = getIPAddress();
                        if (isset($_POST['update_cart'])){
                            $quantities = $_POST['qty'];
                            $update_cart = "update `cart_details` set quantity= $quantities where ip_address = '$get_ip_add'";
                            $result_products_quantity = mysqli_query($con,$update_cart);
                            $total_price= $total_price * $quantities;
                        }
                        ?>
                        <td><?php echo $price_table; ?></td>
                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                        <td>
<!--                            <button class="bg-info px-3 py-2 mx-3 border-0">Update</button>-->
                            <input type="submit" value="Update Cart" class="bg-info px-3 py-2 mx-3 border-0" name="update_cart">
<!--                            <button class="bg-info px-3 py-2 mx-3 border-0">Remove</button>-->
                            <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 mx-3 border-0" name="remove_cart">

                        </td>
                    </tr>
                        <?php
                                }
                                    }
                    }
                    else {
                        echo "<h2 class='text-center text-danger'>Cart is empty </h2>";
                    }
                    ?>
                </tbody>

            </table>
            <!--Subtotal-->
            <div class="d-flex mb-5">
                <?php

                $get_ip_add = getIPAddress();
                $cart_query = "select * from `cart_details` where ip_address = '$get_ip_add'";
                $result = mysqli_query($con,$cart_query);
                $result_query = mysqli_num_rows($result);
                if ($result_query > 0) {
                    echo "
                    <h4 class='px-3'>Subtotal: <strong class='text-info'> $total_price </strong></h4>
                    <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 mx-3 border-0' name='continue_shopping'>
                    <button class='bg-secondary px-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light text-decoration-none'>Checkout</a></button>    
                    ";
                } else {
                    echo "
                    <input type='submit' value='Continue Shopping' class='bg-info px-3 py-2 mx-3 border-0' name='continue_shopping'>
                    ";
                }
                if (isset($_POST['continue_shopping'])){
                    echo "<script>window.open('index.php','_self')</script>";
                }
                ?>


            </div>

        </div>
    </div>
    </form>

<!-- function to remove item -->

    <?php

    function remove_cart_item(){
        global $con;
        if (isset($_POST['remove_cart'])){
            foreach ($_POST['removeitem'] as $remove_id) {
                echo $remove_id;
                $delete_query = "delete from `cart_details` where product_id=$remove_id";
                $run_delete = mysqli_query($con,$delete_query);
                if ($run_delete) {
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }

    }

    echo $remove_item = remove_cart_item();
    ?>

<!--Footer starts-->
<?php include ('includes/footer.php') ?>
<!--Footer ends-->

</div><!--/.container-fluid ends-->

<!--bootstrap JS link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>

</html>