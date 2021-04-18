 <?php $__env->startSection('content'); ?>
<h4>Joined Group</h4>
<table class="table">
	<thead>
		<tr>
			<th scope="col" hidden="true"><?php echo e($count = 1); ?></th>
			<th scope="col">No</th>
			<th scope="col">Group</th>
			<th scope="col">Descrition</th>
		</tr>
	</thead>
	<tbody>

		<?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<th scope="row" hidden="true"><?php echo e($group['ID']); ?></th>
			<th scope="col"><?php echo e($count++); ?></th>
			<td><?php echo e($group['GroupName']); ?></td>
			<td><?php echo e($group['Description']); ?></td>
			<td>
				<form action="leaveGroup" method="POST">
					<input type="hidden" name="_token"
						value="<?php echo csrf_token() ?>"> <input hidden=true
						name="groupID" value="<?php echo e($group['ID']); ?>" /> <input type="submit"
						value="Leave" />
				</form>
			</td>

		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>


<h4>Group List</h4>
<table class="table">
	<thead>
		<tr>
			<th scope="col" hidden="true"><?php echo e($count = 1); ?></th>
			<th scope="col">No</th>
			<th scope="col">Group</th>
			<th scope="col">Descrition</th>
		</tr>
	</thead>
	<tbody>
		<?php $__currentLoopData = $availableGroups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $availableGroup): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr>
			<th scope="row" hidden="true"><?php echo e($availableGroup['ID']); ?></th>
			<th scope="col"><?php echo e($count++); ?></th>
			<td><?php echo e($availableGroup['GroupName']); ?></td>
			<td><?php echo e($availableGroup['Description']); ?></td>
			<td>
				<form action="joinGroup" method="POST">
					<input type="hidden" name="_token"
						value="<?php echo csrf_token() ?>"> <input hidden=true
						name="groupID" value="<?php echo e($availableGroup['ID']); ?>" /> <input
						type="submit" value="Join" />
				</form>
			</td>

		</tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alexv\Documents\1.LaravelWorkspace\MilestonePHP3\resources\views/group/groupList.blade.php ENDPATH**/ ?>