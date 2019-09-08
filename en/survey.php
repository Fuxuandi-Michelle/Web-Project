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
<script type="text/javascript">
	$(document).ready(function(){
		$('.item_1 .question_choices input[name=q1]').click(function(){
			var choice = $('.item_1 .question_choices input[name=q1]:checked').attr("id");
			if(choice == "q1_A"){
				$(this).parents('.question_item').children('.hidden_choice').css("display","inline-block");
			}else if(choice == "q1_B"){
				$(this).parents('.question_item').children('.hidden_choice').css("display","none");
			}
		});
		$('.item_3 .question_choices input[name=q3]').click(function(){
			var choice = $('.item_3 .question_choices input[name=q3]:checked').attr("id");
			if(choice == "q3_E"){
				$(this).parents('.question_item').children('.hidden_choice').css("display","inline-block");
			}else{
				$(this).parents('.question_item').children('.hidden_choice').css("display","none");
			}
		});
	});
</script>

<?php
	$survey_sql = "SELECT * FROM surveyquestions ";
	$survey_sql .= "WHERE type = 'MC' ";
	$survey_list = '';
	$count = 6;
	$result = $conn ->query($survey_sql);
	while( $row = $result->fetch_assoc()){
		$question_content = $row['Contents'];
		$survey_list .= '<div class="question_item item_'.$count.'"><p class="question_content">'.$count.'. '.$question_content.'</p>';
		$survey_list .= '<div class="question_choices"><input type="radio" id="q'.$count.'_A" name="q'.$count.'" class="question_radio" value="A"><div class="choice">A. Very Satisified</div></div>';
		$survey_list .= '<div class="question_choices"><input type="radio" id="q'.$count.'_B" name="q'.$count.'" class="question_radio" value="B"><div class="choice">B. Somewhat Satisified</div></div>';
		$survey_list .= '<div class="question_choices"><input type="radio" id="q'.$count.'_C" name="q'.$count.'" class="question_radio" value="C"><div class="choice">C. Neutral</div></div>';
		$survey_list .= '<div class="question_choices"><input type="radio" id="q'.$count.'_D" name="q'.$count.'" class="question_radio" value="D"><div class="choice">D. Somewhat Dissatisfied</div></div>';
		$survey_list .= '<div class="question_choices"><input type="radio" id="q'.$count.'_E" name="q'.$count.'" class="question_radio" value="E"><div class="choice">E. Very Dissatifiied</div></div>';
		$survey_list .= '</div>';
		$count++;
	}

	$survey_sql = "SELECT * FROM surveyquestions ";
	$survey_sql .= "WHERE type = 'open' ";
	$survey_open_list = '';
	$result = $conn ->query($survey_sql);
	while( $row = $result->fetch_assoc()){
		$question_content = $row['Contents'];
		$survey_list .= '<div class="question_item item_'.$count.'"><p class="question_content">'.$count.'. '.$question_content.'</p>';
		$survey_list .= '<div class="open_answer"><textarea id="q'.$count.'_answer" name="q'.$count.'" class="open_textarea"></textarea></div></div>';
		$count++;
	}

?>

