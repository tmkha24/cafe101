	<?php echo $this->Session->flash(); ?>

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('View Staff'); ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?php echo __('View Staff'); ?></li>
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
						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<ol class="float-sm-right">
										<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View Staff List'), array('action' => 'index'), array('escape' => false)); ?>
										<?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Staff'), array('action' => 'edit', $staff['Staff']['id']), array('escape' => false, "class" => "pl-3")); ?>
										<?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Staff'), array('action' => 'edit', $staff['Staff']['id'], 'copy'), array('escape' => false, "class" => "pl-3")); ?>
										<?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Staff'), array('action' => 'delete', $staff['Staff']['id']), array('escape' => false, "class" => "pl-3"), __('Are you sure you want to delete # %s?', $staff['Staff']['id'])); ?>
									</ol>
								</div>
							</div>
							<dl class="row">
								<dt class="col-sm-3"><?php echo __('Id'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($staff['Staff']['id']); ?>
								</dd>

								<dt class="col-sm-3">
									<?php echo __('Staff No'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($staff['Staff']['number']); ?>
								</dd>

								<dt class="col-sm-3">
									<?php echo __('Name'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($staff['Staff']['name']); ?>
								</dd>

								<dt class="col-sm-3">
									<?php echo __('Sex'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php
									if ($staff['Staff']['gender']) {
										echo __('Female');
									} else {
										echo __('Male');
									}
									?>
								</dd>

								<dt class="col-sm-3">
									<?php echo __('Contact No'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($staff['Staff']['phone']); ?>
								</dd>

								<dt class="col-sm-3">
									<?php echo __('Email'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($staff['Staff']['email']); ?>
								</dd>


								<dt class="col-sm-3"><?php echo __('Active'); ?></dt>
								<dd class="col-sm-9">
									<?php
									if ($staff['Staff']['active']) {
										echo __('Active');
									} else {
										echo __('InActive');
									} ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Created'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($staff['Staff']['created']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Updated'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($staff['Staff']['updated']); ?>
								</dd>
							</dl>
							<div class="card-footer ">
								<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View Staff List'), array('action' => 'index'), array('escape' => false, "class" => "float-right")); ?>
							</div>
						</div>
					</div>
					<?php if (!empty($staff['Notification'])):?>
						<div class="card">
							<div class="card-header">
								<h3 class="card-title"><?php echo __('Associated Notifications:') ?></h3>
							</div>
							<div class="card-body">
								<div class="row">
									<table id="table2" class="table table-bordered table-striped">
										<thead>
										<tr>
											<th><?php echo __('Id');?></th>
											<th><?php echo __('Title');?></th>
											<th><?php echo __('Content');?></th>
											<th><?php echo __('Created');?></th>
											<th><?php echo __('Updated');?></th>
											<th class="actions"><?php echo __('Actions');?></th>
										</tr>
										</thead>
										<tbody>

										<?php
										foreach ($staff['Notification'] as $notification): ?>
											<tr>
												<td><?php echo h($notification['id']); ?></td>
												<td><?php echo $this->Html->link($this->App->truncate(h($notification['title']),100), array('controller'=>'Notifications','action' => 'view', $notification['id'])); ?></td>
												<td><?php echo $this->App->truncate(h($notification['content']),100); ?></td>
												<td><?php echo $this->Time->nice(h($notification['created'])); ?></td>
												<td><?php echo $this->Time->nice(h($notification['updated'])); ?></td>
												<td class="actions">
													<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-shopping-cart')).' '.__('Edit'), array('controller'=>'notifications','action' => 'edit', $notification['id']), array('escape' => false)); ?>
													<br>
													<?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-alt')).' '.__('Delete'), array('controller'=>'notifications','action' => 'delete', $notification['id']),  array('escape' => false), __('Are you sure you want to delete # %s?', $notification['id'])); ?>
												</td>
											</tr>
										<?php endforeach; ?>
										</tbody>
									</table>
								</div>
								<div class="card-footer ">
									<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View Notification List'), array('controller'=>'Notifications','action' => 'index'), array('escape' => false, "class" => "float-right")); ?>
									<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Notification'), array('controller'=>'Notifications','action' => 'add', 'staff:'.$staff['Staff']['id']), array('escape' => false)); ?>
								</div>
							</div>
						</div>
					<?php endif; ?>

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
