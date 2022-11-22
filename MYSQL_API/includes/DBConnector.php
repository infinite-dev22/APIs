<?php
    class DBConnector {
        private $conn;

        function __construct() {
            require_once 'Constants.php';
        }
        
        function connector() {
            try {
                $this->conn = new mysqli(HOST, USER, PASS, DB);
            } catch (\mysqli_sql_exception $e) {
                die("DB COnnection Error: " . mysqli_connect_errno() . '\n'.$e);
            }
            
            return $this->conn;
        }
    }
?>