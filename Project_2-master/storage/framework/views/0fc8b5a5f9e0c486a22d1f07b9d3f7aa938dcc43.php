
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<?php $__env->startSection('content'); ?>
<style type="text/css">
    .dropdown-toggle {
        height: 40px;
        width: 400px !important;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">

            </div>
        </div>
    </div>

    <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong><?php echo e(__('books.whoops')); ?></strong> <?php echo e(__('books.input_problem')); ?><br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
    <!-- <a class="btn btn-primary" href="<?php echo e(route('books.index')); ?>"> Back </a> -->

    <div class="col-md-8 grid-margin stretch-card">
        <div class="card" style="padding: 16px;">
            <div class="card-body">
                <h4 class="card-title"><?php echo e(trans('books.Add a book')); ?></h4>
                <p class="card-description"><?php echo e(trans('books.Fill in the book details')); ?></p>
                <form class="forms-sample" action="<?php echo e(route('books.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="form-group row">
                        <label for="exampleInputac_name" class="col-sm-3 col-form-label"><?php echo e(trans('books.Book title')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_name" class="form-control" placeholder="<?php echo e(trans('books.Book title')); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputac_sourcetitle" class="col-sm-3 col-form-label"><?php echo e(trans('books.Place of publication')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_sourcetitle" class="form-control" placeholder="<?php echo e(trans('books.Place of publication')); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputac_year" class="col-sm-3 col-form-label"><?php echo e(trans('books.Year (A.D.)')); ?></label>
                        <div class="col-sm-9">
                            <input type="date" name="ac_year" class="form-control" placeholder="<?php echo e(trans('books.Year (A.D.)')); ?>">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputac_page" class="col-sm-3 col-form-label"><?php echo e(trans('books.Number of pages (Page)')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" name="ac_page" class="form-control" placeholder="<?php echo e(trans('books.Number of pages (Page)')); ?>">
                        </div>
                    </div>

                    <button type="submit" name="submit" id="submit" class="btn btn-primary me-2"><?php echo e(trans('books.Submit')); ?></button>
                    <a class="btn btn-light" href="<?php echo e(route('books.index')); ?>"><?php echo e(trans('books.Cancel')); ?></a>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var postURL = "<?php echo url('addmore'); ?>";
        var i = 1;


        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '" class="dynamic-added"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-sm btn_remove">X</button></td></tr>');
        });


        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


        $('#submit').click(function() {
            $.ajax({
                url: postURL,
                method: "POST",
                data: $('#add_name').serialize(),
                type: 'json',
                success: function(data) {
                    if (data.error) {
                        printErrorMsg(data.error);
                    } else {
                        i = 1;
                        $('.dynamic-added').remove();
                        $('#add_name')[0].reset();
                        $(".print-success-msg").find("ul").html('');
                        $(".print-success-msg").css('display', 'block');
                        $(".print-error-msg").css('display', 'none');
                        $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
                    }
                }
            });
        });


        function printErrorMsg(msg) {
            $(".print-error-msg").find("ul").html('');
            $(".print-error-msg").css('display', 'block');
            $(".print-success-msg").css('display', 'none');
            $.each(msg, function(key, value) {
                $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
            });
        }
    });
</script>
<?php $__env->stopSection(); ?>
<!-- <form action="<?php echo e(route('books.store')); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="paper_name" class="form-control" placeholder="paper_name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Year:</strong>
                    <textarea class="form-control" style="height:150px" name="paper_year" placeholder="paper_year"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>paper_type:</strong>
                    <textarea class="form-control" style="height:150px" name="paper_type" placeholder="paper_type"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>paper_level:</strong>
                    <textarea class="form-control" style="height:150px" name="paper_level" placeholder="paper_level"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>paper_details:</strong>
                    <textarea class="form-control" style="height:150px" name="paper_details" placeholder="paper_details"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
</div> -->
<?php echo $__env->make('dashboards.users.layouts.user-dash-layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\GitHub\git-group-repository-group-3-sec-4\Project_2-master\resources\views/books/create.blade.php ENDPATH**/ ?>