<?php
@session_start();
//lấy mảng mã học phần

$hostName = "localhost"; 
$databaseName = "testing"; 
$username = "root"; 
$password = ""; 

if(!($connection = @mysql_connect($hostname, $username, $password))) 
{ 
die("Error: Cannot connect to database !!!"); 
} 
if (!(mysql_select_db($databaseName, $connection))) 
{ 
die("Error: Cannot select database name: $databaseName"); 
} 
 /*
$chk = $_POST['chk'];
if(isset($_POST['chk'])){
if(count($chk) > 0){
$i = 1;
foreach($chk as $value){
if($i == 1){
$id = $value; // $value chính là mã môn học
}else{
$id = $value.',';

}
$i++;
}
}
$_SESSION['hocphan'] = $id;

//echo $key;
echo $value;
*/
if(isset($_POST['chk'])){	
		$chk = $_POST['chk'];
		foreach($chk as $va){
			$val = $va;
			$inp = $_POST['sotiet'.$val];
				$select = "SELECT * FROM hocphan where mahp = '$val'";
				$result = mysql_query($select) or die (mysql_error());
				//khi đã lấy được ra môn học chúng ta insert những môn học đó vào bảng học phần đăng kí
				$row = mysql_fetch_array($result);
				$sql = "INSERT INTO monhoc (mamonhoc,tenmonhoc, val) VALUES ('".$row['mahp']."','".$row['tenhp']."', '".$inp."')";
				$insert = mysql_query($sql) or die (mysql_error());
				if(isset($insert)){
					echo "Thêm thành công";
				}else {
					echo "Thêm thất bại";
				}
		}
	}else {
		echo "Không có môn nào được chọn";
	}

        
        
        
?>