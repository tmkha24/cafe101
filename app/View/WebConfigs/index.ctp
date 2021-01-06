<?php

$companyLogo = Configure::read('companyLogo');
$companyName = Configure::read('companyName');
$companyTextColor = Configure::read('companyTextColor');
$companyBackgroundColor = Configure::read('companyBackgroundColor');
$companyBorderBottomBackgroundColor = Configure::read('companyBorderBottomBackgroundColor');

$linkColor = Configure::read('linkColor');
$linkHoverColor = Configure::read('linkHoverColor');
$buttonColor = Configure::read('buttonColor');
$buttonTextColor = Configure::read('buttonTextColor');

$sidebarTextColor = Configure::read('sidebarTextColor');
$sidebarBackgroundColor = Configure::read('sidebarBackgroundColor');

$navTextColor = Configure::read('navTextColor');
$navTextHoverColor = Configure::read('navTextHoverColor');
$navBackgroundColor = Configure::read('navBackgroundColor');
$navBorderBottomColor = Configure::read('navBorderBottomColor');

$contentTextColor = Configure::read('contentTextColor');
$contentBackgroundColor = Configure::read('contentBackgroundColor');

$cardTextColor = Configure::read('cardTextColor');
$cardBackgroundColor = Configure::read('cardBackgroundColor');
$gridBorderColor = Configure::read('gridBorderColor');

$footerText = Configure::read('footerText');

$footerTextColor = Configure::read('footerTextColor');
$footerBackgroundColor = Configure::read('footerBackgroundColor');
$footerBorderColor = Configure::read('footerBorderColor');


//$config=array(
//	array('name' =>'Company Text Color', 'value' => Configure::read('companyTextColor')),
//	array('name' =>'Company Background Color', 'value' => Configure::read('companyBackgroundColor')),
//	array('name' =>'Link Color', 'value' =>Configure::read('linkColor')),
//	array('name' =>'Button Color', 'value' =>Configure::read('buttonColor')),
//	array('name' =>'Button Text Color', 'value' =>Configure::read('buttonTextColor')),
//	array('name' =>'Sidebar Text Color', 'value' =>Configure::read('sidebarTextColor')),
//	array('name' =>'Sidebar Background Color', 'value' =>Configure::read('sidebarBackgroundColor')),
//	array('name' =>'Nav Text Color', 'value' =>Configure::read('navTextColor')),
//	array('name' =>'Nav Background Color', 'value' =>Configure::read('navBackgroundColor')),
//	array('name' =>'Content Text Color', 'value' =>Configure::read('contentTextColor')),
//	array('name' =>'Content Background Color', 'value' =>Configure::read('contentBackgroundColor')),
//	array('name' =>'Card Text Color', 'value' =>Configure::read('cardTextColor')),
//	array('name' =>'Card Background Color', 'value' =>Configure::read('cardBackgroundColor')),
//	array('name' =>'Grid Border Color', 'value' =>Configure::read('gridBorderColor')),
//	array('name' =>'Footer Text Color', 'value' =>Configure::read('footerTextColor')),
//	array('name' =>'Footer Background Color', 'value' =>Configure::read('footerBackgroundColor')),
//
//);

$general=array(
	array('name' =>'Text Color of Company Name', 'value' => Configure::read('companyTextColor')),
	array('name' =>'Background Color of Logo & Company Name', 'value' => Configure::read('companyBackgroundColor')),
	array('name' =>'Border Bottom Color of Logo & Company Name', 'value' => Configure::read('companyBorderBottomColor')),
	array('name' =>'Link Color', 'value' =>Configure::read('linkColor')),
	array('name' =>'Link Hover Color', 'value' =>Configure::read('linkHoverColor')),
	array('name' =>'Button Color', 'value' =>Configure::read('buttonColor')),
	array('name' =>'Button Text Color', 'value' =>Configure::read('buttonTextColor')),
);

$header=array(
	array('name' =>'Navigation Bar Text Color', 'value' =>Configure::read('navTextColor')),
	array('name' =>'Navigation Bar Text Hover Color', 'value' =>Configure::read('navTextHoverColor')),
	array('name' =>'Navigation Bar Background Color', 'value' =>Configure::read('navBackgroundColor')),
	array('name' =>'Navigation Border Bottom Color', 'value' =>Configure::read('navBorderBottomColor')),
);

$content=array(
	array('name' =>'Sidebar Text Color', 'value' =>Configure::read('sidebarTextColor')),
	array('name' =>'Sidebar Background Color', 'value' =>Configure::read('sidebarBackgroundColor')),
	array('name' =>'Content Text Color', 'value' =>Configure::read('contentTextColor')),
	array('name' =>'Content Background Color', 'value' =>Configure::read('contentBackgroundColor')),
	array('name' =>'Card Text Color', 'value' =>Configure::read('cardTextColor')),
	array('name' =>'Card Background Color', 'value' =>Configure::read('cardBackgroundColor')),
	array('name' =>'Card Border Color', 'value' =>Configure::read('gridBorderColor')),
);

