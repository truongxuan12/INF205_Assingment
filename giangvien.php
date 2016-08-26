<?php
    include("connect.php");

    if(isset($_POST['submit'])){
        $tengv = $_POST['tengv'];
        $gioitinh = $_POST['gioitinh'];
        $lop = $_POST['lop'];
        $diachi = $_POST['diachi'];

        $insert = mysql_query("INSERT INTO giangvien (tengv, gioitinh, diachi, malop) values ('$tengv', '$gioitinh', '$diachi', '$lop' )") or die (mysql_error());
        if(isset($insert)){
            echo "Thêm thành công!";
        }else {
            echo "Thêm thất bại";
        }
    }
	?>
	<?php
	include("connect.php");
	function loaisp(){
		
		$sql = "select * from lop";
		$thucthi = mysql_query($sql);
		echo "<select name='lop'>";
		while($row = mysql_fetch_array($thucthi)){
			echo "<option value=\"".$row['malop']."\">".$row['tenlop']."</option>";
		}
		echo "</select>";
		
	}
?>

<form name="themsv" action="" method="post">
    <table width="400px" border="0" align="center" style="margin: 10px auto;">
        <tr>
            <td align="center" style="font-weight: bold;">Tên Giảng Viên</td>
            <td><input name="tengv" id="tengv" type="text" placeholder="" /> </td>
        </tr>
        <tr>
            <td align="center" style="font-weight: bold;">Giới tính</td>
            <td>
                <select name="gioitinh">
                    <option value="1">Nam</option>
                    <option value="2">Nữ</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="center" style="font-weight: bold;">Lớp</td>
            <td>
               <?php loaisp();?>
            </td>
        </tr>
        <tr>
            <td align="center" style="font-weight: bold;">Email</td>
            <td><input name="diachi" type="text" placeholder="" /> </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input name="submit" type="submit" value="Thêm" /> </td>
        </tr>
    </table>
</form>