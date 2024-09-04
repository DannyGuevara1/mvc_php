<?php
require_once 'Connect.php';
class Classroom {
    // Properties
    private $conn;
    //Properties for Table
    private $table = 'aulas';
    public $idaula;
    public $Numero;
    public $Nombre;
    public $Capacidad;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }
    // Methods
    public function getAllAulas(){
        try {
            $sql = 'SELECT * FROM ' . $this->table;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $classrooms = $stmt->fetchAll(PDO::FETCH_OBJ);
            return $classrooms;
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function closeConnection(){
        $this->conn = null;
    }
}

?>
