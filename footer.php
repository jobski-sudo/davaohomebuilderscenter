
<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row)
{
	$footer_about = $row['footer_about'];
	$contact_email = $row['contact_email'];
	$contact_phone = $row['contact_phone'];
	$contact_address = $row['contact_address'];
	$footer_copyright = $row['footer_copyright'];
	$total_recent_post_footer = $row['total_recent_post_footer'];
    $total_popular_post_footer = $row['total_popular_post_footer'];
    $newsletter_on_off = $row['newsletter_on_off'];
    $before_body = $row['before_body'];
}
?>


<?php if($newsletter_on_off == 1): ?>
	



<!-- /* video footer */ -->
<Div id="vidrow" class="row">
	<div id="vidcol" class="col-md-4">
		<iframe width="420" height="300"
		src="https://www.youtube.com/embed/bbp7YJ7ROq8">
		</iframe>
	</div>
	<div id="vidcol" class="col-md-4">
		<iframe width="420" height="300"
		src="https://www.youtube.com/embed/L8P-rvH7Q44">
		</iframe>
	</div>
	<div id="vidcol" class="col-md-4">
		<iframe width="420" height="300"
		src="https://www.youtube.com/embed/5uoIBFgBN9A">
		</iframe>
	</div>
	
</Div>


<section class="home-newsletter">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="single">
					<?php
			if(isset($_POST['form_subscribe']))
			{

				if(empty($_POST['email_subscribe'])) 
			    {
			        $valid = 0;
			        $error_message1 .= LANG_VALUE_131;
			    }
			    else
			    {
			    	if (filter_var($_POST['email_subscribe'], FILTER_VALIDATE_EMAIL) === false)
				    {
				        $valid = 0;
				        $error_message1 .= LANG_VALUE_134;
				    }
				    else
				    {
				    	$statement = $pdo->prepare("SELECT * FROM tbl_subscriber WHERE subs_email=?");
				    	$statement->execute(array($_POST['email_subscribe']));
				    	$total = $statement->rowCount();							
				    	if($total)
				    	{
				    		$valid = 0;
				        	$error_message1 .= LANG_VALUE_147;
				    	}
				    	else
				    	{
				    		// Sending email to the requested subscriber for email confirmation
				    		// Getting activation key to send via email. also it will be saved to database until user click on the activation link.
				    		$key = md5(uniqid(rand(), true));

				    		// Getting current date
				    		$current_date = date('Y-m-d');

				    		// Getting current date and time
				    		$current_date_time = date('Y-m-d H:i:s');

				    		// Inserting data into the database
				    		$statement = $pdo->prepare("INSERT INTO tbl_subscriber (subs_email,subs_date,subs_date_time,subs_hash,subs_active) VALUES (?,?,?,?,?)");
				    		$statement->execute(array($_POST['email_subscribe'],$current_date,$current_date_time,$key,0));

				    		// Sending Confirmation Email
				    		$to = $_POST['email_subscribe'];
							$subject = 'Subscriber Email Confirmation';
							
							// Getting the url of the verification link
							$verification_url = BASE_URL.'verify.php?email='.$to.'&key='.$key;

							$message = '
										Thanks for your interest to subscribe our newsletter!<br><br>
										Please click this link to confirm your subscription:
															'.$verification_url.'<br><br>
										This link will be active only for 24 hours.
															';

							$headers = 'From: ' . $contact_email . "\r\n" .
								   'Reply-To: ' . $contact_email . "\r\n" .
								   'X-Mailer: PHP/' . phpversion() . "\r\n" . 
								   "MIME-Version: 1.0\r\n" . 
								   "Content-Type: text/html; charset=ISO-8859-1\r\n";

							// Sending the email
							mail($to, $subject, $message, $headers);

							$success_message1 = LANG_VALUE_136;
				    	}
				    }
			    }
			}
			if($error_message1 != '') {
				echo "<script>alert('".$error_message1."')</script>";
			}
			if($success_message1 != '') {
				echo "<script>alert('".$success_message1."')</script>";
			}
			?>
<?php

$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
foreach ($result as $row) {
	$about_meta_title = $row['about_meta_title'];
	$about_meta_keyword = $row['about_meta_keyword'];
	$about_meta_description = $row['about_meta_description'];
	$faq_meta_title = $row['faq_meta_title'];
	$faq_meta_keyword = $row['faq_meta_keyword'];
	$faq_meta_description = $row['faq_meta_description'];
	$contact_meta_title = $row['contact_meta_title'];
	$contact_meta_keyword = $row['contact_meta_keyword'];
	$contact_meta_description = $row['contact_meta_description'];
}


