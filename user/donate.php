<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

?>
<!DOCTYPE html>
<html>

<head>
	<title>Paytm </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/pay.css">
	<style>
		body {
			background-image: url(../images/pm.png);
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: cover;

		}
	</style>
</head>

<body>

	<section>
		<form method="post" action="pgRedirect.php" id="paytm_forms">

			<div class="wrapper">
				<div class="title">
					You can pay here
				</div>
				<div class="form">
					<div class="inputfield">
						<label class="control-label col-sm-4" for="ORDER_ID"><b>FACULTY ID :</b></label>
						<div class="col-sm-8">
							<input id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" class="form-control decorate" autocomplete="off" value="<?php echo  " FACULTY" . rand(10000, 99999999) ?>">
						</div>
					</div>
					<div class="inputfield">
						<label class="control-label col-sm-4" for="CUST_ID"><b>RECEIVER ID:</b></label>
						<div class="col-sm-8">
							<input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" class="form-control decorate" autocomplete="off" value="<?php echo  "RECEIVER" . rand(10000, 99999999) ?>">
						</div>
					</div>
					<div class="inputfield">
						<label class="control-label col-sm-4" for="INDUSTRY_TYPE_ID"><b>CANTEEN ID:</b></label>
						<div class="col-sm-8">
							<input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" class="form-control decorate" autocomplete="off" value="SDM CANTEEN">
						</div>
					</div>
					<div class="inputfield">
						<label class="control-label col-sm-4" for="CHANNEL_ID"><b>CHANNEL:</b></label>
						<div class="col-sm-8">
							<input id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" class="form-control decorate" value="WEB">
						</div>
					</div>

					<div class="inputfield">
						<label class="control-label col-sm-4" for="CHANNEL_ID" required><b> AMOUNT:</b></label>
						<div class="col-sm-8">
							<input title="TXN_AMOUNT" tabindex="10" class="form-control decorate" type="text" name="TXN_AMOUNT" value="">
						</div>
					</div>

					<div class="inputfield">

						<button type="submit" class="decorate"><b>PAY</b></button>
					</div>
				</div>
			</div>

		</form>
	</section>
	</div>
	</div>
	</div>
	</div>
	</div>
	<section id="footer">
		<div class="container">

		</div>
	</section>
	</form>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

</html>