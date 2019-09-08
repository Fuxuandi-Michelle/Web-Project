<?php 
include('../include/common_top.php');
include('general_search.php');
?>
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
				<img src="../img/event_banner.jpg">
				<div class="banner_text">Search</div>
			</div>
		</div>
	</div>
	<div id="main">
		<div class="container">
			<div class="main_content">
				<div class="event_list">
					<div class="topic">Search Result</div>
					<div class="list_table">
						<?php echo $result_list;?>
					</div>
					<div class="page">
						<div class="prev_page"><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></div>
						<?php for($z=1; $z<=6; $z++){?>
						<div class="page_num"><a href="#"><?php echo $z;?></a></div>
						<?php }?>
						<div class="next_page"><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include('../include/footer.php');?>
</div>

<?php include('../include/js_function.php');?>

</body>
</html>