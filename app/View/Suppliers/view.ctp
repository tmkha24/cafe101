	<?php echo $this->Session->flash(); ?>

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('View Supplier');?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?php echo __('View Supplier');?></li>
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
										<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View Supplier List'), array('action' => 'index'),  array('escape' => false)); ?>
										<?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Supplier'), array('action' => 'edit', $supplier['Supplier']['id']), array('escape' => false, "class"=>"pl-3")); ?>
										<?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Supplier'), array('action' => 'edit', $supplier['Supplier']['id'], 'copy'), array('escape' => false, "class"=>"pl-3")); ?>
										<?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Supplier'), array('action' => 'delete', $supplier['Supplier']['id']), array('escape' => false,"class"=>"pl-3"), __('Are you sure you want to delete # %s?', $supplier['Supplier']['id'])); ?>
									</ol>
								</div>
							</div>
							<dl  class="row">
								<dt class="col-sm-3"><?php echo __('Id'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($supplier['Supplier']['id']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Name'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($supplier['Supplier']['name']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Telephone No'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($supplier['Supplier']['phone']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Email Address'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($supplier['Supplier']['email']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Address1'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($supplier['Supplier']['address1']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Address2'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($supplier['Supplier']['address2']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Country'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($supplier['Supplier']['country']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Region'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($supplier['Supplier']['region']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('City'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($supplier['Supplier']['city']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Ward'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($supplier['Supplier']['ward']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Description'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($supplier['Supplier']['description']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Active'); ?></dt>
								<dd class="col-sm-9">
									<?php
										if ($supplier['Supplier']['active']) {
											echo __('Active');
										} else {
											echo __('InActive');
										} ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Created'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($supplier['Supplier']['created']); ?>
								</dd>
								<dt class="col-sm-3"><?php echo __('Updated'); ?></dt>
								<dd class="col-sm-9">
									<?php echo h($supplier['Supplier']['updated']); ?>
								</dd>
							</dl>
							<div class="card-footer ">
								<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __("View Supplier List"), array('action' => 'index'),  array('escape' => false, "class"=>"float-right")); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
