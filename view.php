<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment-with-locales.min.js"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class="container">
	<h1>Dashboard</h1>
	<div id="chartDiv" class="mx-auto">
		<canvas id="chartCanvas" width="600" height="200" class="mx-auto"></canvas>
	<div>
</body>
<script>
var chartCanvas = null;

$(document).ready(function() {
	$.getJSON( "entries.json", drawChart);

	setInterval(function(){
		$.getJSON( "entries.json", drawChart);
	}, 5000);
});

function drawChart(data) {
	var humidityData = $.map(data, function(entry) { return { t: moment.utc(entry.created_on.date), y: parseFloat(entry.humidity) }; });
	var temperatureData = $.map(data, function(entry) { return { t: moment.utc(entry.created_on.date), y: parseFloat(entry.temperature) }; });
	
	if (chartCanvas == null) {
		var ctx = document.getElementById('chartCanvas');
		chartCanvas = new Chart(ctx, {
		    type: 'line',
		    data: {
			datasets: [{
			    label: 'Humidity',
			    data: humidityData,
		            borderColor : 'blue',
		            fill: false
			},{
			    label: 'Temperature',
			    data: temperatureData,
		            borderColor : 'red',
			    fill: false
			}]
		    },
		    options: {
			scales: {
			    xAxes: [{
				type: 'time'
			    }]
			}
		    }
		});
	} else {
		chartCanvas.data.datasets[0].data = humidityData;
		chartCanvas.data.datasets[1].data = temperatureData;
		chartCanvas.update();
	}
}

</script>
</html>
