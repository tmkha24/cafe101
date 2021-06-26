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
					<!-- invoice information -->
					<div class="row mb-3">
						<div class="col-6">
							<table class="float-left">
								<!-- Member -->
								<tr>
									<td class="align-text-top" width="80">
										<strong>
											<?php echo __('Member') ?>
										</strong>
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										<?php if(isset($members[0]))
										{
											echo __($members[0]['Member']['name']);
											echo '<br /> Level: ';
											echo '<strong>' . _($members[0]['MemberGroup']['name']) . '</strong>';
										}?>
									</td>
								</tr>
								<!-- address -->
								<tr>
									<td class="align-text-top" width="80">
										<?php echo __('Address') ?>
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										<?php echo __($invoice['Invoice']['shipping_address1']) ?>
										<br><?php echo __($invoice['Invoice']['shipping_address2']) ?>
									</td>
								</tr>
								<!-- contact person -->
								<tr>
									<td class="align-text-top">
										<?php echo __('Contact') ?>
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										<?php echo __($invoice['Invoice']['shipping_contact_name']) ?>
									</td>
								</tr>
								<!-- phone -->
								<tr>
									<td class="align-text-top">
										<?php echo __('Phone') ?>
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										<?php echo __($invoice['Invoice']['shipping_contact_phone']) ?>
									</td>
								</tr>
								<!-- fax -->
								<tr>
									<td class="align-text-top">
										<?php echo __('Fax') ?>
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										<?php echo __($invoice['Invoice']['shipping_contact_fax']) ?>
									</td>
								</tr>
							</table>
						</div>
						<div class="col-6">
							<table class="float-right">
								<!-- invoice number -->
								<tr>
									<td class="align-text-top" width="150">
										<?php echo __('Invoice Number') ?>
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										<?php echo __($invoice['Invoice']['number']) ?>
									</td>
								</tr>
								<!-- invoice date -->
								<tr>
									<td class="align-text-top">
										<?php echo __('Invoice Date') ?>
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										<?php echo date("Y M d", strtotime($invoice['Invoice']['created'])); ?>
									</td>
								</tr>
								<!-- Order number -->
								<tr>
									<td class="align-text-top">
										<?php echo __('Order Number') ?>
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										<?php echo $invoice['Order']['number']; ?>
									</td>
								</tr>
								<!-- salesperson from -->
								<tr>
									<td class="align-text-top">
										<?php echo __('Salesperson') ?>
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										<?php echo __($invoice['Invoice']['salesperson_name']) ?>
									</td>
								</tr>
								<!-- payment information -->
								<tr>
									<td class="align-text-top">
										<?php echo __('Payment Information') ?>
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										<?php echo __($invoice['Invoice']['payment_information']); ?>
									</td>
								</tr>
							</table>
						</div>
					</div>

					<!-- Table row -->
					<div class="row">
						<div class="col-12 table-responsive">
							<table class="table text-center">
								<thead>
									<tr>
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('#') ?></th>
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('Product Storage') ?></th>
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('Product Model') ?></th> <!-- product model-->
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('Product Name') ?></th> <!-- product name-->
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('Pieces') ?></th> <!-- number of pieces -->
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('Quantity') ?></th> <!-- quantity + unit-->
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('Unit Price') ?></th> <!-- price -->
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('Amount') ?></th> <!-- subtotal -->
									</tr>
								</thead>
								<tbody>
									<!-- currency -->
									<tr>
										<td class="border-0" colspan="6"></td>
										<td class="p-0 border-0"><?php echo __($invoice['Invoice']['currency']) ?></td>
										<td class="p-0 border-0"><?php echo __($invoice['Invoice']['currency']) ?></td>
									</tr>
									<!-- product -->
									<?php
										$i = 0;
										foreach($invoiceItems as $item) : $i++?>
									<tr>
										<td class="p-1 pb-2 border-0"><?php echo __($i) ?></td>
										<td class="p-1 pb-2 border-0"><?php echo $item['Product']['storage'] ?></td>
										<td class="p-1 pb-2 border-0">
											<?php echo __($item['Product']['model']) ?>
										</td>
										<td class="p-1 pb-1 border-0">
											<?php echo __($item['Product']['name']) ?>
											<br><?php echo __($item['Product']['specification']) ?>
										</td>
										<td class="p-1 pb-2 border-0"><?php echo __($item['InvoiceItem']['piece']) ?></td>
										<td class="p-1 pb-2 border-0"><?php echo __($item['InvoiceItem']['note'] . ' ' . $item['InvoiceItem']['qty'])?></td>
										<td class="p-1 pb-2 border-0 text-right"><?php echo number_format($item['InvoiceItem']['unit_price'], 4, '.', ',') ?></td>
										<td class="p-1 pb-2 border-0 text-right"><?php echo number_format($item['InvoiceItem']['amount'], 2, '.', ',') ?></td>
									</tr>									
									<?php endforeach;?>

									<!-- tax, discount, etc... -->
									<tr>
										<td class="p-1 border-0 text-right" colspan="8">
											<?php echo __('Discounted ' . $invoice['Invoice']['product_discount_percent'] . '％') ?>
										</td>
									</tr>
								</tbody>
							</table>
						</div>

					</div>


					<!-- invoice products summary -->
					<div class="row">
						<div class="col pl-5">
							<?php
								$invoiceItemSumarry = [];
								$i = 0;
								foreach($invoiceItems as $item) : ?>
								<?php
									$i = count($invoiceItemSumarry);
									if(
										$i > 0
										&& $item['InvoiceItem']['product_id'] == $invoiceItemSumarry[$i-1]['Product']['product_id']
									)
									{
										$invoiceItemSumarry[$i - 1]['Product']['qty'] += intval($item['InvoiceItem']['qty']);
									}
									else
									{
										array_push($invoiceItemSumarry, array('Product' => array(
											'product_id' => $item['InvoiceItem']['product_id'],
											'qty' => $item['InvoiceItem']['qty'],
											'name' => $item['Product']['name'],
											'expire_info' => $item['Product']['mfg_date'] . '-' .$item['Product']['expiry_date']
										)));
									}
								?>
							<?php endforeach;?>
							<?php foreach($invoiceItemSumarry as $item): ?>
								<?php echo __(
										$item['Product']['qty'] 
										. '-'
										. $item['Product']['name']
										. ' '
										. ($item['Product']['expire_info'] == '-' ? "" : $item['Product']['expire_info'])
										. '  <br/>') ?>
							<?php endforeach;?>
						</div>
					</div>

					<!-- total money -->
					<div class="row">
						<div class="col-8"></div>
						<div class="col text-right">
							<?php echo __('Grand Total') ?> <?php echo $invoice['Invoice']['currency'] ?> <?php echo number_format($invoice['Invoice']['grant_total'], 2, '.', ',') ?>
						</div>
					</div>

					<!-- invoice creator -->
					<div class="row mb-3">
						<div class="col pl-4">
							<?php echo __('Invoicing person：') ?> <?php echo $invoice['Invoice']['invoice_createdby_name']; ?>
						</div>
					</div>

					<div class="row no-print">
						<div class="col-12 text-right">
						<?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-check')).' '.__('Approve'), array('action' => 'Approve', $invoice['Invoice']['id']),  array('class' => 'btn btn-primary', 'escape' => false), __('Are you sure you want to approve invoice #%s?', $invoice['Invoice']['id'])); ?>
						</div>
					</div>
				</div>
			</div>
			<?php ?>
		</div>
	</div>
</section>