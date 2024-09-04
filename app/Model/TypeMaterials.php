<?php
require_once 'Connect.php';
class TypeMaterials {
    // Properties
    private $conn;
    private $table = 'tiposmateriales';
    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // Methods
    public function getAllTypeMaterials(){
        try {
            $sql = 'SELECT * FROM ' . $this->table;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $typeMaterials = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $typeMaterials;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function closeConnection(){
        $this->conn = null;
    }
}

?>
