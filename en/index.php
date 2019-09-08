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
	$index_event_sql = "SELECT EventID, Title, Data FROM events";
	$index_event_list = '';
	$result = $conn->query($index_event_sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$index_event_title = $row['Title'];
	    	$index_event_date = $row['Data'];
	    	$index_event_list .= '<li><a class="fancybox event_d" href="event_detail.php?id='.$row["EventID"].'" data-fancybox-type="iframe"><div class="index_item"><p class="item_title">'.$index_event_title.'</p>';
	    	$index_event_list .= '<p class="item_content">'.$index_event_date.'</p></div></a></li>';
	    }
	}

	$index_pre_sql = "SELECT abstract_ID, title, Data, begtime FROM presentations";
	$index_pre_list = '';
	$result = $conn->query($index_pre_sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$index_pre_title = $row['title'];
	    	$index_pre_date = $row['Data'].' '.$row['begtime'];
	    	$index_pre_list .= '<li><a class="fancybox event_d" href="presentation_detail.php?id='.$row["abstract_ID"].'" data-fancybox-type="iframe"><div class="index_item"><p class="item_title">'.$index_pre_title.'</p>';
	    	$index_pre_list .= '<p class="item_content">'.$index_pre_date.'</p></div></a></li>';
	    }
	}

	$index_speaker_sql = "SELECT speaker_ID, speaker_lastname, speaker_firstname, affiliation FROM presentations";
	$index_speaker_list = '';
	$result = $conn->query($index_speaker_sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	    	$index_speaker_name = $row['speaker_lastname'].' '.$row['speaker_firstname'];
	    	$index_speaker_affiliation = $row['affiliation'];
	    	$index_speaker_list .= '<li><a class="fancybox event_d" href="speaker_detail.php?id='.$row["speaker_ID"].'" data-fancybox-type="iframe"><div class="index_item"><p class="item_title">'.$index_speaker_name.'</p>';
	    	$index_speaker_list .= '<p class="item_content">'.$index_speaker_affiliation.'</p></div></a></li>';
	    }
	}
?>

<div id="wrap">
	<?php include('../include/top.php');?>
	<?php include('../include/home_banner.php');?>
	<div id="main">
		<div class="container">
			<div class="main_content">
				<div class="index_event scroll_list">
					<div class="title">EVENT</div>
					<div class="content">
						<ul class="scroller">
							<?php echo $index_event_list;?>
						</ul>
					</div>
				</div>
				<div class="index_abstract scroll_list">
					<div class="title">PRESENTATION</div>
					<div class="content">
						<ul class="scroller">
							<?php echo $index_pre_list;?>
						</ul>
					</div>
				</div>
				<div class="index_speaker scroll_list">
					<div class="title">SPEAKER</div>
					<div class="content">
						<ul class="scroller">
							<?php echo $index_speaker_list;?>
						</ul>
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