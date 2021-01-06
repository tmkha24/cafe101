
	<?php echo $this->Session->flash(); ?>
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('Edit Vendor');?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
						<li class="breadcrumb-item active"><?php echo __('Edit Vendor');?></li>
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
						<?php echo $this->Form->create('Vendor');?>
						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<ol class="float-sm-right">
										<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View Vendor List'), array('action' => 'index'), array('escape' => false)); ?>
									</ol>
								</div>
							</div>
							<fieldset>
								<div class="form-group">
									<?php echo $this->Form->input('name', array("class"=>"form-control", "label"=>__("Name"))); ?>
								</div>
								<div class="form-group">
									<?php echo $this->Form->input('phone', array("class"=>"form-control", "label"=>__("Telephone No"))); ?>
								</div>
								<div class="form-group">
									<?php echo $this->Form->input('email', array("class"=>"form-control", "label"=>__("Email Address"))); ?>
								</div>
								<div class="form-group">
									<?php echo $this->Form->input('address1', array("class"=>"form-control", "label"=>__("Address1"))); ?>
								</div>
								<div class="form-group">
									<?php echo $this->Form->input('address2', array("class"=>"form-control", "label"=>__("Address2"))); ?>
								</div>
								<div class="form-group">
									<?php 		echo $this->Form->input('country', array("class"=>"form-control", "label"=>__("Country"))); ?>
								</div>
								<div class="form-group">
									<?php echo $this->Form->input('region', array("class"=>"form-control", "label"=>__("Region"))); ?>
								</div>
								<div class="form-group">
									<?php echo $this->Form->input('city', array("class"=>"form-control", "label"=>__("City"))); ?>
								</div>
								<div class="form-group">
									<?php echo $this->Form->input('ward', array("class"=>"form-control", "label"=>__("Ward"))); ?>
								</div>
								<div class="form-group">
									<?php echo $this->Form->input('description', array("class"=>"form-control", "label"=>__("Description"))); ?>
								</div>
								<?php
									$checked = false;
									if ($vendor['Vendor']['active']) {
										$checked = true;
									}
								?>
								<div class="form-check">
									<input type="hidden" name="data[Vendor][active]" id="VendorActive_" value="0">
									<input <?php if($checked){echo "checked";} ?> type="checkbox" name="data[Vendor][active]" class="form-check-input" id="VendorActive">
									<label class="form-check-label" for="VendorActive">Active</label>
								</div>

							</fieldset>
						</div>
						<div class="card-footer ">
							<?php echo $this->Form->submit(__('Submit'), array("class"=>"btn btn-primary float-right"));?>
						</div>
						<?php echo $this->Form->end();?>
					</div>
				</div>
			</div>
		</div>
	</section>




