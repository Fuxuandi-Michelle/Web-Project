<?php include('../include/common_top.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include('../include/header.php');?>
<script type="text/javascript" src="../js/jquery.simplyscroll.js"></script>
<link rel="stylesheet" href="../css/jquery.simplyscroll.css" media="all" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
</head>

<body>
<div id="wrap">
	<div id="banner" class="attraction">
		<div class="container">
			<div class="banner_show">
				<img src="../img/attraction_banner.jpg">
				<div class="banner_text">Admin</div>
			</div>
		</div>
	</div>
	<div id="main">
		<div class="container">
			<div class="main_content">
				<div class="survey_content">
					<form action="index1.php" method='post'>
						Username:<br><input type="text" name="username" value="admin"><br>
						Password:<br><input type="password" name="password" value="admin"><br>
						<input type="submit" value="Login">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../include/js_function.php');?>

</body>
</html>
