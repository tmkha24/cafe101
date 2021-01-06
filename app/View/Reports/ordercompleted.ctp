
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
					<li class="breadcrumb-item active"><?php echo __('Order');?></li>
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
							<h1><?php echo __('Report Completed Order ');?></h1>
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
								<th><?php echo __('Order No');?></th>
								<th><?php echo __('Order Date');?></th>
								<th><?php echo __('Ship To Name');?></th>
								<th><?php echo __('Amount');?></th>
								<th><?php echo __('Discount Amount');?></th>
								<th><?php echo __('Shipping Cost');?></th>
								<th><?php echo __('Grand Total');?></th>
								<th><?php echo __('Status');?></th>

							</tr>
							</thead>
							<tbody>

							<?php $i =0;
							foreach ($orders as $order): $i++; ?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $this->Html->link(h($order['Order']['number']), array('controller'=>'orders','action' => 'view', $order['Order']['id'])); ?></td>
									<td><?php echo h($order['Order']['created']); ?></td>
									<td><?php echo h($order['Order']['shipping_contact_name']); ?></td>
									<td><?php echo h($order['Order']['currency']);echo h($order['Order']['amount']); ?></td>
									<td><?php echo h($order['Order']['currency']);echo h($order['Order']['discount_amount']); ?></td>
									<td><?php echo h($order['Order']['currency']);echo h($order['Order']['shipping_cost']); ?></td>
									<td><?php echo h($order['Order']['currency']);echo h($order['Order']['grant_total']); ?></td>
									<td ><?php
										switch ($order['Order']['status']){
											case 0:
												echo 'Pending';
												break;
											case 1:
												echo 'Processing';
												break;
											case 2:
												echo 'Shipping';
												break;
											case 3:
												echo 'Completed';
												break;
											case 4:
												echo 'Hold';
												break;
											case 5:
												echo 'Canceled';
												break;
										}?></td>


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

