<?php $__env->startSection('content'); ?>

    <?php if($errors->any()): ?>
        <div class="alert alert-danger"  style="margin-top: 2rem">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    

    <form id="formulaire" action="<?php echo e(route('enregistrer_histoire')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="text-center" style="margin-top: 2rem">
            <h3><i class="far fa-edit"></i> Création d'une histoire</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Titre :</label>
            <div class="col-md-9">
                        <textarea name="titre" id="titre" rows="1" class="form-control"
                                  value="<?php echo e(old('titre')); ?>" placeholder="Titre de l'histoire.."></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Pitch :</label>
            <div class="col-md-9">
                        <textarea name="pitch" id="pitch" rows="6" class="form-control"
                                  value="<?php echo e(old('pitch')); ?>" placeholder="Pitch de l'histoire..."></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Photo :</label>
            <div class="col-md-9">
                        <textarea name="photo" id="photo" rows="1" class="form-control"
                                  value="<?php echo e(old('photo')); ?>" placeholder="Url d'une photo..."></textarea>
            </div>
        </div>
        <br>
        <div class="text-center">
            <button class="btn btn-success" type="submit">Valider</button>
        </div>

    </form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>