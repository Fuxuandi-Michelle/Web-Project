<?php
	$keyword = $_POST['keyword'];
	$keyword_final = "%".$keyword."%";
	$result_list = '';
	if($_POST['search_option'] == "1"){
		//search for event
		$result_list .= '<div class="table_header">
							<div class="th"><span>Title</span></div>
							<div class="th"><span>Date</span></div>
							<div class="th"><span>Begin Time</span></div>
							<div class="th"><span>End Time</span></div>
							<div class="th"><span>Venue</span></div>
						</div>';
		$sql = "SELECT EventID, Title, Data, BegTime, EndTime, Venue  FROM events ";
		$sql .= "WHERE EventID LIKE '$keyword_final' ";
		$sql .= "OR Data LIKE '$keyword_final' ";
		$sql .= "OR BegTime LIKE '$keyword_final' ";
		$sql .= "OR EndTime LIKE '$keyword_final' ";
		$sql .= "OR title LIKE '$keyword_final' ";
		$sql .= "OR Venue LIKE '$keyword_final' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        $result_list.= "<div class='table_row'>"
		        	."<div class='td'><a class='fancybox event_d' href='event_detail.php?id=".$row["EventID"]."' data-fancybox-type='iframe'>". $row["Title"]."</a></div>"
		        	."<div class='td'>". date_format(date_create($row["Data"]),"Y/m/d")."</div>"
		        	."<div class='td'>". date_format(date_create($row["BegTime"]),"H:i")."</div>"
		        	."<div class='td'>". date_format(date_create($row["EndTime"]),"H:i")."</div>"
		        	."<div class='td'>". $row["Venue"]."</div>"
		        	."</div>";
		    }
		} else {
		    $result_list .= "<div class='table_row'>"
		    ."<div class='td'>0 results</div>"
		    ."</div>";
		}
	}
	else if($_POST['search_option'] == "2"){
		//search for presentation
		$result_list .= '<div class="table_header">
							<div class="th">Title</div>
							<div class="th">Speaker</div>
							<div class="th">Presentation Time</div>
							<div class="th">Abstract</div>
						</div>';
		$sql = "SELECT title, speaker_lastname, speaker_firstname, begtime, endtime, abstract  FROM presentations ";
		$sql .= "WHERE abstract_ID LIKE '$keyword_final' ";
		$sql .= "OR Type LIKE '$keyword_final' ";
		$sql .= "OR title LIKE '$keyword_final' ";
		$sql .= "OR speaker_lastname LIKE '$keyword_final' ";
		$sql .= "OR speaker_firstname LIKE '$keyword_final' ";
		$sql .= "OR speaker_ID LIKE '$keyword_final' ";
		$sql .= "OR photo_jpg_filename LIKE '$keyword_final' ";
		$sql .= "OR affiliation LIKE '$keyword_final' ";
		$sql .= "OR begtime LIKE '$keyword_final' ";
		$sql .= "OR endtime LIKE '$keyword_final' ";
		$sql .= "OR Data LIKE '$keyword_final' ";
		$sql .= "OR biography LIKE '$keyword_final' ";
		$sql .= "OR abstract LIKE '$keyword_final' ";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		        $result_list .= "<div class='table_row'>"
		        	."<div class='td'>". $row["title"]."</div>"
		        	."<div class='td'>". $row["speaker_lastname"]." ".$row["speaker_firstname"]."</div>"
		        	."<div class='td'>". date_format(date_create($row["begtime"]),"H:i")."-".date_format(date_create($row["endtime"]),"H:i")."</div>"
		        	."<div class='td'>". $row["abstract"]."</div>"
		        	."</div>";
		    }
		} else {
		    $result_list.= "<div class='table_row'>"
		    ."<div class='td'>0 results</div>"
		    ."</div>";
		}
	}
	else if($_POST['search_option'] == "3"){
		//search for speaker
		$result_list .= '<div class="table_header">
							<div class="th"><span>Speaker ID</span></div>
							<div class="th"><span>Speaker Name</span></div>
							<div class="th"><span>Presentation</span></div>
							<div class="th"><span>Begin Time</span></div>
							<div class="th"><span>affiliation</span></div>
						</div>';
		$speaker_sql = "SELECT speaker_ID, speaker_lastname, speaker_firstname, title, begtime, Data, affiliation FROM presentations ";
		$speaker_sql .= "WHERE abstract_ID LIKE '$keyword_final' ";
		$speaker_sql .= "OR Type LIKE '$keyword_final' ";
		$speaker_sql .= "OR title LIKE '$keyword_final' ";
		$speaker_sql .= "OR speaker_lastname LIKE '$keyword_final' ";
		$speaker_sql .= "OR speaker_firstname LIKE '$keyword_final' ";
		$speaker_sql .= "OR speaker_ID LIKE '$keyword_final' ";
		$speaker_sql .= "OR photo_jpg_filename LIKE '$keyword_final' ";
		$speaker_sql .= "OR affiliation LIKE '$keyword_final' ";
		$speaker_sql .= "OR begtime LIKE '$keyword_final' ";
		$speaker_sql .= "OR endtime LIKE '$keyword_final' ";
		$speaker_sql .= "OR Data LIKE '$keyword_final' ";
		$speaker_sql .= "OR biography LIKE '$keyword_final' ";
		$speaker_sql .= "OR abstract LIKE '$keyword_final' ";
		$speaker_sql .= 'ORDER BY speaker_ID ';
		$result = $conn->query($speaker_sql);
		if ($result->num_rows > 0) {
		    // output data of each row
		    while($row = $result->fetch_assoc()) {
		    	$result_list .= '<div class="table_row"><div class="td">'. $row["speaker_ID"].'</div>';
		    	$result_list .= '<div class="td"><a class="fancybox speaker_d"  href="speaker_detail.php?id='.$row["speaker_ID"].'" data-fancybox-type="iframe">'. $row["speaker_lastname"].' '.$row["speaker_firstname"].'</a></div>';
		    	$result_list .= '<div class="td">'. $row["title"].'</div>';
		    	$result_list .= '<div class="td">'. date_format(date_create($row["Data"]),"Y/m/d").' '.date_format(date_create($row["begtime"]),"H:i").'</div>';
		    	$result_list .= '<div class="td">'. $row["affiliation"].'</div></div>';
		    }
		}
	}
?>