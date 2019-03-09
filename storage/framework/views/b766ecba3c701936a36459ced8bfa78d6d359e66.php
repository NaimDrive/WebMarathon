<?php $__env->startSection('content'); ?>

    <h1 class="text-center">Lier un chapitre</h1>

    <h2 class="text-center">Choisissez une de vos histoires : </h2>

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
        

        <?php $__currentLoopData = $histoires; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $histoire): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="align-content-center">
                <td><a class="btn btn-warning" role="button" href="<?php echo e(route('lier_chapitre2',[$histoire->id])); ?>"><?php echo e($histoire->titre); ?></a></td>
                <br>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <form action="<?php echo e(route('enregistrer_liaison')); ?>" method="POST">
                <?php echo csrf_field(); ?>

                <div  class="text-center" style="margin-top: 2rem">
                    <h3><i class="far fa-edit"></i> Création d'une liaison</h3>
                    <hr class="mt-2 mb-2">
                </div>

                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="textarea-input">chapitre source :</label>
                    <div class="col-md-9">
                        <select name = "chapitre_source_id" id="chapitre_source_id" class="form-control">
                            <?php $__currentLoopData = $histoire->chapitres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option  value=<?php echo e($chap->id); ?>><?php echo e($chap->titrecourt); ?></option>
                                <br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="textarea-input">chapitre destination :</label>
                    <div class="col-md-9">
                        <select  name = "chapitre_destination_id" id="chapitre_destination_id" class="form-control">
                            <?php $__currentLoopData = $histoire->chapitres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chap): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($chap->premier == 0): ?>
                                    <option value=<?php echo e($chap->id); ?>><?php echo e($chap->titrecourt); ?></option>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 form-control-label" for="textarea-input">Reponse :</label>
                    <div class="col-md-9">
                        <textarea name="reponse" id="reponse" rows="2" class="form-control"
                                  value="<?php echo e(old('reponse')); ?>" placeholder="Reponse"></textarea>
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <button class="btn btn-success" type="submit">Valide</button>
                </div>

            </form>

            <?php endif; ?>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>