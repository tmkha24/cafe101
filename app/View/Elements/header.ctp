<!--<div class="actions">-->
<!--<ul>-->
<!--        <li>--><?php //echo $this->Html->link($this->Html->image("tr/Contacts_Add.png") . " " . __('New Contact'), array('controller' => 'contacts', 'action' => 'add', 'plugin' => ''), array('escape' => false)); ?><!-- </li>-->
<!--        <li>--><?php //echo $this->Html->link($this->Html->image("tr/Events_Add.png") . " " . __('New Event'), array('controller' => 'events', 'action' => 'add', 'plugin' => 'full_calendar'), array('escape' => false)); ?><!-- </li>-->
<!--        <li>--><?php //echo $this->Html->link($this->Html->image("tr/Deals_Add.png") . " " . __('New Deal'), array('controller' => 'deals', 'action' => 'add', 'plugin' => ''), array('escape' => false)); ?><!-- </li>-->
<!--</ul>-->
<!--</div>-->



<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>

		<li class="nav-item d-none d-sm-inline-block">
			<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'Dashboards', 'action' => 'index')) ?>" class="nav-link">
				<?php echo __('Dashboard') ?>
			</a>
		</li>

	</ul>
	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">
		<li class="nav-item dropdown user-menu">
			<?php  if (isset($authUser) &&  isset($authUser['User']['name'])) { ?>
				<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
					<?php echo $this->Html->image("/img/tr/avatar.jpg", array('class' =>'user-image img-circle elevation-2'));?>

					<span class="d-none d-md-inline"><?php echo $authUser['User']['name'] ?></span>
				</a>
				<ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
					<!-- User image -->
					<li class="user-header bg-primary">
						<?php echo $this->Html->image("/img/tr/avatar.jpg", array('class' =>'user-image img-circle elevation-2'));?>
						<p>
							<?php echo $authUser['User']['name'] ?>
							<small><?php echo __('Since: '); echo $authUser['User']['created'] ?></small>
						</p>
					</li>
					<!-- Menu Body -->
					<!-- Menu Footer-->
					<li class="user-footer">
<!--						--><?php //echo $this->Html->link(__("Profile",true), '/viewUser/' . $authUser['User']['id'], array('class'=>'btn btn-default btn-flat')) ?>
						<?php echo $this->Html->link(__("Logout",true),"/logout", array('class'=>'btn btn-default btn-flat float-right')) ?>
					</li>
				</ul>




			<?php } else { ?>
			<li class="nav-item dropdown user-menu">
				<?php echo $this->Html->link(__("Login",true),"/", array("class"=>"nav-link")) ?>
			</li>
			<?php } ?>
		</li>

	</ul>
</nav>
