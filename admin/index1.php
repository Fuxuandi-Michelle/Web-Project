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
					<?php 
						$password=$_POST['password'];
						$hashed=hash('sha256',$password);
						$stmt = $conn->prepare("SELECT * FROM user WHERE username = ? and password = ?");
						$stmt->bind_param('ss',$_POST['username'],$hashed);

						$stmt->execute();
						$result = $stmt->get_result();

						if($result->num_rows > 0) { 
						    echo "Welcome!<br><br><a href='survey_report.php'>View Survey Report</a><br><br><a href='index.php'>Logout</a>";
						} else { 
						    echo "Wrong username or password!<br><br><a href='index.php'>Back</a>";
						} 
					?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../include/js_function.php');?>

</body>
</html>