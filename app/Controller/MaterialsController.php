<?php
require '../app/Model/Materials.php';
require '../app/Model/TypeMaterials.php';
require '../app/Model/Classroom.php';
class MaterialsController {
    // Properties
    private $materialModel;
    private $typeMaterialModel;
    private $classroomModel;
    // Constructor
    public function __construct() {
        $this->materialModel = new Materials();
        $this->typeMaterialModel = new TypeMaterials();
        $this->classroomModel = new Classroom();
    }
    // Methods
    /**
     * Función que envía los datos de la tabla materiales a la vista Home
     */
    public function getAllMaterials(){
        $result = $this->materialModel->getAll();
        $typeMaterials = $this->typeMaterialModel->getAllTypeMaterials();
        $classrooms = $this->classroomModel->getAllAulas();
        $this->materialModel->closeConnection();
        $this->typeMaterialModel->closeConnection();
        $this->classroomModel->closeConnection();
        $this->render('home', [
            'result' => $result,
            'typeMaterials' => $typeMaterials,
            'classrooms' => $classrooms
        ]);
    }

    /**
     * Función para crear un nuevo material
     */
    public function createMaterial(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //recibir datos
            $nombre = $_POST['nombre'] ?? '';
            $cantidad = $_POST['cantidad'] ?? 0;
            $idtipomaterial = $_POST['idtipomaterial'] ?? null;
            $idaula = $_POST['idaula'] ?? null;

            //asignar datos al modelo
            $newMaterial = $this->materialModel->createMaterial($nombre, $cantidad, $idtipomaterial, $idaula);
            if ($newMaterial) {
                header('Location: /pdo/public/');
                exit();
            } else {
                echo 'Error al crear el material';
            }
        }else {
            $this->render('home');
        }
        $this->materialModel->closeConnection();
    }

    /**
     * Función para mostrar la vista de actualizar un material
     */
    public function showUpdateMaterial($id){
        $material = $this->materialModel->getMaterialById($id);
        $typeMaterials = $this->typeMaterialModel->getAllTypeMaterials();
        $classrooms = $this->classroomModel->getAllAulas();
        $this->materialModel->closeConnection();
        $this->typeMaterialModel->closeConnection();
        $this->classroomModel->closeConnection();
        $this->render('updateMaterial', [
            'material' => $material ,
            'typeMaterials' => $typeMaterials,
            'classrooms' => $classrooms
        ]);
    }

    /**
     * Función para actualizar un material
     */
    public function updateMaterial($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //recibir datos
            $nombre = $_POST['nombre'] ?? '';
            $cantidad = $_POST['cantidad'] ?? 0;
            $idtipomaterial = $_POST['idtipomaterial'] ?? null;
            $idaula = $_POST['idaula'] ?? null;

            //asignar datos al modelo
            $updateMaterial = $this->materialModel->updateMaterial($id, $nombre, $cantidad, $idtipomaterial, $idaula);
            if ($updateMaterial) {
                header('Location: /pdo/public/');
                exit();
            } else {
                echo 'Error al actualizar el material';
            }
        }else {
            $this->render('home');
        }
        $this->materialModel->closeConnection();
    }

    /**
     * Función para eliminar un material
     */

    public function deleteMaterial($id){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $deleteMaterial = $this->materialModel->deleteMaterial($id);
            if ($deleteMaterial) {
                header('Location: /pdo/public/');
                exit();
            } else {
                echo 'Error al eliminar el material';
            }
        }else {
            $this->render('home');
        }
        $this->materialModel->closeConnection();
    }

    private function render($view, $data = []) {
        // Extraer los datos
        extract($data);
        // Incluye la vista
        require_once "../app/View/{$view}.php";
    }
}

?>
