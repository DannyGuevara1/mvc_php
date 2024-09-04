<?php
require_once 'Connect.php';
class Materials {
    // Properties
    private $conn;
    //Properties for Table
    private $table = 'materiales';
    public $idmateriales;
    public $Nombre;
    public $Cantidad;
    public $idtipomaterial;
    public $idaula;
    public $FechaAdquisicion;
    // Constructor
    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }
    // Methods
    public function getAll(){
        try {
            $sql = 'SELECT * FROM ' . $this->table;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $materials = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $materials;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function createMaterial($nombre, $cantidad, $idtipomaterial, $idaula){
        try {
            $sql = 'INSERT INTO ' . $this->table . ' (nombre, cantidad, idtipomaterial, idaula, fechaadquisicion) VALUES (:nombre, :cantidad, :idtipomaterial, :idaula, CURRENT_DATE)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':cantidad', $cantidad);
            $stmt->bindParam(':idtipomaterial', $idtipomaterial);
            $stmt->bindParam(':idaula', $idaula);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function updateMaterial($idmateriales, $nombre, $cantidad, $idtipomaterial, $idaula){
        try {
            $sql = 'UPDATE ' . $this->table . ' SET nombre = :nombre, cantidad = :cantidad, idtipomaterial = :idtipomaterial, idaula = :idaula WHERE idmateriales = :idmateriales';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':cantidad', $cantidad);
            $stmt->bindParam(':idtipomaterial', $idtipomaterial);
            $stmt->bindParam(':idaula', $idaula);
            $stmt->bindParam(':idmateriales', $idmateriales);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getMaterialById($idmateriales){
        try {
            $sql = 'SELECT * FROM ' . $this->table . ' WHERE idmateriales = :idmateriales';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idmateriales', $idmateriales);
            $stmt->execute();
            $material = $stmt->fetch(PDO::FETCH_OBJ);
            return $material;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function deleteMaterial($idmateriales){
        try {
            $sql = 'DELETE FROM ' . $this->table . ' WHERE idmateriales = :idmateriales';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':idmateriales', $idmateriales);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function closeConnection() {
        $this->conn = null;
    }
}
?>
