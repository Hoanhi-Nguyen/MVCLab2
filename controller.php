<?php
ini_set("display_errors", "On");
include_once "controllers/ProductAction.php";
include_once "controllers/ProductController.php";
include_once "model/ProductDAO.php";

class FrontControllers {
    private $controllers;

    public function __construct() {
        $this->showErrors(0);
        $this->controllers = $this->loadControllers();
    }

    public function run() {
        $method = $_SERVER['REQUEST_METHOD'];
        $page = isset($_GET['submit']) ? $_GET['submit'] : 'list';
        $controller = $this->controllers[$method . $page];
        //echo $page;
        if ($method == 'GET') {
            //echo "GET";
            $controller->processGET();
        }

        if ($method == 'POST') {
            //echo "POST";
            $controller->processPOST();
        }
    }

    public function loadControllers() {
        $controllers["GET"."list"] = new ProductList();
        $controllers["POST"."list"] = new ProductList();
        $controllers["GET"."ADD"] = new ProductAdd();
        $controllers["POST"."ADD"] = new ProductAdd();
        $controllers["GET"."UPDATE"] = new ProductUpdate();
        $controllers["POST"."UPDATE"] = new ProductUpdate();
        $controllers["GET"."DELETE"] = new ProductDelete();
        $controllers["POST"."DELETE"] = new ProductDelete();

        return $controllers;
    }

    private function showErrors($debug) {
        if ($debug == 1) {
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL);
        }
    }
}

$controller = new FrontControllers();
$controller->run();

?>