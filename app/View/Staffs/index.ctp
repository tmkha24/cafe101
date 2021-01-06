
	<?php echo $this->Session->flash(); ?>
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('Staff');?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
						<li class="breadcrumb-item active"><?php echo __('Staff');?></li>
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
							<h3 class="card-title"><?php echo __('Staff List')?></h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-6">
								</div>
								<div class="col-6">
									<ol class="float-sm-right">

										<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Staff'), array('action' => 'add'), array('escape' => false)); ?>
									</ol>
								</div>
							</div>
							<table id="table1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th><?php echo __('Id');?></th>
									<th><?php echo __('Staff No');?></th>
									<th><?php echo __('Name');?></th>
									<th><?php echo __('Sex');?></th>
									<th><?php echo __('Contact No');?></th>
									<th><?php echo __('Email');?></th>
									<th><?php echo __('Active');?></th>
									<th><?php echo __('Created');?></th>
									<th><?php echo __('Updated');?></th>
									<th class="actions"><?php echo __('Actions');?></th>
								</tr>
								</thead>
								<tbody>

								<?php
								foreach ($staffs as $staff): ?>
									<tr>
										<td><?php echo h($staff['Staff']['id']); ?></td>
										<td><?php echo $this->Html->link(h($staff['Staff']['number']), array('action' => 'view', $staff['Staff']['id'])); ?></td>
										<td><?php echo $this->Html->link(h($staff['Staff']['name']), array('action' => 'view', $staff['Staff']['id'])); ?></td>
										<td>
											<?php
											if ($staff['Staff']['gender']) {
												echo __('Female');
											} else {
												echo __('Male');
											}
											?>
										</td>
										<td><?php echo h($staff['Staff']['phone']); ?></td>
										<td><?php echo h($staff['Staff']['email']); ?></td>
										<td>
											<?php
											if ($staff['Staff']['active']) {
												echo __('Active');
											} else {
												echo __('InActive');
											}
											?>
										</td>
										<td><?php echo $this->Time->nice(h($staff['Staff']['created'])); ?></td>
										<td><?php echo $this->Time->nice(h($staff['Staff']['updated'])); ?></td>
										<td class="actions">
											<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-shopping-cart')).' '.__('Edit'), array('action' => 'edit', $staff['Staff']['id']), array('escape' => false)); ?>
											<br>
											<?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-alt')).' '.__('Delete'), array('action' => 'delete', $staff['Staff']['id']),  array('escape' => false), __('Are you sure you want to delete # %s?', $staff['Staff']['id'])); ?>
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
