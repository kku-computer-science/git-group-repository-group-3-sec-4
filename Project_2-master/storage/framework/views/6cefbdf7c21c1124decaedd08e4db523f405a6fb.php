
<?php $__env->startSection('content'); ?>
<div class="container card-2">
    <p class="title"><?php echo e(__('reseracher.Researchers')); ?></p>
    <?php $__currentLoopData = $request; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <span>
        <ion-icon name="caret-forward-outline" size="small"></ion-icon> 
        <?php if(App::getLocale() == 'th'): ?>
            <?php echo e($res->program_name_th); ?>

        <?php elseif(App::getLocale() == 'zh'): ?> 
            <?php echo e($res->programs_name_cn ?? $res->program_name_en); ?> 
        <?php else: ?>
            <?php echo e($res->program_name_en); ?>

        <?php endif; ?>
    </span>
    <div class="d-flex">
        <div class="ml-auto">
            <form class="row row-cols-lg-auto g-3" method="GET" action="<?php echo e(route('searchresearchers',['id'=>$res->id])); ?>">
                <div class="col-md-8">
                    <div class="input-group">
                        <input type="text" class="form-control" name="textsearch" placeholder="<?php echo e(__('reseracher.Research interests')); ?>">
                    </div>
                </div>
                <!-- <div class="col-12">
                        <label class="visually-hidden" for="inlineFormSelectPref">Preference</label>
                        <select class="form-select" id="inlineFormSelectPref">
                            <option selected> Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div> -->
                <div class="col-md-4">
                    <button type="submit" class="btn btn-outline-primary"><?php echo e(__('reseracher.Search')); ?></button>
                </div>
            </form>
        </div>
    </div>


    <div class="row row-cols-1 row-cols-md-2 g-0">
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <a href=" <?php echo e(route('detail',Crypt::encrypt($r->id))); ?>">
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-sm-4">
                        <img class="card-image" src="<?php echo e($r->picture); ?>" alt="">
                    </div>
                    <div class="col-sm-8 overflow-hidden" style="text-overflow: clip; <?php if(app()->getLocale() == 'en'): ?> max-height: 220px; <?php else: ?> max-height: 210px;<?php endif; ?>">
                        <div class="card-body">
                            <?php if(app()->getLocale() == 'en' || app()->getLocale() == 'zh'): ?>
                                <h5 class="card-title">
                                    <?php echo e($r->fname_en ?? 'N/A'); ?> <?php echo e($r->lname_en ?? 'N/A'); ?>

                                    <?php if(!empty($r->doctoral_degree)): ?>
                                        , <?php echo e($r->doctoral_degree); ?>

                                    <?php endif; ?>
                                </h5>
                                <h5 class="card-title-2">
                                    <?php echo e($r->academic_ranks_en ?? 'N/A'); ?>

                                </h5>

                            <?php else: ?>
                                <h5 class="card-title">
                                    <?php echo e($r->{'position_'.app()->getLocale()} ?? 'N/A'); ?>

                                    <?php echo e($r->{'fname_'.app()->getLocale()} ?? 'N/A'); ?> <?php echo e($r->{'lname_'.app()->getLocale()} ?? 'N/A'); ?>

                                </h5>
                                <h5 class="card-title-2">
                                    <?php echo e($r->academic_ranks_th ?? 'N/A'); ?>

                                </h5>
                            <?php endif; ?>

                            <p class="card-text-1"><?php echo e(__('reseracher.Expertise')); ?></p>
                            <div class="card-expertise">
                                <?php $__currentLoopData = $r->expertise->sortBy('expert_name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exper): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $currentLocale = app()->getLocale(); 
                                    ?>
                                    
                                    <?php if($currentLocale === 'th'): ?>
                                        <p class="card-text"><?php echo e($exper->expert_name_th); ?></p>
                                    <?php elseif($currentLocale === 'zh'): ?>
                                        <p class="card-text"><?php echo e($exper->expert_name_cn); ?></p>
                                    <?php else: ?>
                                        <!-- ค่าเริ่มต้นหรือ locale 'en' -->
                                        <p class="card-text"><?php echo e($exper->expert_name); ?></p>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </diV>
                </div>
            </div>
        </a>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/researchers.blade.php ENDPATH**/ ?>