$footer=array(
	array('name' =>'Footer Text Color', 'value' =>Configure::read('footerTextColor')),
	array('name' =>'Footer Background Color', 'value' =>Configure::read('footerBackgroundColor')),
	array('name' =>'Footer Border Top Color', 'value' =>Configure::read('footerBorderColor')),
);


$requestData = '';
if (isset($this->request->data['WebConfig'])){
	$requestData = $this->request->data['WebConfig'];
}
?>
	<?php echo $this->Session->flash(); ?>
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('Config');?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
						<li class="breadcrumb-item active"><?php echo __('Config');?></li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<?php echo $this->Form->create('WebConfig', array('type' => 'file'));?>

			<div class="row">
				<div class="card col-12">
					<div class="card-header">
						<h3 class="card-title">
							<i class="fas fa-edit"></i>
							<?php echo __('Config Setting');?>
						</h3>
						<span>
							<?php echo $this->Form->submit(__('Submit & Apply'), array("class"=>"btn btn-primary float-right ml-3"));?>
						</span>

						<?php //echo $this->Html->link('Apply Color setting', array('plugin'=>'', 'controller'=>'WebConfigs','action' => 'generatedCss'),array('class'=>'btn btn-primary float-right')); ?>

					</div>

					<div class="card-body">
						<div class="row">
							<div class="col-5 col-sm-3">
								<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
									<a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">
										<?php echo __('General');?>
									</a>
									<a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">
										<?php echo __('Header');?>
									</a>
									<a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">
										<?php echo __('Sidebar & Content');?>
									</a>
									<a class="nav-link" id="vert-tabs-settings-tab" data-toggle="pill" href="#vert-tabs-settings" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">
										<?php echo __('Footer');?>
									</a>
								</div>
							</div>
								<div class="col-7 col-sm-9">


									<div class="tab-content" id="vert-tabs-tabContent">

										<div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
											<!--Logo-->
											<div class="form-group">
												<label for="exampleInputFile">
													<?php echo __('Logo');?>
												</label>
												<div class="input-group">

													<div class="input-group-prepend ">
															<span class="input-group-text imageBannerPreview" id="imageBannerPreview" style="padding:0px; width: 38px; height: 38px;">
																<?php if(!empty($requestData[$companyLogo])){
																	echo $this->Html->image('logo/'.$requestData[$companyLogo],
																	array('height'=>'38','width'=>'38','id'=>'image'));
																} ;?>
															</span>
													</div>
													<div class="custom-file">
														<?php echo $this->Form->file($companyLogo,array('class'=>'custom-file-input','id'=>'exampleInputFile','accept' => 'image/*')) ?>
<!--														<input type="file" name="data[WebConfig][--><?php //echo  Configure::read('companyLogo')?><!--]" class="custom-file-input" id="exampleInputFile">-->
														<label class="custom-file-label" for="exampleInputFile">
															<?php
																echo __('Choose file');
															?>
														</label>
													</div>
												</div>
											</div>
