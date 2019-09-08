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
	$speaker_id = $_GET['id'];
	$speaker_detail_sql = "SELECT * FROM presentations WHERE speaker_ID=$speaker_id";
	$result = $conn->query($speaker_detail_sql);
	if ($result->num_rows > 0) {
	    // output data of each row
	    $row = $result->fetch_assoc();
	    $speaker_name = $row['speaker_lastname'].' '.$row['speaker_firstname'];
	    $affiliation = $row['affiliation'];
	    $presentation_title = $row['title'];
	    $begin_time = $row['Data'].' '.$row['begtime'];
	    $abstract = $row['abstract'];
	    $biography = $row['biography'];
	    $speaker_img = $row['photo_jpg_filename'];
	}
	$speaker_detail_sql2 = "SELECT * FROM authorsabstracts WHERE authorID=$speaker_id ";
	$result = $conn->query($speaker_detail_sql2);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		$speaker_type_temp = $row['type_PolyU'];
		if($speaker_type_temp=="n"){
			$speaker_type = "non-PolyU";
		}else if($speaker_type_temp=="y"){
			$speaker_type = "PolyU";
		}
	}
?>


<div id="main">
	<div class="container">
		<div class="main_content">
			<div class="speaker_detail">
				<div class="left_photo"><img src="../img/speaker/<?php echo $speaker_img?>"></div>
				<div class="right_info">
					<div class="speaker_name detail_item"><p class="tag">Speaker Name</p><p class="content"><?php echo $speaker_name;?></p></div>
					<div class="speaker_aff detail_item"><p class="tag">Affiliation:</p><p class="content"><?php echo $affiliation;?></p></div>
					<div class="speaker_aff detail_item"><p class="tag">Speaker ID:</p><p class="content"><?php echo $speaker_id;?></p></div>
					<div class="speaker_aff detail_item"><p class="tag">Speaker Type:</p><p class="content"><?php echo $speaker_type;?></p></div>
				</div>
				<div class="speaker_pre detail_item"><p class="pre_tag">Presentation:</p>
					<div class="content"><p class="detail_item_topic">Title:</p><p class="word"><?php echo $presentation_title;?></p></div>
					<div class="content"><p class="detail_item_topic">Begin Time</p><p class="word"><?php echo $begin_time;?></p></div>
					<div class="content"><p class="detail_item_topic">Abstract:</p><p class="word"><?php echo $abstract;?></p></div>
				</div>
				<div class="speaker_bio">
					<p class="bio_title">Biography:</p>
					<p class="bio_content"><?php echo $biography;?></p>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>