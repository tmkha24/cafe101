<?php echo $this->Session->flash(); ?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?php echo __('Membership quota');?></h1>
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
          text: '2020 Membership quota',
          align: 'center'
        },
        stroke: {
          curve: 'straight'
        },
		dataLabels: {
          enabled: true,
        },
		colors: ['#00ff00', '#ff3320'],
		series: [
			{
				name: 'Members',
				data: [80,86,200,231,120,170,135,160,220,135,160,220]
			},
			{
				name: 'Quota',
				data: [150,150,150,150,150,150,150,150,150,150,150,150]
			}
		],
		xaxis: {
			categories: ['Jan','Feb','Mar','Apr','May','Jun','July','Aug','Sep','Oct','Nov','Dev']
		}
	}

	var chart = new ApexCharts(document.getElementById("chart_container"), options);
	chart.render();
</script>