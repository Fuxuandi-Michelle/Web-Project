<?php $string = $_SERVER['PHP_SELF'];
if ( preg_match("/\/en/", "$string")){
	$lang = 'en';
} else if ( preg_match("/\/tc/", "$string")){
	$lang = 'tc';
} else if ( preg_match("/\/sc/", "$string")){
	$lang = 'sc';
}

$curPage = $_SERVER['SCRIPT_NAME'];
$langPage = str_replace( '/en/' , '/lang/' , $curPage ) ;
$langPage = str_replace( '/tc/' , '/lang/' , $langPage ) ;
$langPage = str_replace( '/jp/' , '/lang/' , $langPage ) ;
$enPage = str_replace( '/lang/' , '/en/' , $langPage ).'?'.$_SERVER['QUERY_STRING'] ;
$tcPage = str_replace( '/lang/' , '/tc/' , $langPage ).'?'.$_SERVER['QUERY_STRING'] ;
$scPage = str_replace( '/lang/' , '/sc/' , $langPage ).'?'.$_SERVER['QUERY_STRING'] ;

$company_name = "";
$cpRight = "Copyright&copy;2016. ".$company_name.", All Rights Reserved.";
$designBy = '<a href="http://www.easttech.com.hk" target="_blank">Web Design By East Technologies</a>';

//connect to DB
$servername = "mysql.comp.polyu.edu.hk";
$username = "13104501d";
$password = "cdfthhta";
$dbname = "13104501d";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>