
	<?php echo $this->Session->flash(); ?>
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('Dashboard');?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
						<li class="breadcrumb-item active"><?php echo __('Dashboard');?></li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-3 col-3">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3><?php echo $categoriesCount?></h3>

							<p><?php echo __('Categories') ?></p>
						</div>
						<div class="icon">
							<i class="ion ion-ios-briefcase"></i>
						</div>
						<?php echo $this->Html->link(__('More info')." "."<i class='fas fa-arrow-circle-right'></i>", array('controller'=>'category','action' => 'index'), array('escape' => false, 'class'=>'small-box-footer')); ?>
					</div>
				</div>
				<!-- ./col -->
				<div class="col-lg-3 col-3">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?php echo $productsCount?></h3>

							<p><?php echo __('Products') ?></p>
						</div>
						<div class="icon">
							<i class="ion ion-ios-folder"></i>
						</div>
						<?php echo $this->Html->link(__('More info')." "."<i class='fas fa-arrow-circle-right'></i>", array('controller'=>'products','action' => 'index'), array('escape' => false, 'class'=>'small-box-footer')); ?>
					</div>
				</div>
				<div class="col-lg-3 col-3">
					<!-- small box -->
					<div class="small-box bg-alert">
						<div class="inner">
							<h3><?php echo $vendorsCount?></h3>

							<p><?php echo __('Vendors') ?></p>
						</div>
						<div class="icon">
							<i class="ion ion-ios-people"></i>
						</div>
						<?php echo $this->Html->link(__('More info')." "."<i class='fas fa-arrow-circle-right'></i>", array('controller'=>'vendors','action' => 'index'), array('escape' => false, 'class'=>'small-box-footer')); ?>
					</div>
				</div>
				<div class="col-lg-3 col-3">
					<!-- small box -->
					<div class="small-box bg-warning">
						<div class="inner">
							<h3><?php echo $ordersCount?></h3>

							<p><?php echo __('Orders') ?></p>
						</div>
						<div class="icon">
							<i class="ion ion-ios-cart"></i>
						</div>
						<?php echo $this->Html->link(__('More info')." "."<i class='fas fa-arrow-circle-right'></i>", array('controller'=>'orders','action' => 'index'), array('escape' => false, 'class'=>'small-box-footer')); ?>
					</div>
				</div>
				<!-- ./col -->

			</div>
			<div class="row">
				<div class="col-lg-6 col-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title"><?php echo __('Product List')?></h3>
						</div>
						<div class="card-body">
							<table id="table1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th><?php echo __('Id');?></th>
									<th><?php echo __('Name');?></th>
									<th><?php echo __('Model');?></th>
									<th><?php echo __('Brand');?></th>
									<th><?php echo __('Category');?></th>
									<th><?php echo __('Unit Price');?></th>
								</tr>
								</thead>
								<tbody>

								<?php
								foreach ($products as $product): ?>
									<tr>
										<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
										<td><?php echo $this->Html->link(h($product['Product']['name']), array('controller'=>'products','action' => 'view', $product['Product']['id'])); ?>&nbsp;</td>
										<td><?php echo h($product['Product']['model']); ?>&nbsp;</td>
										<td><?php echo h($product['Product']['brand']); ?>&nbsp;</td>
										<?php
										$categoryName ='';
										if (isset($product['Category'][0])){
											$categoryName = $product['Category'][0]['name'];
										}
										?>
										<td><?php echo h($categoryName); ?></td>
										<td><?php echo h($product['Product']['currency']);echo h($product['Product']['unit_price']); ?>&nbsp;</td>

									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class="row card-footer">
							<div class="col-12">
								<ol class="float-sm-right">
									<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View All'), array('controller'=>'Staffs','action' => 'index'), array('escape' => false)); ?>
								</ol>
							</div>
						</div>
					</div>

				</div>

				<div class="col-lg-6 col-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title"><?php echo __('Category List')?></h3>
						</div>
						<div class="card-body">
							<table id="table2" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th><?php echo __('Id');?></th>
									<th><?php echo __('Name');?></th>
									<th><?php echo __('Description');?></th>
									<th><?php echo __('Active');?></th>
									<th><?php echo __('Created');?></th>
									<th><?php echo __('Updated');?></th>
								</tr>
								</thead>
								<tbody>

								<?php
								foreach ($categories as $category): ?>
									<tr>
										<td><?php echo h($category['Category']['id']); ?></td>
										<td><?php echo $this->Html->link(h($category['Category']['name']), array('controller'=>'categories','action' => 'view', $category['Category']['id'])); ?></td>
										<td><?php echo h($category['Category']['description']); ?></td>
										<td>
											<?php
											if ($category['Category']['active']) {
												echo __('Active');
											} else {
												echo __('InActive');
											}
											?>
										</td>
										<td><?php echo $this->Time->nice(h($category['Category']['created'])); ?></td>
										<td><?php echo $this->Time->nice(h($category['Category']['updated'])); ?></td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class="row card-footer">
							<div class="col-12">
								<ol class="float-sm-right">
									<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View All'), array('controller'=>'category','action' => 'index'), array('escape' => false)); ?>
								</ol>
							</div>
						</div>
					</div>

				</div>

				<div class="col-lg-12 col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title"><?php echo __('Vendor List')?></h3>
						</div>
						<div class="card-body">

							<table id="table3" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th><?php echo __('Id');?></th>
									<th><?php echo __('Name');?></th>
									<th><?php echo __('Telephone No');?></th>
									<th><?php echo __('Email Address');?></th>
									<th><?php echo __('Address');?></th>
									<th><?php echo __('Address Continue');?></th>
									<th><?php echo __('City');?></th>
									<th><?php echo __('Ward');?></th>
									<th><?php echo __('Region');?></th>
									<th><?php echo __('Country');?></th>
								</tr>
								</thead>
								<tbody>

								<?php
								foreach ($vendors as $vendor): ?>
									<tr>
										<td><?php echo h($vendor['Vendor']['id']); ?>&nbsp;</td>
										<td><?php echo $this->Html->link(h($vendor['Vendor']['name']), array('controller'=>'vendors','action' => 'view', $vendor['Vendor']['id'])); ?>&nbsp;</td>
										<td><?php echo h($vendor['Vendor']['phone']); ?>&nbsp;</td>
										<td><?php echo h($vendor['Vendor']['email']); ?>&nbsp;</td>
										<td><?php echo h($vendor['Vendor']['address1']); ?></td>
										<td><?php echo h($vendor['Vendor']['address2']); ?>&nbsp;</td>
										<td><?php echo h($vendor['Vendor']['city']); ?>&nbsp;</td>
										<td><?php echo h($vendor['Vendor']['ward']); ?>&nbsp;</td>
										<td><?php echo h($vendor['Vendor']['region']); ?>&nbsp;</td>
										<td><?php echo h($vendor['Vendor']['country']); ?>&nbsp;</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class="row card-footer">
							<div class="col-12">
								<ol class="float-sm-right">
									<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View All'), array('controller'=>'vendors','action' => 'index'), array('escape' => false)); ?>
								</ol>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-12 col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title"><?php echo __('Order List')?></h3>
						</div>
						<div class="card-body">
							<table id="table4" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th><?php echo __('Id');?></th>
									<th><?php echo __('Order No');?></th>
									<th><?php echo __('Order Date');?></th>
									<th><?php echo __('Ship To Name');?></th>
									<th><?php echo __('Amount');?></th>
									<th><?php echo __('Discount Amount');?></th>
									<th><?php echo __('Shipping Cost');?></th>
									<th><?php echo __('Grand Total');?></th>
									<th><?php echo __('Status');?></th>
									<th class="d-none1"> <?php echo __('Product Items of Order');?></th>

								</tr>
								</thead>
								<tbody>

								<?php
								foreach ($orders as $order): ?>
									<tr>
										<td><?php echo h($order['Order']['id']); ?></td>
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
										<td class="d-none1">
											<div class="card collapsed-card">
												<div class="card-header">
													<h3 class="card-title"><?php echo count($order['OrderItem'])." "; echo __('Items');?></h3>
													<div class="card-tools">
														<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
															<i class="fas fa-plus"></i></button>
													</div>
												</div>
												<div class="card-body">
													<?php
													$i =0;
													foreach ($order['OrderItem'] as $orderItem){
														$i++;
														echo $i." - "; echo h($orderItem['name']); echo "<br>";
													}
													?>
												</div>
											</div>
										</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
						<div class="row card-footer">
							<div class="col-12">
								<ol class="float-sm-right">
									<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View All'), array('controller'=>'orders','action' => 'index'), array('escape' => false)); ?>
								</ol>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</div>
	</section>

<script>
	$(function () {
		$("#table1").DataTable({
			"paging": false,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
			// "responsive": true,
			// "autoWidth": false,
		});
		$("#table2").DataTable({
			"paging": false,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
			// "responsive": true,
			// "autoWidth": false,
		});
		$("#table3").DataTable({
			"paging": false,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
			// "responsive": true,
			// "autoWidth": false,
		});
		$("#table4").DataTable({
			"paging": false,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
			// "responsive": true,
			// "autoWidth": false,
		});


	});
</script>
