<?php echo $this->Session->flash(); ?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?php echo __('Sales performance');?></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
					<li class="breadcrumb-item active"><?php echo __('Sales performance');?></li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="card">
		<div class="text-center mt-3">
			<div id="chart_container" style="width: 900px;">
			</div>
		</div>
	</div>
</section>


<?php
echo $this->Html->script('/crm/plugins/apexcharts-bundle/apexcharts.min.js');
?>

<script>
	var options = {
		chart: {
			type: 'line',
			toolbar: {
				show: false
			},
			zoom: {
				enabled: false
			}
		},
		title: {
          text: '2020 Sales performance',
          align: 'center'
        },
		dataLabels: {
          enabled: true,
        },
		colors: ['#ffdd00'],
		series: [
			{
				name: 'Profit',
				data: [3000,4000,3500,5000,4900,6000,7000,9100,8700,8900,9500,9300]
			}
		],
		xaxis: {
			categories: ['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dec']
		}
	}

	var chart = new ApexCharts(document.getElementById("chart_container"), options);
	chart.render();
</script>


<!-- <script>
	var options = {
	chart: {
		type: 'line',
		toolbar: {
			show: false
		}
	},
	series: [
		{
			name: 'Product 1',
			data: [30,40,35,50,49,60,70,91,125]
		},
		{
			name: 'Product 2',
			data: [15,45,27,36,66,30,58,72,112]
		},
		{
			name: 'Product 3',
			data: [11,58,42,55,59,81,97,118,150]
		}
	],
	xaxis: {
		categories: ['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep']
	}
	}

	var chart = new ApexCharts(document.getElementById("chart_container"), options);
	chart.render();
</script> -->