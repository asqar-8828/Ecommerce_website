<?php
include ('../includes/connect.php');

if (isset($_POST['insert_product'])) {
    $product_title = $_POST['product_title'];
    $description = $_POST['description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';

    //accessing image
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];

    //accessing image tmp name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];

    //check empty condition
    if ($product_title == '' or $description == '' or $product_keywords == '' or $product_category == '' or
        $product_brands == '' or $product_price == '' or $product_image1 == '' or $product_image2 == '' or
        $product_image3 == '') {
        echo "<script>alert('Please fill all the available fields')</script>";
        exit();
    } else {
        move_uploaded_file($temp_image1, "./product_images/$product_image1");
        move_uploaded_file($temp_image2, "./product_images/$product_image2");
        move_uploaded_file($temp_image3, "./product_images/$product_image3");

        $insert_products = "insert into `products` (product_title, product_description, product_keywords, category_id,
                        brand_id, product_image1, product_image2, product_image3, product_price, date, status) 
                        values ('$product_title', '$description', '$product_keywords', '$product_category', '$product_brands',
                                '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(),'$product_status')";

        $result_query = mysqli_query($con,$insert_products);

        if($result_query) {
            echo "<script>alert('Products successfully inserted !')</script>";

        }
    }
}






?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product - Admin Dashboard</title>

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
<body class="bg-light">
    <div class="container">
        <h1 class="text-center">Insert Products</h1>
        <form action="" method="post" enctype="multipart/form-data"> <!--from starts-->

            <div class="form-outline mb-4 w-50 m-auto"> <!--Product title starts-->
                <label for="product_title" class="form-label">
                    Product title
                </label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter product title" autocomplete="off" required="required">
            </div> <!--Product title ends-->

            <div class="form-outline mb-4 w-50 m-auto"> <!--Product description starts-->
                <label for="description" class="form-label">
                    Product description
                </label>
                <input type="text" name="description" id="description" class="form-control" placeholder="Enter product description" autocomplete="off" required="required">
            </div> <!--Product description ends-->

            <div class="form-outline mb-4 w-50 m-auto"> <!--Product keywords starts-->
                <label for="product_keywords" class="form-label">
                    Product keywords
                </label>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter product keywords" autocomplete="off" required="required">
            </div> <!--Product keywords ends-->

            <div class="form-outline mb-4 w-50 m-auto"> <!--Selecting category starts-->
                <select name="product_category" class="form-select">
                    <option value=""> Select a Category</option>
                    <?php
                    $select_query = "Select * from `categories`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)){
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>" ;
                    }
                    ?>

                </select>
            </div><!--Selecting category ends-->

            <div class="form-outline mb-4 w-50 m-auto"> <!--Selecting brand starts-->
                <select name="product_brands" class="form-select">
                    <option value=""> Select a Brand</option>
                    <?php
                    $select_query = "Select * from `brands`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)){
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>" ;
                    }
                    ?>

                </select>
            </div><!--Selecting brand ends-->

            <div class="form-outline mb-4 w-50 m-auto"> <!--Image 1 starts-->
                <label for="product_image1" class="form-label">
                    Product image 1
                </label>
                <input type="file" name="product_image1" id="product_image1" class="form-control" required="required">
            </div> <!--Image 1 ends-->

            <div class="form-outline mb-4 w-50 m-auto"> <!--Image 2 starts-->
                <label for="product_image2" class="form-label">
                    Product image 2
                </label>
                <input type="file" name="product_image2" id="product_image2" class="form-control" required="required">
            </div> <!--Image 2 ends-->

            <div class="form-outline mb-4 w-50 m-auto"> <!--Image 3 starts-->
                <label for="product_image3" class="form-label">
                    Product image 3
                </label>
                <input type="file" name="product_image3" id="product_image3" class="form-control" required="required">
            </div> <!--Image 3 ends-->

            <div class="form-outline mb-4 w-50 m-auto"> <!--Product Price starts-->
                <label for="product_price" class="form-label">
                    Product Price
                </label>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter product price" autocomplete="off" required="required">
            </div> <!--Product keywords ends-->

            <div class="form-outline mb-4 w-50 m-auto"> <!--Submit product-->
                <input type="submit" name="insert_product" class="btn btn-info mb-3 px-3" value="Insert Products">
            </div> <!--Product keywords ends-->



        </form>

    </div>




</body>
</html>