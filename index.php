<?php
	include("class.php");
	$apartment = new Apartment;
	$turn = $apartment->readFile("turn.txt");
?>
<style type="text/css">
	body {
		background: orange;
		padding: 5px;
		color:#fff;
		font-weight: bold;
		font-size:16px;
		font-family: Arial;
	}
	b {font-size:20px;}
	.container {
		width: 320px;
		margin:8% auto;
		position: relative;
	}
	input {
		font-weight: italic;
		font-size:18px;
		padding: 20px;
		margin:10px;
		background: #000;
		color:#fff;
		border: none;
		border-radius:4px;
	}
	.turn {
		background: #000;
		padding: 5px;
		border-radius: 2px;
	}
</style>
<body>
<div class="container">
<div class="previous_payment">
	Previous Payer: <b>
	<?php if($turn == 0) echo $apartment->members[6]; else echo $apartment->members[$turn-1]; ?></b></div><br>
<div class="turn">Payment Turn: <b><?= $apartment->members[$turn]; ?></b></div><br>
<div class="next_payment">Next Payment: <b> <?php if($turn == 6) echo $apartment->members[0]; else echo $apartment->members[$turn+1] ?></b></div>

	<form method="post">
	<input type="submit" name="paymentdone" value="Payment Done!">
<?php 
	if ($_POST) {
		if($apartment->controlDate() == true) 
		{
			$apartment->paymentDone();
			$apartment->setDate();
		} else {
		echo "<br>Oops! Wait minimum 1 month for payment done.";
		}
	}
?>
</form>
</div>
</body>