<html>
<head>
	<title>Testing Number</title>
	
</head>
<body>
	<?php
		$sodong = 1001;
		$d= $sodong+1;
		if($sodong<10){
			$dem = "11GV000".$d;
		}else if($sodong>=10 && $sodong<99){
			$dem = "11GV00".$d;
			
		}
		else if($sodong>=100 && $sodong<999){
			$dem = "11GV0".$d;
			
		}else if($sodong>=1000){
			$dem = "11GV".$d;
		}
		echo $dem;
	?>
</body>
</html>