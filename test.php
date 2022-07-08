


<html>
<body>
<form method="post">

 <?php // Runs only when reCaptcha is present in the 
			if( isset( $_POST['g-recaptcha-response'] ) ) {
				$recaptcha_response = $_POST['g-recaptcha-response'];
				$recaptcha_secret = '6LfHQBIUAAAAAHFaGuIOQrR_nHRVVLhiGfOHmUNZ';
				$response = file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret=" . $recaptcha_secret . "&response=" . $recaptcha_response );

				$g_response = json_decode( $response );
				echo $g_response->success;
				}
?>
<div class="col_full">

			<script src="https://www.google.com/recaptcha/api.js" async defer></script>
			<div class="g-recaptcha" data-sitekey="6LfHQBIUAAAAAGA5DB-vKgl1rI3RWlYp4jzy-mlh"></div>
</div>

 <button class="button button-3d button-black nomargin" id="btsubmit" name="btsubmit" type="submit">Login</button>
 </form>
 </body>
 </html>