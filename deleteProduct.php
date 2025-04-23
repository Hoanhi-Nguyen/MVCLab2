<?php
    require "../model/ProductDAO.php";

    if (isset($_GET['productID'])) {
        $productID = $_GET['productID'];
    }

    $method = $_SERVER['REQUEST_METHOD'];
    if ($method == 'POST') {
        $productID = $_POST['productID'];
        $submit = $_POST['submit'];

        if ($submit == 'CONFIRM') {
            $productDAO = new ProductDAO();
            $productDAO->deleteProduct($productID);
        }

        header("Location: listProduct.php");
        exit;
    }
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete a Product</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-light bg-light" style="margin-bottom: 20px">
            <a class="navbar-brand" href="listProducts.php">
                Product Database
            </a>
        </nav>

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Delete a Product</h5>
                            <p class="card-text">Are you sure you want to delete this product from the database?</p>

                            <form action="deleteProduct.php" method="POST">
                                <input type="hidden" name="productID" value="<?php echo $productID; ?>">
                                <button class="btn btn-primary" type="submit" name="submit" value="CONFIRM">Confirm</button>
                                <button class="btn btn-secondary" type="submit" name="submit" value="CANCEL">Cancel</button>
                            </form>

                        </div>
                    </div>      
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js"></script>
    </body>
    </html>

