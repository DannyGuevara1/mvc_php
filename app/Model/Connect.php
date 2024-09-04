<?php
require_once '../app/Config/config.php';
class DataBase {
    private $conection = null;
    // Methods
    public function connect(): ?PDO {
        try {
            $this->conection = new PDO("pgsql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";port=" . DB_PORT, DB_USER, DB_PASS);
            $this->conection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection Error: " . $e->getMessage();
            $this->conection = null;
        }
        return $this->conection;
    }
}

?>
