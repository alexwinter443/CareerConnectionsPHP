<!-- Alex Vergara -->
<!-- Date: 3/14 -->
<!-- Professor Hughes -->
<!-- this is my own work -->
 
<?php $__env->startSection('jobPosting'); ?>
<script src="<?php echo url('/js/jquery.min.js'); ?>"></script>
<h2>Details</h2>
<div class="card-deck">
	<div class="card">
		<div class="card-body">
			<table style="width: 100%">
				<!-- Job ID -->
				<tr>
					<td>Job ID: <?php echo e($jobModel->getJobID()); ?></td>

				</tr>
				<!-- Title -->
				<tr>
					<td>Job Title: <?php echo e($jobModel->getTitle()); ?></td>

				</tr>
				<!-- Job Description -->
				<tr>
					<td>Job Description: <?php echo e($jobModel->getDescription()); ?> </td>
				</tr>
				<!-- Wage  -->
				<tr>
					<td>Job Wage: $<?php echo e($jobModel->getWage()); ?> </td>
				</tr>
				
				<tr>
					<td>Location: <?php echo e($jobModel->getLocation()); ?> </td>
				</tr>
				
				<tr>
					<td>Requirements: <?php echo e($jobModel->getRequirements()); ?> </td>
				</tr>
				
				<tr>
					<td>Job Type: <?php echo e($jobModel->getJobType()); ?> </td>
				</tr>

			</table>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alexv\Documents\1.LaravelWorkspace\MilestonePHP3\resources\views/viewJob.blade.php ENDPATH**/ ?>