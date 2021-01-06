	<?php echo $this->Session->flash(); ?>

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('View Product');?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?php echo __('View Product');?></li>
					</ol>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<ol class="float-sm-right">
						<?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Product'), array('action' => 'edit', $product['Product']['id']), array('escape' => false, "class" => "pl-3")); ?>
					</ol>
				</div>

				<div class="col-6">

					<div class="card">
						<div class="card-header">
							<h3 class="card-title"><?php echo __('General');?></h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
									<i class="fas fa-minus"></i></button>
							</div>
						</div>
						<div class="card-body">

							<dl class="row">

								<dt class="col-sm-3">
									<?php echo __('Name '); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($product['Product']['name']); ?>
								</dd>
<br>	<br>
								<dt class="col-sm-3">
									<?php echo __('Model No'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($product['Product']['model']); ?>
								</dd>
								<br>	<br>
								<dt class="col-sm-3">
									<?php echo __('Brand'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($product['Product']['brand']); ?>
								</dd>

								<br>	<br>
								<?php if (!empty($product['Category'])):?>

									<dt class="col-sm-3">
										<?php echo __('Category'); ?>
									</dt>
									<dd class="col-sm-9">
										<?php foreach ($product['Category'] as $category): ?>
												<?php echo h($category['name']); ?>
										<br>
										<?php endforeach;?>
									</dd>
								<?php endif;?>
								<br>	<br>
								<dt class="col-sm-3">
									<?php echo __('Unit Price'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($product['Product']['unit_price']); ?>
								</dd>
								<br>	<br>
								<dt class="col-sm-3">
									<?php echo __('Description'); ?>
								</dt>
								<dd class="col-sm-9">
									<?php echo h($product['Product']['description']); ?>
								</dd>
								<br>	<br>
								<dt class="col-sm-3"><?php echo __('Active'); ?></dt>
								<dd class="col-sm-9">
									<?php
									if ($product['Product']['active']) {
										echo __('Active');
									} else {
										echo __('InActive');
									} ?>
								</dd>
							</dl>
							<br>
						</div>
					</div>
				</div>
				<div class="col-6">

					<div class="card">
						<div class="card-header">
							<h3 class="card-title"><?php echo __('Image');?></h3>

							<div class="card-tools">
								<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
									<i class="fas fa-minus"></i></button>
							</div>
						</div>
						<div class="card-body">

							<div class="row">
								<?php for ($i =1; $i<=5; $i++){ ?>
									<?php if(!empty($product['Product']['image'.$i])): ?>
										<div class="col-sm-4">
											<?php
											echo $this->Html->link(
												$this->Html->image('product/'.$product['Product']['image'.$i],array('class'=>'img-fluid mb-2')),
												'/img/product/'.$product['Product']['image'.$i],
												array('escape' => false,
													'data-toggle'=>'lightbox',
													'data-gallery'=>'gallery',
													'href'=>'/img/product/'.$product['Product']['image'.$i],
													'data-title'=>  __('Image '.$i),
													'alt'=>'white sample'));
											?>
										</div>
									<?php endif; ?>
								<?php } ?>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
	</section>
	<script>
		$(function () {
			$(document).on('click', '[data-toggle="lightbox"]', function(event) {
				event.preventDefault();
				$(this).ekkoLightbox({
					alwaysShowClose: true
				});
			});

			$('.btn[data-filter]').on('click', function() {
				$('.btn[data-filter]').removeClass('active');
				$(this).addClass('active');
			});
		})
	</script>
