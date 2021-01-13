<?php echo $this->Session->flash(); ?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?php echo __('Edit Member'); ?></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true) ?>"><?php echo __('Home') ?></a></li>
					<li class="breadcrumb-item active"><?php echo __('Edit Member'); ?></li>
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
					<?php echo $this->Form->create('Member'); ?>
					<div class="card-body">
						<div class="row">
							<div class="col-12">
								<ol class="float-sm-right">
									<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View Member List'), array('action' => 'index'), array('escape' => false)); ?>
								</ol>
							</div>
						</div>
						<fieldset>
							<div class="form-group">
								<?php echo $this->Form->input('number', array("class" => "form-control", "label" => __("Member No"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('name', array("class" => "form-control", "label" => __("Name"))); ?>
							</div>
							<div class="form-group">
								<?php
								echo $this->Form->input('gender', array(
									'options' => array('0' => 'Male', '1' => 'Female'),
									'default' => $member['Member']['gender'],
									'class' => 'form-control',
									"label" => __("Sex")
								));
								?>
							</div>
							<div class="form-group">
								<div class="input select">
									<label for="Distributors"><?php echo __('Groups'); ?></label>
									<select name="data[Member][member_group_id]" class="form-control" id="Distributors">
										<option value="null"><?php echo __('Select Group for Member'); ?></option>
										<?php foreach ($memberGroup as $item) : ?>
											<option 
													<?php if ($member['Member']['member_group_id'] == $item['MemberGroup']['id']) {
														echo "selected='selected'";
													}  ?>
													value="<?php echo $item['MemberGroup']['id'] ?>">
												<?php echo $item['MemberGroup']['name'] ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('phone', array("class" => "form-control", "label" => __("Contact No"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('email', array("class" => "form-control", "label" => __("Email"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('shipping_address', array("class" => "form-control", "label" => __("Shipping Address"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('point', array("class" => "form-control", "label" => __("Bonus Point"))); ?>
							</div>
							<!-- <div class="form-group">
								<?php echo $this->Form->input('Notification', array("class" => "form-control", "label" => __("Notification"))); ?>
							</div> -->

							<?php
							$checked = false;
							if ($member['Member']['active']) {
								$checked = true;
							}
							?>
							<div class="form-check">
								<input type="hidden" name="data[Member][active]" id="MemberActive_" value="0">
								<input <?php if ($checked) {
											echo "checked";
										} ?> type="checkbox" name="data[Member][active]" class="form-check-input" id="MemberActive">
								<label class="form-check-label" for="MemberActive">Active</label>
							</div>


						</fieldset>
					</div>
					<div class="card-footer ">
						<?php echo $this->Form->submit(__('Submit'), array("class" => "btn btn-primary float-right")); ?>
					</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
</section>