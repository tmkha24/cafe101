
	<?php echo $this->Session->flash(); ?>
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('Supplier');?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
						<li class="breadcrumb-item active"><?php echo __('Supplier');?></li>
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
							<h3 class="card-title"><?php echo __('Supplier List')?></h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-6">
								</div>
								<div class="col-6">
									<ol class="float-sm-right">
										<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Supplier'), array('action' => 'add'), array('escape' => false)); ?>
									</ol>
								</div>
							</div>
							<table id="table1" class="table table-bordered table-striped">
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
									<th><?php echo __('Description');?></th>
									<th><?php echo __('Active');?></th>
									<th><?php echo __('Created');?></th>
									<th><?php echo __('Updated');?></th>
									<th class="actions"><?php echo __('Actions');?></th>
								</tr>
								</thead>
								<tbody>

								<?php
								foreach ($suppliers as $supplier): ?>
									<tr>
										<td><?php echo h($supplier['Supplier']['id']); ?>&nbsp;</td>
										<td><?php echo $this->Html->link(h($supplier['Supplier']['name']), array('action' => 'view', $supplier['Supplier']['id'])); ?>&nbsp;</td>
										<td><?php echo h($supplier['Supplier']['phone']); ?>&nbsp;</td>
										<td><?php echo h($supplier['Supplier']['email']); ?>&nbsp;</td>
										<td><?php echo h($supplier['Supplier']['address1']); ?></td>
										<td><?php echo h($supplier['Supplier']['address2']); ?>&nbsp;</td>
										<td><?php echo h($supplier['Supplier']['city']); ?>&nbsp;</td>
										<td><?php echo h($supplier['Supplier']['ward']); ?>&nbsp;</td>
										<td><?php echo h($supplier['Supplier']['region']); ?>&nbsp;</td>
										<td><?php echo h($supplier['Supplier']['country']); ?>&nbsp;</td>
										<td><?php echo h($supplier['Supplier']['description']); ?></td>
										<td>
											<?php
												if ($supplier['Supplier']['active']) {
													echo __('Active');
												} else {
													echo __('InActive');
												}
											?>
										</td>
										<td><?php echo $this->Time->nice(h($supplier['Supplier']['created'])); ?>&nbsp;</td>
										<td><?php echo $this->Time->nice(h($supplier['Supplier']['updated'])); ?>&nbsp;</td>
										<td class="actions">
											<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-shopping-cart')).' '.__('Edit'), array('action' => 'edit', $supplier['Supplier']['id']), array('escape' => false)); ?>
											<br>
											<?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-alt')).' '.__('Delete'), array('action' => 'delete', $supplier['Supplier']['id']),  array('escape' => false), __('Are you sure you want to delete # %s?', $supplier['Supplier']['id'])); ?>
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
