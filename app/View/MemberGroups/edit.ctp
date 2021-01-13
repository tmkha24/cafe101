
	<?php echo $this->Session->flash(); ?>
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('Edit Member\'s Group');?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
						<li class="breadcrumb-item active"><?php echo __('Edit Member\'s Group');?></li>
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
						<?php echo $this->Form->create('MemberGroup');?>
						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<ol class="float-sm-right">
										<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View MemberGroup List'), array('action' => 'index'), array('escape' => false)); ?>
									</ol>
								</div>
							</div>
							<fieldset>
								<div class="form-group">
									<?php echo $this->Form->input('name', array("class"=>"form-control", "label"=>__("Name"))); ?>
								</div>
								<div class="form-group">
									<?php echo $this->Form->input('description', array("class"=>"form-control", "label"=>__("Description"))); ?>
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




