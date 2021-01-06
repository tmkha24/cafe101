
<?php echo $this->Session->flash(); ?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<!--				<div class="col-sm-6">-->
			<!--					<h1>--><?php //echo __('Report Active Product');?><!--</h1>-->
			<!--				</div>-->
			<div class="col-sm-12">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
					<li class="breadcrumb-item active"><?php echo __('Product');?></li>
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
					<div class="card-header">
						<div class="col-12">
							<h1><?php echo __('Report Product Ordered');?></h1>
						</div>
						<div class="row no-print  float-right">

							<div class="col-12">
								<a onclick="window.print()" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
							</div>
						</div>
					</div>

					<div class="card-body">
						<table id="table1" class="table table-bordered table-striped">
							<thead>
							<tr>
								<th><?php echo __('#');?></th>
								<th><?php echo __('Image');?></th>
								<th><?php echo __('Name');?></th>
								<th><?php echo __('Model');?></th>
								<th><?php echo __('Brand');?></th>
								<th><?php echo __('Category');?></th>
								<th><?php echo __('Unit Price');?></th>
								<th><?php echo __('Description');?></th>
								<th><?php echo __('Active');?></th>
								<th><?php echo __('Qty Ordered');?></th>

							</tr>
							</thead>
							<tbody>

							<?php $i=0;
							foreach ($products as $product):  $i++;?>
								<tr>
									<td><?php echo $i; ?>&nbsp;</td>
									<td>
										<?php
										echo $this->Html->image('/img/product/'.$product['Product']['image1'],
											array('height'=>'38','width'=>'38','id'=>'image'.$product['Product']['id']));
										?>
									</td>
									<td><?php echo $this->Html->link(h($product['Product']['name']), array('controller'=>'products','action' => 'view', $product['Product']['id'])); ?>&nbsp;</td>
									<td><?php echo h($product['Product']['model']); ?>&nbsp;</td>
									<td><?php echo h($product['Product']['brand']); ?>&nbsp;</td>
									<?php
									$categoryName ='';
									if (isset($product['Category'][0])){
										$categoryName = $product['Category'][0]['name'];
									}
									?>
									<td><?php echo h($categoryName); ?></td>
									<td><?php echo h($product['Product']['currency']);echo h($product['Product']['unit_price']); ?>&nbsp;</td>
									<td><?php echo h($product['Product']['description']); ?></td>

									<td>
										<?php
										if ($product['Product']['active']) {
											echo __('Active');
										} else {
											echo __('InActive');
										}
										?>
									</td>
									<td><?php echo (h($product['0']['ordered'])); ?>&nbsp;</td>

								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

