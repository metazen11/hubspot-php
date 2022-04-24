<?php error_reporting(1); //quick fix if we don't have warnings for empty utms
include "vendor/autoload.php";
use SevenShores\Hubspot\Http\Client;
use SevenShores\Hubspot\Resources\Contacts;
//Quick form to show usage of html, css, javascript, php and api integration to Hubspot API by Mauricio Zuniga
//Uses Google Tag Manager to bring in Hubspot Tracking Code and Google Analytics as many clients I have worked with use both
//Uses customized attribution fields for advanced tracking capabilities; can utilize parsable fields outside of Hubspot/Google tracking
//Due to time constraint does not use MVC Framework (such as Laravel) but does use hubspot-php wrapper.  
//I have been working on SQL/Python mostly for last few years for Data Viz, automation, API Integrations etc.
//Demo Uses application based CI/CD pipeline

$Message = "Send Me A Message"; // Default Message

$formSubmitted = !empty($_POST);
$passedValidation = false;
$invalidCount = 0;

if ($formSubmitted) { //php check variable validation and some sanitization
	if (empty($_POST["firstname"])) {
		$Message =  "Name is required";
		$invalidCount = $invalidCount + 1;
	}
	if (empty($_POST["message"])) {
		$Message = "Message is Required";
		$invalidCount = $invalidCount + 1;
	}
	if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$Message = "Invalid email format";
		$invalidCount = $invalidCount + 1;
	}
	//simple sanitization for security
	foreach($_POST as $key => $value) { 
		$_POST[$key] = strip_tags($value);
		//echo $_POST[$key];
	}
}

if ($formSubmitted){
	if ($invalidCount == 0){ //if there were no issues then it passed validation
		$passedValidation = true;
	}
}

if ($formSubmitted and $passedValidation) { //if the form is submitted

			$apiKey = getenv('HSKEY'); 
			$hubspot = SevenShores\Hubspot\Factory::create($apiKey);

			//get fields
			//echo 'In Form Submission';
			$contactInfo = array();
			foreach($_POST as $key => $value) {
				$item = array('property' => $key, 'value' => $_POST[$key]); 
				array_push($contactInfo, $item); 
			}		
			
			$email = $_POST['email'];
			//print_r($contactInfo);
			$contact = $hubspot->contacts()->createOrUpdate($email,$contactInfo);
			$Message = "Thank You! <BR> I will get back to you soon.";
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Welcome to Mauricio's Test</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
      integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"
      integrity="sha512-XZEy8UQ9rngkxQVugAdOuBRDmJ5N4vCuNXCh8KlniZgDKTvf7zl75QBtaVG1lEhMFe2a2DuA22nZYY+qsI2/xA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>
	<script src="js/form-validation.js"></script>
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TB3K9VQ');</script>
<!-- End Google Tag Manager -->
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TB3K9VQ"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<div class="container-contact100">
		<div class="wrap-contact100">
			<form name="registration" class="contact100-form validate-form" method="post">
				<span class="contact100-form-title">
					<?php echo $Message;?>
				</span>

				<label class="label-input100" for="firstname">Please tell me your name *</label>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
					<input id="firstname" class="input100" type="text" name="firstname" placeholder="First name">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" name="lastname" placeholder="Last name">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="email">Enter your email *</label>
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="phone">Enter phone number</label>
				<div class="wrap-input100">
					<input id="phone" class="input100" type="text" name="phone" placeholder="Eg. +1 800 000000">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="message">Message *</label>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<textarea id="message" class="input100" name="message" placeholder="Please send me a message"></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						Send Message
					</button>
					<!-- hidden attribution fields --- Not currently used due to mapping and time constraings -->
					<!--
					<input id="campaign" name="campaign" class="input100" type="hidden"  value="<?php echo htmlspecialchars($_GET['utm_campaign']); ?>" placeholder="">
					<input id="source" name="source" class="input100" type="hidden"  value="<?php echo htmlspecialchars($_GET['utm_source']); ?>" placeholder="">
					<input id="medium" name="medium" class="input100" type="hidden"  value="<?php echo htmlspecialchars($_GET['utm_medium']); ?>" placeholder="">
					<input id="content" name="content" class="input100" type="hidden"  value="<?php echo htmlspecialchars($_GET['utm_content']); ?>" placehol.der="">
					<input id="term" name="term" class="input100" type="hidden"  value="<?php echo htmlspecialchars($_GET['utm_term']); ?>" placeholder="">
					-->
					<!-- custom for advanced parsing and tracking -->
					<input id="cCampaign" name="cCampaign" class="input100" type="hidden"  value="<?php echo htmlspecialchars($_GET['ccampaign']); ?>" placeholder="">
					<input id="cSource" name="cSource" class="input100" type="hidden"  value="<?php echo htmlspecialchars($_GET['csource']); ?>" placeholder="">
					<input id="cMedium" name="cMedium" class="input100" type="hidden" value="<?php echo htmlspecialchars($_GET['cmedium']); ?>" placeholder="">
					<input id="cContent" name="cContent" class="input100" type="hidden" value="<?php echo htmlspecialchars($_GET['ccontent']); ?>" placeholder="">
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('images/bg-02.jpg');">
				

				

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							For Technical Inquries
						</span>

						<span class="txt3">
							<a href="mailto:mauricio.zuniga.salas@gmail.com">mauricio.zuniga.salas@gmail.com </a>
						</span>
					</div>
				</div>

				
				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Lets Talk
						</span>

						<span class="txt3">
						<a href="tel:503-583-8697">503-583-8697</a>
						</span>
					</div>
				</div>
				
				<div class="flex-w size1 p-b-47">
					
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>
				

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Address
						</span>

						<span class="txt2">
							<a target=”_blank” href="http://maps.google.com/maps?&z=10&q=Moda Center 8th floor, 379 Hudson St, New York, NY 10018">Moda Center 8th floor, 379 Hudson St, New York, NY 10018 US</a>
							
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>



	<div id="dropDownSelect1"></div>
	<script src="assets/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!--===============================================================================================-->
	<script src="assets/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="assets/daterangepicker/moment.min.js"></script>
	<script src="assets/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="assets/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	  gtag('config', 'UA-23581568-13');
	</script>
</body>
</html>
