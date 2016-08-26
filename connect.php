<?php
    /**
     * kết nối csdl
     * truy vấn csdl lấy thông tin sinh vien, giảng viên
     * thực thêm , sửa , xóa sinh viên.
     */

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $data = 'quanlysv';

    $conn = mysql_connect($host, $user, $pass) or die ("Không thể kết nối đến csdl");
    $db = mysql_select_db($data, $conn) or die ("Không tìm thấy csdl");
	mysql_query("SET NAMES 'utf8'");
?>