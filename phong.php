
<?php
$servername = "sql204.byethost.com";
$username = "b5_24040747";
$password = "0988693349";
$dbname="b5_24040747_hotel";
// Create connection
$conn = new mysqli($servername, $username, $password);
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$id=$_POST["id_nguoidung"];
    //$pass=$_POST["pass"];
    $stmt = $conn->prepare("select ten_khachhang,ten_loaiphong,soluongphong,ngayden,ngaydi,tinhtrang_datphong from datphong,khachhang,loaiphong
    where khachhang.id_khachhang=datphong.id_khachhang and loaiphong.id_loaiphong=datphong.id_loaiphong "); 
    $kq=$stmt->execute();
    $kq=$stmt->fetchAll(PDO::FETCH_OBJ);
    //echo json_encode($kq);
     if(count($kq)==1)
     {
        $ten_khachhang=$kq[0]->ten_khachhang;
        $ten_loaiphong=$kq[0]->ten_loaiphong;
        $soluongphong=$kq[0]->soluongphong;
        $ngayden=$kq[0]->ngayden;
        $ngaydi=$kq[0]->ngaydi;
        $tinhtrang_datphong=$kq[0]->tinhtrang_datphong;
      echo "{errorCode:0,ten_khachhang:'$ten_khachhang',ten_loaiphong:'$ten_loaiphong',soluongphong:'$soluongphong',ngayden:'$ngayden',ngaydi:'$ngaydi',tinhtrang_datphong:'$tinhtrang_datphong'}";
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
