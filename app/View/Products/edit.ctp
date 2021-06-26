<?php
$requestData = '';
if (isset($this->request->data['Product'])) {
	$requestData = $this->request->data['Product'];
}
?>
<?php echo $this->Session->flash(); ?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?php echo __d('product', 'Cập nhật sản phẩm'); ?></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo Router::url('/products', true) ?>"><?php echo __('Trở lại') ?></a></li>
					<li class="breadcrumb-item active"><?php echo __('Cập nhật sản phẩm'); ?></li>
				</ol>
			</div>
		</div>
	</div>
</section>
<?php echo $this->Form->create('Product', array('type' => 'file')); ?>

<section class="content">
	<div class="container-fluid">
		<div class="row">

			<div class="col">
				<div class="card">
					<div class="card-body">
						<fieldset>
							<?php for ($i = 1; $i <= 1; $i++) { ?>
								<div class="form-group">
									<label for="exampleInputFile<?php echo $i; ?>">
										<?php echo __('Hình ảnh') ?>
									</label>
									<div class="input-group">
										<div class="input-group-prepend ">
											<span class="input-group-text imageBannerPreview" id="imageBannerPreview<?php echo $i; ?>" style="padding:0px; width: 38px; height: 38px;">
												<?php if (!empty($requestData['image' . $i])) {
													echo $this->Html->image(
														'/img/product/' . $requestData['image' . $i],
														array('height' => '38', 'width' => '38', 'id' => 'image' . $i)
													);
												}; ?>
											</span>
										</div>
										<div class="custom-file">
											<?php echo $this->Form->file('image' . $i, array('class' => 'custom-file-input', 'value' => $requestData['image' . $i], 'id' => 'exampleInputFile' . $i, 'accept' => 'image/*')) ?>
											<label class="custom-file-label" for="exampleInputFile<?php echo $i; ?>">
												<?php
												echo __('Choose file');
												?>
											</label>
										</div>


									</div>
									<div class="form-check">
										<input type="checkbox" name="data[Product][<?php echo  'image' . $i . '_delete' ?>]" class="form-check-input" id="<?php echo 'image' . $i . '_delete' ?>">
										<label class="form-check-label" for="<?php echo 'image' . $i . '_delete' ?>">
											<?php echo __('Xóa') ?>
										</label>
									</div>
								</div>
							<?php } ?>
						</fieldset>
					</div>
				</div>
				
				<div class="card">
					<div class="card-body">
						<fieldset>
							<div class="form-group">
								<?php echo $this->Form->input('name', array("class" => "form-control", "label" => __("Tên sản phẩm"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('Category', array("class" => "form-control", "label" => __("Thuộc danh mục"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('unit_price', array("class" => "form-control", "label" => __("Giá"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('description', array("class" => "form-control", "label" => __("Thông tin sản phẩm"))); ?>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<?php echo $this->Form->submit(__('Cập nhật'), array("class" => "btn btn-primary float-right")); ?>
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