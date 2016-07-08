<?php
  session_start();
  if (!isset($_SESSION['started'])) { 
    header('Location: /');
  } else if (!isset($_SESSION['subjectId'])) {
    header('Location: /survey.php');
  } else if (!isset($_SESSION['score']) || $_SESSION['cheatType'] != 0) {
    header('Location: /exit.php');
  }
  require_once('includes/helper.php');
  $_SESSION['cheatType'] = rand(1,5);
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
		
	</head>
	<body>
		<div class="container">
		<div id="directions">
			<h2>How to Change Your Results</h2>
			<br>
      <?php
        if (false) {
          echo "Cheat type: " . $_SESSION['cheatType'];
          echo "( ͡° ͜ʖ ͡°)";
        }
        $image = "s$_SESSION[cheatType]";
        //$image = "cheat1-";
        if ($score > 0) {
          $image .= 'm';
        } else {
          $image .= 'f';
        }
        echo "<img id='cheatImage' src='/media/$image.png'></img>";
      ?>
		</div>
    <form action="iat.php">
      <button type="submit" class="btn btn-block" id="cont">Continue to IAT</button>
    </form>
		</div>
	</body>
</html>
