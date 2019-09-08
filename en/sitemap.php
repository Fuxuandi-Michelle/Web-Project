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
	<div id="banner" class="about_us">
		<div class="container">
			<div class="banner_show">
				<img src="../img/about_us_banner.jpg">
				<div class="banner_text">Sitemap</div>
			</div>
		</div>
	</div>
	<div id="main">
		<div class="container">
			<div class="main_content">
				<div class="survey_content">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="about_us.php">About Us</a></li>
						<li>Conference
							<ul>
								<li><a href="event.php">Event</a></li>
								<li><a href="abstract.php">Abstract</a></li>
								<li><a href="speaker.php">Speaker</a></li>
							</ul>
						</li>
						<li><span>Locations
							<ul class=>
								<li><a href="maps.php"><span>Maps</a></li>
								<li><a href="venues.php">Venues</a></li>
							</ul>
						</li>
						<li><a href="attraction.php">Attraction</a></li>
						<li><a href="survey.php">Survey</a></li>
						<li>Thanks
							<ul>
								<li><a href="acknowledgement.php">Acknowledgement</a></li>
								<li><a href="sponsorship.php">Sponsorship</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<?php include('../include/footer.php');?>
</div>

<?php include('../include/js_function.php');?>

</body>
</html>