if($cur_page == 'about.php') {
	?>
	<title><?php echo $about_meta_title; ?></title>
	<meta name="keywords" content="<?php echo $about_meta_keyword; ?>">
	<meta name="description" content="<?php echo $about_meta_description; ?>">
	<?php
}
if($cur_page == 'faq.php') {
	?>
	<title><?php echo $faq_meta_title; ?></title>
	<meta name="keywords" content="<?php echo $faq_meta_keyword; ?>">
	<meta name="description" content="<?php echo $faq_meta_description; ?>">
	<?php
}
if($cur_page == 'contact.php') {
	?>
	<title><?php echo $contact_meta_title; ?></title>
	<meta name="keywords" content="<?php echo $contact_meta_keyword; ?>">
	<meta name="description" content="<?php echo $contact_meta_description; ?>">
	<?php
}
?>
<style>
#vidrow{
	margin-left: 5rem;
	padding: 15px;
	display:inline;
}
#vidcol{
	padding:2rem;
	justify-content:center;
	display:inline;
}
#div_top_hypers {
    background-color: white;
    display:inline;      
}
@media only screen and (max-width: 600px) {
#div_top_hypers {grid-area: 1 / span 6;}
  .item2 {grid-area: 2 / span 6;}
  .item3 {grid-area: 3 / span 6;}
  .item4 {grid-area: 4 / span 6;}
  .item5 {grid-area: 5 / span 6;}
}
#ul_top_hypers li{
    display: inline;
	padding: 1rem;
	font-size: 2rem;
}
.par-contact{
	color:white;
	font-family: Times, serif;
	font-size: 15px;
	display: flex;
	justify-content: center;
	background: transparent;
	}
</style>
						<div id="div_top_hypers" class="">
							<ul id="ul_top_hypers" class="row">
								<li class="col"><a href="about.php"><?php echo $about_title; ?></a></li>
								<li class="col"><a href="faq.php"><?php echo $faq_title; ?></a></li>
								<li class="col"><a href="contact.php"><?php echo $contact_title; ?></a></li>
							</ul>
						</div>


				<form action="" method="post">
					<?php $csrf->echoInputField(); ?>
					<h2><?php echo LANG_VALUE_93; ?></h2>
					
					
					<div class="input-group">
			        	<input type="email" class="form-control" placeholder="<?php echo LANG_VALUE_95; ?>" name="email_subscribe">
			         	<span class="input-group-btn">
			         	<button class="btn btn-theme" type="submit" name="form_subscribe"><?php echo LANG_VALUE_92; ?></button>
			         	</span>
			        </div>
				</div>
				</form>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>







<div class="footer-bottom">
	<div class="container">
		<div class="col inner">
			<div class="col-md-12 contact-footer">
					<p class="par-contact">Tel:(+6382)552-2279 or (+6382)553-5712</p>
					<p class="par-contact">Fax: </p>
					<p class="par-contact">Email: Davaohomebuilderscenter</p>
					<p class="par-contact">Ramon MagsaysaySt., Zone III, Digos City & Sandawa Rd., S.I.R Matina, Davao City</p>
				</div>
			</div>
			<div class="col inner">
				<div class="col-md-12 copyright">
					<?php echo $footer_copyright; ?>. All Rights Reserved.
				</div>
			</div>
		</div>
</div>


<a href="#" class="scrollup">
	<i class="fa fa-angle-up"></i>
</a>

<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $stripe_public_key = $row['stripe_public_key'];
    $stripe_secret_key = $row['stripe_secret_key'];
}
?>

<script src="assets/js/jquery-2.2.4.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="https://js.stripe.com/v2/"></script>
<script src="assets/js/megamenu.js"></script>
<script src="assets/js/owl.carousel.min.js"></script>
<script src="assets/js/owl.animate.js"></script>
<script src="assets/js/jquery.bxslider.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/rating.js"></script>
<script src="assets/js/jquery.touchSwipe.min.js"></script>
<script src="assets/js/bootstrap-touch-slider.js"></script>
<script src="assets/js/select2.full.min.js"></script>
<script src="assets/js/custom.js"></script>
<script>
	function confirmDelete()
	{
	    return confirm("Sure you want to delete this data?");
	}
	$(document).ready(function () {
		advFieldsStatus = $('#advFieldsStatus').val();

		$('#paypal_form').hide();
		$('#stripe_form').hide();
		$('#bank_form').hide();

        $('#advFieldsStatus').on('change',function() {
            advFieldsStatus = $('#advFieldsStatus').val();
            if ( advFieldsStatus == '' ) {
            	$('#paypal_form').hide();
				$('#stripe_form').hide();
				$('#bank_form').hide();
            } else if ( advFieldsStatus == 'PayPal' ) {
               	$('#paypal_form').show();
				$('#stripe_form').hide();
				$('#bank_form').hide();
            } else if ( advFieldsStatus == 'Stripe' ) {
               	$('#paypal_form').hide();
				$('#stripe_form').show();
				$('#bank_form').hide();
            } else if ( advFieldsStatus == 'Bank Deposit' ) {
            	$('#paypal_form').hide();
				$('#stripe_form').hide();
				$('#bank_form').show();
            }
        });
	});


	$(document).on('submit', '#stripe_form', function () {
        // createToken returns immediately - the supplied callback submits the form if there are no errors
        $('#submit-button').prop("disabled", true);
        $("#msg-container").hide();
        Stripe.card.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
            // name: $('.card-holder-name').val()
        }, stripeResponseHandler);
        return false;
    });
    Stripe.setPublishableKey('<?php echo $stripe_public_key; ?>');
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('#submit-button').prop("disabled", false);
            $("#msg-container").html('<div style="color: red;border: 1px solid;margin: 10px 0px;padding: 5px;"><strong>Error:</strong> ' + response.error.message + '</div>');
            $("#msg-container").show();
        } else {
            var form$ = $("#stripe_form");
            var token = response['id'];
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            form$.get(0).submit();
        }
    }
</script>
<?php echo $before_body; ?>
</body>
</html>