<?php $__env->startSection('jobHistory'); ?>
<script src="<?php echo url('/js/jquery.min.js'); ?>"></script>
	<h2>User Management</h2>
	<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
     <div class="card-deck">
        <div class="card">
<!--           <img src="img_avatar.png" alt="Avatar"> -->
            <div class="card-body">
              <h5 class="card-title">Name: <?php echo e($user['firstname']); ?> <?php echo e($user['lastname']); ?></h5>
              <small class="text-muted">  </small>
             <small class="text-muted">   </small>
             <small class="text-muted">   </small>
             <small class="text-muted"></small>
              <table style="width:100%">
                  <tr>
                    <td>Dob: <?php echo e($user['dob']); ?></td>
                    <td>Address: <?php echo e($user['address']); ?></td>
                     <td> Gender: <?php echo e($user['gender']); ?></td>
                  </tr>
                  <tr>
                    <td>Phone: <?php echo e($user['phone']); ?></td>
                    <td>Email: <?php echo e($user['email']); ?></td>
                    <td>Role: <?php echo e($user['role']); ?></td>
                  </tr>
                   <tr>
                    <td>Status: <?php echo e($user['isDeleted'] ? 'Active' : 'Disable'); ?></td>
               
                  </tr>
                      <tr>
                    <td><form action="changeStatus" method="POST">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                          	<input hidden=true name="userId" value="<?php echo e($user['id']); ?>"/>
                          	<input type="submit" value="<?php echo e($user['isDeleted'] ? 'Disable' : 'Active'); ?>"/>
                         </form>
              		</td>
                    <td> <form action="deleteUser" method="post">
                    <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
                        	 <input hidden=true name="userId" value="<?php echo e($user['id']); ?>"/>
                        	 <input type="submit" value="Delete"/>
                    	 </form>
        	 		</td>
                  </tr>
               </table>
        	</div>
        </div>
     </div>
        
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alexv\Documents\1.LaravelWorkspace\MilestonePHP3\resources\views/internals/adminUsers.blade.php ENDPATH**/ ?>