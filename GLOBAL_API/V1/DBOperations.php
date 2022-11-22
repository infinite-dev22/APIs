<?php
    class DBOperations {
        private $db;
        
        function __construct(){
            require_once('DBConnector.php');

            $db = new DBConnector();
        
            $db->connector();
        }
        
        function sellectAllData($table_name){
            $rs = null;
            $query = "SELECT * FROM ". $table_name;
            $stmt = $this->db->prepare($query);

            try {
                $stmt->execute();
                $rs = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            return $rs;
        }

        function insertData($param1, $param2, $param3, $table_name){
            $rs = null;
            $query = "INSERT INTO ".$table_name."(col1, col2, col3) VALUES (?, ?, ?)";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("issds", $param1, $param2, $param3);

            try {
                $rs = $stmt->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            if ($rs) {
                return $stmt->rowCount();
            }
        }

        function updateData($param1, $param2, $param3, $table_name){
            $rs = null;
            $query = "UPDATE ".$table_name." SET col1 = :COL1, col2 = :COL2, col3 = :COL3";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":COL1", $param1);
            $stmt->bindParam(":COL2", $param2);
            $stmt->bindParam(":COL3", $param3);

            try {
                $rs = $stmt->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            if ($rs) {
                return $stmt->rowCount();
            }
        }

        function deleteData($id, $table_name){
            $rs = null;
            $query = "DELETE FROM ".$table_name." WHERE id = :ID";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(":ID", $id);

            try {
                $rs = $stmt->execute();
            } catch (PDOException $e) {
                echo $e->getMessage();
            }

            if ($rs) {
                return $stmt->rowCount();
            }
        }
    }
    
    
?>