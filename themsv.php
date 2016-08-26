<?php
    include("connect.php");

    if(isset($_POST['submit'])){
        $tensv = $_POST['tensv'];
        $gioitinh = $_POST['gioitinh'];
        $lop = $_POST['lop'];
        $diachi = $_POST['diachi'];

        $insert = mysql_query("INSERT INTO sinhvien (tensv, gioitinh, diachi, malop) values ('$tensv', '$gioitinh', '$diachi', '$lop' )") or die (mysql_error());
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
<?php 


include "image_class.php";

$obj_image = new Image();

if(@$_POST['Submit'])
{
 
 $obj_image->image=str_replace("'", "''", $_POST['txt_image']);

  $obj_image->Insert_into_image();

  $data_image=$obj_image->get_all_image_list();
 $row=mysql_num_rows($data_image);
}

?>
<form name="themsv" action="" method="post">
    <table width="400px" border="0" style="margin: 10px auto;">
        <tr>
            <td align="center" style="font-weight: bold;">Tên Sinh Viên</td>
            <td><input name="tensv" id="tensv" type="text" placeholder="" /> </td>
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
     <th width="50%">Upload IMage</th>
     <td width="50%"><input type="file" name="txt_image"></input></td>
    </tr>
        <tr>
            <td align="center" style="font-weight: bold;">Địa chỉ</td>
            <td><input name="diachi" type="text" placeholder="" /> </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input name="submit" type="submit" value="Thêm" /> </td>
        </tr>
    </table>
</form>