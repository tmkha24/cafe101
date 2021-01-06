<?php echo $this->Session->flash(); ?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?php echo __('Analysis diagram');?></h1>
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
          text: 'Analysis diagram',
          align: 'center'
        },
        stroke: {
          curve: 'smooth'
        },
		dataLabels: {
          enabled: true,
        },
		colors: ['#00ff00', '#00ffff'],
		series: [
			{
				name: 'Requirement',
				data: [3200,5000,4200,5400,5300,5700,5500,6000,5800]
			},
			{
				name: 'Sales',
				data: [3500,4800,4600,4900,5500,6000,5800,6000,6100]
			}
		],
		xaxis: {
			categories: ['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep']
		}
	}

	var chart = new ApexCharts(document.getElementById("chart_container"), options);
	chart.render();
</script>