<div id="wrap">
	<?php include('../include/top.php');?>
	<div id="banner" class="attraction">
		<div class="container">
			<div class="banner_show">
				<img src="../img/event_banner.jpg">
				<div class="banner_text">Survey</div>
			</div>
		</div>
	</div>
	<div id="main">
		<div class="container">
			<div class="main_content">
				<div class="survey_content">
					<form class="survey_form" name="survey" id="survey_form" action="survey_handler.php" target="_self" method="post">
						<div class="survey_title">Online Survey</div>
						<div class="email_reg">
							<p class="tag">Email Address: <input type="text" name="email" id="email" class="text_input"></p>
							<p class="hint">(One email can only submit one survey.)</p>
						</div>
						<div class="question_list">
							<div class="question_item item_1">
								<p class="question_content">1. Have you ever attended our conference before? (If yes, please specify which year) </p>
								<div class="question_choices">
									<input type="radio" id="q1_A" name="q1" class="question_radio" value="A">
									<div class="choice">A. Yes</div>
								</div>
								<div class="question_choices">
									<input type="radio" id="q1_B" name="q1" class="question_radio" value="B">
									<div class="choice">B. No</div>
								</div>
								<div class="hidden_choice question_1"><input type="text" id="q1_h" name="q1_hidden"></div>
							</div>
							<div class="question_item item_2">
								<p class="question_content">2. How did you hear or learn about this conference? </p>
								<div class="question_choices">
									<input type="radio" id="q2_A" name="q2" class="question_radio" value="A">
									<div class="choice">A. Ad in [PRINT MATERIAL] </div>
								</div>
								<div class="question_choices">
									<input type="radio" id="q2_B" name="q2" class="question_radio" value="B">
									<div class="choice">B. Conference Website </div>
								</div>
								<div class="question_choices">
									<input type="radio" id="q2_C" name="q2" class="question_radio" value="C">
									<div class="choice">C. Referral </div>
								</div>
								<div class="question_choices">
									<input type="radio" id="q2_D" name="q2" class="question_radio" value="D">
									<div class="choice">D. Email / Newsletter </div>
								</div>
								<div class="question_choices">
									<input type="radio" id="q2_E" name="q2" class="question_radio" value="E">
									<div class="choice">E. Social Media</div>
								</div>
							</div>
							<div class="question_item item_3">
								<p class="question_content">3. Please specify the main reason for attending this conference? </p>
								<div class="question_choices">
									<input type="radio" id="q3_A" name="q3" class="question_radio" value="A">
									<div class="choice">A. Content </div>
								</div>
								<div class="question_choices">
									<input type="radio" id="q3_B" name="q3" class="question_radio" value="B">
									<div class="choice">B. Networking </div>
								</div>
								<div class="question_choices">
									<input type="radio" id="q3_C" name="q3" class="question_radio" value="C">
									<div class="choice">C. Personal growth & development  </div>
								</div>
								<div class="question_choices">
									<input type="radio" id="q3_D" name="q3" class="question_radio" value="D">
									<div class="choice">D. Speakers </div>
								</div>
								<br/>
								<div class="question_choices">
									<input type="radio" id="q3_E" name="q3" class="question_radio" value="E">
									<div class="choice">E. Other:</div>
								</div>
								<div class="hidden_choice question_3"><input type="text" id="q3_h"></div>
							</div>
							<div class="question_item item_4">
								<p class="question_content">4. Did the conference fulfill your reason for attending? </p>
								<div class="question_choices">
									<input type="radio" id="q4_A" name="q4" class="question_radio" value="A">
									<div class="choice">A. Yes – Absolutely </div>
								</div>
								<div class="question_choices">
									<input type="radio" id="q4_B" name="q4" class="question_radio" value="B">
									<div class="choice">B. Yes -- But not to my full extent  </div>
								</div>
								<div class="question_choices">
									<input type="radio" id="q4_C" name="q4" class="question_radio" value="C">
									<div class="choice">C. No </div>
								</div>
							</div>
							<div class="question_item item_5">
								<p class="question_content">5. Would you recommend this conference to others?  </p>
								<div class="question_choices">
									<input type="radio" id="q5_A" name="q5" class="question_radio" value="A">
									<div class="choice">A. Yes </div>
								</div>
								<div class="question_choices">
									<input type="radio" id="q5_B" name="q5" class="question_radio" value="B">
									<div class="choice">B. Maybe </div>
								</div>
							</div>
							<?php echo $survey_list;?>
						</div>
						<div class="btn_area">
							<input class="survey_btn" type="submit" value="SUBMIT">
							<input class="survey_btn" type="reset" value="RESET">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include('../include/footer.php');?>
</div>

<?php include('../include/js_function.php');?>

</body>
</html>