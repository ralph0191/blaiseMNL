<!DOCTYPE html>


<html>
<script type="text/javascript"> 

var test= 123;

</script>
<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
	
	<script src ="chartjs/dist/Chart.min.js"></script>
</head>
<body>
	<div class="container">
		<canvas id="myChart"></canvas>
	</div>
	
// https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js
	<script>
		let myChart= document.getElementById('myChart').getContext('2d');
		
		let massPopChart = new Chart(myChart, {
			type:'pie',
			data:{
				labels:['Boston', 'Test', 'Test', 'Test'],
				datasets:[{
					label:'Population',
					data:[
						<?php echo $test ?>,
						234,
						456,
						567,
					]
				}]
			},
			options:{}
		});
	</script>	
</body>
</html>