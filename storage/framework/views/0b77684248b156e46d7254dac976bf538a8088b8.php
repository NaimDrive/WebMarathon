<?php $__env->startSection('content'); ?>

<div id="textefinal">
    <img id="miniaturechapitre" src="<?php echo e($chapitre->photo); ?>" />
    <p id="textechapitre"><?php echo e($chapitre->texte); ?></p>

    <?php if($chapitre->histoire_id == 11): ?>
        <style>
            body{
                background-image: url(http://image.noelshack.com/fichiers/2018/51/4/1545317194-town.jpg);
            }
        </style>
    <?php endif; ?>
    <?php if($chapitre->histoire_id == 16): ?>
        <style>
            body{
                background-image: url(http://image.noelshack.com/fichiers/2018/51/4/1545317214-campaign.jpg);
            }
        </style>
    <?php endif; ?>


    <?php if($chapitre->question==null): ?>


    <a href="<?php echo e(route('home')); ?>" id="reponse" >Retourner a l'accueil</a>


    <?php endif; ?>

    <?php $__currentLoopData = $chapitre->suites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapitreSuite): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <a id="reponse" href="<?php echo e(route('store',["id"=>$chapitreSuite->pivot->id])); ?>" ><?php echo e($chapitreSuite->pivot->reponse); ?> </a>


        
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    
<?php $__env->stopSection(); ?>

       

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>