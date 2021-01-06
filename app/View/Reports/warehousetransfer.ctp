
<?php echo $this->Session->flash(); ?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<!--				<div class="col-sm-6">-->
			<!--					<h1>--><?php //echo __('Report Active Product');?><!--</h1>-->
			<!--				</div>-->
			<div class="col-sm-12">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
					<li class="breadcrumb-item active"><?php echo __('Ware house transfer');?></li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<div class="col-12">
							<h1><?php echo __('Ware House Transfer Report');?></h1>
						</div>
						<div class="row no-print  float-right">

							<div class="col-12">
								<a onclick="window.print()" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
							</div>
						</div>
					</div>

					<div class="card-body">
						<table id="table1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th><?php echo __('#');?></th>
								<th><?php echo __('Product');?></th>
								<th><?php echo __('Description');?></th>
<!--								<th>--><?php //echo __('Batch');?><!--</th>-->
								<th><?php echo __('From Location');?></th>
								<th><?php echo __('To location');?></th>
								<th><?php echo __('Qty');?></th>

							</tr>
							</thead>
							<tbody>

							<?php

							$data = array();
							$data[]=array('1'=>'1',
								'2'=>'SKU0001',
								'3'=>'Power Your Fun Robo Pets Robot Dog - Remote Control Robot Toy, Smart RC Robot Puppy, Interactive Toys for Boys and Girls',
								'4'=>'P0001',
								'5'=>'WH01-COS-242',
								'6'=>'WH01-COS-347',
								'7'=>'30'
							);
							$data[]=array('1'=>'2',
								'2'=>'SKU0002',
								'3'=>'HEXBUG MoBots Ramblez - Recording and Talking Robot Kit with Lights, Sound and Flexible Body - Smart Interactive Educational Toys for Kids - Ages 3+ - Batteries',
								'4'=>'P0004',
								'5'=>'WH01-COS-245',
								'6'=>'WH01-COS-344',
								'7'=>'10'
							);
							$data[]=array('1'=>'3',
								'2'=>'SKU0003',
								'3'=>'Hot Wheels id Smart Track Starter Kit with 3 Exclusive Cars, Track Pieces and Hot Wheels Race Portal for Physical & Digital Play',
								'4'=>'P0006',
								'5'=>'WH01-COS-242',
								'6'=>'WH02-COS-347',
								'7'=>'30'
							);
							$data[]=array('1'=>'4',
								'2'=>'SKU0004',
								'3'=>'Fistone RC Robot Dog Smart Puppy Teddy Programmable Voice Control Singing Walking Remote Control Electronic Pets Educational ',
								'4'=>'P0008',
								'5'=>'WH01-COS-242',
								'6'=>'WH01-COS-347',
								'7'=>'2'
							);
							$data[]=array('1'=>'5',
								'2'=>'SKU0006',
								'3'=>'ThinkFun Gravity Maze Marble Run Brain Game and STEM Toy for Boys and Girls Age 8 and Up – Toy of the Year Award Winner',
								'4'=>'P0009',
								'5'=>'WH03-COS-345',
								'6'=>'WH01-COS-347',
								'7'=>'31'
							);
							$data[]=array('1'=>'6',
								'2'=>'SKU0008',
								'3'=>'DEERC Remote Control Dog Robot Toys for Kids Programmable Smart RC Robot with Gesture Sensing,Robotic Kit with LED Eyes,Walking,Talking,Singing,Dancing,Interactive Gift for Boys and Girls
4.5 out of 5 stars 299',
								'4'=>'P00011',
								'5'=>'WH02-COS-212',
								'6'=>'WH01-COS-337',
								'7'=>'30'
							);
							$data[]=array('1'=>'7',
								'2'=>'SKU0009',
								'3'=>'Osmo - Genius Starter Kit for iPad - 5 Educational Learning Games - Ages 6-10 - Math, Spelling, Creativity & More',
								'4'=>'P00013',
								'5'=>'WH04-COS-242',
								'6'=>'WH02-COS-347',
								'7'=>'30'
							);

							foreach ($data as $item): ?>
								<tr>
									<td><?php echo h($item['1']); ?></td>
									<td><?php echo h($item['2']); ?></td>
									<td><?php echo h($item['3']); ?></td>
<!--									<td>--><?php //echo h($item['4']); ?><!--</td>-->
									<td><?php echo h($item['5']); ?></td>
									<td><?php echo h($item['6']); ?></td>
									<td><?php echo h($item['7']); ?></td>



								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

