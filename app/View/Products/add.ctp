<?php echo $this->Session->flash(); ?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?php echo __d('product', 'Add Product'); ?></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true) ?>"><?php echo __('Home') ?></a></li>
					<li class="breadcrumb-item active"><?php echo __('Add Product'); ?></li>
				</ol>
			</div>
		</div>
	</div>
</section>
<?php echo $this->Form->create('Product', array('type' => 'file')); ?>

<section class="content">
	<div class="container-fluid">
		<div class="row">

			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<fieldset>
							<?php for ($i = 1; $i <= 5; $i++) { ?>
								<div class="form-group">
									<label for="exampleInputFile<?php echo $i; ?>">
										<?php echo __('Image') . " " . $i; ?>
									</label>
									<div class="input-group">
										<div class="input-group-prepend ">
											<span class="input-group-text imageBannerPreview" id="imageBannerPreview<?php echo $i; ?>" style="padding:0px; width: 38px; height: 38px;">
											</span>
										</div>
										<div class="custom-file">
											<?php echo $this->Form->file('image' . $i, array('class' => 'custom-file-input', 'id' => 'exampleInputFile' . $i, 'accept' => 'image/*')) ?>
											<label class="custom-file-label" for="exampleInputFile<?php echo $i; ?>">
												<?php
												echo __('Choose file');
												?>
											</label>
										</div>
									</div>
								</div>
							<?php } ?>
						</fieldset>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<fieldset>
							<div class="form-group">
								<?php echo $this->Form->input('name', array("class" => "form-control", "label" => __("Name"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('model', array("class" => "form-control", "label" => __("Model No"))); ?>
							</div>

							<div class="form-group">
								<?php echo $this->Form->input('brand', array("class" => "form-control", "label" => __("Brand"))); ?>
							</div>
							<div class="form-group">
								<label><?php echo __('Manufacturing Date');?> </label>
								<div class="input-group date" id="reservationdate" data-target-input="nearest">
									<input type="text" name="data[Product][mfg_date]" class="form-control datetimepicker-input" data-target="#reservationdate"/>
									<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label><?php echo __('Expiration Date');?> </label>
								<div class="input-group date" id="reservationdate" data-target-input="nearest">
									<input type="text" name="data[Product][expiry_date]" class="form-control datetimepicker-input" data-target="#reservationdate"/>
									<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('specification', array("class" => "form-control", "label" => __("Specification"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('Category', array("class" => "form-control", "label" => __("Category"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('storage', array("class" => "form-control", "min" => 0, "label" => __("Storage"))); ?>
							</div>
							<div class="form-group">
								<?php
								echo $this->Form->input('currency', array(
									'options' => array(
										'HK$' => 'HK$'
									),
									'default' => 'HK$',
									'class' => 'form-control',
									"label" => __("Currency")
								));
								?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('unit_price', array("class" => "form-control", "label" => __("Unit Price"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('description', array("class" => "form-control", "label" => __("Description"))); ?>
							</div>
							<div class="form-check">
								<input type="hidden" name="data[Product][active]" id="ProductActive_" value="0">
								<input type="checkbox" name="data[Product][active]" class="form-check-input" id="ProductActive">
								<label class="form-check-label" for="ProductActive"><?php echo __('Active') ?></label>
							</div>

						</fieldset>
					</div>

				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<?php echo $this->Form->submit(__('Submit'), array("class" => "btn btn-primary float-right")); ?>
			</div>
		</div>
		<br>
	</div>
</section>
<?php echo $this->Form->end(); ?>

<script type="text/javascript">
	$("#exampleInputFile").on("change", function() {
		var files = !!this.files ? this.files : [];
		if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
		$("#image").hide(); //
		if (/^image/.test(files[0].type)) { // only image file
			var reader = new FileReader(); // instance of the FileReader
			reader.readAsDataURL(files[0]); // read the local file

			reader.onloadend = function() { // set image data as background of div
				$("#imageBannerPreview").css("background-image", "url(" + this.result + ")");
				$("#imageBannerPreview").css("background-size", " 38px 38px");
				$("#imageBannerPreview").css("background-repeat", "no-repeat");
			}
		}
	});

	$(document).ready(function() {
		bsCustomFileInput.init();
	});



	<?php for ($i = 1; $i <= 5; $i++) { ?>

		$("#exampleInputFile<?php echo $i; ?>").on("change", function() {
			var files = !!this.files ? this.files : [];
			if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
			$("#image<?php echo $i; ?>").hide(); //
			if (/^image/.test(files[0].type)) { // only image file
				var reader = new FileReader(); // instance of the FileReader
				reader.readAsDataURL(files[0]); // read the local file

				reader.onloadend = function() { // set image data as background of div
					$("#imageBannerPreview<?php echo $i; ?>").css("background-image", "url(" + this.result + ")");
					$("#imageBannerPreview<?php echo $i; ?>").css("background-size", " 38px 38px");
					$("#imageBannerPreview<?php echo $i; ?>").css("background-repeat", "no-repeat");
				}
			}
		});

	<?php } ?>
</script>