<?php
$servername="localhost";
$username="root";
$password="";
$dbname="tatawoe";

try {
    $conn=new PDO("mysql:host=$servername;$dbname=$dbname",
    $username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $conn->exec("USE $dbname");
}catch(PDOException $e){
    echo $e->getMessage();

}


?>