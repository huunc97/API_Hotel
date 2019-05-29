
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
    $user=$_POST["hihi"];
    //$pass=$_POST["haha"];
    $stmt = $conn->prepare("select * from nguoidung "); 
    $stmt->execute();
    $kq=$stmt->fetchAll(PDO::FETCH_OBJ);
    echo json_encode($kq);
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
