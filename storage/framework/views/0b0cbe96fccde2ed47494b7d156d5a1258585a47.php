<!-- Vien -->
<!-- Date: 3/14 -->
<!-- Professor hughes -->
<!-- this is my own work -->
 <?php $__env->startSection('jobRead'); ?>
<!-- Script -->
<script src="<?php echo url('/js/jquery.min.js'); ?>"></script>
<h2>Job Listings</h2>
<!-- foreach jobpostingmodel in the array -->
<?php $__currentLoopData = $JobPostingModels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $JobPostingModel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="card-deck">
	<div class="card">
		<div class="card-body">
			<!-- Get job title -->
			<h5 class="card-title">Job title: <?php echo e($JobPostingModel['title']); ?></h5>
			<small class="text-muted"> </small> <small class="text-muted"> </small>
			<small class="text-muted"> </small> <small class="text-muted"></small>
			<table style="width: 100%">
			    <!-- Get Description -->
				<tr>
					<td>Job description: <?php echo e($JobPostingModel['description']); ?></td>

				</tr>
				<!-- this button navigates to our job details page -->
				<tr>
					<td>
						<form action="viewJob" method="post">
							<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
							<!-- passes job id -->
						    <input hidden=true name="jobID" value="<?php echo e($JobPostingModel['ID']); ?>" />
						    <!-- submit form -->	
							<input type="submit" value="Details" />
						</form>
						<form action="deletePost" method="post">
							<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
							<!-- passes job id -->
						    <input hidden=true name="jobID" value="<?php echo e($JobPostingModel['ID']); ?>" />
						    <!-- submit form -->	
							<input type="submit" value="Delete" />
						</form>
					</td>
				</tr>

			</table>
		</div>
	</div>
</div>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alexv\Documents\1.LaravelWorkspace\MilestonePHP3\resources\views/ReadJobPosting.blade.php ENDPATH**/ ?>