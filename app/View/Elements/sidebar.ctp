<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="/" class="brand-link navbar-color">
		<?php
		if (isset($configData[Configure::read('companyLogo')])){
			echo $this->Html->image('logo/'.$configData[Configure::read('companyLogo')], array('class' =>'brand-image img-circle elevation-3', "alt"=>"Logo"));
		}else{
			echo $this->Html->image('logo/logo_default.png', array('class' =>'brand-image img-circle elevation-3', "alt"=>"Logo"));
		}

		?>

		<span class="brand-text font-weight-light">
			<?php
			if (isset($configData[Configure::read('companyName')])){
				echo $configData[Configure::read('companyName')];
			}else{
				echo __('Simple CRM');
			}
			?>
		</span>
	</a>

	<div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-header">
					<?php echo __('Management') ?>
				</li>
				<li class="nav-item has-treeview">
					<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'Dashboards', 'action' => 'index')) ?>" class="nav-link">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							<?php echo __('Dashboard') ?>
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'contacts', 'action' => 'index')) ?>" class="nav-link">
						<i class="nav-icon fas fa-file-contract"></i>
						<p>
							<?php echo __('Contacts') ?>
						</p>
					</a>
				</li>

				<li class="nav-item has-treeview">
					<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'vendors', 'action' => 'index')) ?>" class="nav-link">
						<i class="nav-icon fas fa-car"></i>
						<p>
							<?php echo __('Vendors') ?>
						</p>
					</a>

				</li>
				<li class="nav-item has-treeview">
					<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'category', 'action' => 'index')) ?>" class="nav-link">
						<i class="nav-icon fas fa-list"></i>
						<p>
							<?php echo __('Categories') ?>
						</p>
					</a>
				</li>

				<li class="nav-item has-treeview">
					<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'products', 'action' => 'index')) ?>" class="nav-link">
						<i class="nav-icon fab fa-product-hunt"></i>
						<p>
							<?php echo __('Products') ?>
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'quotes', 'action' => 'index')) ?>" class="nav-link">
						<i class="nav-icon fab fa-quora"></i>
						<p>
							<?php echo __('Quotes') ?>
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'orders', 'action' => 'index')) ?>" class="nav-link">
						<i class="nav-icon fab fa-first-order-alt"></i>
						<p>
							<?php echo __('Purchase Record') ?>
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'orders', 'action' => 'orderstatus')) ?>" class="nav-link">
						<i class="nav-icon fas fa-search"></i>
						<p>
							<?php echo __('Orders Status') ?>
						</p>
					</a>
				</li>


				<li class="nav-item has-treeview">
					<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'invoices', 'action' => 'index')) ?>" class="nav-link">
						<i class="nav-icon fas fa-file-invoice-dollar"></i>
						<p>
							<?php echo __('Invoices') ?>
						</p>
					</a>
				</li>

				<li class="nav-item has-treeview">
					<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'distributors', 'action' => 'memberlogin')) ?>" class="nav-link">
						<i class="nav-icon fas fa-sign-in-alt"></i>
						<p>
							<?php echo __('Distributors Login') ?>
						</p>
					</a>
				</li>

				<li class="nav-item has-treeview">
					<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'distributors', 'action' => 'memberregister')) ?>" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							<?php echo __('Distributors Register') ?>
						</p>
					</a>
				</li>

				<li class="nav-header">
					<?php echo __('Report') ?>
				</li>

				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-file"></i>
						<p>
							<?php echo __('Product') ?>
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'allproduct')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									<?php echo __('All Product') ?>
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'productactive')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									<?php echo __('Active Product') ?>
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'productinactive')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									<?php echo __('InActive Product') ?>
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'productordered')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									<?php echo __('Ordered Product') ?>
								</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-file"></i>
						<p>
							<?php echo __('Vendor') ?>
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'allvendor')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									<?php echo __('All Vendor') ?>
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'vendoractive')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									<?php echo __('Active Vendor') ?>
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'vendorinactive')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									<?php echo __('InActive Vendor') ?>
								</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-file"></i>
						<p>
							<?php echo __('Order (Purchasing)') ?>
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'allorder')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									<?php echo __('All Order') ?>
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'orderpending')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									<?php echo __('Order Pending') ?>
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'orderprocessing')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									<?php echo __('Order Processing') ?>
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'ordershipping')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									<?php echo __('Order Shipping') ?>
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'ordercompleted')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									<?php echo __('Order Completed') ?>
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'orderhold')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									<?php echo __('Order Hold') ?>
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'ordercancel')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									<?php echo __('Order Cancel') ?>
								</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-file"></i>
						<p>
							<?php echo __('Accounting') ?>
							<i class="fas fa-angle-left right"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'accountinginvoice')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									<?php echo __('All InVoice') ?>
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'accountinginvoiceunpaid')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									<?php echo __('Unpaid InVoice') ?>
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'accountinginvoicepaid')) ?>" class="nav-link">
								<i class="far fa-circle nav-icon"></i>
								<p>
									<?php echo __('Paid InVoice') ?>
								</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview">

					<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'reports','action'=>'warehousetransfer')) ?>" class="nav-link">
						<i class="nav-icon fas fa-file"></i>
						<p>
							<?php echo __('Warehouse Transfer') ?>
						</p>
					</a>
				</li>
				<li class="nav-header">
					<?php echo __('Setting') ?>
				</li>
				<li class="nav-item has-treeview">

					<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'user_dashboard')) ?>" class="nav-link">
						<i class="nav-icon fas fa-users"></i>
						<p>
							<?php echo __('User') ?>
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview">
					<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'WebConfigs', 'action' => 'index')) ?>" class="nav-link">
						<i class="nav-icon fas fa-cog"></i>
						<p>
							<?php echo __('Web Config') ?>
						</p>
					</a>
				</li>

				<li class="nav-item has-treeview">
					<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'TextTranslates', 'action' => 'index')) ?>" class="nav-link">
						<i class="nav-icon fas fa-cog"></i>
						<p>
							<?php echo __('Text Translate') ?>
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>

