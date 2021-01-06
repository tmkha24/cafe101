
	<?php echo $this->Session->flash(); ?>
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('Edit Text');?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
						<li class="breadcrumb-item active"><?php echo __('Edit Text');?></li>
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
						<?php echo $this->Form->create('TextTranslate');?>
						<div class="card-body">
							<div class="row">
								<div class="col-12">
									<ol class="float-sm-right">
										<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View Text List'), array('action' => 'index'), array('escape' => false)); ?>
									</ol>
								</div>
							</div>
							<fieldset>
								<div class="form-group">
									<?php echo $this->Form->input('msgid', array("class"=>"form-control", "label"=>__("Text"))); ?>
								</div>
								<div class="form-group">
									<?php echo $this->Form->input('msgstr', array("class"=>"form-control", "label"=>__("Translate"))); ?>
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




