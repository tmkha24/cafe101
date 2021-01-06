
	<?php echo $this->Session->flash(); ?>
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('Order Status');?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
						<li class="breadcrumb-item active"><?php echo __('Order Status');?></li>
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
							<h3 class="card-title"><?php echo __('Order List')?></h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-6">
								</div>
								<div class="col-6">
									<ol class="float-sm-right">
										<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Order'), array('action' => 'add'), array('escape' => false)); ?>
									</ol>
								</div>
							</div>
							<table id="table1" class="table table-bordered table-striped">
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
									<th class="actions"><?php echo __('Actions');?></th>

								</tr>
								</thead>
								<tbody>

								<?php
								foreach ($orders as $order): ?>
									<tr>
										<td><?php echo h($order['Order']['id']); ?></td>
										<td><?php echo $this->Html->link(h($order['Order']['number']), array('action' => 'view', $order['Order']['id'])); ?></td>
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

										<td class="actions">
											<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-shopping-cart')).' '.__('Edit'), array('action' => 'edit', $order['Order']['id']), array('escape' => false)); ?>
											<br>
											<?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-alt')).' '.__('Delete'), array('action' => 'delete', $order['Order']['id']),  array('escape' => false), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>
										</td>

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

<script>
	$(function () {
		$("#table1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
	});
</script>
