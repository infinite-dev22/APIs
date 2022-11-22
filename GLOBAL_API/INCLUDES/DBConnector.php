<?php
    class DBConnector {
        private $dbConn;

        function __construct() {
            require_once 'Constants.php';
        }
        
        function connector() {
            try {
                $this->dbConn = new PDO('oci:dbname=' . CONN . "; cahrset=utf8", USER, PASS,[
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);

                echo "Database Connection Successful.";
            } catch (PDOException $e) {
                die("DB COnnection Error: " . mysqli_connect_errno() . '\n'.$e->getMessage());
            }
            
            return $this->dbConn;
        }
    }
?>