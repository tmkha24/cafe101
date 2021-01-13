	<?php echo $this->Session->flash(); ?>
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?php echo __('Member\'s Group');?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo Router::url('/', true)?>"><?php echo __('Home') ?></a></li>
						<li class="breadcrumb-item active"><?php echo __('Member\'s Group');?></li>
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
						<div class="card-header">
							<h3 class="card-title"><?php echo __('Member\'s Group List')?></h3>
						</div>
						<div class="card-body">
							<div class="row">
								<div class="col-6">
								</div>
								<div class="col-6">
									<ol class="float-sm-right">
										<?php echo $this->Html->link($this->Html->image('tr/Add.png') . " " . __('New MemberGroup'), array('action' => 'add'), array('escape' => false)); ?>
									</ol>
								</div>
							</div>
							<table id="table1" class="table table-bordered table-striped">
								<thead>
								<tr>
									<th><?php echo __('Id');?></th>
									<th><?php echo __('Name');?></th>
									<th><?php echo __('Description');?></th>
									<th class="actions"><?php echo __('Actions');?></th>
								</tr>
								</thead>
								<tbody>

								<?php
								foreach ($memberGroups as $memberGroup): ?>
									<tr>
										<td><?php echo h($memberGroup['MemberGroup']['id']); ?></td>
										<td><?php echo $this->Html->link($this->App->truncate(h($memberGroup['MemberGroup']['name']),100), array('action' => 'view', $memberGroup['MemberGroup']['id'])); ?></td>
										<td><?php echo $this->App->truncate(h($memberGroup['MemberGroup']['description']),100); ?></td>
										<td class="actions">
											<?php echo $this->Html->link($this->Html->tag('i', '', array('class' => 'fa fa-shopping-cart')).' '.__('Edit'), array('action' => 'edit', $memberGroup['MemberGroup']['id']), array('escape' => false)); ?>
											<br>
											<?php echo $this->Form->postLink($this->Html->tag('i', '', array('class' => 'fa fa-trash-alt')).' '.__('Delete'), array('action' => 'delete', $memberGroup['MemberGroup']['id']),  array('escape' => false), __('Are you sure you want to delete # %s?', $memberGroup['MemberGroup']['id'])); ?>
										</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<script>
	$(function () {
		$("#table1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});

	});
</script>
