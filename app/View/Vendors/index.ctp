
	<?php echo $this->Session->flash(); ?>
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('Vendor');?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
						<li class="breadcrumb-item active"><?php echo __('Vendor');?></li>
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
							<h3 class="card-title"><?php echo __('Vendor List')?></h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-6">
								</div>
								<div class="col-6">
									<ol class="float-sm-right">
										<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Vendor'), array('action' => 'add'), array('escape' => false)); ?>
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
									<th><?php echo __('Ward');?></th>
									<th><?php echo __('City');?></th>
									<th><?php echo __('Region');?></th>
									<th><?php echo __('Country');?></th>
									<th><?php echo __('Description');?></th>
									<th><?php echo __('Active');?></th>
									<th class="actions"><?php echo __('Actions');?></th>
								</tr>
								</thead>
								<tbody>

								<?php
								foreach ($vendors as $vendor): ?>
									<tr>
										<td><?php echo h($vendor['Vendor']['id']); ?>&nbsp;</td>
										<td><?php echo $this->Html->link(h($vendor['Vendor']['name']), array('action' => 'view', $vendor['Vendor']['id'])); ?>&nbsp;</td>
										<td><?php echo h($vendor['Vendor']['phone']); ?>&nbsp;</td>
										<td><?php echo h($vendor['Vendor']['email']); ?>&nbsp;</td>
										<td><?php echo h($vendor['Vendor']['address1']); ?></td>
										<td><?php echo h($vendor['Vendor']['address2']); ?>&nbsp;</td>
										<td><?php echo h($vendor['Vendor']['ward']); ?>&nbsp;</td>
										<td><?php echo h($vendor['Vendor']['city']); ?>&nbsp;</td>
										<td><?php echo h($vendor['Vendor']['region']); ?>&nbsp;</td>
										<td><?php echo h($vendor['Vendor']['country']); ?>&nbsp;</td>
										<td><?php echo h($vendor['Vendor']['description']); ?></td>
										<td>
											<?php
												if ($vendor['Vendor']['active']) {
													echo __('Active');
												} else {
													echo __('InActive');
												}
											?>
										</td>
										<td class="actions">
											<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-shopping-cart')).' '.__('Edit'), array('action' => 'edit', $vendor['Vendor']['id']), array('escape' => false)); ?>
											<br>
											<?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-alt')).' '.__('Delete'), array('action' => 'delete', $vendor['Vendor']['id']),  array('escape' => false), __('Are you sure you want to delete # %s?', $vendor['Vendor']['id'])); ?>
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
