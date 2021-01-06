<footer class="main-footer">
	<?php ?>
	<?php
	if (isset($configData[Configure::read('footerText')])){
		echo $configData[Configure::read('footerText')];
	}else{
		echo __('Simple CRM Footer @2020');
	}
	?>
</footer>
