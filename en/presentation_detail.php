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

<div id="main">
	<div class="container">
		<div class="main_content">
			<div class="speaker_detail">
				<?php
					$id = $_GET['id'];
					$sql = "SELECT * FROM presentations WHERE abstract_ID=$id";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					    $row = $result->fetch_assoc();
					}
				?>
				<div class="left_photo"><img src="../img/speaker/<?php echo $row['photo_jpg_filename'] ?>"></div>
				<div class="right_info">
					<div class="speaker_name detail_item"><p class="tag">Presen Title:</p><p class="content"><?php echo $row['title'];?></p></div>
					<div class="speaker_aff detail_item"><p class="tag">Type:</p><p class="content"><?php echo $row['Type'];?></p></div>
					<div class="speaker_aff detail_item"><p class="tag">Date:</p><p class="content"><?php echo $row['Data'];?></p></div>
					<div class="speaker_aff detail_item"><p class="tag">Time:</p><p class="content"><?php echo date_format(date_create($row["begtime"]),"H:i").' - '.date_format(date_create($row["endtime"]),"H:i");?></p></div>
				</div>
				<div class="speaker_pre detail_item"><p class="pre_tag">Speaker:</p>
					<div class="content"><p class="detail_item_topic">Name:</p><p class="word"><?php echo $row['speaker_lastname'].' '.$row['speaker_firstname'];?></p></div>
					<div class="content"><p class="detail_item_topic">Affiliation:</p><p class="word"><?php echo $row['affiliation'];?></p></div>
					<div class="content"><p class="detail_item_topic">Biography:</p><p class="word"><?php echo $row['biography'];?></p></div>
				</div>
				<div class="speaker_bio">
					<p class="bio_title">Abstract:</p>
					<p class="bio_content"><?php echo $row['abstract'];?></p>
				</div>
				<?php
					$sql = "SELECT * FROM authorsabstracts WHERE abstract_ID=$id";
					$result = $conn->query($sql);
					echo '<div class="speaker_pre detail_item"><p class="pre_tag">Authors:</p>';
					if ($result->num_rows >0){
						while($row = $result->fetch_assoc()) {
							echo "<div class='content'><p class='detail_item_topic'>Name:</p><p class='word'>".$row['lastname'].' '.$row['firstname']."</p></div>"
							."<div class='content'><p class='detail_item_topic'>Is PolyU?:</p><p class='word'>".$row['type_PolyU']."</p></div>";
						}
					}
					echo '</div>'
				?>
			</div>
		</div>
	</div>
</div>

</body>
</html>