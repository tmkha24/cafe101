	<?php echo $this->Session->flash(); ?>

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('View Vendor');?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?php echo __('View Vendor');?></li>
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
										<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View Vendor List'), array('action' => 'index'),  array('escape' => false)); ?>
										<?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Vendor'), array('action' => 'edit', $vendor['Vendor']['id']), array('escape' => false, "class"=>"pl-3")); ?>
										<?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Vendor'), array('action' => 'edit', $vendor['Vendor']['id'], 'copy'), array('escape' => false, "class"=>"pl-3")); ?>
										<?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Vendor'), array('action' => 'delete', $vendor['Vendor']['id']), array('escape' => false,"class"=>"pl-3"), __('Are you sure you want to delete # %s?', $vendor['Vendor']['id'])); ?>
									</ol>
								</div>
							</div>
							<dl  class="row">
								<dt class="col-sm-3"><?php echo __('Id'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($vendor['Vendor']['id']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Name'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($vendor['Vendor']['name']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Telephone No'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($vendor['Vendor']['phone']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Email Address'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($vendor['Vendor']['email']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Address'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($vendor['Vendor']['address1']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Address Continue'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($vendor['Vendor']['address2']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Country'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($vendor['Vendor']['country']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Region'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($vendor['Vendor']['region']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('City'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($vendor['Vendor']['city']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Ward'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($vendor['Vendor']['ward']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Description'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($vendor['Vendor']['description']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Active'); ?></dt>
								<dd class="col-sm-9">
									<?php
										if ($vendor['Vendor']['active']) {
											echo __('Active');
										} else {
											echo __('InActive');
										} ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Created'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($vendor['Vendor']['created']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Updated'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($vendor['Vendor']['updated']); ?>
								</dd>
							</dl>
							<div class="card-footer ">
								<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __("View Vendor List"), array('action' => 'index'),  array('escape' => false, "class"=>"float-right")); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
