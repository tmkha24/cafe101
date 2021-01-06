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
echo $this->Html->script('/usermgmt/js/umupdate');
?>

<?php echo $this->Session->flash(); ?>
<section class="content-header">
	<div class="container-fluid">
		<div class="row">
			<?php echo $this->element('dashboard'); ?>
		</div>
		<div class="row mb-2">
			<div class="col-sm-6">
				<h1><?php echo __('User Group Permissions');?></h1>
			</div>
			<div class="col-sm-6">
				<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
					<li class="breadcrumb-item active"><?php echo __('User Group Permissions');?></li>
				</ol>
			</div>
		</div>
		<div class="row">
			<span  class="umstyle2"><?php __('Select Controller');?></span>  <?php echo $this->Form->input("controller",array('type'=>'select','div'=>false,'options'=>$allControllers,'selected'=>$c,'label'=>false,"onchange"=>"window.location='".SITE_URL."permissions/?c='+(this).value"))?>
		</div>
	</div>
</section>
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body">
						<div class="um_box_mid_content_mid" id="permissions">
							<?php   if (!empty($controllers)) { ?>
								<input type="hidden" id="BASE_URL" value="<?php echo SITE_URL?>">
								<input type="hidden" id="groups" value="<?php echo $groups?>">
								<table width="100%">
									<tbody>
									<tr>
										<th> <?php echo __("Controller");?> </th>
										<th> <?php echo __("Action");?> </th>
										<th> <?php echo __("Permission");?> </th>
										<th> <?php echo __("Operation");?> </th>
									</tr>
									<?php
									$k=1;
									foreach ($controllers as $key=>$value) {
										if (!empty($value)) {
											for ($i=0; $i<count($value); $i++) {
												if (isset($value[$i])) {
													$action=$value[$i];
													echo $this->Form->create();
													echo $this->Form->hidden('controller',array('id'=>'controller'.$k,'value'=>$key));
													echo $this->Form->hidden('action',array('id'=>'action'.$k,'value'=>$action));
													echo "<tr>";
													echo "<td>".$key."</td>";
													echo "<td>".$action."</td>";
													echo "<td>";
													for ($j=0; $j<count($user_groups); $j++) {
														$ugname=$user_groups[$j];
														if (isset($value[$action][$ugname]) && $value[$action][$ugname]==1) {
															$checked=true;
														} else {
															$checked=false;
														}
														echo $this->Form->input($ugname,array('id'=>$ugname.$k,'type'=>'checkbox','checked'=>$checked));
													}
													echo "</td>";
													echo "<td>";
													echo $this->Form->button('Update', array('type'=>'button','id'=>'mybutton123','name'=>$k,'onClick'=>'javascript:update_fields('.$k.');', 'class'=>'umbtn'));
													echo "<div id='updateDiv".$k."' align='right'>&nbsp;</div>";
													echo "</td>";
													echo "</tr>";
													echo $this->Form->end();
													$k++;
												}
											}
										}
									} ?>
								</table>
							<?php   }   ?>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
</section>

