<?php

  require_once "../model/ProductDAO.php";
  showErrors(0);

  $productDAO = new ProductDAO();
  $method = $_SERVER['REQUEST_METHOD'];

  if ($method == 'POST') {
      $categoryID = $_POST['categoryID'];
      $productCode = $_POST['productCode'];
      $productName = $_POST['productName'];
      $listPrice = $_POST['listPrice'];

      $product = new Product();
      $product->setCategoryID($categoryID);
      $product->setProductCode($productCode);
      $product->setProductName($productName);
      $product->setListPrice($listPrice);

      $productDAO->addProduct($product);

      header('Location: listProduct.php');
      exit;
  }

  function showErrors($debug) {
      if ($debug == 1) {
          ini_set('display_errors', 1);
          ini_set('display_startup_errors', 1);
          error_reporting(E_ALL);
      }
  }
  
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Add a Product</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>  
  <nav class="navbar navbar-light bg-light mb-4">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">Product Inventory</span>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add a Product</h5>
            <p class="card-text">Fill in the form below to add a new product.</p>

            <form action="addProduct.php" method="POST">

              <label for="categoryID" class="form-label">Category ID</label>
              <input type="number" class="form-control mb-3" id="categoryID" name="categoryID" required>

              <label for="productCode" class="form-label">Product Code</label>
              <input type="text" class="form-control mb-3" id="productCode" name="productCode" required>

              <label for="productName" class="form-label">Product Name</label>
              <input type="text" class="form-control mb-3" id="productName" name="productName" required>

              <label for="listPrice" class="form-label">List Price</label>
              <input type="text" class="form-control mb-3" id="listPrice" name="listPrice" required>

              <button type="submit" class="btn btn-primary">Submit Product</button>
              <a href="listProduct.php" class="btn btn-secondary">Go Back to List</a>
            </form>
          </div>
        </div>      
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
