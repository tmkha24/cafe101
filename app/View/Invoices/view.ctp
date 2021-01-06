<?php echo $this->Session->flash(); ?>

<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?php echo __('View Invoice'); ?></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Home</a></li>
					<li class="breadcrumb-item active"><?php echo __('View Invoice'); ?></li>
				</ol>
			</div>
		</div>
	</div>
</section>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="invoice p-3 mb-3">
					<!-- title row -->
					<div class="row mb-5">
						<div class="col-12">
							<h4>
								<b> <?php echo __('Invoice: '); ?><?php echo __('#'); echo __($invoice['Invoice']['number']); ?></b>
								<small class="float-right">
									<?php echo __('Invoice Date: ');?>
									<?php  echo __($invoice['Invoice']['created']);?>
								</small>
							</h4>
						</div>
						<!-- /.col -->
					</div>
					<!-- info row -->
					<div class="row invoice-info">


						<div class="col-sm-4 invoice-col">
							<?php echo __('Billing Address:');?><br><br>
							<h5>
								<?php echo $invoice['Invoice']['billing_company_name']; ?>
							</h5>
							<address>
								<strong><?php echo __($invoice['Invoice']['billing_contact_name']); echo "</strong> <br>";?>
									<?php echo __($invoice['Invoice']['billing_address1']); echo "<br>";?>
									<?php echo __($invoice['Invoice']['billing_address2']); echo "<br>";?>
									<?php echo('Phone: '); echo __($invoice['Invoice']['billing_contact_phone']); echo "<br>";?>
									<?php echo('Email: '); echo __($invoice['Invoice']['billing_contact_email']); echo "<br>";?>
							</address>
						</div>
						<!-- /.col -->
						<div class="col-sm-4 invoice-col">
							<?php echo __('Shipping Address:');?><br><br>
							<h5>
								<?php echo $invoice['Invoice']['shipping_company_name']; ?>
							</h5>
							<address>
								<strong><?php echo __($invoice['Invoice']['shipping_contact_name']);  echo "<br>";?></strong>
								<?php echo __($invoice['Invoice']['shipping_address1']); echo "<br>";?>
								<?php echo __($invoice['Invoice']['shipping_address2']); echo "<br>";?>
								<?php echo('Phone: '); echo __($invoice['Invoice']['shipping_contact_phone']); echo "<br>";?>
								<?php echo('Email: '); echo __($invoice['Invoice']['shipping_contact_email']); echo "<br>";?>
							</address>
						</div>
						<!-- /.col -->
						<div class="col-sm-4 invoice-col">
							<b><?php echo __('Invoice Status: ');?></b> <?php
							switch ($invoice['Invoice']['status']){
								case 0:
									echo 'Paid';
									break;
								case 1:
									echo 'UnPaid';
									break;
							}

							?> <br>
							<b><?php echo __('Order Number: ');?></b> <?php  echo __($invoice['Order']['number']);?> <br>
							<b><?php echo __('Order Status: ');?></b>
							<?php switch ($invoice['Order']['status']){
								case 0:
									echo 'Pending';
									break;
								case 1:
									echo 'Processing';
									break;
								case 2:
									echo 'Shipping';
									break;
								case 3:
									echo 'Completed';
									break;
								case 4:
									echo 'Hold';
									break;
								case 5:
									echo 'Canceled';
									break;
							}?>
							<br>
							<b><?php echo __('Order Date: ');?></b> <?php  echo __($invoice['Order']['created']);?>

							<br>
							<b><?php echo __('Note: ');?></b> <?php  echo __($invoice['Invoice']['description']);?>
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->

					<!-- Table row -->
					<div class="row">
						<div class="col-12 table-responsive">
							<table class="table table-striped">
								<thead>
								<tr>
									<th>#</th>
									<th>Name</th>
									<th>Qty</th>
									<th>List Price</th>
									<th>Unit Price</th>
									<th>Subtotal</th>
								</tr>
								</thead>
								<tbody>
								<?php $i=0; foreach ($invoiceItems as $item): $i++;?>
									<tr>
										<td><?php echo $i;?></td>
										<td><?php echo $item['InvoiceItem']['name']; ?></td>
										<td><?php echo $item['InvoiceItem']['qty']; ?></td>
										<td><?php echo $invoice['Invoice']['currency'] ?><?php echo $item['InvoiceItem']['list_price']; ?></td>
										<td><?php echo $invoice['Invoice']['currency'] ?><?php echo $item['InvoiceItem']['unit_price']; ?></td>
										<td><?php echo $invoice['Invoice']['currency'] ?><?php echo $item['InvoiceItem']['amount']; ?></td>
									</tr>

								<?php endforeach; ?>

								</tbody>
							</table>
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->

					<div class="row">
						<!-- accepted payments column -->
						<div class="col-6">
							<p class="lead"><?php if($invoice['Invoice']['payment_information']){ echo __('Payment Information:');}?></p>

							<p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
								<?php echo $invoice['Invoice']['payment_information'] ?>
							</p>

							<p class="lead"><?php if($invoice['Invoice']['shipping_information']){ echo __('Shipping Information:');}?></p>

							<p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
								<?php echo $invoice['Invoice']['shipping_information'] ?>
							</p>
						</div>
						<!-- /.col -->
						<div class="col-6">
							<p class="lead">Total Summary</p>

							<div class="table-responsive">
								<table class="table">
									<tbody><tr>
										<th style="width:50%"><?php echo "Subtotal:" ?></th>
										<td><?php echo $invoice['Invoice']['currency'] ?><?php echo $invoice['Invoice']['amount'] ?></td>
									</tr>
									<tr>
										<th><?php echo "Discount Amount:" ?></th>
										<td><?php echo $invoice['Invoice']['currency'] ?><?php echo $invoice['Invoice']['discount_amount'] ?></td>
									</tr>
									<tr>
										<th><?php echo "Shipping Cost:" ?></th>
										<td><?php echo $invoice['Invoice']['currency'] ?><?php echo $invoice['Invoice']['shipping_cost'] ?></td>
									</tr>
									<tr>
										<th><?php echo "Total:" ?></th>
										<td><?php echo $invoice['Invoice']['currency'] ?><?php echo $invoice['Invoice']['grant_total'] ?></td>
									</tr>
									</tbody></table>
							</div>
						</div>
						<!-- /.col -->
					</div>
					<!-- /.row -->

					<!-- this row will not appear when printing -->
					<div class="row no-print">
						<div class="col-12">
							<a onclick="window.print()" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
						</div>
					</div>
				</div>				</div>
		</div>
	</div>
</section>