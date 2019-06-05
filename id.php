
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
    $id=$_POST["id_nguoidung"];
    //$pass=$_POST["pass"];
    $stmt = $conn->prepare("select * from nguoidung where id_nguoidung='$id' "); 
    $kq=$stmt->execute();
    $kq=$stmt->fetchAll(PDO::FETCH_OBJ);
    //echo json_encode($kq);
     if(count($kq)==1)
     {
      echo "{errorCode:0,message:'thanh cong'}";
     }
     else
     {
         echo "{errorCode:1,message:'that bai'}";
     }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
