<?php echo $this->Session->flash(); ?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?php echo __('Sales quota');?></h1>
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
			type: 'area',
			toolbar: {
				show: false
			},
			zoom: {
				enabled: false
			}
		},
		title: {
          text: '2020 Sales quota',
          align: 'center'
        },
        stroke: {
          curve: 'straight'
        },
		dataLabels: {
          enabled: true,
        },
		colors: ['#ffdd00', '#ff5555'],
		series: [
			{
				name: 'Sales',
				data: [3000,4000,3500,5000,4900,6000,7000,9100,8700,8900,9200,9500]
			},
			{
				name: 'Quota',
				data: [4000,4500,5000,5500,6000,6500,7000,7500,8000,8200,8500,8700]
			}
		],
		xaxis: {
			categories: ['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dev']
		}
	}

	var chart = new ApexCharts(document.getElementById("chart_container"), options);
	chart.render();
</script>