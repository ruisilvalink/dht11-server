<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link href="fontawesome-free-5.13.0-web/css/all.css" rel="stylesheet"> 
</head>
<body class="container">
	<br>
	<br>
	<div class="row">
		<div class="col-sm text-center">
			<h1 title="Humidity"><i class="fas fa-tint"></i></h1>
			<h2><div id="humidityDiv"></div></h2>
		</div>
	</div>
	<br/>
	<div class="row">
		<div class="col-sm text-center">
			<h1 title="Temperature"><i class="fas fa-thermometer-half"></i></h1>
			<h2><div id="temperatureDiv"></div></h2>
		</div>
	</div>
	<hr>
	<div class="text-center" id="createdOnDiv"></div>
</body>
<script>
$(document).ready(function() {
	$.getJSON( "last.php", update);
	setInterval(function(){
		$.getJSON( "last.php", update);
	}, 10000);
});

function update(data) {
	if (data == null)
		return;

	$("#createdOnDiv")[0].innerHTML = data[0].created_on.date;
	$("#humidityDiv")[0].innerHTML = data[0].humidity + " %";
	$("#temperatureDiv")[0].innerHTML = data[0].temperature + " &#x2103";
}

</script>
</html>
