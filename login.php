
<!doctype html>
<html>
<head>
	
	
	
	<title><?php echo $page_title; ?></title>
	<meta charset="utf-8"> 
	<meta name="keywords" content="<?php echo $page_keywords; ?>" />
	<meta name="description" content="<?php echo $page_description; ?>" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />	
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.10.2.custom.js"></script>
	<link rel="stylesheet" 	href="css/ui-lightness/jquery-ui-1.10.2.custom.css" />
<!-- 	<link rel="stylesheet" 	href="css/jmetro/jquery-ui-1.10.2.custom.css" /> -->
    
</head>
<body>
	<div id="pageWrapper">
		<div id="header">
			<img id="logo" src="<?php echo IMAGES_DIR;?>/logo.png" alt="Khoa Khoa Học Tự Nhiên - Đai Học Cần Thơ" />
			<h1 id="siteTitle"> Hệ Thống Quản Lý Đào Tạo </h1>
			<img id="logo2" src="<?php echo IMAGES_DIR;?>/logo2.png" />		
		</div> <!-- End of header -->
		
		<div id="nav"> 
		<div  id="menu" > 
			<a href="index.php?page=sinhvien">Sinh Viên</a>
				<a href="index.php?page=giangvien">Giảng viên</a>
				<a href="index.php?page=themsv">Thêm SV</a>
				<a href="index.php?page=timsv">timsv SV</a>
				<a href="index.php?page=themlop">them lop</a>
				<a href="index.php?page=danhsach">Danh sach</a> 
		</div>

		
		<div  id="login" > 
			<?php 
				// lấy cookie đăng nhập tự động
				 
				if (isset($_SESSION["loggedin"])){
					echo "Xin chào ". $_SESSION["HoTen"];
					echo " | <a href='login.php?logut' id='aLogout'>Thoát</a>";	
				}else {
					
					echo "<a href='login.php'>Đăng nhập</a>";
				}
			?>
		</div>
		</div> <!-- End of Navigation menu --> 
		
		<div id="contentWrapper" > 
			<div id="leftSide" > 
				<div class="group-box" id="danhmuc"> 
						<div class="title">DANH MỤC</div>  
						<div class="group-box-content">
							<ul>								
								<li> <a href="Themsv.php">Them Sinh Vien</a> </li>
								<li> <a href="giangvien.php">Giảng Viên</a> </li>
								<li> <a href="sinhvien.php">Sinh Viên</a> </li>
								<li> <a href="themlop.php">Ngành Đào Tạo</a> </li>
								<li> <a href="themlop.php">Lớp Chuyên Ngành</a> </li>
								<li> <a href="suasv.php">suasv</a> </li>
								<li> <a href="monhoc.php">Môn Học</a> </li>
							</ul>						
						</div>						
				</div>
				<div class="group-box"> 
						<div class="title">Menu</div> 
						<div class="group-box-content">
						<ul>							
							<li> <a href="index.php">Link 1</a> </li>
							<li> <a href="index.php">Link 2</a> </li>
							<li> <a href="index.php">Link 3</a> </li>
							<li> <a href="index.php">Link 4</a> </li>
							<li> <a href="index.php">Link 5</a> </li>
							<li> <a href="index.php">Link 6</a> </li>
							<li> <a href="index.php">Link 7</a> </li>
						</ul>						
						</div>						
				</div>				 
			</div> <!-- End of Left Side -->
		<div id="mainContent">
		
		<div class="group-box">
	
	<div class="title">Đăng nhập</div> 
	<div align="center">
	<?php 
	// nếu nút Logout được nhấn
	if (isset($_GET["logut"])){
		// hủy bỏ session
		unset($_SESSION["loggedin"]);
		unset($_SESSION["User"]);
		unset($_SESSION["HoTen"]);
		unset($_SESSION["Type"]);
		// xóa cookies
		setcookie("User","",time()-3600);
		setcookie("Password","",time()-3600);
		setcookie("Type","",time()-3600);
		// chuyển đến trang login 
		header("location: login.php");
		exit();
	}
	
	// trong trường hợp đã đăng nhập, chuyển đến trang index
	if(isset($_SESSION["loggedin"])){
		header("location: index.php");
		exit();
	} 
		
	
	
	
	if (isset($_POST["btnDangNhap"])){
		$user = $_POST["txtTenDangNhap"];
		$pass = $_POST["txtMatKhau"];
		$type = $_POST["rdodn"];
		
		if ($type == "sv"){
			$sql = "SELECT MaSV as User, concat(Holot,' ', Ten) as HoTen, MatKhau ".
				" FROM dbo_sinhvien WHERE MaSV='".$user."' ".
					" AND MatKhau ='".md5($pass)."'";
		}else{
			$sql = "SELECT MaGV as User, concat(Holot,' ', Ten) as HoTen, MatKhau  ".
					" FROM dbo_giangvien WHERE MaGV='".$user."' ".
					" AND MatKhau ='".md5($pass)."'";
		}
		
		// nếu xác thực thành công
		if($row = $result->fetch_array()){	
			// tạo session		 
			$_SESSION["loggedin"]= true;
			$_SESSION["User"] = $row["User"];
			$_SESSION["HoTen"] = $row["HoTen"];
			$_SESSION["Type"] = $type;
		
			header("location: index.php");
				
		}else{ // trường hợp nhập username và password không đúng
			
			// hiển thị thông báo lỗi, link đến trang đăng nhập lại
			echo "<div class='error'><br><div align='center'>Tên đăng nhập và mật khẩu không hợp lệ. <br>";
			echo " <a href='".$_SERVER["PHP_SELF"]."'> Thử lại </a> </div> </div><br>";
		}
	}else { // trong trường hợp lần đầu tiên mở form hoặc đã nhấn logout thì hiển thị form đăng nhập	
	?>	
	<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post" name="frmLogin">
		<br>		 
		<table class=frm>
		<tr> 
			<td align="right"><label for="txtTenDangNhap"> Tên Đăng nhập: </label> </td>
			<td align="left"><input type="text" name="txtTenDangNhap" placeholder="tên đăng nhập"> </td>
		</tr>
		<tr>
			<td align="right"> <label for="txtMatKhau"> Mật khẩu: </label></td>
			 <td align="left"> <input type="password" name="txtMatKhau" placeholder="mật khẩu"> <br /> </td>
		</tr>		
		<tr>
			<td>  &nbsp; </td>				
			<td> <input type="radio" name="rdodn" value="sv" checked>Sinh Viên 
				 <input type="radio" name="rdodn" value="gv" >Giảng Viên 
			  </td>
		</tr>
		<tr>
			<td> &nbsp; </td> 
			<td><input type="checkbox" name="chkNhoMK" value=1> Nhớ mật khẩu?  </td>
		</tr>
		<tr>
			<td> &nbsp; </td> 
			<td> <button type="submit" name="btnDangNhap" class="btn" >Đăng nhập</button></td>
		</tr>
		</table>		 
		<br>
	</form>	
<?php 
	} // else 
	
?>
	</div>
</div>
		</div>		
</body>