<?php $__env->startSection('content'); ?>

    <?php $__currentLoopData = $histoires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $histoire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href="<?php echo e(route('chapitre',[$histoire->premierChapitre()['id']])); ?>"> <img src="<?php echo e($histoire->photo); ?>"/></a>
        <p><?php echo e($histoire->titre); ?></p>
        <p><?php echo e($histoire->nom); ?></p>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>