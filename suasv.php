
<?php
	//Kết nối csdl
	include("connect.php");
	if(isset($_GET['masv']) && $masv = $_GET['masv']){
	$sinhvien = mysql_query("SELECT masv,malop,tensv,gioitinh,diachi FROM sinhvien WHERE masv=$masv");
		if(mysql_num_rows($sinhvien)>0){
			$arrsv = mysql_fetch_array($sinhvien);
		}
		if(isset($_POST['submit'])){
			$tensv = $_POST['tensv'];
			$gioitinh = $_POST['gioitinh'];
			$lop = $_POST['lop'];
			$diachi = $_POST['diachi'];
			$update = mysql_query("UPDATE sinhvien SET malop='$lop',tensv='$tensv',gioitinh='$gioitinh',diachi='$diachi' WHERE masv='$masv'");
			if($update){
				echo "Cập nhật thành công";
			}else {
				echo "Cập nhật thất bại";
			}
			exit();
		}
	
?>
<form name="suasv" action="" method="POST">
<table width="600px" border="0" margin_left="800px">
    <tr>
        <td align="center" style="font-weight: bold;">Tên sinh viên</td>
        <td><input name="tensv" id="tensv" type="text" placeholder="" value="<?php echo $arrsv['tensv']; ?>" /> </td>
    </tr>
    <tr>
        <td align="center" style="font-weight: bold;">Giới tính</td>
        <td>
            <select name="gioitinh">
                <option <?php if($arrsv['gioitinh']=='1') echo 'selected="selected"'; else echo ""; ?> value="1">Nam</option>
                <option <?php if($arrsv['gioitinh']=='0') echo 'selected="selected"'; else echo ""; ?> value="0">Nữ</option>
            </select>
        </td>
    </tr>
    <tr>
        <td align="center" style="font-weight: bold;">Lớp</td>
        <td>
            <select name="lop">
                <?php
					$lop = mysql_query("SELECT malop,tenlop FROM lop");
					if(mysql_num_rows($lop)>0){
						while($arrlop=mysql_fetch_array($lop)){
							if($arrlop['malop'] == $arrsv['malop']) $selected='selected="selected"'; else $selected='';
							echo '<option '.$selected.' value="'.$arrlop['malop'].'">'.$arrlop['tenlop'].'</option>';
						}
					}
				?>
            </select>
        </td>
    </tr>
    <tr>
        <td align="center" style="font-weight: bold;">Địa chỉ</td>
        <td><input name="diachi" type="text" placeholder="Cần thơ" value="<?php echo $arrsv['diachi']; ?>" /> </td>
    </tr>
    <tr>
        <td colspan="2" align="center"><input name="submit" type="submit" value="Sửa" /> </td>
    </tr>
</table>
<?php
	}else {
		echo "Trang yêu cầu không tồn tại";
	}
?>
</form>