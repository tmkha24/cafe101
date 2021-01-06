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
<div class="row pt-5">

<div style="margin: auto" class="register-box">
	<div class="register-logo">
		<a href="/"><b><?php echo "Distributors";?>
				</b> <?php echo "Register";?></a>
	</div>

	<div class="card">
		<div class="card-body register-card-body">
			<p class="login-box-msg"><?php echo "Register a new membership";?></p>

				<div class="input-group mb-3">
					<input type="text" class="form-control" placeholder="<?php echo "Full name";?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-user"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="email" class="form-control" placeholder="<?php echo "Email";?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-envelope"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" placeholder="<?php echo "Password";?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="input-group mb-3">
					<input type="password" class="form-control" placeholder="<?php echo "Retype password";?>">
					<div class="input-group-append">
						<div class="input-group-text">
							<span class="fas fa-lock"></span>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-8">
						<div class="icheck-primary">
							<input type="checkbox" id="agreeTerms" name="terms" value="agree">
							<label for="agreeTerms">
								<?php echo "I agree to the";?> <a href="#"><?php echo "terms";?></a>
							</label>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-4">
						<button type="submit" class="btn btn-primary btn-block"><?php echo "Register";?></button>
					</div>
					<!-- /.col -->
				</div>
			<a href="<?php echo  Router::url(array('plugin'=>'','controller' => 'distributors','action'=>'memberlogin')) ?>" class="text-center"><?php echo "I already have a membership";?></a>
		</div>
		<!-- /.form-box -->
	</div><!-- /.card -->
</div>
</div>
<script>
document.getElementById("UserUsername").focus();
</script>
