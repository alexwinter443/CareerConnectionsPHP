<?php $__env->startSection('content'); ?>
<title>My Profile</title>



<div class="text-center">
	<img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png"
		class="avatar img-circle img-thumbnail" alt="avatar">
	<h6>Upload a photo...</h6>
	<input type="file" class="text-center center-block file-upload">
</div>
<br>
<div class="tab-content">

	<div class="tab-pane active" id="home">

		<form class="form" action="myprofile" method="POST" id="userProfileForm">
		<input type="hidden" name="_token" value="<?php echo csrf_token() ?>">
			
			<div class="form-group">
				
				<div class="col-xs-6">
					<label for="firstname">First name</label> <input
						type="text" class="form-control" name="firstname" id="firstname"
						value="<?php echo e($userModel->getFirstName()); ?>" title="enter your first name if any.">
				</div>
			</div>
			<div class="form-group">

				<div class="col-xs-6">
					<label for="lastname">Last name</label> <input
						type="text" class="form-control" name="lastname" id="lastname"
						value="<?php echo e($userModel->getLastName()); ?>" title="enter your last name if any.">
				</div>
			</div>

			<div class="form-group">

				<div class="col-xs-6">
					<label for="phone">Phone</label> <input type="text"
						class="form-control" name="phone" id="phone"
						value="<?php echo e($userModel->getPhone()); ?>" title="enter your phone number if any.">
				</div>
			</div>

			<div class="form-group">
				<div class="col-xs-6">
					<label for="address">Address</label> <input type="text"
						class="form-control" name="address" id="address"
						value="<?php echo e($userModel->getAddress()); ?>"
						title="enter your address number if any.">
				</div>
			</div>
			<div class="form-group">

				<div class="col-xs-6">
					<label for="email">Email</label> <input type="email"
						class="form-control" name="email" id="email"
						value="<?php echo e($userModel->getEmail()); ?>" title="enter your email.">
				</div>
			</div>

			<div class="form-group">

				<div class="col-xs-6">
					<label for="dob">D.O.B</label> <input
						type="text" class="form-control" name="dob" id="dob"
						value="<?php echo e($userModel->getDob()); ?>" title="enter your dob.">
				</div>
			</div>
			
			<div class="form-group">

				<div class="col-xs-6">
					<label for="career">Career</label> <input
						type="text" class="form-control" name="career" id="career"
						value="<?php echo e($userModel->getCareer()); ?>" 
						 title="enter your career.">
				</div>
			
				<div class="form-group">

				<div class="col-xs-6">
					<label for="skills">Skills</label> <input
						type="text" class="form-control" name="skills" id="skills"
						value="<?php echo e($userModel->getSkills()); ?>"title="enter your skills.">
				</div>
				</div>


				<div class="form-group">
					<div class="col-xs-12">
						<br>
						<button class="btn btn-lg btn-success" type="submit">
							<i class="glyphicon glyphicon-ok-sign"></i> Save
						</button>
						<button class="btn btn-lg" type="reset">
							<i class="glyphicon glyphicon-repeat"></i> Reset
						</button>
					</div>
				</div>
		</div>
		</form>
</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts/layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Alexv\Documents\1.LaravelWorkspace\MilestonePHP3\resources\views//myprofile.blade.php ENDPATH**/ ?>