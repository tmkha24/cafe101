
<?php echo $this->Session->flash(); ?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?php echo __('Edit Invoice');?></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
					<li class="breadcrumb-item active"><?php echo __('Edit Invoice');?></li>
				</ol>
			</div>
		</div>
	</div>
</section>
<?php echo $this->Form->create('Invoice');?>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title"><?php echo __('General');?></h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fas fa-minus"></i></button>
						</div>
					</div>
					<div class="card-body">
						<div class="row">
							<div class="col-12">
								<ol class="float-sm-right">
									<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View Invoice List'), array('action' => 'index'), array('escape' => false)); ?>
								</ol>
							</div>
						</div>
						<fieldset>
							<div class="form-group">
								<?php echo $this->Form->input('number', array("class"=>"form-control", "label"=>__("Invoice No"))); ?>
							</div>


							<div class="form-group">

								<div class="input select">
									<label for="InvoiceOsrderId"><?php echo __('Order');?></label>
									<select name="data[Invoice][order_id]" class="form-control" id="InvoiceOrderId">
										<option value="null"><?php echo __('Select Order of Invoice');?></option>
										<?php foreach ($orders as $item): ?>
											<option
												    <?php if ($invoice['Order']['id'] == $item['Invoice']['order_id']){echo "selected='selected'";}  ?>"
												    value="<?php echo $item['Order']['id'] ?>">
												<?php echo $item['Order']['number'] ." - "  .  $item['Order']['currency'] . $item['Order']['grant_total'] ?>
											</option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>



							<div class="form-group">
								<?php
								echo $this->Form->input('status', array(
									'options' => array(
										'0' => 'Paid',
										'1' => 'Unpaid'
										),
									'default'=>$invoice['Invoice']['status'],
									'class'=>'form-control',
									"label"=>__("Status")
								));
								?>
							</div>
							<div class="form-group">
								<label><?php echo  "Date Expired"?> </label>
								<div class="input-group date" id="reservationdate" data-target-input="nearest">
									<input type="text" name="data[Invoice][date_expired]" class="form-control datetimepicker-input" data-target="#reservationdate"/>
									<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
										<div class="input-group-text"><i class="fa fa-calendar"></i></div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<?php
								echo $this->Form->input('currency', array(
									'options' => array(
										'HK$' => 'HK$'),
									'default'=>$invoice['Invoice']['currency'],
									'class'=>'form-control',
									"label"=>__("Currency")
								));
								?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('description', array("class"=>"form-control", "label"=>__("Note"))); ?>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title"><?php echo __('Billing Address');?></h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fas fa-minus"></i></button>
						</div>
					</div>
					<div class="card-body">
						<fieldset>
							<div class="form-group">
								<?php echo $this->Form->input('billing_company_name', array("class"=>"form-control", "label"=>__("Company Name"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('billing_contact_name', array("class"=>"form-control", "label"=>__("Contact Name"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('billing_contact_phone', array("class"=>"form-control", "label"=>__("Contact Phone"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('billing_contact_email', array("class"=>"form-control", "label"=>__("Contact Email"))); ?>
							</div>

							<div class="form-group">
								<?php echo $this->Form->input('billing_address1', array("class"=>"form-control", "label"=>__("Address"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('billing_address2', array("class"=>"form-control", "label"=>__("Address Continue"))); ?>
							</div>
							<br>
							<br>
							<div class="form-group">
								<?php echo $this->Form->input('payment_information', array("class"=>"form-control", "label"=>__("Payment Information"))); ?>
							</div>
						</fieldset>
					</div>

				</div>
			</div>
			<div class="col-6">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title"><?php echo __('Shipping Address');?></h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fas fa-minus"></i></button>
						</div>
					</div>
					<div class="card-body">
						<fieldset>
							<div class="form-group">
								<?php echo $this->Form->input('shipping_company_name', array("class"=>"form-control shipping_address", "label"=>__("Company Name"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('shipping_contact_name', array("class"=>"form-control shipping_address", "label"=>__("Contact Name"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('shipping_contact_phone', array("class"=>"form-control shipping_address", "label"=>__("Contact Phone"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('shipping_contact_email', array("class"=>"form-control shipping_address", "label"=>__("Contact Email"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('shipping_address1', array("class"=>"form-control shipping_address", "label"=>__("Address"))); ?>
							</div>
							<div class="form-group">
								<?php echo $this->Form->input('shipping_address2', array("class"=>"form-control shipping_address", "label"=>__("Address Continue"))); ?>
							</div>

							<?php
							$checked = false;
							if ($invoice['Invoice']['same_as_billing_address']) {
								$checked = true;
							}
							?>
							<div class="form-check">
								<input type="hidden" name="data[Invoice][same_as_billing_address]" id="Invoicesame_as_billing_address_" value="0">
								<input   <?php if($checked){echo "checked";} ?>  type="checkbox" name="data[Invoice][same_as_billing_address]" class="form-check-input" id="Invoicesame_as_billing_address">
								<label class="form-check-label" for="Invoicesame_as_billing_address"><?php echo  __('Same As Billing Address') ?></label>
							</div>
							<br>
							<div class="form-group">
								<?php echo $this->Form->input('shipping_information', array("class"=>"form-control", "label"=>__("Shipping Information"))); ?>
							</div>
						</fieldset>
					</div>

				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-9">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title"><?php echo __('Items');?></h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fas fa-minus"></i></button>
						</div>
					</div>
					<div class="card-body">
						<table class="table table-striped" id="22">
							<thead>
							<tr>
								<th>Select Product</th>
								<th>Action</th>
							</tr>
							</thead>
							<tbody>
							<tr>
								<td>
									<select id="select-product" style="width: 100%; height: 50px;" >
										<option><?php echo __('Select Product to Add to Invoice');?></option>
										<?php foreach ($products as $item): ?>
											<option value="<?php echo $item['Product']['id'] ?>"
													data-name="<?php echo $item['Product']['name'] ?>"
													data-qty="1"
													data-id="<?php echo $item['Product']['id'] ?>"
													data-unit-price="<?php echo $item['Product']['unit_price'] ?>"
													data-list-price="<?php echo $item['Product']['list_price'] ?>"
													data-amount="<?php echo $item['Product']['unit_price'] ?>">
												<?php echo $item['Product']['name'] ?>
											</option>
										<?php endforeach; ?>
									</select>
								</td>
								<input type="text" class="form-control d-none s_name" id="s_name">

								<input  type="text" class="form-control d-none s_qty" id="s_qty" >

								<input  type="text" class="form-control d-none s_list_price" id="s_list_price">

								<input type="text" class="form-control d-none s_unit_price" id="s_unit_price">

								<input  type="text" class="form-control d-none s_amount" id="s_amount" >
								<td>
									<button type="submit" class=" btn btn-primary" id="add-service-button"><?php echo __('Add');?></button>
								</td>
							</tr>
							</tbody>
						</table>
						<br><br>
						<table class="table table-striped" id="service-table">
							<thead>
							<tr>
								<th style="width: 10px">#</th>
								<th>Name</th>
								<th>Qty</th>
								<th>List Price</th>
								<th>Unit Price</th>
								<th>Amount</th>
							</tr>
							</thead>
							<tbody>
							<?php $i=0; foreach ($invoiceItems as $item): $i++; $invoiceItem = $item['InvoiceItem'];?>
								<tr>
									<td><?php echo $i ?></td>
									<td><input value="<?php echo $invoiceItem['name'] ?>" type="text" class="form-control s_name" id="s_name"
											   name="data[Invoice][items][<?php echo $invoiceItem['product_id'] ?>][name]" data-id="<?php echo $invoiceItem['product_id'] ?>"></td>
									<td><input value="<?php echo $invoiceItem['qty'] ?>"  type="text" class="form-control s_qty" id="s_qty"
											   name="data[Invoice][items][<?php echo $invoiceItem['product_id'] ?>][qty]" data-id="<?php echo $invoiceItem['product_id'] ?>"></td>
									<td><input value="<?php echo $invoiceItem['list_price'] ?>"  type="text" class="form-control s_list_price" id="s_list_price"
											   name="data[Invoice][items][<?php echo $invoiceItem['product_id'] ?>][list_price]" data-id="<?php echo $invoiceItem['product_id'] ?>"></td>
									<td><input value="<?php echo $invoiceItem['unit_price'] ?>" type="text" class="form-control s_unit_price" id="s_unit_price"
											   name="data[Invoice][items][<?php echo $invoiceItem['product_id'] ?>][unit_price]" data-id="<?php echo $invoiceItem['product_id'] ?>"></td>
									<td><input value="<?php echo $invoiceItem['amount'] ?>" type="text" class="form-control s_amount" id="s_amount"
											   name="data[Invoice][items][<?php echo $invoiceItem['product_id'] ?>][amount]" data-id="<?php echo $invoiceItem['product_id'] ?>"></td>
									<td><a class="del-service" href="#" title="Click to remove this entry">X</a></td>
								</tr>
							<?php endforeach;?>
							</tbody>
						</table>
					</div>

				</div>
			</div>
			<div class="col-3">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title"><?php echo __('Totals');?></h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
								<i class="fas fa-minus"></i></button>
						</div>
					</div>
					<div class="card-body">
						<p class="lead">Total Summary</p>

						<div class="table-responsive">
							<table class="table">
								<tbody><tr>
									<th style="width:50%">Subtotal:</th>
									<td style="vertical-align: inherit"><span style="font-weight: bold;" class="symbol-currency"></span></td>
									<td><input  value="<?php echo $invoice['Invoice']['amount'] ;?>" readonly="true" name="data[Invoice][amount]" class="form-control"  type="number" id="subtotal"></td>
								</tr>
								<tr>
									<th><?php echo __('Discount Amount:');?></th>
									<td style="vertical-align: inherit"><span style="font-weight: bold;" class="symbol-currency"></span></td>
									<td><input value="<?php echo $invoice['Invoice']['discount_amount'] ;?>" name="data[Invoice][discount_amount]" data-type="currency" class="form-control" step="1" type="number" id="invoicediscount"></td>
								</tr>
								<tr>
									<th><?php echo __('Shipping Cost:');?></th>
									<td style="vertical-align: inherit"><span style="font-weight: bold;" class="symbol-currency"></span></td>
									<td><input  value="<?php echo $invoice['Invoice']['shipping_cost'] ;?>" name="data[Invoice][shipping_cost]"  class="form-control" step="1" type="number" id="invoiceshippingcost"></td>
								</tr>
								<tr>
									<th><?php echo __('Total:');?></th>
									<td style="vertical-align: inherit"><span style="font-weight: bold;" class="symbol-currency"></span></td>
									<td><input  value="<?php echo $invoice['Invoice']['grant_total'] ;?>"  readonly="true" name="data[Invoice][grant_total]" class="form-control" step="1" type="number" id="total"></td>
								</tr>
								</tbody></table>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="card-footer ">
			<?php echo $this->Form->submit(__('Submit'), array("class"=>"btn btn-primary float-right"));?>
		</div>
	</div>
</section>
<?php echo $this->Form->end();?>


<script>
	function numberRows($t) {
		var c = 0;
		$t.find("tr").each(function(ind, el) {
			$(el).find("td:eq(0)").html(++c + ".");
		});
	}

	function updateTotal($t) {
		var subtotal = 0;

		$t.find("tr").each(function(ind, el) {
			if ($(el).find("td:eq(5)").children().val()){
				var val = parseFloat($(el).find("td:eq(5)").children().val());
				subtotal = subtotal + val;
			}
		});
		$('#subtotal').val(subtotal);
		$('#total').val(
			parseFloat($('#subtotal').val()) - parseFloat($('#invoicediscount').val()) - parseFloat($('#invoiceshippingcost').val())
		);
	}
	$("#add-service-button").click(function(e) {
		e.preventDefault();
		var  duplicated = false;
		$('#service-table').find("tr").each(function(ind, el) {
			if ($(el).find("td:eq(5)").children().attr('data-id') == $("#s_name").attr('data-id')){
				alert("<?php echo __('Duplicated Product');?>");
				duplicated =true;
			}
		});
		if($("#s_name").val()!='' && duplicated == false){
			var $row = $("<tr>");
			$row.append($("<td>"));
			// $row.append($("<td>").html("<span>"+$("#s_name").val()+"</span>"+"<span class='d-none'>"+$("#s_name").clone()+"</span>"));
			// $row.append($("<td>").html("<span>"+$("#s_qty").val()+"</span>"));
			$row.append($("<td>").html($("#s_name").clone().removeClass('d-none')));
			$row.append($("<td>").html($("#s_qty").clone().removeClass('d-none')));
			$row.append($("<td>").html($("#s_list_price").clone().removeClass('d-none')));
			$row.append($("<td>").html($("#s_unit_price").clone().removeClass('d-none')));
			$row.append($("<td>").html($("#s_amount").clone().removeClass('d-none')));
			// $row.append($("<td>").html("<span>"+$("#s_list_price").val()+"</span>"));
			// $row.append($("<td>").html("<span>"+$("#s_unit_price").val()+"</span>"));
			// $row.append($("<td>").html("<span>"+$("#s_amount").val()+"</span>"));
			$row.append($("<td>").html("<a class='del-service' href='#' title='Click to remove this entry'>X</a>"));
			$row.appendTo($("#service-table tbody"));
			numberRows($("#service-table"));
			updateTotal($("#service-table"));
		}

	});
	$("#form-entry form").submit(function(e) {
		e.preventDefault();
		$("#add-service-button").trigger("click");
	});
	$("#service-table").on("click", ".del-service", function(e) {
		e.preventDefault();
		var $row = $(this).parent().parent();
		var retResult = confirm("Are you sure you wish to remove this entry?");
		if (retResult) {
			$row.remove();
			numberRows($("#service-table"));
			updateTotal($("#service-table"));
		}
	});

	//Date range picker
	$('#reservationdate').datetimepicker({
		format: 'L'
	});

	$('#Invoicesame_as_billing_address').click(function () {
		if ($(this).is(':checked')) {
			$('.shipping_address').attr('disabled','disabled'); //enable input

			$('#InvoiceShippingCompanyName').val($('#InvoiceBillingCompanyName').val());
			$('#InvoiceShippingContactName').val($('#InvoiceBillingContactName').val());
			$('#InvoiceShippingContactEmail').val($('#InvoiceBillingContactEmail').val());
			$('#InvoiceShippingContactPhone').val($('#InvoiceBillingContactPhone').val());
			$('#InvoiceShippingAddress1').val($('#InvoiceBillingAddress1').val());
			$('#InvoiceShippingAddress2').val($('#InvoiceBillingAddress2').val());
			$('#InvoiceShippingCountry').val($('#InvoiceBillingCountry').val());
			$('#InvoiceShippingRegion').val($('#InvoiceBillingRegion').val());
			$('#InvoiceShippingCity').val($('#InvoiceBillingCity').val());
			$('#InvoiceShippingWard').val($('#InvoiceBillingWard').val());
		} else {
			$('.shipping_address').removeAttr('disabled'); //disable input
		}
	});


	$('#select-product').change(function () {

		$('#s_name').val($(this).find(':selected').attr('data-name'));
		$('#s_qty').val($(this).find(':selected').attr('data-qty'));
		$('#s_list_price').val($(this).find(':selected').attr('data-list-price'));
		$('#s_unit_price').val($(this).find(':selected').attr('data-unit-price'));
		$('#s_amount').val($(this).find(':selected').attr('data-amount'));

		$('#s_name').attr('name','data[Invoice][items]['+$(this).find(':selected').attr('data-id')+'][name]');
		$('#s_qty').attr('name','data[Invoice][items]['+$(this).find(':selected').attr('data-id')+'][qty]');
		$('#s_list_price').attr('name','data[Invoice][items]['+$(this).find(':selected').attr('data-id')+'][list_price]');
		$('#s_unit_price').attr('name','data[Invoice][items]['+$(this).find(':selected').attr('data-id')+'][unit_price]');
		$('#s_amount').attr('name','data[Invoice][items]['+$(this).find(':selected').attr('data-id')+'][amount]');

		$('#s_name').attr('data-id',$(this).find(':selected').attr('data-id'));
		$('#s_qty').attr('data-id',$(this).find(':selected').attr('data-id'));
		$('#s_list_price').attr('data-id',$(this).find(':selected').attr('data-id'));
		$('#s_unit_price').attr('data-id',$(this).find(':selected').attr('data-id'));
		$('#s_amount').attr('data-id',$(this).find(':selected').attr('data-id'));

	});
	$(document).on('change','.s_qty',function(){
		$(this).parent().next().next().next().children().val(
			parseFloat($(this).val()) * parseFloat($(this).parent().next().next().children().val())
		);
		updateTotal($("#service-table"));
	});
	$(document).on('change','.s_unit_price',function(){
		$(this).parent().next().children().val(
			parseFloat($(this).val()) * parseFloat($(this).parent().prev().prev().children().val())
		);
		updateTotal($("#service-table"));
	});
	$(document).on('change','#invoicediscount',function(){

		updateTotal($("#service-table"));
	});

	$(document).on('change','#invoiceshippingcost',function(){

		updateTotal($("#service-table"));
	});

	$(document).on('change','#InvoiceCurrency',function(){
		$('.symbol-currency').html($('#InvoiceCurrency').val())
	});


	$( document ).ready(function() {
		if ($('#Invoicesame_as_billing_address').is(':checked')) {
			$('.shipping_address').attr('disabled','disabled'); //enable input
			$('#InvoiceShippingCompanyName').val($('#InvoiceBillingCompanyName').val());
			$('#InvoiceShippingContactName').val($('#InvoiceBillingContactName').val());
			$('#InvoiceShippingContactEmail').val($('#InvoiceBillingContactEmail').val());
			$('#InvoiceShippingContactPhone').val($('#InvoiceBillingContactPhone').val());
			$('#InvoiceShippingAddress1').val($('#InvoiceBillingAddress1').val());
			$('#InvoiceShippingAddress2').val($('#InvoiceBillingAddress2').val());
			$('#InvoiceShippingCountry').val($('#InvoiceBillingCountry').val());
			$('#InvoiceShippingRegion').val($('#InvoiceBillingRegion').val());
			$('#InvoiceShippingCity').val($('#InvoiceBillingCity').val());
			$('#InvoiceShippingWard').val($('#InvoiceBillingWard').val());
		} else {
			$('.shipping_address').removeAttr('disabled'); //disable input
		}
		$('.symbol-currency').html($('#InvoiceCurrency').val());

	})


</script>
<script>
	$("#select-product").chosen();
	$("#InvoiceOrderId").chosen();
	$('#InvoiceOrderId').trigger('chosen:updated');

</script>

