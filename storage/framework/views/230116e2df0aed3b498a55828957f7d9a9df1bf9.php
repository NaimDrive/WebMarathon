<?php $__env->startSection('content'); ?>

    <h1 id="histoiretext">Mes Histoires</h1>

    <?php if(count($histoires)==0): ?>
        <p>Vous avez pas d'histoires</p>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger"  style="margin-top: 2rem">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if(isset($histoires)): ?>
        
        <form action="<?php echo e(route('enregistrer_activation')); ?>" method="POST">
            <?php $__currentLoopData = $histoires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $histoire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php echo csrf_field(); ?>

                <tr>
                    <?php if($histoire->premierChapitre()['id']): ?>

                        <td>
                            <img src="<?php echo e($histoire->photo); ?>">
                            <a href="/chapitre/<?php echo e($histoire->premierChapitre()['id']); ?>">
                                <?php echo e($histoire->titre); ?>

                            </a>
                        </td>
                        <td><input type="checkbox" id="active" name="actived[]" value="<?php echo e($histoire->id); ?>"> Rendre public </td>
                        <label for="active"></label>
                        <br>

                    <?php else: ?>
                        <td><?php echo e($histoire->titre); ?> <span> --> Aucun premier chapitre </span></td>
                        <br>

                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Valide</button>
                    </div>

        </form>

        <br>

        </tr>

        <?php else: ?>
            <p> Vous n'avez pas d'histoire</p>
            <?php endif; ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>