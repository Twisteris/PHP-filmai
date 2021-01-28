<?php
include 'conntectToDatabase.php';
class sqlDeleteFunctions extends Database{
        public function deleteMovie($input){
        $sql = "DELETE FROM filmas WHERE id = $input ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }

    public function deleteCategory($input){
        $sql = "DELETE FROM kategorijos WHERE id = $input ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
    }
}