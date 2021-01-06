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
							<?php echo $this->Html->image('/img/logo/logo.png') ?>
						</div>
						<div class="col-10 text-center">
							<h2>
								華泰興食品皋之興有皐全司
							</h2>
							<h2>
								WAR TAI HING FOODS MANUFACTORY LIMITED
							</h2>
							<div>
								香港新界粉嶺安樂村安全街33號豐盈工貿中心3樓N-0室
								<br />FLAT N-0, 3/F, GOOD HARVEST CENTRE, 33 ON CHUEN STREET,
								<br />ON LOK TSUEN, FANLING, HKSAR
								<br />TEL : 2676 3289 &nbsp; FAX : 2676 3299
							</div>
						</div>
					</div>
					<!-- title -->
					<div class="row mb-4">
						<div class="col-12 text-center">
							<h2>
								<strong>INVOICE</strong>
							</h2>
						</div>
					</div>
					<!-- invoice information -->
					<div class="row mb-5">
						<div class="col-6">
							<table class="float-left">
								<!-- address -->
								<tr>
									<td class="align-text-top">
										致
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										彩鷗國際有限公司
										<br>香港九龍觀塘海濱道165號SML大廈14樓
										<br>WTH0805
									</td>
								</tr>
								<!-- contact person -->
								<tr>
									<td class="align-text-top">
										聯絡人
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										Carol So
									</td>
								</tr>
								<!-- phone -->
								<tr>
									<td class="align-text-top">
										電話
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										27557777
									</td>
								</tr>
								<!-- fax -->
								<tr>
									<td class="align-text-top">
										傳真
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										28657777
									</td>
								</tr>
							</table>
						</div>
						<div class="col-6">
							<table class="float-right">
								<!-- invoice number -->
								<tr>
									<td class="align-text-top">
										發票單編號
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										INV-074937
									</td>
								</tr>
								<!-- invoice date -->
								<tr>
									<td class="align-text-top">
										日期
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										21 SEP 2020
									</td>
								</tr>
								<!-- Order number -->
								<tr>
									<td class="align-text-top">
										客戶訂單編號
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										P0200005452
									</td>
								</tr>
								<!-- sold from -->
								<tr>
									<td class="align-text-top">
										推銷員
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										WTH051114A
									</td>
								</tr>
								<!-- payment information -->
								<tr>
									<td class="align-text-top">
										付款方式
									</td>
									<td class="align-text-top">
										:
									</td>
									<td class="align-text-top">
										月結45天
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
										<th class="border-0">舟號</th>
										<th class="border-0">貨物型號</th> <!-- product model-->
										<th class="border-0">貨物名稱</th> <!-- product name-->
										<th class="border-0">件數</th> <!-- note -->
										<th class="border-0">數量</th> <!-- quantity + unit-->
										<th class="border-0">單價</th> <!-- price -->
										<th class="border-0">總價</th> <!-- subtotal -->
									</tr>
								</thead>
								<tbody>
									<!-- currency -->
									<tr>
										<td class="border-0" colspan="5"></td>
										<td class="p-0 border-0">HK$</td>
										<td class="p-0 border-0">HK$</td>
									</tr>
									<!-- product -->
									<tr>
										<td class="border-0">1</td>
										<td class="border-0">4892788668017</td>
										<td class="border-0">（港產）陳皮梅330G <br> 規格：330G X 24</td>
										<td class="border-0">50</td>
										<td class="border-0">1200包</td>
										<td class="border-0 text-right">15.8000</td>
										<td class="border-0 text-right">18,201.60</td>
									</tr>
									<tr>
										<td class="border-0">2</td>
										<td class="border-0">4892788668017</td>
										<td class="border-0">（港產）陳皮梅330G <br> 規格：330G X 24</td>
										<td class="border-0">贈送5</td>
										<td class="border-0">120包</td>
										<td class="border-0 text-right">0.0000</td>
										<td class="border-0 text-right">0.00</td>
									</tr>
									<tr>
										<td class="border-0">2</td>
										<td class="border-0">4892788668055</td>
										<td class="border-0">（港產）陳皮應子300G <br /> 規格：300G X 24</td>
										<td class="border-0">40</td>
										<td class="border-0">960包</td>
										<td class="border-0 text-right">15.8000</td>
										<td class="border-0 text-right">14,561.28</td>
									</tr>
									<!-- tax, discount, etc... -->
									<tr>
										<td class="border-0" colspan="6"></td>
										<td class="border-0 text-right">已扣4％折扣</td>
									</tr>
								</tbody>
							</table>
						</div>
						
					</div>
					

					<!-- invoice products summary -->
					<div class="row">
						<div class="col pl-5">
							55件一(DF-100224)港產陳皮梅330G生產日期：2020/9/10-2022/3/9
							<br> 40件一(DF-100225)港產陳皮應子300G生產日期：2020/9/10-2022/3/9
						</div>
					</div>

					<!-- total money -->
					<div class="row">
						<div class="col-8"></div>
						<div class="col pl-5 text-right">
							總額(HKD) 32,762.88
						</div>
					</div>
					
					<div class="row no-print">
						<div class="col-12">
							<a onclick="window.print()" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
						</div>
					</div>
				</div>				</div>
		</div>
	</div>
</section>
