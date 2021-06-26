
	<?php echo $this->Session->flash(); ?>
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col">
					<h1><?php echo __('Danh sách sản phẩm');?></h1>
				</div>
			</div>
		</div>
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-6">
								</div>
								<div class="col-6">
									<ol class="float-sm-right">
										<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('Thêm sản phẩm'), array('action' => 'add'), array('escape' => false)); ?>
									</ol>
								</div>
							</div>
							<table id="table1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th><?php echo __('Id');?></th>
									<th><?php echo __('Hình ảnh');?></th>
									<th><?php echo __('Tên');?></th>
									<th><?php echo __('Danh mục');?></th>
									<th><?php echo __('Giá');?></th>
									<th><?php echo __('Ngày tạo');?></th>
									<th><?php echo __('Ngày cập nhật');?></th>
									<th class="actions"></th>
								</tr>
								</thead>
								<tbody>

								<?php
								foreach ($products as $product): ?>
									<tr>
										<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
										<td>
										<?php
										echo $this->Html->image('/img/product/'.$product['Product']['image1'],
											array('height'=>'100','width'=>'100','id'=>'image'.$product['Product']['id']));
										?>
										</td>
										<td><?php echo $this->Html->link(h($product['Product']['name']), array('action' => 'view', $product['Product']['id'])); ?>&nbsp;</td>
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
										<td><?php echo $this->Time->nice(h($product['Product']['created'])); ?>&nbsp;</td>
										<td><?php echo $this->Time->nice(h($product['Product']['updated'])); ?>&nbsp;</td>
										<td class="actions">
											<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-shopping-cart')).' '.__('Edit'), array('action' => 'edit', $product['Product']['id']), array('escape' => false)); ?>
											<br>
											<?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-alt')).' '.__('Delete'), array('action' => 'delete', $product['Product']['id']),  array('escape' => false), __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
										</td>
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

<script>
	$(function () {
		$("#table1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
	});
</script>
