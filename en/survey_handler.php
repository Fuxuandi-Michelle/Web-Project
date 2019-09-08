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
	<?php include('../include/top.php');?>
	<div id="banner" class="attraction">
		<div class="container">
			<div class="banner_show">
				<img src="../img/attraction_banner.jpg">
				<div class="banner_text">Survey</div>
			</div>
		</div>
	</div>
	<div id="main">
		<div class="container">
			<div class="main_content">
				<div class="survey_content">
					<?php 
						$email=$_POST['email'];
						$sql = "SELECT * FROM surveyanswers WHERE email='$email'";
						$result = $conn->query($sql);
						if ($result->num_rows == 0) {
							$sql = "INSERT INTO surveyanswers (email) VALUES ('$email')";
							if ($conn->query($sql) ===TRUE){
								echo "Thank you for taking this survey! Your answers have been saved.<br><br>";
								foreach ($_POST as $key => $value){
									if ($key != 'email'){
										$sql = "UPDATE surveyanswers SET $key='$value' WHERE email='$email'";
										$conn->query($sql);
									}
								}
							}
						}else{
							echo "Email exists! Try another email address.<br><br>";
						}
					?>
					<a href='survey.php'>Back to Survey</a>
				</div>
			</div>
		</div>
	</div>
	<?php include('../include/footer.php');?>
</div>

<?php include('../include/js_function.php');?>

</body>
</html>
