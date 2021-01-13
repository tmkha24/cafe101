	<?php echo $this->Session->flash(); ?>

	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('Member\'s Group Detail'); ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active"><?php echo __('Member\'s Group Detail'); ?></li>
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
							<div class="row">
								<div class="col-12">
									<ol class="float-sm-right">
										<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __(' Member\'s Group List'), array('action' => 'index'), array('escape' => false)); ?>
										<?php echo $this->Html->link($this->Html->image('tr/Edit.png') . ' ' . __('Edit Member\'s Group'), array('action' => 'edit', $memberGroup['MemberGroup']['id']), array('escape' => false, "class" => "pl-3")); ?>
										<?php echo $this->Html->link($this->Html->image('tr/Copy.png') . ' ' . __('Copy Member\'s Group'), array('action' => 'edit', $memberGroup['MemberGroup']['id'], 'copy'), array('escape' => false, "class" => "pl-3")); ?>
										<?php echo $this->Form->postLink($this->Html->image('tr/Delete.png') . ' ' . __('Delete Member\'s Group'), array('action' => 'delete', $memberGroup['MemberGroup']['id']), array('escape' => false, "class" => "pl-3"), __('Are you sure you want to delete # %s?', $memberGroup['MemberGroup']['id'])); ?>
									</ol>
								</div>
							</div>

							<div class="row">
								<div class="col-5 col-sm-3">
									<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
										<a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">
											<?php echo __('General');?>
										</a>
										<a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">
											<?php echo __('Member');?>
										</a>
									</div>
								</div>
								<div class="col-7 col-sm-9">


									<div class="tab-content" id="vert-tabs-tabContent">

										<div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
											<div class="card">
												<div class="card-header">
													<h3 class="card-title"><?php echo __('General Information:') ?></h3>
												</div>
												<div class="card-body">
													<dl class="row">
														<dt class="col-sm-3"><?php echo __('Id'); ?></dt>
														<dd class="col-sm-9">
															<?php echo h($memberGroup['MemberGroup']['id']); ?>
														</dd>

														<dt class="col-sm-3">
															<?php echo __('Title'); ?>
														</dt>
														<dd class="col-sm-9">
															<?php echo h($memberGroup['MemberGroup']['name']); ?>
														</dd>

														<dt class="col-sm-3">
															<?php echo __('Name'); ?>
														</dt>
														<dd class="col-sm-9">
															<?php echo h($memberGroup['MemberGroup']['description']); ?>
														</dd>

													</dl>
												</div>
												<div class="card-footer ">
													<?php echo $this->Html->link($this->Html->image('tr/Companies.png') . " " . __('View Member\'s Group List'), array('action' => 'index'), array('escape' => false, "class" => "float-right")); ?>
												</div>
											</div>
										</div>

										<div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
											<div class="row">
												<div class="col-12">

													<div class="card">
														<div class="card-header">
															<h3 class="card-title"><?php echo __('Associated Orders:') ?></h3>
														</div>
														<div class="card-body">
															<?php if (!empty($memberOrder)):?>
																<div class="row">
																	<table id="table1" class="table table-bordered table-striped">
																		<thead>
																		<tr>
																			<th><?php echo __('Id');?></th>
																			<th><?php echo __('Order No');?></th>
																			<th><?php echo __('Order Date');?></th>
																			<th><?php echo __('Amount');?></th>
																			<th><?php echo __('Discount Amount');?></th>
																			<th><?php echo __('Shipping Cost');?></th>
																			<th><?php echo __('Grand Total');?></th>
																			<th><?php echo __('Status');?></th>
																			<th class="d-none1"> <?php echo __('Product Items of Order');?></th>
																			<th class="actions"><?php echo __('Actions');?></th>

																		</tr>
																		</thead>
																		<tbody>

																		<?php
																		foreach ($memberOrder as $order): ?>
																			<tr>
																				<td><?php echo h($order['Order']['id']); ?></td>
																				<td><?php echo $this->Html->link(h($order['Order']['number']), array('controller'=>'orders','action' => 'view', $order['Order']['id'])); ?></td>
																				<td><?php echo h($order['Order']['created']); ?></td>
																				<td><?php echo h($order['Order']['currency']);echo h($order['Order']['amount']); ?></td>
																				<td><?php echo h($order['Order']['currency']);echo h($order['Order']['discount_amount']); ?></td>
																				<td><?php echo h($order['Order']['currency']);echo h($order['Order']['shipping_cost']); ?></td>
																				<td><?php echo h($order['Order']['currency']);echo h($order['Order']['grant_total']); ?></td>
																				<td ><?php
																					switch ($order['Order']['status']){
																						case 0:
																							echo 'Pending';
																							break;
																						case 1:
																							echo 'Processing';
																							break;
																						case 2:
																							echo 'Shipping';
																							break;
																						case 3:
																							echo 'Completed';
																							break;
																						case 4:
																							echo 'Hold';
																							break;
																						case 5:
																							echo 'Canceled';
																							break;
																					}?></td>
																				<td class="d-none1">


																					<div class="card collapsed-card">
																						<div class="card-header">
																							<h3 class="card-title"><?php echo count($order['OrderItem'])." "; echo __('Items');?></h3>

																							<div class="card-tools">
																								<button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
																									<i class="fas fa-plus"></i></button>
																							</div>
																						</div>
																						<div class="card-body">
																							<?php
																							$i =0;
																							foreach ($order['OrderItem'] as $orderItem){
																								$i++;
																								echo $i." - "; echo h($orderItem['name']); echo "<br>";
																							}

																							?>
																						</div>

																					</div>
																				</td>

																				<td class="actions">
																					<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-shopping-cart')).' '.__('Edit'), array('action' => 'edit', $order['Order']['id']), array('escape' => false)); ?>
																					<br>
																					<?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-alt')).' '.__('Delete'), array('action' => 'delete', $order['Order']['id']),  array('escape' => false), __('Are you sure you want to delete # %s?', $order['Order']['id'])); ?>
																				</td>

																			</tr>
																		<?php endforeach; ?>
																		</tbody>
																	</table>
																</div>
															<?php else: ?>
																<h3 class="card-title"><?php echo __('Member Group have no member') ?></h3>
															<?php endif; ?>
														</div>

													</div>

												</div>
											</div>

										</div>

									</div>

								</div>
							</div>


						</div>
					</div>

				</div>
			</div>
		</div>
	</section>

<script>
	// $("#table2").DataTable({
	// 	"responsive": true,
	// 	"autoWidth": false,
	// });
	// $("#table3").DataTable({
	// 	"responsive": true,
	// 	"autoWidth": false,
	// });
</script>
