<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="my_hotel";
// Create connection
$conn = new mysqli($servername, $username, $password);
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("select * FROM nguoidung"); 
    $stmt->execute();
    $kq=$stmt->fetchAll(PDO::FETCH_OBJ);
    // set the resulting array to associative
    //$result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    echo json_encode($kq);
    //print_r($kq);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>