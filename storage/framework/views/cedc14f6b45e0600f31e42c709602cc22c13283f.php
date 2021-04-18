<!-- Anh le-->
<!-- professor Hughes-->
<!-- Date: 3/14/2021-->
<!-- Milestone 2-->
<!-- this is my own work-->
 <?php $__env->startSection('jobSearch'); ?>
<script src="<?php echo url('/js/jquery.min.js'); ?>"></script>
<h2>Job Search</h2>

<div class="tab-content">

	<div class="tab-pane active" id="home">
		<!-- Search for job that matches title or description -->
		<form class="form" action="searchJob" method="POST" id="jobSearchForm">
			<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">

			<!-- Search field -->
			<div class="form-group">

				<div class="col-xs-6">
					<input type="text" class="form-control" name="search" id="search"
						placeholder="Enter a job keyword here">
				</div>
			</div>

			<!-- Submit form -->
			<div class="form-group">
				<div class="col-xs-12">
					<br>
					<button class="btn btn-lg btn-success" type="submit">
						<i class="glyphicon glyphicon-ok-sign"></i> Search
					</button>

				</div>
			</div>

		</form>
	</div>
</div>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alexv\Documents\1.LaravelWorkspace\MilestonePHP3\resources\views/searchjob.blade.php ENDPATH**/ ?>