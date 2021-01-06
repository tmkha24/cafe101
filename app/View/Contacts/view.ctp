	<?php echo $this->Session->flash(); ?>

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('View Contact'); ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?php echo __('View Contact'); ?></li>
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
										<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View Contact List'), array('action' => 'index'), array('escape' => false)); ?>
										<?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Contact'), array('action' => 'edit', $contact['Contact']['id']), array('escape' => false, "class" => "pl-3")); ?>
										<?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Contact'), array('action' => 'edit', $contact['Contact']['id'], 'copy'), array('escape' => false, "class" => "pl-3")); ?>
										<?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Contact'), array('action' => 'delete', $contact['Contact']['id']), array('escape' => false, "class" => "pl-3"), __('Are you sure you want to delete # %s?', $contact['Contact']['id'])); ?>
									</ol>
								</div>
							</div>
							<dl class="row">
								<dt class="col-sm-3"><?php echo __('Id'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($contact['Contact']['id']); ?>
								</dd>


								<dt class="col-sm-3">
									<?php echo __('Name'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($contact['Contact']['name']); ?>
								</dd>


								<dt class="col-sm-3">
									<?php echo __('Contact No'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($contact['Contact']['phone']); ?>
								</dd>

								<dt class="col-sm-3">
									<?php echo __('Sex'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php
										if ($contact['Contact']['gender']) {
											echo __('Female');
										} else {
											echo __('Male');
										}
									?>
								</dd>


								<dt class="col-sm-3">
									<?php echo __('Email'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($contact['Contact']['email']); ?>
								</dd>

								<dt class="col-sm-3">
									<?php echo __('Address'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($contact['Contact']['address1']); ?>
								</dd>

								<dt class="col-sm-3">
									<?php echo __('Address Continue'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($contact['Contact']['address2']); ?>
								</dd>

								<dt class="col-sm-3">
									<?php echo __('Country'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($contact['Contact']['country']); ?>
								</dd>

								<dt class="col-sm-3">
									<?php echo __('Region'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($contact['Contact']['region']); ?>
								</dd>

								<dt class="col-sm-3">
									<?php echo __('City'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($contact['Contact']['city']); ?>
								</dd>

								<dt class="col-sm-3">
									<?php echo __('Ward'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($contact['Contact']['ward']); ?>
								</dd>

								<dt class="col-sm-3">
									<?php echo __('Description'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($contact['Contact']['description']); ?>
								</dd>


								<dt class="col-sm-3"><?php echo __('Active'); ?></dt>
								<dd class="col-sm-9">
									<?php
									if ($contact['Contact']['active']) {
										echo __('Active');
									} else {
										echo __('InActive');
									} ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Created'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($contact['Contact']['created']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Updated'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($contact['Contact']['updated']); ?>
								</dd>
							</dl>
							<div class="card-footer ">
								<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View Contact List'), array('action' => 'index'), array('escape' => false, "class" => "float-right")); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
				<?php if (!empty($contact['Notification'])):?>
					<div class="card">
						<div class="card-header">
							<h3 class="card-title"><?php echo __('Associated Notifications:') ?></h3>
						</div>
						<div class="card-body">
							<div class="row">
								<table id="table1" class="table table-bordered table-striped">
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
									foreach ($contact['Notification'] as $notification): ?>
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
						</div>
						<div class="card-footer ">
							<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View Notification List'), array('controller'=>'Notifications','action' => 'index'), array('escape' => false, "class" => "float-right")); ?>
							<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Notification'), array('controller'=>'Notifications','action' => 'add', 'contact:'.$contact['Contact']['id']), array('escape' => false)); ?>
						</div>
					</div>
				<?php endif; ?>
				</div>
			</div>
		</div>
	</section>

<script>
	$(function () {
		// $("#table1").DataTable({
			// "responsive": true,
			// "autoWidth": false,
		// });
	});
</script>
