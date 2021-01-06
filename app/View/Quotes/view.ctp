	<?php echo $this->Session->flash(); ?>

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('View Quote'); ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?php echo __('View Quote'); ?></li>
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
									<b> <?php echo __($quote['Quote']['name']); ?></b>
									<small class="float-right">
										<?php echo __('Quotation Date: ');?>
										<?php  echo __($quote['Quote']['created']);?>
									</small>
								</h4>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info">


							<div class="col-sm-4 invoice-col">
								<?php echo __('From:');?><br><br>
								<h5>
									<?php echo $quote['Quote']['from_company_name']; ?>
								</h5>
								<address>
									<strong><?php echo __($quote['Quote']['from_contact_name']); echo "</strong> <br>";?>
									<?php echo __($quote['Quote']['from_address1']); echo "<br>";?>
									<?php echo __($quote['Quote']['from_address2']); echo "<br>";?>
									<?php echo('Phone: '); echo __($quote['Quote']['from_contact_phone']); echo "<br>";?>
									<?php echo('Email: '); echo __($quote['Quote']['from_contact_email']); echo "<br>";?>
								</address>
							</div>
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<?php echo __('To:');?><br><br>
								<h5>
									<?php echo $quote['Quote']['to_company_name']; ?>
								</h5>
								<address>
									<strong><?php echo __($quote['Quote']['to_contact_name']);  echo "<br>";?></strong>
									<?php echo __($quote['Quote']['to_address1']); echo "<br>";?>
									<?php echo __($quote['Quote']['to_address2']); echo "<br>";?>
									<?php echo('Phone: '); echo __($quote['Quote']['to_contact_phone']); echo "<br>";?>
									<?php echo('Email: '); echo __($quote['Quote']['to_contact_email']); echo "<br>";?>
								</address>
							</div>
							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<b><?php echo __('Quotation Number: #'); echo __($quote['Quote']['number']);?></b><br>
								<b><?php echo __('Date Expired: ');?></b> <?php  echo __($quote['Quote']['date_expired']);?> <br>
								<b><?php echo __('Quote Status: ');?></b> <?php
								switch ($quote['Quote']['status']){
									case 0:
										echo 'Draft';
										break;
									case 1:
										echo 'In Review';
										break;
									case 2:
										echo 'Presented';
										break;
									case 3:
										echo 'Approved';
										break;
									case 4:
										echo 'Rejected';
										break;
									case 5:
										echo 'Canceled';
										break;
								}

								?> <br>
								<b><?php echo __('Note: ');?></b> <?php  echo __($quote['Quote']['description']);?>
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
									<?php $i=0; foreach ($quoteItems as $item): $i++;?>
										<tr>
											<td><?php echo $i;?></td>
											<td><?php echo $item['QuoteItem']['name']; ?></td>
											<td><?php echo $item['QuoteItem']['qty']; ?></td>
											<td><?php echo $quote['Quote']['currency'] ?><?php echo $item['QuoteItem']['list_price']; ?></td>
											<td><?php echo $quote['Quote']['currency'] ?><?php echo $item['QuoteItem']['unit_price']; ?></td>
											<td><?php echo $quote['Quote']['currency'] ?><?php echo $item['QuoteItem']['amount']; ?></td>
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
								<p class="lead"><?php if($quote['Quote']['term_condition']){ echo __('Term & Condition:');}?></p>

								<p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
									<?php echo $quote['Quote']['term_condition'] ?>
								</p>
							</div>
							<!-- /.col -->
							<div class="col-6">
								<p class="lead">Total Summary</p>

								<div class="table-responsive">
									<table class="table">
										<tbody><tr>
											<th style="width:50%"><?php echo "Subtotal:" ?></th>
											<td><?php echo $quote['Quote']['currency'] ?><?php echo $quote['Quote']['amount'] ?></td>
										</tr>
										<tr>
											<th><?php echo "Discount Amount:" ?></th>
											<td><?php echo $quote['Quote']['currency'] ?><?php echo $quote['Quote']['discount_amount'] ?></td>
										</tr>
										<tr>
											<th><?php echo "Shipping Cost:" ?></th>
											<td><?php echo $quote['Quote']['currency'] ?><?php echo $quote['Quote']['shipping_cost'] ?></td>
										</tr>
										<tr>
											<th><?php echo "Total:" ?></th>
											<td><?php echo $quote['Quote']['currency'] ?><?php echo $quote['Quote']['grant_total'] ?></td>
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
