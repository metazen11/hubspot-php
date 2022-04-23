<?php error_reporting(1); //quick fix if we don't have warnings for empty utms
include "vendor/autoload.php";
use SevenShores\Hubspot\Http\Client;
use SevenShores\Hubspot\Resources\Contacts;
$Message = "Send Me A Message";
//Quick form to show usage of html, css, javascript, php and api integration to Hubspot API by Mauricio Zuniga
//Uses Google Tag Manager to bring in Hubspot Tracking Code and Google Analytics as many clients I have worked with use both
//Uses Customized attribution fields for advanced tracking capabilities to utilize parsable fields outside of Hubspots campaign field
//Due to time constraint does not use MVC or Framework such as Laravel but does integrate into Hubspot API.

if (!empty($_POST)) { //if the form is submitted
	//init
	$apiKey = 'a120a51e-dae0-4cb2-804a-29dd16acc0a9';
	$hubspot = SevenShores\Hubspot\Factory::create($apiKey);

	//get fields
	echo 'In Form Submission';
	$contactInfo = array(
		
			array(
				'property' => 'email',
				'value' => $_POST['email']
			),
			array(
				'property' => 'firstname',
				'value' => $_POST['first-name']
			),
			array(
				'property' => 'lastname',
				'value' => $_POST['last-name']
			),
			array(
				'property' => 'phone',
				'value' => $_POST['phone']
			),
			array(
				'property' => 'message',
				'value' => $_POST['message']
			)
			//TODO - add the attribution data
 
			
		);

	$email = $_POST['email'];
	//TODO remove once you add attribution data
	/*$contactInfo2 = array(
		'firstname' => $_POST['first-name'],
		'lastname' => $_POST['last-name'],
		'email' => $_POST['email'],
		'phone' => $_POST['phone'],
		'message' => $_POST['message'], 
		'campaign' => $_POST['ccampaign'],
		'ccampaign' => $_POST['ccampaign'],
		'cmedium' => $_POST['cmedium'],
		'csource' => $_POST['csource'],
		'ccontent' => $_POST['ccontent']
	);*/
	print_r($contactInfo);

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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script src="js/form-validation.js"></script>

<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
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

				<label class="label-input100" for="first-name">Please tell me your name *</label>
				<div class="wrap-input100 rs1-wrap-input100 validate-input" data-validate="Type first name">
					<input id="first-name" class="input100" type="text" name="first-name" placeholder="First name">
					<span class="focus-input100"></span>
				</div>
				<div class="wrap-input100 rs2-wrap-input100 validate-input" data-validate="Type last name">
					<input class="input100" type="text" name="last-name" placeholder="Last name">
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
					<!-- hidden attribution fields -->
					<input id="cMedium" name="cCampaign" class="input100" type="hidden"  value="<?php echo htmlspecialchars($_GET['utm_campaign']); ?>" placeholder="">
					<input id="cSource" name="cSource" class="input100" type="hidden"  value="<?php echo htmlspecialchars($_GET['utm_source']); ?>" placeholder="">
					<input id="cMedium" name="cMedium" class="input100" type="hidden" value="<?php echo htmlspecialchars($_GET['utm_medium']); ?>" placeholder="">
					<input id="cContent" name="cContent" class="input100" type="hidden" value="<?php echo htmlspecialchars($_GET['utm_content']); ?>" placeholder="">
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

<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
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
