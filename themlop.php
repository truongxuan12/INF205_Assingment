<?php
    include("connect.php");

    if(isset($_POST['submit'])){
        $malop = $_POST['malop'];
		$tenlop = $_POST['tenlop'];
        

        $insert = mysql_query("INSERT INTO lop (malop, tenlop) values ('$malop', '$tenlop' )") or die (mysql_error());
        if(isset($insert)){
            echo "Thêm thành công!";
        }else {
            echo "Thêm thất bại";
        }
    }
?>
<form name="themlop" action="" method="post">
    <table width="400px" border="0" align="center" style="margin: 10px auto;">
        <tr>
            <td align="center" style="font-weight: bold;">Tên lớp</td>
            <td><input name="malop" id="malop" type="number_format" placeholder="" /> </td>
        </tr>
		 <tr>
            <td align="center" style="font-weight: bold;">Mã lớp</td>
            <td><input name="tenlop" id="tenlop" type="text" placeholder="" /> </td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input name="submit" type="submit" value="Thêm" /> </td>
        </tr>
    </table>
</form>