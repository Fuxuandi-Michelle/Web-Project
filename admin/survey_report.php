<?php include('../include/common_top.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include('../include/header.php');?>
<script type="text/javascript" src="../js/jquery.simplyscroll.js"></script>
<link rel="stylesheet" href="../css/jquery.simplyscroll.css" media="all" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
	<?php 
		echo "google.charts.load('current', {packages:['corechart']});
		      google.charts.setOnLoadCallback(drawPieCharts);
		      function drawPieCharts(){";
		for ($i=1;$i<=11;$i++){
			$qx='q'.$i;
			echo "var data = google.visualization.arrayToDataTable([['$qx','answers'],";
      		$sql = "SELECT $qx, COUNT(*) AS count FROM surveyanswers GROUP BY $qx";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			    	if (is_null($row[$qx])){
			    		$row[$qx]='N/A';
			    	}
			        echo "['".$row[$qx]."',".$row['count']."],";
			    }
			}
			echo "]);";
			echo "var options = {
		          title: '$qx Pie Chart',
		          is3D: true,
		        };
		        var chart = new google.visualization.PieChart(document.getElementById('piechart_$qx'));
		        chart.draw(data, options);";
		}
		echo "}";
	?>
	<?php 
		echo "google.charts.load('current', {packages:['corechart']});
		      google.charts.setOnLoadCallback(drawBarCharts);
		      function drawBarCharts(){";
		for ($i=1;$i<=11;$i++){
			$qx='q'.$i;
			echo "var data = google.visualization.arrayToDataTable([['$qx','answers'],";
      		$sql = "SELECT $qx, COUNT(*) AS count FROM surveyanswers GROUP BY $qx";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			    while($row = $result->fetch_assoc()) {
			    	if (is_null($row[$qx])){
			    		$row[$qx]='N/A';
			    	}
			        echo "['".$row[$qx]."',".$row['count']."],";
			    }
			}
			echo "]);";
			echo "var options = {
		          title: '$qx Bar Chart',
		          is3D: true,
		          legend: { position: 'none' },
		        };
		        var chart = new google.visualization.BarChart(document.getElementById('barchart_$qx'));
		        chart.draw(data, options);";
		}
		echo "}";
	?>
</script>
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
					<a href = "survey_report_export.php">Download Report in CSV Format</a><br>
					<a href = "index.php">Logout</a>
					<div style="position: relative;width:900px;height:4400px">
						<div style="position:absolute;left:0;width:450px">
							<?php for($x=1; $x<=11; $x++){?>
						    <div id="piechart_q<?php echo $x;?>" style="width: 600px; height: 400px;"></div>
						    <?php }?>
						</div>
						<div style="position:absolute;right:0;width:450px">
							<?php for($x=1; $x<=11; $x++){?>
						    <div id="barchart_q<?php echo $x;?>" style="width: 450px; height: 400px;"></div>
						    <?php }?>
						</div>
					</div>
				    <a href = "index.php">Logout</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php include('../include/js_function.php');?>

</body>
</html>