

<?php $__env->startSection('page_title'); ?>
    Image & Colors
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content-wrapper'); ?>		
<?php $__env->startPush('styles'); ?>
.btn-file{
display: flex !important;
    flex-direction: column !important;
    text-align: initial !important;
    padding-left: 20px !important;
}
.control-group .control {
    height: 52px !important;

}
	@media only screen and (min-width: 770px){
.control-group .control {
    height: 52px !important;
padding:10px !important;
}
}
<?php $__env->stopPush(); ?>
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h1>Image & Colors</h1>
            </div>
            <div class="page-action">
            </div>
        </div>
        <div class="page-content" align="center">
			<script>
				function clk()
				{
				var form = document.getElementById("rmvback");
				  form.submit();
				}
			</script>
        <form action="<?php echo e(Route('UpdateImageBackground')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
                    <script>
                        $(document).on('change', '#customFile', function() {


                            var filesCount = $(this)[0].files.length;

                            var textbox = $(this).prev();

                            if (filesCount === 1) {
                                var fileName = $(this).val().split('\\').pop();
                                textbox.text(fileName);
                            } else {
                                textbox.text(filesCount + ' files selected');
                            }



                            if (typeof(FileReader) != "undefined") {
                                var dvPreview = $("#divImageMediaPreview");
                                dvPreview.html("");
                                $($(this)[0].files).each(function() {
                                    var file = $(this);
                                    var reader = new FileReader();
                                    reader.onload = function(e) {
                                        var img = $("<img />");
                                        img.attr("style", "width: 150px; height:100px; padding: 10px");
                                        img.attr("src", e.target.result);
                                        dvPreview.append(img);
                                    }
                                    reader.readAsDataURL(file[0]);
                                });
                            } else {
                                alert("This browser does not support HTML5 FileReader.");
                            }


                        });
                    </script>
                    <div class="control-group"><label for="channels" class="required">Images</label>
                        <br>
                        <div id="divImageMediaPreview">

                        </div>
                        <span class="control btn-file">
                            Browse...<input type="file" name="image" accept="image/*" id="customFile">
                        </span>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-lg btn-primary">Save</button> <button type="button" onclick="clk()" id="btn" class="btn btn-lg btn-primary">Remove background</button>
            </form>
			<form action="<?php echo e(Route('removebackgroundimage')); ?>" id="rmvback" method="POST"><?php echo csrf_field(); ?></form>
			<br><br>
			        <form action="<?php echo e(Route('UpdateColor')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="page-header">
                <div class="page-title">
                    <h1>Color</h1>
                </div>
                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">Save Color</button>
                </div>
            </div>
            <div class="page-content">
                <div class="table">
                    <div class="grid-container">
                        <div class="grid-top">
                            <div class="datagrid-filters">
                                <div class="filter-left">
                                    <div>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label for="type" class="required">
                                    Select Color
                                </label>
								<label class="color-picker">
										<input type=color value="<?php echo e($color->color_hex); ?>" style="width:100%" name="color_id">
								</label>
                            </div>

                    </div>
                </div>
            </div>
			</div>
        </form>
        </div>
	    
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Webkul/Admin/src/Providers/../Resources/views/image/index.blade.php ENDPATH**/ ?>