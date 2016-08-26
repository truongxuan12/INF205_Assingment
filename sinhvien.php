<?php
    include("connect.php");
?>
<script type="text/javascript">
	function deleleAction(){
		return confirm("Bạn có muốn xóa sinh viên này không?");
	}
</script>
<div id="left">
	<fieldset>
		<legend>Thông tin sinh viên</legend>
		<table width="600px" border="0" align="center">
			<tr>
				<td align="center" style="font-weight: bold; width:100px;">Mã Sinh Viên</td>
				<td align="center" style="font-weight: bold;">Tên Sinh Viên</td>
				<td align="center" style="font-weight: bold;">Giới tính</td>
				<td align="center" style="font-weight: bold;">Lớp</td>
				<td align="center" style="font-weight: bold;">Địa chỉ</td>
                <td align="center" style="font-weight: bold;">Sửa</td>
                <td align="center" style="font-weight: bold;">Xóa</td>
			</tr>
            <?php

                $sql = mysql_query("SELECT * FROM sinhvien, lop WHERE sinhvien.malop = lop.malop ORDER BY masv");
				if(mysql_num_rows($sql)>0){
                    while($row = mysql_fetch_array($sql)){
                        $masv = $row['masv'];
                        $tensv = $row['tensv'];
                        if($row['gioitinh'] == 1){
                            $gioitinh = "Nam";
                        }else {
                            $gioitinh = "Nữ";
                        }
                        $diachi = $row['diachi'];
                        $tenlop = $row['tenlop'];

                        echo "<tr>
                            <td>$masv</td>
                            <td>$tensv</td>
                            <td>$gioitinh</td>
                            <td>$tenlop</td>
                            <td>$diachi</td>
                            <td><a href='index.php?page=suasv&masv=".$masv."'>Sửa</a> </td>
                            <td><a href='index.php?page=xoasv&masv=".$masv."' onclick='return deleleAction();'>Xóa</a></td>
                        </tr>";
                    }
                }
            ?>
		</table>
	</fieldset>
</div>