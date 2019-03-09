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

    <form id="formulaire" action="<?php echo e(route('enregistrer_chapitre')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div  class="text-center" style="margin-top: 2rem">
            <h3><i class="far fa-edit"></i> Création d'un chapitre</h3>
            <hr class="mt-2 mb-2">
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Titre :</label>
            <div class="col-md-9">
                        <textarea name="titre" id="titre" rows="2" class="form-control"
                                  value="<?php echo e(old('titre')); ?>" placeholder="Titre du chapitre.."></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Abréviation du titre :</label>
            <div class="col-md-9">
                        <textarea name="titrecourt" id="titrecourt" rows="1" class="form-control"
                                  value="<?php echo e(old('titrecourt')); ?>" placeholder="Titre court du chapitre.."></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Histoire associée :</label>
            <div class="col-md-9">
                        <select name = "histoire_id" id="histoire_id" class="form-control">
                            <?php $__currentLoopData = $histoires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $histoire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value=<?php echo e($histoire->id); ?>><?php echo e($histoire->titre); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
            </div>

        </div>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">1er chapitre de l'histoire ?</label>
            <div class="col-md-9">
                        <p><input type="number" name="premier" id="premier" class="form-control" step="1" value="0" min="0" max="1"/></p>
            </div>
        </div>
        <div class="fosourcerm-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Texte :</label>
            <div class="col-md-9">
                        <textarea name="texte" id="texte" rows="6" class="form-control"
                                  value="<?php echo e(old('texte')); ?>" placeholder="Texte du chapitre..."></textarea>
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Photo :</label>
            <div class="col-md-9">
                        <textarea name="photo" id="photo" rows="1" class="form-control"
                                  value="<?php echo e(old('photo')); ?>" placeholder="Lien d'une photo..."></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-md-3 form-control-label" for="textarea-input">Question : </label>
            <div class="col-md-9">
                        <textarea name="question" id="question" rows="3" class="form-control"
                                  value="<?php echo e(old('question')); ?>" placeholder="Ce champ peut-être nul si il s'agit du dernier chapitre de l'histoire"></textarea>
            </div>

        </div>

        <div class="text-center">
            <button class="btn btn-success" type="submit">Valide</button>
        </div>

    </form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>