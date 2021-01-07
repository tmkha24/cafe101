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
							<?php echo $this->Html->image('/img/logo/logo_invocie1.png', array("class" => "img-fluid")) ?>
						</div>
						<div class="col-10 text-center">
							<h2>
								<?php echo __('華泰興食品皋之興有皐全司') ?>
							</h2>
							<h2>
								<?php echo __('WAH TAI HING FOODS MANUFACTORY LIMITED') ?>
							</h2>
							<div>
								<?php echo __('香港新界粉嶺安樂村安全街33號豐盈工貿中心3樓N-0室') ?>
								<br /><?php echo __('FLAT N-0, 3/F, GOOD HARVEST CENTRE, 33 ON CHUEN STREET,') ?>
								<br /><?php echo __('ON LOK TSUEN, FANLING, HKSAR') ?>
								<br /><?php echo __('TEL : 2676 3289 &nbsp; FAX : 2676 3299') ?>
							</div>
						</div>
					</div>
					<!-- title -->
					<div class="row mb-3">
						<div class="col-12 text-center">
							<h2>
								<strong><?php echo __('INVOICE') ?></strong>
							</h2>
						</div>
					</div>
					<!-- invoice information -->
					<div class="row mb-3">
						<div class="col-6">
							<table class="float-left">
								<!-- address -->
								<tr>
									<td class="align-text-top">
										<?php echo __('致') ?>
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										<?php echo __('彩鷗國際有限公司') ?>
										<br><?php echo __('香港九龍觀塘海濱道165號SML大廈14樓') ?>
										<br><?php echo __('WTH0805') ?>
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
										<?php echo __('Carol So') ?>
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
										<?php echo __('27557777') ?>
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
										<?php echo __('28657777') ?>
									</td>
								</tr>
							</table>
						</div>
						<div class="col-6">
							<table class="float-right">
								<!-- invoice number -->
								<tr>
									<td class="align-text-top">
										<?php echo __('發票單編號') ?>
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										<?php echo __('INV-074937') ?>
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
										<?php echo __('21 SEP 2020') ?>
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
										<?php echo __('P0200005452') ?>
									</td>
								</tr>
								<!-- sold from -->
								<tr>
									<td class="align-text-top">
										<?php echo __('推銷員') ?>
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										<?php echo __('WTH051114A') ?>
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
										<?php echo __('月結45天') ?>
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
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('件數') ?></th> <!-- note -->
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('數量') ?></th> <!-- quantity + unit-->
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('單價') ?></th> <!-- price -->
										<th class="p-0 border border-left-0 border-right-0 border-dark"><?php echo __('總價') ?></th> <!-- subtotal -->
									</tr>
								</thead>
								<tbody>
									<!-- currency -->
									<tr>
										<td class="border-0" colspan="5"></td>
										<td class="p-0 border-0"><?php echo __('HK$') ?></td>
										<td class="p-0 border-0"><?php echo __('HK$') ?></td>
									</tr>
									<!-- product -->
									<tr>
										<td class="p-1 border-0"><?php echo __('1') ?></td>
										<td class="p-1 border-0"><?php echo __('4892788668017') ?></td>
										<td class="p-1 border-0"><?php echo __('（港產）陳皮梅330G ') ?><br><?php echo __(' 規格：330G X 24') ?></td>
										<td class="p-1 border-0"><?php echo __('50') ?></td>
										<td class="p-1 border-0"><?php echo __('1200包') ?></td>
										<td class="p-1 border-0 text-right"><?php echo __('15.8000') ?></td>
										<td class="p-1 border-0 text-right"><?php echo __('18,201.60') ?></td>
									</tr>
									<tr>
										<td class="p-1 border-0"><?php echo __('2') ?></td>
										<td class="p-1 border-0"><?php echo __('4892788668017') ?></td>
										<td class="p-1 border-0"><?php echo __('（港產）陳皮梅330G ') ?><br><?php echo __(' 規格：330G X 24') ?></td>
										<td class="p-1 border-0"><?php echo __('贈送5') ?></td>
										<td class="p-1 border-0"><?php echo __('120包') ?></td>
										<td class="p-1 border-0 text-right"><?php echo __('0.0000') ?></td>
										<td class="p-1 border-0 text-right"><?php echo __('0.00') ?></td>
									</tr>
									<tr>
										<td class="p-1 border-0"><?php echo __('3') ?></td>
										<td class="p-1 border-0"><?php echo __('4892788668055') ?></td>
										<td class="p-1 border-0"><?php echo __('（港產）陳皮梅330G ') ?><br><?php echo __('規格：300G X 24') ?></td>
										<td class="p-1 border-0"><?php echo __('40') ?></td>
										<td class="p-1 border-0"><?php echo __('960包') ?></td>
										<td class="p-1 border-0 text-right"><?php echo __('15.8000') ?></td>
										<td class="p-1 border-0 text-right"><?php echo __('14,561.28') ?></td>
									</tr>
									<tr>
										<td class="p-1 border-0"><?php echo __('4') ?></td>
										<td class="p-1 border-0"><?php echo __('4892788668055') ?></td>
										<td class="p-1 border-0"><?php echo __('（港產）陳皮梅330G ') ?><br><?php echo __('規格：300G X 24') ?></td>
										<td class="p-1 border-0"><?php echo __('贈送4') ?></td>
										<td class="p-1 border-0"><?php echo __('96包') ?></td>
										<td class="p-1 border-0 text-right"><?php echo __('0.0000') ?></td>
										<td class="p-1 border-0 text-right"><?php echo __('0.00') ?></td>
									</tr>
									<tr>
										<td class="p-1 border-0"><?php echo __('5') ?></td>
										<td class="p-1 border-0"><?php echo __('4892788668086') ?></td>
										<td class="p-1 border-0"><?php echo __('（港產）陳皮檸檬330G') ?><br><?php echo __('規格：330G X 24') ?></td>
										<td class="p-1 border-0"><?php echo __('40') ?></td>
										<td class="p-1 border-0"><?php echo __('960包') ?></td>
										<td class="p-1 border-0 text-right"><?php echo __('15.8000') ?></td>
										<td class="p-1 border-0 text-right"><?php echo __('14,561.28') ?></td>
									</tr>
									<tr>
										<td class="p-1 border-0"><?php echo __('6') ?></td>
										<td class="p-1 border-0"><?php echo __('4892788668086') ?></td>
										<td class="p-1 border-0"><?php echo __('（港產）陳皮檸檬330G') ?><br><?php echo __('規格：330G X 24') ?></td>
										<td class="p-1 border-0"><?php echo __('贈送4') ?></td>
										<td class="p-1 border-0"><?php echo __('96包') ?></td>
										<td class="p-1 border-0 text-right"><?php echo __('0.0000') ?></td>
										<td class="p-1 border-0 text-right"><?php echo __('0.00') ?></td>
									</tr>
									<tr>
										<td class="p-1 border-0"><?php echo __('7') ?></td>
										<td class="p-1 border-0"><?php echo __('4892788000152') ?></td>
										<td class="p-1 border-0"><?php echo __('（港產）檸汁姜330G') ?><br><?php echo __('規格：330G X 24') ?></td>
										<td class="p-1 border-0"><?php echo __('40') ?></td>
										<td class="p-1 border-0"><?php echo __('960包') ?></td>
										<td class="p-1 border-0 text-right"><?php echo __('15.8000') ?></td>
										<td class="p-1 border-0 text-right"><?php echo __('14,561.28') ?></td>
									</tr>
									<tr>
										<td class="p-1 border-0"><?php echo __('8') ?></td>
										<td class="p-1 border-0"><?php echo __('4892788000152') ?></td>
										<td class="p-1 border-0"><?php echo __('（港產）檸汁姜330G') ?><br><?php echo __('規格：330G X 24') ?></td>
										<td class="p-1 border-0"><?php echo __('贈送4') ?></td>
										<td class="p-1 border-0"><?php echo __('96包') ?></td>
										<td class="p-1 border-0 text-right"><?php echo __('0.0000') ?></td>
										<td class="p-1 border-0 text-right"><?php echo __('0.00') ?></td>
									</tr>
									
									<!-- tax, discount, etc... -->
									<tr>
										<td class="p-1 border-0 text-right" colspan="7"><?php echo __('已扣4％折扣') ?></td>
									</tr>
								</tbody>
							</table>
						</div>

					</div>


					<!-- invoice products summary -->
					<div class="row">
						<div class="col pl-5">
							<?php echo __('55件一(DF-100224)港產陳皮梅330G生產日期：2020/9/10-2022/3/9') ?>
							<br><?php echo __('44件一(DF-100225)港產陳皮應子300G生產日期：2020/9/10-2022/3/9') ?>
							<br><?php echo __('44件一(DF-100226)港產陳皮檸檬330G生產日期：2020/9/10-2022/3/9') ?>
							<br><?php echo __('44件一(DF-104394)港產檸汁姜330G生產日期2020/9/10-2022/3/9') ?>
						</div>
					</div>

					<!-- total money -->
					<div class="row">
						<div class="col-8"></div>
						<div class="col text-right">
							<?php echo __('付款方式總額') ?> <?php echo __('(HKD)') ?> <?php echo __('61,885.44') ?>
						</div>
					</div>

					<!-- invoice creator -->
					<div class="row mb-3">
						<div class="col pl-4">
							<?php echo __('開發票人：') ?> <?php echo __('黃小姐') ?>
						</div>
					</div>

					<div class="row no-print">
						<div class="col-12">
							<a onclick="window.print()" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>