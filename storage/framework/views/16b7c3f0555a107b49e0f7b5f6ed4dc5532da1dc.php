<?php $__env->startSection('content'); ?>

    <div class="main">
        <div class="row">
            <!--Main information-->
            <div class="card homepage">
             
                <ul class="card-body">
                    <?php $__currentLoopData = $histoires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $histoire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo csrf_field(); ?>

                    <li>
                        <?php if($histoire->active == '1'): ?>
                        <a href="<?php echo e(route('chapitre',[$histoire->premierChapitre()['id']])); ?>">
                            <img id="Miniature" src="<?php echo e($histoire->photo); ?>"/>
                            <p id="titrehistoire"><?php echo e($histoire->titre); ?></p>
                            
                        </a>
                        <a href="<?php echo e(route('users',$histoire->utilisateur->id)); ?>"><p id="auteur">Par <?php echo e($histoire->utilisateur->name); ?></p></a>
                        <?php endif; ?>
                    </li>
                    
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </div>
    </div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>