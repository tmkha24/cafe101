
	<?php echo $this->Session->flash(); ?>
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('Add Staff');?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
						<li class="breadcrumb-item active"><?php echo __('Add Staff');?></li>
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
						<?php echo $this->Form->create('Staff');?>
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<ol class="float-sm-right">
											<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View Staff List'), array('action' => 'index'), array('escape' => false)); ?>
										</ol>
									</div>
								</div>
								<fieldset>
									<div class="form-group">
										<?php echo $this->Form->input('number', array("class"=>"form-control", "label"=>__("Staff No"))); ?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('name', array("class"=>"form-control", "label"=>__("Name"))); ?>
									</div>
									<div class="form-group">
										<?php
										echo $this->Form->input('gender', array(
											'options' => array('0' => __('Male'), '1' => __('Female')),
											'class'=>'form-control',
											"label"=>__("Sex")
										));
										?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('phone', array("class"=>"form-control", "label"=>__("Contact No"))); ?>
									</div>
									<div class="form-group">
										<?php echo $this->Form->input('email', array("class"=>"form-control", "label"=>__("Email"))); ?>
									</div>
									<div class="form-check">
										<input type="hidden" name="data[Staff][active]" id="StaffActive_" value="0">
										<input type="checkbox" name="data[Staff][active]" class="form-check-input" id="StaffActive">
										<label class="form-check-label" for="StaffActive">Active</label>
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


