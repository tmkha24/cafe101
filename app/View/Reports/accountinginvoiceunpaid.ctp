
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
					<li class="breadcrumb-item active"><?php echo __('Invoices');?></li>
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
							<h1><?php echo __('Customer Invoices UnPaid');?></h1>
						</div>
						<div class="row no-print  float-right">

							<div class="col-12">
								<a onclick="window.print()" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
							</div>
						</div>
					</div>

					<div class="card-body">
						<table id="table1" class="table table-binvoiceed table-striped">
							<thead>
							<tr>
								<th><?php echo __('#');?></th>
								<th><?php echo __('Invoice No');?></th>
								<th><?php echo __('Invoice Date');?></th>
								<th><?php echo __('Ship To Name');?></th>
								<th><?php echo __('Amount');?></th>
								<th><?php echo __('Discount Amount');?></th>
								<th><?php echo __('Shipping Cost');?></th>
								<th><?php echo __('Grand Total');?></th>
								<th><?php echo __('Status');?></th>
							</tr>
							</thead>
							<tbody>

							<?php $i=0;
							foreach ($invoices as $invoice): $i++;?>
								<tr>
									<td><?php echo $i; ?></td>
									<td><?php echo $this->Html->link(h($invoice['Invoice']['number']), array('controller'=>'invoices','action' => 'view', $invoice['Invoice']['id'])); ?></td>
									<td><?php echo h($invoice['Invoice']['created']); ?></td>
									<td><?php echo h($invoice['Invoice']['shipping_contact_name']); ?></td>
									<td><?php echo h($invoice['Invoice']['currency']); echo h($invoice['Invoice']['amount']); ?></td>
									<td><?php echo h($invoice['Invoice']['currency']);echo h($invoice['Invoice']['discount_amount']); ?></td>
									<td><?php echo h($invoice['Invoice']['currency']);echo h($invoice['Invoice']['shipping_cost']); ?></td>
									<td><?php echo h($invoice['Invoice']['currency']);echo h($invoice['Invoice']['grant_total']); ?></td>
									<td>
										<?php
										if ($invoice['Invoice']['status']) {
											echo __('Paid');
										} else {
											echo __('Unpaid');
										}
										?>
									</td>

								</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
						<div class="row col-6 float-right mt-5">
							<p class="lead">Total Summary</p>

							<div class="table-responsive">
								<table class="table">
									<tbody><tr>
										<th style="width:50%"><?php echo "Subtotal:" ?></th>
										<td><?php echo $invoicesTotal['0']['0']['amount'] ?></td>
									</tr>
									<tr>
										<th><?php echo "Discount Amount:" ?></th>
										<td><?php echo $invoicesTotal['0']['0']['discount_amount'] ?></td>
									</tr>
									<tr>
										<th><?php echo "Shipping Cost:" ?></th>
										<td><?php echo $invoicesTotal['0']['0']['shipping_cost'] ?></td>
									</tr>
									<tr>
										<th><?php echo "Total:" ?></th>
										<td><?php echo $invoicesTotal['0']['0']['grant_total'] ?></td>
									</tr>
									</tbody></table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

