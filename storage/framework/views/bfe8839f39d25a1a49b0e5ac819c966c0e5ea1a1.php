<!doctype html>
<html lang="<?php echo e(str_replace('_', '_', app()->getLocale())); ?>">
<title>Career Connection App</title>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content-width=device-width, initial-scale=1>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" 
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script	src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script	src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" 
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
    crossorigin="anonymous">
    </script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" 
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" 
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
    <style>
        h1 {
            align-items: center;
                display: flex;
                justify-content: center;
                position: relative;
                font-size:400px;
        
        
        }
        h4 {text-align: center;}
        body {
  background-color: #c9edef;
}
    </style>
</head>
<body>
	<div>
       <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        <div>
            <div class="container">
          	<?php echo $__env->yieldContent('content'); ?>
          </div>
         	   <div class="container">
               <?php echo $__env->yieldContent('jobHistory'); ?>
               </div>
               <div class="container">
               <?php echo $__env->yieldContent('jobPosting'); ?>
               </div>
			   <div class="container">
               <?php echo $__env->yieldContent('jobSearch'); ?>
               </div>
               <div class="container">
               <?php echo $__env->yieldContent('viewProfile'); ?>
               </div>
                <div class="container">
               <?php echo $__env->yieldContent('jobRead'); ?>
               </div>
               
        </div>
     	<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
          
</body>
</html>


<?php /**PATH C:\Users\Alexv\Documents\1.LaravelWorkspace\MilestonePHP3\resources\views/layouts/layout.blade.php ENDPATH**/ ?>