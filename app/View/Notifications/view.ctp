	<?php echo $this->Session->flash(); ?>

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('Notification Detail'); ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?php echo __('Notification Detail'); ?></li>
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
										<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __(' Notification List'), array('action' => 'index'), array('escape' => false)); ?>
										<?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Notification'), array('action' => 'edit', $notification['Notification']['id']), array('escape' => false, "class" => "pl-3")); ?>
										<?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Notification'), array('action' => 'edit', $notification['Notification']['id'], 'copy'), array('escape' => false, "class" => "pl-3")); ?>
										<?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Notification'), array('action' => 'delete', $notification['Notification']['id']), array('escape' => false, "class" => "pl-3"), __('Are you sure you want to delete # %s?', $notification['Notification']['id'])); ?>
									</ol>
								</div>
							</div>
							<dl class="row">
								<dt class="col-sm-3"><?php echo __('Id'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($notification['Notification']['id']); ?>
								</dd>

								<dt class="col-sm-3">
									<?php echo __('Title'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($notification['Notification']['title']); ?>
								</dd>

								<dt class="col-sm-3">
									<?php echo __('Name'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($notification['Notification']['content']); ?>
								</dd>

								<dt class="col-sm-3"><?php echo __('Created'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($notification['Notification']['created']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Updated'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($notification['Notification']['updated']); ?>
								</dd>
							</dl>
							<div class="card-footer ">
								<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View Notification List'), array('action' => 'index'), array('escape' => false, "class" => "float-right")); ?>
							</div>
						</div>
					</div>
					<?php if (!empty($notification['Member'])):?>
						<div class="card">
						<div class="card-header">
							<h3 class="card-title"><?php echo __('Informed members:') ?></h3>
						</div>
						<div class="card-body">
							<div class="row">
								<table id="table2" class="table table-bordered table-striped">
									<thead>
									<tr>
										<th><?php echo __('Id');?></th>
										<th><?php echo __('Member No');?></th>
										<th><?php echo __('Name');?></th>
										<th><?php echo __('Sex');?></th>
										<th><?php echo __('Contact No');?></th>
										<th><?php echo __('Email');?></th>
										<th><?php echo __('Shipping Address');?></th>
										<th><?php echo __('Bonus Point');?></th>
										<th><?php echo __('Active');?></th>
										<th><?php echo __('Created');?></th>
										<th><?php echo __('Updated');?></th>
<!--										<th class="actions">--><?php //echo __('Actions');?><!--</th>-->
									</tr>
									</thead>
									<tbody>

									<?php
									foreach ($notification['Member'] as $member): ?>
										<tr>
											<td><?php echo h($member['id']); ?></td>
											<td><?php echo $this->Html->link(h($member['number']), array('controller'=>'members','action' => 'view', $member['id'])); ?></td>
											<td><?php echo $this->Html->link(h($member['name']), array('controller'=>'members','action' => 'view', $member['id'])); ?></td>
											<td>
												<?php
												if ($member['gender']) {
													echo __('Female');
												} else {
													echo __('Male');
												}
												?>
											</td>
											<td><?php echo h($member['phone']); ?></td>
											<td><?php echo h($member['email']); ?></td>
											<td><?php echo h($member['shipping_address']); ?></td>
											<td><?php echo h($member['point']); ?></td>
											<td>
												<?php
												if ($member['active']) {
													echo __('Active');
												} else {
													echo __('InActive');
												}
												?>
											</td>
											<td><?php echo $this->Time->nice(h($member['created'])); ?></td>
											<td><?php echo $this->Time->nice(h($member['updated'])); ?></td>
<!--											<td class="actions">-->
<!--												--><?php //echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-shopping-cart')).' '.__('Edit'), array('controller'=>'Members','action' => 'edit', $member['id']), array('escape' => false)); ?>
<!--												<br>-->
<!--												--><?php //echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-alt')).' '.__('Delete'), array('controller'=>'Members','action' => 'delete', $member['id']),  array('escape' => false), __('Are you sure you want to delete # %s?', $member['id'])); ?>
<!--											</td>-->
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="card-footer ">
								<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View All Member List'), array('controller'=>'Members','action' => 'index'), array('escape' => false, "class" => "float-right")); ?>
								<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Member'), array('controller'=>'Members','action' => 'add'), array('escape' => false)); ?>

							</div>
						</div>
					</div>
					<?php endif; ?>

					<?php if (!empty($notification['Staff'])):?>
						<div class="card">
						<div class="card-header">
							<h3 class="card-title"><?php echo __('Informed Staff:') ?></h3>
						</div>
						<div class="card-body">
							<div class="row">
								<table id="table3" class="table table-bordered table-striped">
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
<!--										<th class="actions">--><?php //echo __('Actions');?><!--</th>-->
									</tr>
									</thead>
									<tbody>

									<?php
									foreach ($notification['Staff'] as $staff): ?>
										<tr>
											<td><?php echo h($staff['id']); ?></td>
											<td><?php echo $this->Html->link(h($staff['number']), array('controller'=>'Staffs','action' => 'view', $staff['id'])); ?></td>
											<td><?php echo $this->Html->link(h($staff['name']), array('controller'=>'Staffs','action' => 'view', $staff['id'])); ?></td>
											<td>
												<?php
												if ($staff['gender']) {
													echo __('Female');
												} else {
													echo __('Male');
												}
												?>
											</td>
											<td><?php echo h($staff['phone']); ?></td>
											<td><?php echo h($staff['email']); ?></td>
											<td>
												<?php
												if ($staff['active']) {
													echo __('Active');
												} else {
													echo __('InActive');
												}
												?>
											</td>
											<td><?php echo $this->Time->nice(h($staff['created'])); ?></td>
											<td><?php echo $this->Time->nice(h($staff['updated'])); ?></td>
<!--											<td class="actions">-->
<!--												--><?php //echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-shopping-cart')).' '.__('Edit'), array('action' => 'edit', $staff['id']), array('escape' => false)); ?>
<!--												<br>-->
<!--												--><?php //echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-alt')).' '.__('Delete'), array('action' => 'delete', $staff['id']),  array('escape' => false), __('Are you sure you want to delete # %s?', $staff['id'])); ?>
<!--											</td>-->
										</tr>
									<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div class="card-footer ">
								<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View All Staff List'), array('controller'=>'Staffs','action' => 'index'), array('escape' => false, "class" => "float-right")); ?>
								<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New Staff'), array('controller'=>'Staffs','action' => 'add'), array('escape' => false)); ?>

							</div>
						</div>
					</div>
					<?php endif; ?>

				</div>
			</div>
		</div>
	</section>

<script>
	// $("#table2").DataTable({
	// 	"responsive": true,
	// 	"autoWidth": false,
	// });
	// $("#table3").DataTable({
	// 	"responsive": true,
	// 	"autoWidth": false,
	// });
</script>
