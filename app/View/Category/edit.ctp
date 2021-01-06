
	<?php echo $this->Session->flash(); ?>
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('Edit Category');?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
						<li class="breadcrumb-item active"><?php echo __('Edit Category');?></li>
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
						<?php echo $this->Form->create('Category');?>
						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<ol class="float-sm-right">
										<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View Category List'), array('action' => 'index'), array('escape' => false)); ?>
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
								<div class="form-group">
									<?php
									echo $this->Form->input('parent_id',array('type'=>'select',"class"=>"form-control",'options'=>$list_cat,'empty'=>__('--Choose parent--')));
									?>
								</div>
								<?php
								$checked = false;
								if ($category['Category']['active']) {
									$checked = true;
								}
								?>
								<div class="form-check">
									<input type="hidden" name="data[Category][active]" id="CategoryActive_" value="0">
									<input  <?php if($checked){echo "checked";} ?> type="checkbox" name="data[Category][active]" class="form-check-input" id="CategoryActive">
									<label class="form-check-label" for="CategoryActive"><?php echo __('Active')?></label>
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




