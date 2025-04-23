<?php
    require "../model/ProductDAO.php";

    if (isset($_GET['productID'])) {
        $productID = $_GET['productID'];
    }

    $productDAO = new ProductDAO();
    $product = $productDAO->getProductByID($productID);

    if (!$product) {
        header('Location: listProduct.php');
        exit;
    }

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $productID = $_POST['productID'];
        $categoryID = $_POST['categoryID'];
        $productCode = $_POST['productCode'];
        $productName = $_POST['productName'];
        $listPrice = $_POST['listPrice'];
        $submit = $_POST['submit'];

        if ($submit == 'UPDATE') {
            $product->setProductID($productID);
            $product->setCategoryID($categoryID);
            $product->setProductCode($productCode);
            $product->setProductName($productName);
            $product->setListPrice($listPrice);

            $productDAO->updateProduct($product);
        }
        header("Location: listProducts.php");
        exit;
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update a Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-light bg-light" style="margin-bottom: 20px">
    <a class="navbar-brand" href="listProducts.php">The Product Database</a>
</nav>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Update a Product</h5>
                    <form action="updateProduct.php" method="POST">
                        <input type="hidden" name="productID" value="<?php echo $product->getProductID(); ?>">

                        <div class="mb-3">
                            <label for="categoryID" class="form-label">Category ID</label>
                            <input type="number" class="form-control" id="categoryID" name="categoryID" value="<?php echo $product->getCategoryID(); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="productCode" class="form-label">Product Code</label>
                            <input type="text" class="form-control" id="productCode" name="productCode" value="<?php echo $product->getProductCode(); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="productName" value="<?php echo $product->getProductName(); ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="listPrice" class="form-label">List Price</label>
                            <input type="text" class="form-control" id="listPrice" name="listPrice" value="<?php echo $product->getListPrice(); ?>" required>
                        </div>

                        <button type="submit" class="btn btn-primary" name="submit" value="UPDATE">Update</button>
                        <a href="listProducts.php" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>      
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
</body>
</html>
