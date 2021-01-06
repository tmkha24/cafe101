
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
					<li class="breadcrumb-item active"><?php echo __('Vendor');?></li>
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
							<h1><?php echo __('Report Active Vendor');?></h1>
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
								<th><?php echo __('Name');?></th>
								<th><?php echo __('Telephone No');?></th>
								<th><?php echo __('Email Address');?></th>
								<th><?php echo __('Address');?></th>
								<th><?php echo __('Address Continue');?></th>
								<th><?php echo __('City');?></th>
								<th><?php echo __('Ward');?></th>
								<th><?php echo __('Region');?></th>
								<th><?php echo __('Country');?></th>
								<th><?php echo __('Description');?></th>
								<th><?php echo __('Active');?></th>
							</tr>
							</thead>
							<tbody>

							<?php $i=0;
							foreach ($vendors as $vendor): $i++; ?>
								<tr>
									<td><?php echo $i; ?>&nbsp;</td>
									<td><?php echo $this->Html->link(h($vendor['Vendor']['name']), array('controller'=>'vendors','action' => 'view', $vendor['Vendor']['id'])); ?>&nbsp;</td>
									<td><?php echo h($vendor['Vendor']['phone']); ?>&nbsp;</td>
									<td><?php echo h($vendor['Vendor']['email']); ?>&nbsp;</td>
									<td><?php echo h($vendor['Vendor']['address1']); ?></td>
									<td><?php echo h($vendor['Vendor']['address2']); ?>&nbsp;</td>
									<td><?php echo h($vendor['Vendor']['city']); ?>&nbsp;</td>
									<td><?php echo h($vendor['Vendor']['ward']); ?>&nbsp;</td>
									<td><?php echo h($vendor['Vendor']['region']); ?>&nbsp;</td>
									<td><?php echo h($vendor['Vendor']['country']); ?>&nbsp;</td>
									<td><?php echo h($vendor['Vendor']['description']); ?></td>
									<td>
										<?php
										if ($vendor['Vendor']['active']) {
											echo __('Active');
										} else {
											echo __('InActive');
										}
										?>
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

