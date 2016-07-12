<?php
  session_start();
/*
  if (!isset($_SESSION['started'])) { 
    header('Location: /');
  } else if (!isset($_SESSION['subjectId'])) {
    header('Location: /survey.php');
  } else if (!isset($_SESSION['score']) || $_SESSION['cheatType'] != 0) {
    header('Location: /exit.php');
  }
 */
  require_once('includes/helper.php');

  function weighted_rand() {
    $arr = array(1,1,2,2,3,4,4,5);
    return $arr[rand(0, sizeof($arr)-1)];
  }

  $_SESSION['cheatType'] = weighted_rand();
  $score = $_SESSION['score'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Instructions</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="includes/css/form.css">
    <link rel="icon" href="/media/favicon.ico?" type="image/x-icon">
    <script>
      function hideQuiz() {
        $('#contReal, #quiz').hide();
        $('#cheatImage, #contFake, #pageTitle').show();
      }

      function showQuiz() {
        $('#cheatImage, #contFake, #pageTitle').hide();
        $('#quiz').show();
      }

      function checkQuiz() {
        if ($('input[name="quizCheatType"]:checked').val()
            == $('#cheatType')[0].innerHTML
            && $('input[name="quizCheatBlocks"]:checked').val()
            == $('#cheatBlocks')[0].innerHTML) {
          $('#submitForm')[0].submit()
        } else {
          hideQuiz();
        }
      }
    </script>

	</head>
	<body onload="hideQuiz()">
		<div class="container">
		<div id="directions">
			<h2 id='pageTitle'>How to Change Your Results</h2>
			<br>
      <?php
        $image = "s$_SESSION[cheatType]";
        $cheatBlocks = '';
        if ($score > 0) {
          $cheatBlocks = 'm';
        } else {
          $cheatBlocks = 'f';
        }
        $image .= $cheatBlocks;
        echo "<img id='cheatImage' src='/media/$image.png'></img>";
        echo "<div id='cheatType' class='hidden'>$_SESSION[cheatType]</div>";
        echo "<div id='cheatBlocks' class='hidden'>$cheatBlocks</div>";
      ?>
		</div>
    <form id='quiz'>
        <h3>How are you going to change your IAT results?</h3>
        <div class="form-group">
            <input type="radio" class="" id="errors" name="quizCheatType" value="1">
            Making about 10 errors
            <br>
            <input type="radio" class="" id="delay" name="quizCheatType" value="2">
            Delaying responses by counting “one Mississippi”
            <br>
            <input type="radio" class="" id="lap" name="quizCheatType" value="3">
            Putting your hands your hands in your lap
            <br>
            <input type="radio" class="" id="cross" name="quizCheatType" value="4">
            Crossing your hands
            <br>
            <input type="radio" class="" id="nose" name="quizCheatType" value="5">
            Using one hand and touching your nose
            <br>
            <input type="radio" class="" id="idkType" name="quizCheatType" value="-1">
            Don't know
        </div>
        <h3>When are you going to use this method?</h3>
        <div class="form-group">
            <input type="radio" class="" id="csAndF" name="quizCheatBlocks" value="f">
            When Female and Computer Science are together
            <br>
            <input type="radio" class="" id="csAndM" name="quizCheatBlocks" value="m">
            When Male and Computer Science are together
            <br>
            <input type="radio" class="" id="idkBlocks" name="quizCheatBlocks" value="-1">
            Don't know
        </div>
      <br> <br>
      <button type="button" class="btn center-block" id="checkQuizButton" onclick="checkQuiz()">Continue</button>
    </form>


    <form id="submitForm" action="iat.php">
      <button type="button" class="btn btn-block" id="contFake" onclick="showQuiz()">Continue to IAT</button>
      <button type="submit" class="btn btn-block" id="contReal">Continue to IAT</button>
    </form>
		</div>
	</body>
</html>
