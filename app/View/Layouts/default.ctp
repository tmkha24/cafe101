<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php
		if (isset($Tr['SiteTitle'])) {
			echo __($Tr['SiteTitle']) . ':';
		}
		echo $title_for_layout;
		?>
	</title>
	<?php
	echo $this->Html->meta('icon');
	echo $this->Html->css('nironcrm');
	//	echo $this->Html->css('cake.generic');
	//	echo $this->Html->css('tr.generic');
	//	echo $this->Html->css('/usermgmt/css/umstyle');
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');

	//for adminlte
	echo $this->Html->script('/crm/plugins/jquery/jquery.min.js');
//	echo $this->Html->script('chosen.jquery.min.js');

	echo $this->Html->script('chosen.jquery.min.2.js');





	echo $this->Html->css('/crm/plugins/fontawesome-free/css/all.min.css');
	echo $this->Html->css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
	echo $this->Html->css('/crm/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');
	echo $this->Html->css('/crm/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');
	echo $this->Html->css('/crm/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css');
	echo $this->Html->css('/crm/plugins/ekko-lightbox/ekko-lightbox.css');
	echo $this->Html->css('/crm/plugins/daterangepicker/daterangepicker.css');
	echo $this->Html->css('/crm/dist/css/adminlte.min.css');
	echo $this->Html->css('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');
	echo $this->Html->css('custom');
	echo $this->Html->script('/crm/plugins/daterangepicker/daterangepicker.js');
	echo $this->Html->script('/crm/plugins/moment/moment.min.js');
	echo $this->Html->script('/crm/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');
	echo $this->Html->css('chosen.min.css');


	?>
</head>
<body class="sidebar-mini">
<div class="wrapper" id="container">

	<?php echo $this->element('header'); ?>
	<?php echo $this->element('sidebar'); ?>
	<div class="content-wrapper index">
		<?php echo $this->fetch('content'); ?>


		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<div id="footer">
		<?php echo $this->element('footer'); ?>
	</div>

</div>

<?php
echo $this->Html->script('/crm/plugins/bootstrap/js/bootstrap.bundle.min.js');
echo $this->Html->script('/crm/plugins/datatables/jquery.dataTables.min.js');
echo $this->Html->script('/crm/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');
echo $this->Html->script('/crm/plugins/datatables-responsive/js/dataTables.responsive.min.js');
echo $this->Html->script('/crm/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');
echo $this->Html->script('/crm/dist/js/adminlte.min.js');
echo $this->Html->script('/crm/plugins/bs-custom-file-input/bs-custom-file-input.min.js');
echo $this->Html->script('/crm/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js');
echo $this->Html->script('/crm/dist/js/demo.js');
echo $this->Html->script('/crm/plugins/ekko-lightbox/ekko-lightbox.min.js');
?>

</body>
</html>
