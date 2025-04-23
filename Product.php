<?php

    class Product {
        private $productID;
        private $categoryID;
        private $productCode;
        private $productName;
        private $listPrice;

        public function load($row) {
            $this->setProductID($row['productID']);
            $this->setCategoryID($row['categoryID']);
            $this->setProductCode($row['productCode']);
            $this->setProductName($row['productName']);
            $this->setListPrice($row['listPrice']);
        }

        public function setProductID($productID) {
            $this->productID = $productID;
        }

        public function setCategoryID($categoryID) {
            $this->categoryID = $categoryID;
        }

        public function setProductCode($productCode) {
            $this->productCode = $productCode;
        }

        public function setProductName($productName) {
            $this->productName = $productName;
        }

        public function setListPrice($listPrice) {
            $this->listPrice = $listPrice;
        }

        public function getProductID() {
            return $this->productID;
        }

        public function getCategoryID() {
            return $this->categoryID;
        }

        public function getProductCode() {
            return $this->productCode;
        }

        public function getProductName() {
            return $this->productName;
        }

        public function getListPrice() {
            return $this->listPrice;
        }
    }

?>
