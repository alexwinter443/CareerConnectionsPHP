<?php $__env->startSection('content'); ?>
		<h4>Groups</h4>
        <table class="table">
          <thead>
            <tr>
              <th scope="col" hidden="true"> <?php echo e($count = 1); ?></th>
               <th scope="col">No</th>
              <th scope="col">Group</th>
              <th scope="col">Descrition</th>
              <th scope="col">Status</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
         
        	<?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <th scope="row" hidden="true"><?php echo e($group['ID']); ?></th>
               <th scope="col"><?php echo e($count++); ?></th>
              <td><?php echo e($group['GroupName']); ?></td>
              <td><?php echo e($group['Description']); ?></td>
              <td><?php echo e($group['isActive'] ? 'Active' : 'Inactive'); ?></td>
              <td>
              	<form action="changeStatusGroup" method="POST">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                          	<input hidden=true name="groupID" value="<?php echo e($group['ID']); ?>"/>
                          	<input type="submit" value="<?php echo e($group['isActive'] ? 'Deactive' : 'Active'); ?>"/>
                         </form>
              		</td>
                    <td> <form action="deleteGroup" method="post">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                        	 <input hidden=true name="groupID" value="<?php echo e($group['ID']); ?>"/>
                        	 <input type="submit" value="Delete  "/>
                </form>
        	 </td>
            </tr>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			
		</tbody>
        </table>
        <form action="createGroup" method="POST">
        <input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
			<button class="btn btn-lg btn-success" type="submit">
				<i class="glyphicon glyphicon-ok-sign"></i> Create Group
			</button>
		
		</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alexv\Documents\1.LaravelWorkspace\MilestonePHP3\resources\views/group/adminViewGroup.blade.php ENDPATH**/ ?>