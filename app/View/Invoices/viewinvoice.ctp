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
					<!-- invoice header -->
					<div class="row mb-4 ml-3 mr-3">
						<!-- logo -->
						<div class="col-2">
							<div class="invoice_logo">
								<?php echo $this->Html->image('/img/logo/logo_invocie1.png', array("class" => "img-fluid")) ?>
							</div>							
							<div class="invoice_barcode m-2">
								<?php echo $this->Html->image('/img/barcode/barcode.png', array('class' => 'img-fluid')); ?>
							</div>
						</div>
						<div class="col-10 text-center">
							<h2>
								<?php echo __('華泰興食品有限公司') ?>
								<br/><?php echo __('WAH TAI HING FOODS MANUFACTORY LIMITED') ?>
							</h2>
							<div>
								<?php echo __('香港新界粉嶺安樂村安全街33號豐盈工貿中心3樓N-0室') ?>
								<br /><?php echo __('FLAT N-O, 3/F, GOOD HARVEST CENTRE, 33 ON CHUEN STREET,') ?>
								<br /><?php echo __('ON LOK TSUEN, FANLING, HKSAR') ?>
								<br /><?php echo __('TEL : 2676 3289; &nbsp FAX : 2676 3299') ?>
							</div>
						</div>
					</div>
					<!-- title -->
					<div class="row mb-4">
						<div class="col-12">
							<div class="text-center mb-5 align-middle">
								<h2>
									<strong><?php echo __('INVOICE') ?></strong>
								</h2>
							</div>
						</div>
					</div>
					<!-- invoice information -->
					<div class="row mb-3">
						<div class="col-6">
							<table class="float-left">
								<!-- address -->
								<tr>
									<td class="align-text-top" width="60">
										<?php echo __('致') ?>
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
										<?php echo __('聯絡人') ?>
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										<?php echo __($invoice['Invoice']['billing_contact_name']) ?>
									</td>
								</tr>
								<!-- phone -->
								<tr>
									<td class="align-text-top">
										<?php echo __('電話') ?>
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										<?php echo __($invoice['Invoice']['billing_contact_phone']) ?>
									</td>
								</tr>
								<!-- fax -->
								<tr>
									<td class="align-text-top">
										<?php echo __('傳真') ?>
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										<?php echo __($invoice['Invoice']['billing_contact_fax']) ?>
									</td>
								</tr>
							</table>
						</div>
						<div class="col-6">
							<table class="float-right">
								<!-- invoice number -->
								<tr>
									<td class="align-text-top" width="150">
										<?php echo __('發票單編號') ?>
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
										<?php echo __('日期') ?>
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
										<?php echo __('日期客戶訂單編號') ?>
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										<?php if(count($order) > 0) echo $order[0]['Order']['number']; ?>
									</td>
								</tr>
								<!-- salesperson from -->
								<tr>
									<td class="align-text-top">
										<?php echo __('推銷員') ?>
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
										<?php echo __('付款方式') ?>
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
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('舟號') ?></th>
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('貨物型號') ?></th> <!-- product model-->
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('貨物名稱') ?></th> <!-- product name-->
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('件數') ?></th> <!-- number of pieces -->
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('數量') ?></th> <!-- quantity + unit-->
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('單價') ?></th> <!-- price -->
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('總價') ?></th> <!-- subtotal -->
									</tr>
								</thead>
								<tbody>
									<!-- currency -->
									<tr>
										<td class="border-0" colspan="5"></td>
										<td class="p-0 border-0"><?php echo __($invoice['Invoice']['currency']) ?></td>
										<td class="p-0 border-0"><?php echo __($invoice['Invoice']['currency']) ?></td>
									</tr>
									<!-- product -->
									<?php
										$i = 0;
										foreach($invoiceItems as $item) : $i++?>
									<tr>
										<td class="p-1 border-0"><?php echo __($i) ?></td>
										<td class="p-1 border-0">
											<?php echo __($item['Product']['model']) ?>
										</td>
										<td class="p-1 border-0">
											<?php echo __($item['Product']['name']) ?>
											<br><?php echo __($item['Product']['specification']) ?>
										</td>
										<td class="p-1 border-0"><?php echo __($item['InvoiceItem']['note'] . ' ' . $item['InvoiceItem']['qty'])?></td>
										<td class="p-1 border-0"><?php echo __($item['InvoiceItem']['piece']) ?></td>
										<td class="p-1 border-0 text-right"><?php echo number_format($item['InvoiceItem']['unit_price'], 4, '.', ',') ?></td>
										<td class="p-1 border-0 text-right"><?php echo number_format($item['InvoiceItem']['amount'], 2, '.', ',') ?></td>
									</tr>									
									<?php endforeach;?>

									<!-- tax, discount, etc... -->
									<tr>
										<td class="p-1 border-0 text-right" colspan="7">
											<?php echo __('已扣' . $invoice['Invoice']['product_discount_percent'] . '％折扣') ?>
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
								<?php echo __($item['Product']['qty'] . '件-' . $item['Product']['name'] . ' ' . $item['Product']['expire_info'] . '  <br/>') ?>
							<?php endforeach;?>
						</div>
					</div>

					<!-- total money -->
					<div class="row">
						<div class="col-8"></div>
						<div class="col text-right">
							<?php echo __('付款方式總額') ?> <?php echo $invoice['Invoice']['currency'] ?> <?php echo number_format($invoice['Invoice']['grant_total'], 2, '.', ',') ?>
						</div>
					</div>

					<!-- invoice creator -->
					<div class="row mb-3">
						<div class="col pl-4">
							<?php echo __('開發票人：') ?> <?php echo $invoice['Invoice']['invoice_createdby_name']; ?>
						</div>
					</div>

					<div class="row no-print">
						<div class="col-12">
							<a onclick="window.print()" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
						</div>
					</div>
				</div>
			</div>
			<?php ?>
		</div>
	</div>
</section>