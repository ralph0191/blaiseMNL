$(document).ready(function(){
	$.ajax({
		url: "http://localhost/HULI%20NA%20THESIS/MIDTERMS/js/data.php",
		method: "GET",
		success: function(data) {
			console.log(data);
			var product= [];
			var qty = [];

			for(var i in data) {
				product.push("Product " + data[i].sale_product_id);
				qty.push(data[i].sale_qty);
			}

			var chartdata = {
				labels: product,
				datasets : [
					{
						label: 'Product Sale Qty',
						backgroundColor: 'rgba(200, 200, 200, 0.75)',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: qty
					}
				]
			};

			var ctx = $("#myChart");

			var barGraph = new Chart(ctx, {
				type: 'pie',
				data: chartdata
			});
		},
		error: function(data) {
			console.log(data);
		}
	});
});