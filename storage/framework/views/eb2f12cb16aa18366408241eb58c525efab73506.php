<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.cms.pages.add-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <form method="POST" action="<?php echo e(route('admin.cms.store')); ?>" @submit.prevent="onSubmit">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.cms.index')); ?>'"></i>

                        <?php echo e(__('admin::app.cms.pages.add-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.cms.pages.create-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">

                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <?php echo view_render_event('bagisto.admin.cms.pages.create_form_accordian.general.before'); ?>


                    <accordian title="<?php echo e(__('admin::app.cms.pages.general')); ?>" :active="true">
                        <div slot="body">
                            <div class="control-group" :class="[errors.has('page_title') ? 'has-error' : '']">
                                <label for="page_title" class="required"><?php echo e(__('admin::app.cms.pages.page-title')); ?></label>

                                <input type="text" class="control" name="page_title" v-validate="'required'" value="<?php echo e(old('page_title')); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.cms.pages.page-title')); ?>&quot;">

                                <span class="control-error" v-if="errors.has('page_title')">{{ errors.first('page_title') }}</span>
                            </div>

                            <?php $channels = app('Webkul\Core\Repositories\ChannelRepository'); ?>

                            <div class="control-group multi-select" :class="[errors.has('channels[]') ? 'has-error' : '']">
                                <label for="url-key" class="required"><?php echo e(__('admin::app.cms.pages.channel')); ?></label>

                                <select type="text" class="control" name="channels[]" v-validate="'required'" value="<?php echo e(old('channel[]')); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.cms.pages.channel')); ?>&quot;" multiple="multiple">
                                    <?php $__currentLoopData = $channels->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $channel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($channel->id); ?>"><?php echo e(core()->getChannelName($channel)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <span class="control-error" v-if="errors.has('channels[]')">{{ errors.first('channels[]') }}</span>
                            </div>

                            <div class="control-group" :class="[errors.has('html_content') ? 'has-error' : '']">
                                <label for="html_content" class="required"><?php echo e(__('admin::app.cms.pages.content')); ?></label>

                                <textarea type="text" class="control" id="content" name="html_content" v-validate="'required'" data-vv-as="&quot;<?php echo e(__('admin::app.cms.pages.content')); ?>&quot;"><?php echo e(old('html_content')); ?></textarea>

                                <span class="control-error" v-if="errors.has('html_content')">{{ errors.first('html_content') }}</span>
                            </div>
                        </div>
                    </accordian>

                    <?php echo view_render_event('bagisto.admin.cms.pages.create_form_accordian.general.after'); ?>



                    <?php echo view_render_event('bagisto.admin.cms.pages.create_form_accordian.seo.before'); ?>


                    <accordian title="<?php echo e(__('admin::app.cms.pages.seo')); ?>" :active="true">
                        <div slot="body">
                            <div class="control-group">
                                <label for="meta_title"><?php echo e(__('admin::app.cms.pages.meta_title')); ?></label>

                                <input type="text" class="control" name="meta_title" value="<?php echo e(old('meta_title')); ?>">
                            </div>

                            <div class="control-group" :class="[errors.has('url_key') ? 'has-error' : '']">
                                <label for="url-key" class="required"><?php echo e(__('admin::app.cms.pages.url-key')); ?></label>

                                <input type="text" class="control" name="url_key" v-validate="'required'" value="<?php echo e(old('url_key')); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.cms.pages.url-key')); ?>&quot;" v-slugify>

                                <span class="control-error" v-if="errors.has('url_key')">{{ errors.first('url_key') }}</span>
                            </div>

                            <div class="control-group">
                                <label for="meta_keywords"><?php echo e(__('admin::app.cms.pages.meta_keywords')); ?></label>

                                <textarea type="text" class="control" name="meta_keywords"><?php echo e(old('meta_keywords')); ?></textarea>
                            </div>

                            <div class="control-group">
                                <label for="meta_description"><?php echo e(__('admin::app.cms.pages.meta_description')); ?></label>

                                <textarea type="text" class="control" name="meta_description"><?php echo e(old('meta_description')); ?></textarea>

                            </div>
                        </div>
                    </accordian>

                    <?php echo view_render_event('bagisto.admin.cms.pages.create_form_accordian.seo.after'); ?>

                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <?php echo $__env->make('admin::layouts.tinymce', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <script>
        $(document).ready(function () {
            tinyMCEHelper.initTinyMCE({
                selector: 'textarea#content',
                height: 200,
                width: "100%",
                plugins: 'image imagetools media wordcount save fullscreen code table lists link hr',
                toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor alignleft aligncenter alignright alignjustify | link hr |numlist bullist outdent indent  | removeformat | code | table',
                image_advtab: true,
                valid_elements : '*[*]',
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Webkul/Admin/src/Providers/../Resources/views/cms/create.blade.php ENDPATH**/ ?>