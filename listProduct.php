<?php
    require_once '../model/ProductDAO.php';
    if(isset($_GET['submit'])) {
        $submit = $_GET['submit'];
        $id = $_GET['productID'];  
        if($submit == "ADD") {
            header("Location: addProduct.php");
            exit;
        }

        if($submit == "DELETE") {
            header("Location: deleteProduct.php?productID=" . $productID);
            exit;
        }
    }

    $productDAO = new ProductDAO();
    $products = $productDAO->getProducts();

    function showErrors($debug) {
        if($debug==1) {
            ini_set('display_errors',1);
            ini_set('display_startup_errors',1);
            error_reporting(E_ALL);
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Database</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<h1 style="text-align: center">Product Database</h1>
<p style="text-align: center; font-size: 30px;">Listing products currently available in stock!</p>

<div class="container">
    <div class="col">
    <form action="../controller.php" method="POST">
        <button class="btn btn-primary" type="submit" name="submit" value="ADD">Add A Product</button>
        <button class="btn btn-primary" type="submit" name="submit" value="UPDATE">Update A Product</button>
        <button class="btn btn-danger" type="submit" name="submit" value="DELETE" 
                onclick="return confirm('Are you sure you want to delete this product?');">Delete A Product</button>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Category ID</th>
                    <th>Product Code</th>
                    <th>Product Name</th>
                    <th>List Price</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($products as $product) {
                    echo "<tr>";
                    echo "<td><input type='radio' name='productID' value='" . $product->getProductID() . "'></td>";
                    echo "<td>" . $product->getCategoryID() . "</td>";
                    echo "<td>" . $product->getProductCode() . "</td>";
                    echo "<td>" . $product->getProductName() . "</td>";
                    echo "<td>" . $product->getListPrice() . "</td>";
                    echo "</tr>";
                }
            ?>
            </tbody>
        </table>
    </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
</body>
</html>



