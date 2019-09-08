<?php
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=survey_report.csv');
	// Create connection
	$conn = new mysqli("mysql.comp.polyu.edu.hk","13104501d","cdfthhta","13104501d");
    $sql = "SELECT * FROM surveyanswers";
	$result = $conn->query($sql);
	$conn->close();

	$fp = fopen('php://output', 'w');

    while($row = $result->fetch_assoc()) {
        fputcsv($fp, $row);
    }
?>