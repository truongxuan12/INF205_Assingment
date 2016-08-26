
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
			
			<h1 id="siteTitle"> Cao Đẳng Thực Hành FPT </h1>
			
		</div> <!-- End of header -->
		
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
		<div id="menu">
  
</div>
<div style="float:right">
<form action="timsv.php" method="get">
                <input type="text" name="search" />
                <input type="submit" name="ok" value="search" />
            </form></div>

		
		</div> <!-- End of Navigation menu --> 
		
		<div id="contentWrapper" > 
			<div id="leftSide" > 
				<div class="group-box" id="danhmuc"> 
						<div class="title">DANH MỤC</div>  
						<div class="group-box-content">
							<ul>								
								 <li><a href="index.php?page=sinhvien">Sinh Viên</a></li>
     <li><a href="index.php?page=giangvien">Giảng viên</a></li>
     <li><a href="index.php?page=themsv">Thêm Sinh Viên</a> </li>
     <li><a href="index.php?page=themlop">Thêm Lớp</a></li>
     <li><a href="index.php?page=danhsach">Danh sach Lớp</a></li>
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
     <li><a href="index.php?page=themsv">Thêm Sinh Viên</a> </li>
     <li><a href="index.php?page=themlop">Thêm Lớp</a></li>
     <li><a href="index.php?page=danhsach">Danh sach Lớp</a></li>
								<li> <a href="monhoc.php">Môn Học</a> </li>
						</ul>						
						</div>						
				</div>				 
			</div> <!-- End of Left Side -->
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
		
		</div>	
		
</body>
<?php require "footer.php";