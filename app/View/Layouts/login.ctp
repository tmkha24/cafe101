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
		if (isset($Tr['SiteTitle'])) { echo __($Tr['SiteTitle']) . ':'; }
		echo $title_for_layout;
		?>
	</title>
	<?php
	echo $this->Html->meta('icon');
	echo $this->Html->css('nironcrm');
//	echo $this->Html->css('cake.generic');
//	echo $this->Html->css('tr.generic');
//	echo $this->Html->css('chosen.css');
//	echo $this->Html->css('/usermgmt/css/umstyle');
//	echo $this->Html->script('jquery.min.js');
	echo $this->fetch('meta');
	echo $this->fetch('css');
	echo $this->fetch('script');

//for adminlte
	echo $this->Html->script('/crm/plugins/jquery/jquery.min.js');
	echo $this->Html->script('/crm/plugins/bootstrap/js/bootstrap.bundle.min.js');
	echo $this->Html->script('/crm/plugins/datatables/jquery.dataTables.min.js');
	echo $this->Html->script('/crm/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');
	echo $this->Html->script('/crm/plugins/datatables-responsive/js/dataTables.responsive.min.js');
	echo $this->Html->script('/crm/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');
	echo $this->Html->script('/crm/dist/js/adminlte.min.js');
	echo $this->Html->script('/crm/dist/js/demo.js');



	echo $this->Html->css('/crm/plugins/fontawesome-free/css/all.min.css');
	echo $this->Html->css('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css');
	echo $this->Html->css('/crm/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');
	echo $this->Html->css('/crm/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');
	echo $this->Html->css('/crm/dist/css/adminlte.min.css');
	echo $this->Html->css('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700');

	?>
</head>
<body class="hold-transition login-page">

		<?php echo $this->fetch('content'); ?>

</body>
</html>
