<template id="template-dashboard-index">
	<section class="container-fluid">
		<div class="row">
			<div class="col-md-12">
				<h1>Estadística</h1>
			</div>
			<div class="col-md-6">
				<h2 style="color:black">Documentos generados</h2>			
			</div>
			<div class="col-md-6">
				<h2 style="color:black">Movimientos de Datos</h2>
			</div>
		</div>
		<div class="row">

			<div class="col-md-6">
				<canvas id="myChart" width="400px" height="400px" aria-label="Hello ARIA World" role="img">
				</canvas>			
			</div>
			<div class="col-md-6">
				<canvas id="pieChart" width="400px" height="400px"></canvas>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<canvas id="torta" width="" height=""></canvas>
			</div>
			<div class="col-md-3">
				<canvas id="" width="" height=""></canvas>
			</div>
		</div>
		<!--div class="row">
			<div class="col-md-6">
	            <div class="panel panel-primary">
	                <div class="panel-heading">
	                    <h3 class="panel-title">
	                        <span class="glyphicon glyphicon-bookmark"></span> Quick Shortcuts</h3>
	                </div>
	                <div class="panel-body">
	                    <div class="row">
	                        <div class="col-xs-6 col-md-6">
	                          <a href="#" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Apps</a>
	                          <a href="#" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-bookmark"></span> <br/>Bookmarks</a>
	                          <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-signal"></span> <br/>Reports</a>
	                          <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-comment"></span> <br/>Comments</a>
	                        </div>
	                        <div class="col-xs-6 col-md-6">
	                          <a href="#" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>Users</a>
	                          <a href="#" class="btn btn-info btn-lg" role="button"><span class="glyphicon glyphicon-file"></span> <br/>Notes</a>
	                          <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-picture"></span> <br/>Photos</a>
	                          <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-tag"></span> <br/>Tags</a>
	                        </div>
	                    </div>
	                    <a href="http://www.jquery2dotnet.com/" class="btn btn-success btn-lg btn-block" role="button"><span class="glyphicon glyphicon-globe"></span> Website</a>
	                </div>
	            </div>
	        </div>
	        <div class="col-md-6">
	            <div class="panel panel-primary">
	                <div class="panel-heading">
	                    <h3 class="panel-title">
	                        <span class="glyphicon glyphicon-bookmark"></span> Quick Shortcuts</h3>
	                </div>
	                <div class="panel-body">
	                    <div class="row">
	                        <div class="col-xs-6 col-md-6">
	                          <a href="#" class="btn btn-danger btn-lg" role="button"><span class="glyphicon glyphicon-list-alt"></span> <br/>Apps</a>
	                          <a href="#" class="btn btn-warning btn-lg" role="button"><span class="glyphicon glyphicon-bookmark"></span> <br/>Bookmarks</a>
	                          <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-signal"></span> <br/>Reports</a>
	                          <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-comment"></span> <br/>Comments</a>
	                        </div>
	                        <div class="col-xs-6 col-md-6">
	                          <a href="#" class="btn btn-success btn-lg" role="button"><span class="glyphicon glyphicon-user"></span> <br/>Users</a>
	                          <a href="#" class="btn btn-info btn-lg" role="button"><span class="glyphicon glyphicon-file"></span> <br/>Notes</a>
	                          <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-picture"></span> <br/>Photos</a>
	                          <a href="#" class="btn btn-primary btn-lg" role="button"><span class="glyphicon glyphicon-tag"></span> <br/>Tags</a>
	                        </div>
	                    </div>
	                    <a href="http://www.jquery2dotnet.com/" class="btn btn-success btn-lg btn-block" role="button"><span class="glyphicon glyphicon-globe"></span> Website</a>
	                </div>
	            </div>
	        </div>
		</div-->
	</section>
</template>

<script>
export default {
	template: "#template-dashboard-index",
	data() {
		return {
			
		}
	},
	props: {
		respaldo: {type: Number},
		pedido: {type: Number},
		oc: {type: Number},
		recep: {type: Number},
		requi: {type: Number},
		restauracion: {type: Number},
		registros: {type: Number},
		actualizacion: {type: Number},
		borrado: {type: Number}

	}, 
	mounted() {
		
		/*var ctl = document.getElementById("lineChart");
		var myLineChart = new Chart(ctl, {
		    type: 'line',
		    data: {
		    	labels: ['Ventas'],
		    	datasets: [{
		    		label: 'Ventas',
		    		data: [1,3,6,10,6,4,8,1]
		    	}]
		    },
		    options: {
		    	scales: {
		    		yAxes: [{
		    			stacked: true
		    		}]
		    	}
		    }
		});*/
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		    	labels: ["Pedidos", "Requi", "O. Compra", "Recep"],
		    	datasets: [{
		            label: 'Movimientos',
		            data: [this.pedido, this.requi, this.oc, this.recep],
		            backgroundColor: [
		                'rgba(255, 99, 132, 0.2)',
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(75, 192, 192, 0.2)',
		                'rgba(153, 102, 255, 0.2)'
		            ],
		            borderColor: [
		                'rgba(255,99,132,1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(75, 192, 192, 1)'
		            ],
		            borderWidth: 1,
		        }],
		        responsive: true
		    },
		    options: {
		        scales: {
		            yAxes: [{
		                ticks: {
		                    beginAtZero:true
		                }
		            }]
		        }
		    }
		});
		var ctp = document.getElementById("pieChart");
		var myPieChart = new Chart(ctp,{
		    type: 'pie',
		    data: {
		    	datasets: [{
			        data: [this.registros, this.actualizacion, this.borrado],
			        backgroundColor:[
				    	'rgba(255,99,132,1)',
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',	
			    	]			    
			    }],
			    labels: [
			        'Registros insertados',
			        'Registros Actualizados',
			        'Registros Borrados'
			    ],
		    	borderColor:[
		    		'rgba(54, 162, 235, 1)'
		    	],
		    	borderWidth:4
		    },
		    options: {
		    	animation:{
		    		animateRotate: true,
		    		animateScale:true
		    	}
		    }
		});
		
	}
}
	
</script>
