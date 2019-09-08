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
			<div class="event_detail">
				<?php $id=$_GET["id"];
				$sql = "SELECT * FROM events WHERE EventID=$id";
				$result = $conn->query($sql);
				$row = $result->fetch_assoc(); ?>
				<div class="event_title detail_item"><p class="tag">Event Title</p><p class="content"><?php echo $row["Title"] ?></p></div>
				<div class="event_date detail_item"><p class="tag">Event Date</p><p class="content"><?php echo date_format(date_create($row["Data"]),"Y/m/d") ?></p></div>
				<div class="event_time detail_item"><p class="tag">Event Timeslot</p><p class="content"><span><?php echo date_format(date_create($row["BegTime"]),"H:i") ?></span>-<span><?php echo date_format(date_create($row["EndTime"]),"H:i") ?></span></p></div>
				<div class="event_venue detail_item"><p class="tag">Event Venue</p><p class="content"><?php echo $row["Venue"] ?></p></div>
				<div class="detail_list_title">Presentation List</div>
				<div class="list_table">
					
					<?php $sql = "SELECT * FROM presentations WHERE (Data = '".$row["Data"]."' AND (begtime >='".$row['BegTime']."' AND endtime <='".$row['EndTime']."'))";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
						echo '<div class="table_header">
							<div class="th"><span>Title</span></div>
							<div class="th"><span>Speaker</span></div>
							<div class="th"><span>Begin Time</span></div>
							<div class="th"><span>End Time</span></div>
							<div class="th"><span>Abstract</span></div>
							</div>';
						while($row = $result->fetch_assoc()) {
							echo "<div class='table_row'>"
								."<div class='td'><a class='fancybox speaker_d' href='presentation_detail.php?id=".$row['abstract_ID']."' data-fancybox-type='iframe'><span class='ln'>".$row["title"]."</a></div>"
								."<div class='td'><a class='fancybox speaker_d' href='speaker_detail.php?id=".$row["speaker_ID"]."' data-fancybox-type='iframe'><span class='ln'>".$row["speaker_lastname"]."</span>&nbsp;<span class='fn'>".$row["speaker_firstname"]."</span></a></div>"
								."<div class='td'>".$row["begtime"]."</div>"
								."<div class='td'>".$row["endtime"]."</div>"
								."<div class='td'>".$row["abstract"]."</div>"
								."</div>";
						}
					} else {
					    echo "No presentation in this event.";
					}?>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../include/js_function.php');?>

</body>
</html>