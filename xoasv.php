<?php
	//kết nối csdl
	include("connect.php");
	$masv = $_GET['masv'];
	$delete = mysql_query("DELETE FROM sinhvien WHERE masv='$masv'");
	if($delete){
		echo "Xóa thành công";
	}else {
		echo "Không thể xóa sinh viên này";
	}
?>