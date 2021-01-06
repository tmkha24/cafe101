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
				<h1><?php echo __('Add Group');?></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
					<li class="breadcrumb-item active"><?php echo __('Add Group');?></li>
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
						<div class="um_box_mid_content_mid" id="addgroup">
							<?php echo $this->Form->create('UserGroup', array('action' => 'addGroup')); ?>
							<div class="form-group">
								<div class="umstyle3"><?php echo __('Group Name');?><font color='red'>*</font></div>
								<div class="umstyle4" ><?php echo $this->Form->input("name" ,array('label' => false,'div' => false,'class'=>"umstyle5 form-control" ))?></div>
								<div class="umstyle7">for ex. Business User</div>
								<div style="clear:both"></div>
							</div>
							<div class="form-group">
								<div class="umstyle3"><?php echo __('Alias Group Name');?><font color='red'>*</font></div>
								<div class="umstyle4" ><?php echo $this->Form->input("alias_name" ,array('label' => false,'div' => false,'class'=>"umstyle5 form-control" ))?></div>
								<div class="umstyle7">for ex. Business_User (Must not contain space)</div>
								<div style="clear:both"></div>
							</div>
							<div class="form-group">
								<?php   if (!isset($this->request->data['UserGroup']['allowRegistration'])) {
									$this->request->data['UserGroup']['allowRegistration']=true;
								}   ?>
								<div class="umstyle3"><?php echo __('Allow Registration');?></div>
								<div class="umstyle4"><?php echo $this->Form->input("allowRegistration" ,array("type"=>"checkbox",'label' => false))?></div>
								<div style="clear:both"></div>
							</div>
							<div>
								<div class="umstyle3"></div>
								<div class="umstyle4"><?php echo $this->Form->Submit(__('Add Group'));?></div>
								<div style="clear:both"></div>
							</div>
							<div>Note: If you add a new group then you should give permissions to this newly created Group.</div>
							<?php echo $this->Form->end(); ?>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<script>
document.getElementById("UserUserGroupId").focus();
</script>
