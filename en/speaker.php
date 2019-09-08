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
<?php
	$speaker_sql = "SELECT * FROM presentations ";
	$speaker_sql .= 'ORDER BY speaker_ID ';
	$speaker_list = '';
	$result = $conn->query($speaker_sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$speaker_list .= '<div class="table_row"><div class="td">'. $row["speaker_ID"].'</div>';
	    	$speaker_list .= '<div class="td"><a class="fancybox speaker_d"  href="speaker_detail.php?id='.$row["speaker_ID"].'" data-fancybox-type="iframe">'. $row["speaker_lastname"].' '.$row["speaker_firstname"].'</a></div>';
	    	$speaker_list .= '<div class="td"><a class="fancybox speaker_d"  href="presentation_detail.php?id='.$row["abstract_ID"].'" data-fancybox-type="iframe">'. $row["title"].'</a></div>';
	    	$speaker_list .= '<div class="td">'. date_format(date_create($row["Data"]),"Y/m/d").' '.date_format(date_create($row["begtime"]),"H:i").'</div>';
	    	$speaker_list .= '<div class="td">'. $row["affiliation"].'</div></div>';
	    }
	}
?>

<div id="wrap">
	<?php include('../include/top.php');?>
	<div id="banner" class="attraction">
		<div class="container">
			<div class="banner_show">
				<img src="../img/event_banner.jpg">
				<div class="banner_text">Speaker</div>
			</div>
		</div>
	</div>
	<div id="main">
		<div class="container">
			<div class="main_content">
				<div class="speaker_list">
					<div class="topic">Speaker List</div>
					<div class="list_table">
						<div class="table_header">
							<div class="th"><span>Speaker ID</span></div>
							<div class="th"><span>Speaker Name</span></div>
							<div class="th"><span>Presentation</span></div>
							<div class="th"><span>Begin Time</span></div>
							<div class="th"><span>affiliation</span></div>
						</div>
						<?php echo $speaker_list;?>
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