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
		<table width="600px" border="0">
			<tr>
				<td align="center" style="font-weight: bold;">Mã Lớp</td>
				<td align="center" style="font-weight: bold;">Tên Lớp</td>
                <td align="center" style="font-weight: bold;">Sửa</td>
                <td align="center" style="font-weight: bold;">Xóa</td>
			</tr>
            <?php

                $sql = mysql_query("SELECT * FROM lop");
				if(mysql_num_rows($sql)>0){
                    while($row = mysql_fetch_array($sql)){
                        $malop = $row['malop'];
                        $tenlop = $row['tenlop'];
                       

                        echo "<tr>
                            <td>$malop</td>
                            <td>$tenlop</td>
                          <td><a href='index.php?page=suasv&masv=".$malop."'>Sửa</a> </td>
                            <td><a href='index.php?page=xoasv&masv=".$malop."' onclick='return deleleAction();'>Xóa</a></td>
                            
                        </tr>";
                    }
                }
            ?>
		</table>
	</fieldset>
</div>