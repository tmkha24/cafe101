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
<?php echo $this->Session->flash(); ?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<?php echo $this->element('dashboard'); ?>
		</div>
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?php echo __('User Detail');?></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
					<li class="breadcrumb-item active"><?php echo __('User Detail');?></li>
				</ol>
			</div>
		</div>
	</div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="um_box_mid_content_mid" id="index">
							<table cellspacing="0" cellpadding="0" width="100%" border="0" >
								<tbody>
								<?php       if (!empty($user)) { ?>
									<tr>
										<td><strong><?php echo __('User Id');?></strong></td>
										<td><?php echo $user['User']['id']?></td>
									</tr>
									<tr>
										<td><strong><?php echo __('User Group');?></strong></td>
										<td><?php echo h($user['UserGroup']['name'])?></td>
									</tr>
									<tr>
										<td><strong><?php echo __('Username');?></strong></td>
										<td><?php echo h($user['User']['username'])?></td>
									</tr>
									<tr>
										<td><strong><?php echo __('Full Name');?></strong></td>
										<td><?php echo h($user['User']['name'])?></td>
									</tr>
									<tr>
										<td><strong><?php echo __('Email');?></strong></td>
										<td><?php echo h($user['User']['email'])?></td>
									</tr>
									<tr>
										<td><strong><?php echo __('Status');?></strong></td>
										<td><?php
											if ($user['User']['active']) {
												echo 'Active';
											} else {
												echo 'Inactive';
											} ?>
										</td>
									</tr>
									<tr>
										<td><strong><?php echo __('Created');?></strong></td>
										<td><?php echo date('d-M-Y',strtotime($user['User']['created']))?></td>
									</tr>
								<?php   } else {
									echo "<tr><td colspan=2><br/><br/>No Data</td></tr>";
								} ?>
								</tbody>
							</table>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>
