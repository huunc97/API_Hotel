<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="my_hotel";
// Create connection
$conn = new mysqli($servername, $username, $password);
try {
    //$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $user=$_POST["user"];
    $pass=$_POST["pass"];
    $queryResult=$conn->query("select * from nguoidung where user='huu' ");
    //$stmt = $conn->prepare("select * from nguoidung where user='$user' "); 
    $result=array();
    while($fectData=$queryResult->fetch_assoc()){
        $result[]=$fectData;
    }
     echo json_encode($result);
    // $kq=$stmt->execute();
    // $kq=$stmt->fetchAll(PDO::FETCH_OBJ);
    // echo json_encode($kq);
    //  if(count($kq)==1)
    //  {
    //   echo "{errorCode:0,message:'thanh cong'}";
    //  }
    //  else
    //  {
    //      echo "{errorCode:1,message:'that bai'}";
    //  }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>