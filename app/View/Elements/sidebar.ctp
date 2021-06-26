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
				echo __('Cafe101');
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
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>

