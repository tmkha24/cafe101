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
 * @package       app.View.Errors
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
?>
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
			</div>
		</div>
	</section>
	<section class="content">
		<div class="error-page">
			<h2 class="headline text-warning"> 404</h2>

			<div class="error-content">
				<h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>
				<p>
					<?php echo $message; ?>
				</p>
				<p>
					<?php printf(
						__d('cake', 'The requested address %s was not found on this server.'),
						"<strong>'{$url}'</strong>"
					); ?>
				</p>
				<p>
					<?php
					if (Configure::read('debug') > 0):
						echo $this->element('exception_stack_trace');
					endif;
					?>
				</p>

			</div>
		</div>
	</section>

