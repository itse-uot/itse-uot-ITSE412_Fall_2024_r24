<?php
include '../execute/dbconfig.php';
try{
          $query = "SELECT * FROM users ";
        $stmt=$conn->prepare($query);
        if($stmt->execute()){
            echo "yes";
        }
    }catch(exception $ex){
        echo $ex->getMessage();
    }

?>