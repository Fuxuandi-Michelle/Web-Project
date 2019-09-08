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
				<div class="banner_text">Attraction</div>
			</div>
		</div>
	</div>
	<div id="main">
		<div class="container">
			<div class="main_content">
				<div class="attraction_list">
					<?php $sql = "SELECT Title, URL, Description, Photo  FROM attractions";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					        echo "<div class='attraction_item'>"
					        	."<div class='left_photo'><img src='../img/attraction/". $row["Photo"]."'></div>"
					        	."<div class='right_content'>"
					        	."<div class='attraction_title'>".$row["Title"]."</div>"
					        	."<div class='attraction_link'><a href='".$row["URL"]."''>".$row["URL"]."</a></div>"
					        	."<div class='attraction_desc'>". $row["Description"]."</div>"
					        	."</div>"
					        	."</div>";
					    }
					} else {
					    echo "0 results";
					}?>
				</div>
			</div>
		</div>
	</div>
	<?php include('../include/footer.php');?>
</div>

<?php include('../include/js_function.php');?>

</body>
</html>