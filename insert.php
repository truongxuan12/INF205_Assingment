<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<form action="test_insert.php" method="post"> 
<input type="checkbox" name="chk[]" value="1"/>Toán <input name="sotiet1" value="<?php if(isset($_POST['sotiet'])) echo $_POST['sotiet']; else echo ""; ?>" type="text" />
<input type="checkbox" name="chk[]" value="2"/>Văn 	<input name="sotiet2" value="<?php if(isset($_POST['sotiet'])) echo $_POST['sotiet']; else echo ""; ?>" type="text" />
<input type="checkbox" name="chk[]" value="3"/>Anh Văn  <input name="sotiet3" value="<?php if(isset($_POST['sotiet'])) echo $_POST['sotiet']; else echo ""; ?>" type="text" />
<input type="checkbox" name="chk[]" value="4"/>Hóa học <input name="sotiet4"  value="<?php if(isset($_POST['sotiet'])) echo $_POST['sotiet']; else echo ""; ?>" type="text" />
<input type="checkbox" name="chk[]" value="5"/>Sinh học <input name="sotiet5" value="<?php if(isset($_POST['sotiet'])) echo $_POST['sotiet']; else echo ""; ?>" type="text" />
<input type="submit" name="submit" value="submit" /> 
</form>
