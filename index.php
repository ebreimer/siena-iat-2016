<?php
  session_start();
  if (session_id() != '') {
    session_destroy();
  }
  ini_set('session.gc_maxlifetime', 1200);
  session_set_cookie_params(1200);
  session_start();
  require_once('includes/helper.php');
  $_SESSION['started'] = true;
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
	    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Implicit Association Test </title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="includes/css/form.css">
    <link rel="icon" href="/media/favicon.ico?" type="image/x-icon">
		
  <script>
    /*
    $('#cont').click(function() {
        alert('i just wanted to bother u');
      if ($('input[name="consent"]:checked').val() == undefined)
        alert("Please select AGREE or DISAGREE.");
    });
    */
      /*
    $('#yes').on('click', function() {
      alert('aa');
      $('#cont').removeClass('disabled');
      $('#cont').addClass('enabled');
    });
       */
    function onLoad() {
      $('input[name="consent"]').change(function() {
        $('#cont').removeClass('disabled');
        $('#cont').addClass('enabled');
      });
    }
  </script>

	</head>
	<body onload="onLoad()">
		<div class="container">
		<div id="directions">
			<h2>Informed Consent</h2>
			<br>
      <p>
The purpose of this research is to gather data to help train a Machine Learning algorithm to detect if an Implicit Association Test  (IAT) is being taken “naturally” or if the participant is modifying their response in some way.   An IAT measures the strength of a person's implicit association between concepts and qualities.  In the IAT used in this research, participants must categorize words that represent concepts (Computer Science vs. Biology) and qualities (Male vs Female) by pressing corresponding keyboard keys. An IAT typically takes 2-3 minutes to complete. Participants in this study will complete an 8-question survey, take an IAT, read an infographic that shows a response modification technique, and take the IAT again using the technique. The entire process typically takes between 10 and 12 minutes.
<br><br>
This research will help psychologists automatically detect if IAT results are possibly invalid.  There is no benefit to the individual participant.  There is no compensation for participation in this research.  Participants are asked to answer survey questions that some may considered sensitive, but answering is not required to participate.  Participants are asked to complete two IATs that some consider tedious and possibly stressful.
<br><br>
Participation in this experiment is voluntary. Participants can choose stop at any time without any negative consequence. 
<br><br>
Any information provided in this experiment is confidential.   All provided information will be stored in a secured database and only the primary investigator will have access.  Personally identifiable information will not be shared publicly. Only aggregate data (summary data and averages) will be shared publicly for other researchers.
<br><br>
If you have any questions about this project now or in the future, feel free to contact the primary investigator (Eric Breimer) who can be reached by e-mail at iat@sienacs.com.  This work has been approved (IRB #05-16-005R) by the Institutional Review Board at Siena College which reviews all human subjects research. If you have any questions about the process that is used by Siena to protect participants in research from any harm, please contact Mary Lou D’Allegro at mdallegro@siena.edu.
<br><br>
Before participating, you must agree to the following:
<li> I have read and understand the information above
<li> I voluntarily agree to participate
<li> I do not give any legal rights by signing this Informed Consent
<li> I am 18 years of age or older
      </p>
		</div>
    <form action="survey.php" method='post'>
        <div class="form-group">
          <label for="yes">
            <input type="radio" class="" id="yes" name="consent" value="yes">
            AGREE: I am 18 years of age or older and I agree to participate
          </label>
          <label for="no">
            <input type="radio" class="" id="no" name="consent" value="no">
            DISAGREE: I do not wish to participate or I am not 18 years of age or older
          </label>
        </div>
      <br> <br> <br> <br>
      <button type="submit" class="btn btn-block disabled" id="cont">Continue</button>
    </form>
		</div>
	</body>
</html>
