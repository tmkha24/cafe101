<?php
/*
	This file is part of UserMgmt.

	Author: Chetan Varshney (http://ektasoftwares.com)

	UserMgmt is free software: you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation, either version 3 of the License, or
	(at your option) any later version.

	UserMgmt is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<div class="login-box">
	<div class="login-logo">
		<a href="/"><b>
				<?php
				if (isset($configData[Configure::read('companyName')])){
					echo $configData[Configure::read('companyName')];
				}else{
					echo __('Simple CRM');
				}
				?>
			</b></a>
	</div>
	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password.</p>

			<form action="recover-password.html" method="post">
				<div class="input-group mb-3">
					<input type="email" class="form-control" placeholder="Email">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<button type="submit" class="btn btn-primary btn-block">Request new password</button>
					</div>
					<!-- /.col -->
				</div>
			</form>

			<p class="mt-3 mb-1">
				<a href="login.html">Login</a>
			</p>

		</div>
		<!-- /.login-card-body -->
	</div>
</div>
<script>
document.getElementById("UserEmail").focus();
</script>
