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
	<?php echo $this->Session->flash(); ?>

	<!-- /.login-logo -->
	<div class="card">
		<div class="card-body login-card-body">
			<p class="login-box-msg">Sign in to start your session</p>
			<?php echo $this->Form->create('User'); ?>

				<div class="mb-3">
<!--					<input type="email" class="form-control" placeholder="Email">-->
					<?php echo $this->Form->input("email" ,array('label' => false,'div' => false,'type'=>'text','class'=>"form-control","placeholder"=>"Email" ))?>

				</div>
				<div class="mb-3 pt-3">

					<?php echo $this->Form->input("password" ,array("type"=>"password",'label' => false,'div' => false,'class'=>"form-control","placeholder"=>"Password" ))?>

				</div>
				<?php   if(!isset($this->request->data['User']['remember']))
					$this->request->data['User']['remember']=true;
				?>
				<div class="row">
					<div class="col-8">
						<div class="icheck-primary">
							<?php echo $this->Form->input("remember" ,array("type"=>"checkbox",'label' => false))?>
							<label for="remember">
								Remember Me
							</label>
						</div>
					</div>
					<!-- /.col -->
					<div class="col-4">
						<button type="submit" class="btn btn-primary btn-block">Sign In</button>
					</div>
					<!-- /.col -->
				</div>

			<?php echo $this->Form->end(); ?>

			<p class="mb-1">
				<?php //echo $this->Html->link(__("Forgot Password?",true),"/forgotPassword",array("class"=>"style30")) ?>
			</p>

		</div>
		<!-- /.login-card-body -->
	</div>
</div>
<script>
document.getElementById("UserEmail").focus();
</script>
