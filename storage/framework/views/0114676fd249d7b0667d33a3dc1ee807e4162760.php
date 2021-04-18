<?php $__env->startSection('content'); ?>

	<h3>Group</h3>
	<div>
		<form action="addGroup" method="post">
			<?php echo e(csrf_field()); ?>

			<!-- Table Div -->
			<div class="group-table">
				<div class="form-head">Add Group</div>
				<div class="form-column">
					<div>
						<label for="group">Group Name</label><span id="user-info"
							class="error-info"></span>
					</div>
					<div>
						<input name="group" id="group" type="text"
							class="demo_input_box">
					</div>
				</div>
					<div class="form-column">
					<div>
						<label for="description">Description</label><span id="user-info"
							class="error-info"></span>
					</div>
					<div>
						<input name="description" id="description" type="text"
							class="demo_input_box">
					</div>
				</div>
				<div>
					<input type="submit" class="btnLogin" value="Create"/>
				</div>
			</div>
			<!-- End Table Div -->
		</form>
	</div>
	
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alexv\Documents\1.LaravelWorkspace\MilestonePHP3\resources\views/group/group.blade.php ENDPATH**/ ?>