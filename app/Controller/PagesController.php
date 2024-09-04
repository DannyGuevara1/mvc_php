<?php
require_once '../app/Controller/MaterialsController.php';

class PagesController {
    // Methods
    public function index() {
        $controller = new MaterialsController();
        $controller->getAllMaterials();
    }
    public function about() {
        require '../app/View/about.php';
    }

}

?>
