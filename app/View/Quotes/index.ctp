
	<?php echo $this->Session->flash(); ?>
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('Quote');?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
						<li class="breadcrumb-item active"><?php echo __('Quote');?></li>
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
							<h3 class="card-title"><?php echo __('Quote List')?></h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-6">
								</div>
								<div class="col-6">
									<ol class="float-sm-right">
										<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Quote'), array('action' => 'add'), array('escape' => false)); ?>
									</ol>
								</div>
							</div>
							<table id="table1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th><?php echo __('Id');?></th>
									<th><?php echo __('Quote No');?></th>
									<th><?php echo __('Name');?></th>
									<th><?php echo __('Billing Contact Name');?></th>
									<th><?php echo __('Billing Contact Phone');?></th>
									<th><?php echo __('Amount');?></th>
									<th><?php echo __('Discount Amount');?></th>
									<th><?php echo __('Shipping Cost');?></th>
									<th><?php echo __('Grand Total');?></th>
									<th class="actions"><?php echo __('Actions');?></th>
								</tr>
								</thead>
								<tbody>

								<?php
								foreach ($quotes as $quote): ?>
									<tr>
										<td><?php echo h($quote['Quote']['id']); ?></td>
										<td><?php echo $this->Html->link(h($quote['Quote']['number']), array('action' => 'view', $quote['Quote']['id'])); ?></td>
										<td><?php echo $this->Html->link(h($quote['Quote']['name']), array('action' => 'view', $quote['Quote']['id'])); ?></td>
										<td><?php echo h($quote['Quote']['to_contact_name']); ?></td>
										<td><?php echo h($quote['Quote']['to_contact_phone']); ?></td>
										<td><?php echo h($quote['Quote']['currency']); echo h($quote['Quote']['amount']); ?></td>
										<td><?php echo h($quote['Quote']['currency']); echo h($quote['Quote']['discount_amount']); ?></td>
										<td><?php echo h($quote['Quote']['currency']); echo h($quote['Quote']['shipping_cost']); ?></td>
										<td><?php echo h($quote['Quote']['currency']); echo h($quote['Quote']['grant_total']); ?></td>
										<td class="actions">
											<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-shopping-cart')).' '.__('Edit'), array('action' => 'edit', $quote['Quote']['id']), array('escape' => false)); ?>
											<br>
											<?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-alt')).' '.__('Delete'), array('action' => 'delete', $quote['Quote']['id']),  array('escape' => false), __('Are you sure you want to delete # %s?', $quote['Quote']['id'])); ?>
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
