<!DOCTYPE html>
<html lang="en">

<head>
	<title>Coming Soon Counter</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<meta name="robots" content="noindex, follow">
</head>

<body>
	<div class="bg-img1 overlay1 size1 flex-w flex-c-m p-t-55 p-b-55 p-l-15 p-r-15" style="background-image: url('images/bg01.jpg');">
		<div class="wsize1">
			<p class="txt-center p-b-23">
				<i class="zmdi zmdi-card-giftcard cl0 fs-60"></i>
			</p>
			<h3 class="l1-txt1 txt-center p-b-22">
				<!-- Please write your title in the following line. -->
				Coming Soon / Maintenance Mode Counter
			</h3>
			<?php
			//Enter the date you wants to show in the frontend
			$date = date('2024-01-10');
			//Enter the time you wants to show in the frontend
			$time = date('12:25:00');
			$date_today = $date . ' ' . $time;
			echo '
			<p class="txt-center m2-txt1 p-b-67">
			It will run till ' . $date_today . '
			</p>';
			?>

			<script type="text/javascript">

				//Set the date we are counting down to
				var count_id = "<?php echo $date_today; ?>";
				var countDownDate = new Date(count_id).getTime();

				//Update the count down every 1 second
				var x = setInterval(function() {

					//Get today's date and time
					var now = new Date().getTime();

					//Find the distance between now and the count down date
					var distance = countDownDate - now;

					//Time calculations for day,hours,minutes and seconds
					var days = Math.floor(distance / (1000 * 60 * 60 * 24));
					var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
					var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
					var seconds = Math.floor((distance % (1000 * 60)) / 1000);

					//Output the results in an element with id
					document.getElementById("day").innerHTML = days;
					document.getElementById("hours").innerHTML = hours;
					document.getElementById("minutes").innerHTML = minutes;
					document.getElementById("seconds").innerHTML = seconds;
					
					//If the count down over,write some text
					if (distance < 0) {
						clearInterval(x);
						document.getElementById("demo").innerHTML = "EXPIRED";

					}
				}, 1000);
			</script>
			<div class="flex-w flex-sa-m cd100 bor1 p-t-42 p-b-22 p-l-50 p-r-50 respon1">
				<div class="flex-col-c-m wsize2 m-b-20">
					<span class="l1-txt2 p-b-4 days" id="day"></span>
					<span class="m2-txt2">Days</span>
				</div>
				<span class="l1-txt2 p-b-22">:</span>
				<div class="flex-col-c-m wsize2 m-b-20">
					<span class="l1-txt2 p-b-4 hours" id="hours"></span>
					<span class="m2-txt2">Hours</span>
				</div>
				<span class="l1-txt2 p-b-22 respon2">:</span>
				<div class="flex-col-c-m wsize2 m-b-20">
					<span class="l1-txt2 p-b-4 minutes" id="minutes"></span>
					<span class="m2-txt2">Minutes</span>
				</div>
				<span class="l1-txt2 p-b-22">:</span>
				<div class="flex-col-c-m wsize2 m-b-20">
					<span class="l1-txt2 p-b-4 seconds" id="seconds"></span>
					<span class="m2-txt2">Seconds</span>
				</div>
			</div>
		</div>
	</div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/countdowntime/moment.min.js"></script>
	<script src="vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>

	<script src="js/main.js"></script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>
	<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"78c0ec766cf8c976","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.11.3","si":100}' crossorigin="anonymous"></script>
</body>

</html>