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
    $user=$_POST["user"];
    $pass=$_POST["pass"];

    $stmt = $conn->prepare("select * from nguoidung where user='$user' and pass='$pass' "); 
    $stmt->execute();
    $kq=$stmt->fetchAll(PDO::FETCH_OBJ);
    //echo json_encode($kq);
        if(count($kq)==1)
        {
            // foreach ($kq as $key => $value) {
                $hoten=$kq[0]->hoten_nguoidung;
                $gioitinh=$kq[0]->gioitinh_nguoidung;
                $ngaysinh=$kq[0]->ngaysinh_nguoidung;
                // $songaylam=$kq[0]->songaylam;
                // $luongcoban=$kq[0]->luongcoban;
                $chucvu=$kq[0]->chucvu;
                //echo $kq[0]->hoten_nguoidung;
                echo "{errorCode:0,hoten_nguoidung:'$hoten',gioitinh_nguoidung:'$gioitinh',ngaysinh_nguoidung:'$ngaysinh',chucvu:'$chucvu'}";
             // }
         

            //echo "{errorCode:0,message:'Thành công'}";
        }
      //echo "{errorCode:0,message:'$user,$pass'}";
     //}
     else
     {
         echo "{errorCode:1,message:'that bai'}";
     }
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>