<!--											Company Name-->
											<div class="form-group">
												<?php echo $this->Form->input(Configure::read('companyName'), array('class'=>'form-control'));?>
											</div>


											<?php foreach ($general as $item): ?>
												<div class="form-group">
													<label><?php echo __($item['name']) ?></label>
													<div class="input-group my-colorpicker2 <?php if(empty($requestData[$item['value']])){ echo "d-none";} ?>"
														 id="<?php echo $item['value'] ?>">
														<input type="text" name="data[WebConfig][<?php echo $item['value']?>]"
															   value="<?php if(isset($requestData[$item['value']])) { echo $requestData[$item['value']];}?>"
															   class="form-control form-text-box">
														<div class="input-group-append">
															<span class="input-group-text"><i class="fas fa-square" style="color: <?php echo $requestData[$item['value']] ?>"></i></span>
														</div>
													</div>
													<div class="form-check">
														<input type="checkbox" <?php if(empty($requestData[$item['value']])){ echo "checked";} ?>
															   name="data[WebConfig][<?php echo  $item['value'].'_default'?>]"
															   class="form-check-input"
															   id="<?php echo $item['value'].'_checkbox' ?>">
														<label class="form-check-label"
															   for="<?php echo $item['value'].'_checkbox' ?>">
															<?php echo __('Use Default')?>
														</label>
													</div>
												</div>

											<?php endforeach; ?>

										</div>

										<div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
											<?php foreach ($header as $item): ?>
												<div class="form-group">
													<label><?php echo __($item['name']) ?></label>
													<div class="input-group my-colorpicker2 <?php if(empty($requestData[$item['value']])){ echo "d-none";} ?>"
														 id="<?php echo $item['value'] ?>">
														<input type="text" name="data[WebConfig][<?php echo $item['value']?>]"
															   value="<?php if(isset($requestData[$item['value']])) { echo $requestData[$item['value']];}?>"
															   class="form-control form-text-box">
														<div class="input-group-append">
															<span class="input-group-text"><i class="fas fa-square" style="color: <?php echo $requestData[$item['value']] ?>"></i></span>
														</div>
													</div>
													<div class="form-check">
														<input type="checkbox" <?php if(empty($requestData[$item['value']])){ echo "checked";} ?>
															   name="data[WebConfig][<?php echo  $item['value'].'_default'?>]"
															   class="form-check-input"
															   id="<?php echo $item['value'].'_checkbox' ?>">
														<label class="form-check-label"
															   for="<?php echo $item['value'].'_checkbox' ?>">
															<?php echo __('Use Default')?>
														</label>
													</div>
												</div>

											<?php endforeach; ?>

										</div>

										<div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
											<?php foreach ($content as $item): ?>
												<div class="form-group">
													<label><?php echo __($item['name']) ?></label>
													<div class="input-group my-colorpicker2 <?php if(empty($requestData[$item['value']])){ echo "d-none";} ?>"
														 id="<?php echo $item['value'] ?>">
														<input type="text" name="data[WebConfig][<?php echo $item['value']?>]"
															   value="<?php if(isset($requestData[$item['value']])) { echo $requestData[$item['value']];}?>"
															   class="form-control form-text-box">
														<div class="input-group-append">
															<span class="input-group-text"><i class="fas fa-square" style="color: <?php echo $requestData[$item['value']] ?>"></i></span>
														</div>
													</div>
													<div class="form-check">
														<input type="checkbox" <?php if(empty($requestData[$item['value']])){ echo "checked";} ?>
															   name="data[WebConfig][<?php echo  $item['value'].'_default'?>]"
															   class="form-check-input"
															   id="<?php echo $item['value'].'_checkbox' ?>">
														<label class="form-check-label"
															   for="<?php echo $item['value'].'_checkbox' ?>">
															<?php echo __('Use Default')?>
														</label>
													</div>
												</div>

											<?php endforeach; ?>
										</div>

										<div class="tab-pane fade" id="vert-tabs-settings" role="tabpanel" aria-labelledby="vert-tabs-settings-tab">
											<div class="form-group">
												<?php echo $this->Form->input($footerText, array('class'=>'form-control'));?>
											</div>
											<?php foreach ($footer as $item): ?>
												<div class="form-group">
													<label><?php echo __($item['name']) ?></label>
													<div class="input-group my-colorpicker2 <?php if(empty($requestData[$item['value']])){ echo "d-none";} ?>"
														 id="<?php echo $item['value'] ?>">
														<input type="text" name="data[WebConfig][<?php echo $item['value']?>]"
															   value="<?php if(isset($requestData[$item['value']])) { echo $requestData[$item['value']];}?>"
															   class="form-control form-text-box">
														<div class="input-group-append">
															<span class="input-group-text"><i class="fas fa-square" style="color: <?php echo $requestData[$item['value']] ?>"></i></span>
														</div>
													</div>
													<div class="form-check">
														<input type="checkbox" <?php if(empty($requestData[$item['value']])){ echo "checked";} ?>
															   name="data[WebConfig][<?php echo  $item['value'].'_default'?>]"
															   class="form-check-input"
															   id="<?php echo $item['value'].'_checkbox' ?>">
														<label class="form-check-label"
															   for="<?php echo $item['value'].'_checkbox' ?>">
															<?php echo __('Use Default')?>
														</label>
													</div>
												</div>

											<?php endforeach; ?>
										</div>

									</div>

								</div>
						</div>
					</div>
					<div class="card-footer">
						<?php echo $this->Form->submit(__('Submit & Apply'), array("class"=>"btn btn-primary float-right"));?>

					</div>

				</div>
			</div>
			<?php echo $this->Form->end();?>

		</div>
	</section>


	<script type="text/javascript">
		$(document).ready(function () {


		});
		$(function () {

			$('.form-text-box').colorpicker();
			$('.form-text-box').on('colorpickerChange', function(event) {
				$(this).next().find('i').css('color', event.color.toString());
			});
		})


		$('.form-check-input').change(function(){
			$(this).parent().parent().find('.form-control').attr('disabled',this.checked);
			$(this).parent().parent().find('.my-colorpicker2').removeClass('d-none');
		});


		$("#exampleInputFile").on("change", function()
		{
			var files = !!this.files ? this.files : [];
			if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
			$("#image").hide();//
			if (/^image/.test( files[0].type)){ // only image file
				var reader = new FileReader(); // instance of the FileReader
				reader.readAsDataURL(files[0]); // read the local file

				reader.onloadend = function(){ // set image data as background of div
					$("#imageBannerPreview").css("background-image", "url("+this.result+")");
					$("#imageBannerPreview").css("background-size", " 38px 38px");
					$("#imageBannerPreview").css("background-repeat", "no-repeat");
				}
			}
		});

		$(document).ready(function () {
			bsCustomFileInput.init();
		});
	</script>
<style>

	/*.imageBannerPreview {*/
		/*float: left;*/
		/*border: solid 1px #DDDDDD;*/
		/*width: 200px;*/
		/*height: 84px;*/
	/*}*/

</style>
