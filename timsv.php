
<!doctype html>
<html>
<head>
	
	
	
	<title>Cao Đẳng Thực Hành FPT Polytechnic</title>
	<meta charset="utf-8"> 
	<meta name="keywords" content="<?php echo $page_keywords; ?>" />
	<meta name="description" content="<?php echo $page_description; ?>" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />	
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.2.custom.js"></script>
	<link rel="stylesheet" 	href="css/ui-lightness/jquery-ui-1.10.2.custom.css" />
    
</head>
<body>
	<div id="pageWrapper">
		<div id="header">
			
		</div> 
		<div id="nav"> 
		<div  id="menu" > 
			 <ul>
     <li><a href="index.php?page=sinhvien">Sinh Viên</a></li>
     <li><a href="index.php?page=giangvien">Giảng viên</a></li>
     <li><a href="index.php?page=themsv">Thêm SV</a> </li>
     <li><a href="index.php?page=themlop">Thêm Lớp</a></li>
     <li><a href="index.php?page=danhsach">Danh sách Lớp</a></li>
   </ul>
		</div>

	<div style="float:right">
<form action="timsv.php" method="get">
                <input type="text" name="search" />
                <input type="submit" name="ok" value="search" />
            </form></div>
		</div> 
		
		<div id="contentWrapper" > 
			<div id="leftSide" > 
				<div class="group-box" id="danhmuc"> 
						<div class="title">DANH MỤC</div>  
						<div class="group-box-content">
							<ul>								
								 <li><a href="index.php?page=sinhvien">Sinh Viên</a></li>
     <li><a href="index.php?page=giangvien">Giảng viên</a></li>
     <li><a href="index.php?page=themsv">Thêm SV</a> </li>
     <li><a href="index.php?page=themlop">Thêm Lớp</a></li>
     <li><a href="index.php?page=danhsach">Danh sách Lớp</a></li>
								<li> <a href="monhoc.php">Môn Học</a> </li>
							</ul>						
						</div>						
				</div>
				<div class="group-box"> 
						<div class="title">Menu</div> 
						<div class="group-box-content">
						<ul>							
							 <li><a href="index.php?page=sinhvien">Sinh Viên</a></li>
     <li><a href="index.php?page=giangvien">Giảng viên</a></li>
     <li><a href="index.php?page=themsv">Thêm SV</a> </li>
     <li><a href="index.php?page=themlop">Thêm Lớp</a></li>
     <li><a href="index.php?page=danhsach">Danh sách Lớp</a></li>
						</ul>						
						</div>						
				</div>				 
			</div> 
		<div id="mainContent">
		
		<?php 
			if(isset($_GET['page'])){
				$page = $_GET['page'];
				if($page=='sinhvien'){
					include("sinhvien.php");
				}else if($page=='giangvien'){
					include("giangvien.php");
				}else if($page=='themsv'){
                    include("themsv.php");
                }else if($page=='suasv'){
                    include("suasv.php");
                }else if($page=='xoasv'){
                    include("xoasv.php");
                }else if($page=='timsv'){
                    include("timsv.php");
                }else if($page=='danhsach'){
                    include("danhsach.php");
                }else if($page=='themlop'){
                    include("themlop.php");
                }else{
					include("sinhvien.php");
				}
			}
		?>
		
		<?php
    include("connect.php");
?>
<div>
</div>
			 <?php
        // Nếu người dùng submit form thì thực hiện
        if (isset($_REQUEST['ok'])) 
        {
            // Gán hàm addslashes để chống sql injection
            $search = addslashes($_GET['search']);
 
            // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } 
            else
            {
                // Dùng câu lênh like trong sql và sứ dụng toán tử % của php để tìm kiếm dữ liệu chính xác hơn.
                $query = "select * from sinhvien where masv like '%$search%'";
 
                // Kết nối sql

                // Thực thi câu truy vấn
                $sql = mysql_query($query);
 
                // Đếm số đong trả về trong sql.
                $row = mysql_num_rows($sql);
 
                // Nếu có kết quả thì hiển thị, ngược lại thì thông báo không tìm thấy kết quả
                if ($row > 0 && $search != "") 
                {
                    // Dùng $num để đếm số dòng trả về.
                    echo "$row Thông Tin Sinh Viên Tên : <b>$search</b>";
 
                    // Vòng lặp while & mysql_fetch_assoc dùng để lấy toàn bộ dữ liệu có trong table và trả về dữ liệu ở dạng array.
                    echo '<table border="1" cellspacing="0" cellpadding="10" 
					
					<table width="750px" border="0" align="center" style="margin-top:20px;" >
			<tr>
				<td align="center" style="font-weight: bold; width:100px;">Mã Sinh Viên</td>
				<td align="center" style="font-weight: bold;">Tên Sinh Viên</td>
				<td align="center" style="font-weight: bold;">Giới tính</td>
				<td align="center" style="font-weight: bold;">Lớp</td>
				<td align="center" style="font-weight: bold;">Địa chỉ</td>
                <td align="center" style="font-weight: bold;">Sửa</td>
                <td align="center" style="font-weight: bold;">Xóa</td>
			</tr>
					
					
					';
					
                    while ($row = mysql_fetch_assoc($sql)) {
                        echo '<tr>';
                       $masv = $row['masv'];
                        $tensv = $row['tensv'];
                        if($row['gioitinh'] == 1){
                            $gioitinh = "Nam";
                        }else {
                            $gioitinh = "Nữ";
                        }
                        $diachi = $row['diachi'];
                        $tenlop = $row['malop'];

                        echo "<tr>
                            <td>$masv</td>
                            <td>$tensv</td>
                            <td>$gioitinh</td>
                            <td>$tenlop</td>
                            <td>$diachi</td>
                            <td><a href='index.php?page=suasv&masv=".$masv."'>Sửa</a> </td>
                            <td><a href='index.php?page=xoasv&masv=".$masv."' onclick='return deleleAction();'>Xóa</a></td>
                        </tr>";
                        echo '</tr>';
                    }
                    echo '</table>';
                } 
                else {
                    echo "Khong tim thay ket qua!";
                }
            }
        }
        ?>   

		
		</div>	
		
</body>
<?php require "footer.php";