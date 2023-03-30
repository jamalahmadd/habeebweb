<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('bulkupload::app.admin.bulk-upload.upload-files.index')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="account-layout">

        <!-- download samples -->
        <accordian :title="'<?php echo e(__('bulkupload::app.admin.bulk-upload.upload-files.download-sample')); ?>'" :active="true">
            <div slot="body">
                <div class="import-product">
                    <form action="<?php echo e(route('download-sample-files')); ?>" method="post">
                        <div class="account-table-content">
                            <?php echo csrf_field(); ?>
                            <div class="control-group">
                                <select class="control" id="download-sample" name="download_sample">
                                    <option value="">
                                        <?php echo e(__('bulkupload::app.admin.bulk-upload.run-profile.please-select')); ?>

                                    </option>

                                    <?php $__currentLoopData = $productTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $productType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($key); ?>-csv">
                                            <?php echo e(__('bulkupload::app.admin.bulk-upload.upload-files.csv-file', ['filetype' => ucwords($key) ])); ?>

                                        </option>

                                        <option value="<?php echo e($key); ?>-xls">
                                            <?php echo e(__('bulkupload::app.admin.bulk-upload.upload-files.xls-file', ['filetype' => ucwords($key) ])); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>

                                <div class="mt-10">
                                    <button type="submit" class="btn btn-lg btn-primary">
                                        <?php echo e(__('bulkupload::app.admin.bulk-upload.upload-files.download')); ?>

                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </accordian>

        <!-- Import New products -->
        <accordian :title="'<?php echo e(__('bulkupload::app.admin.bulk-upload.upload-files.import-products')); ?>'" :active="true">
            <div slot="body">
                <div class="import-new-products">
                    <form method="POST" action="<?php echo e(route('import-new-products-form-submit')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php $familyId = app('request')->input('family') ?>

                        <div class="page-content">
                            <div class="is_downloadable">
                                <downloadable-input>
                                </downloadable-input>
                            </div>

                            <div class="attribute-family">
                                <attributefamily></attributefamily>
                            </div>

                            <div class="control-group <?php echo e($errors->first('file_path') ? 'has-error' :''); ?>">
                                <label class="required"><?php echo e(__('bulkupload::app.admin.bulk-upload.upload-files.file')); ?> </label>

                                <input type="file" class="control" name="file_path" id="file">

                                <span class="control-error"><?php echo e($errors->first('file_path')); ?></span>
                            </div>

                            <div class="control-group <?php echo e($errors->first('image_path') ? 'has-error' :''); ?>">
                                <label><?php echo e(__('bulkupload::app.admin.bulk-upload.upload-files.image')); ?> </label>

                                <input type="file" class="control" name="image_path" id="image">

                                <span class="control-error"><?php echo e($errors->first('image_path')); ?></span>
                            </div>
                        </div>

                        <div class="page-action">
                            <button type="submit" class="btn btn-lg btn-primary">
                            <?php echo e(__('bulkupload::app.admin.bulk-upload.upload-files.save')); ?>

                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </accordian>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="downloadable-input-template">
        <div>
            <div class="control-group">
                <label for="is_downloadable">
                    <?php echo e(__('bulkupload::app.admin.bulk-upload.upload-files.is-downloadable')); ?>

                </label>

                <input type="checkbox" @click="showOptions()" id="is_downloadable" name="is_downloadable">
            </div>

            <div class="control-group" v-if="isLinkSample">
                <label for="is_link_sample"><?php echo e(__('bulkupload::app.admin.bulk-upload.upload-files.sample-links')); ?></label>

                <input type="checkbox" id="is_link_have_sample" @click="showlinkSamples()" name="is_link_have_sample" value="is_link_have_sample" >
            </div>

            <div class="control-group" v-if="isSample">
                <label for="is_sample"><?php echo e(__('bulkupload::app.admin.bulk-upload.upload-files.sample-available')); ?></label>

                <input type="checkbox" id="is_sample" @click="showSamples()" name="is_sample">
            </div>

            <div class="control-group" v-if="linkFiles">
                <label class="required"><?php echo e(__('bulkupload::app.admin.bulk-upload.upload-files.upload-link-files')); ?></label>

                <input type="file" class="control required" name="link_files" id="file">

                <span class="control-error"><?php echo e($errors->first('file_path')); ?></span>
            </div>

            <div class="control-group" v-if="linkSampleFiles">
                <label class="required"><?php echo e(__('bulkupload::app.admin.bulk-upload.upload-files.upload-link-sample-files')); ?></label>

                <input type="file" class="control required"  name="link_sample_files" id="file">

                <span class="control-error"><?php echo e($errors->first('file_path')); ?></span>
            </div>

            <div class="control-group" v-if="sampleFile">
                <label class="required"><?php echo e(__('bulkupload::app.admin.bulk-upload.upload-files.upload-sample-files')); ?></label>

                <input type="file" class="control required"  name="sample_file" id="file">

                <span class="control-error"><?php echo e($errors->first('file_path')); ?></span>
            </div>

        </div>
    </script>

    <script type="text/x-template" id="attribute-family-template">
        <div>
            <div class="control-group <?php echo e($errors->first('attribute_family') ? 'has-error' :''); ?>">
                <label for="attribute_family" class="required"><?php echo e(__('admin::app.catalog.products.familiy')); ?></label>

                <select @change="onChange()" v-model="key" class="control" id="attribute_family" name="attribute_family" <?php echo e($familyId ? 'disabled' : ''); ?>>
                    <option value="">
                        <?php echo e(__('bulkupload::app.admin.bulk-upload.run-profile.please-select')); ?>

                    </option>

                    <?php $__currentLoopData = $families; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $family): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($family->id); ?>" <?php echo e(($familyId == $family->id || old('attribute_family') == $family->id) ? 'selected' : ''); ?>><?php echo e($family->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>

                <?php if($familyId): ?>
                    <input type="hidden" name="attribute_family" value="<?php echo e($familyId); ?>"/>
                <?php endif; ?>

                <span class="control-error"><?php echo e($errors->first('attribute_family')); ?></span>
            </div>

            <div class="control-group <?php echo e($errors->first('data_flow_profile') ? 'has-error' :''); ?>">
                <label for="data-flow-profile" class="required"><?php echo e(__('bulkupload::app.admin.bulk-upload.data-flow-profile.index')); ?></label>

                <select class="control" id="data-flow-profile" name="data_flow_profile">
                    <option value="">
                        <?php echo e(__('bulkupload::app.admin.bulk-upload.run-profile.please-select')); ?>

                    </option>
                    <option v-for="dataflowprofile,index in dataFlowProfiles" :value="dataflowprofile.id">{{ dataflowprofile.name }}</option>
                </select>

            <span class="control-error"><?php echo e($errors->first('data_flow_profile')); ?></span>

            </div>
        </div>
    </script>

    <script>
        Vue.component('attributefamily', {
                template: '#attribute-family-template',
                data: function() {
                    return {
                        key: "",
                        // seller: "",
                        dataFlowProfiles: [],
                    }
                },

                mounted: function() {
                },

                methods:{
                    onChange: function() {
                        this_this = this;

                        var uri = "<?php echo e(route('bulk-upload-admin.get-all-profile')); ?>"

                        this_this.$http.post(uri, {
                            attribute_family_id: this_this.key,
                            // seller_id: this_this.seller,
                        })
                        .then(response => {
                            this_this.dataFlowProfiles = response.data.dataFlowProfiles;
                        })

                        .catch(function(error) {
                        });
                    }
                }
        })

        Vue.component('downloadable-input', {
                template: '#downloadable-input-template',
                data: function() {
                    return {
                        key: "",
                        // seller: "",
                        dataFlowProfiles: [],
                        isLinkSample: false,
                        isSample: false,
                        linkFiles: false,
                        linkSampleFiles: false,
                        sampleFile: false,
                    }
                },

                methods:{
                    showOptions: function() {
                        this.isLinkSample = !this.isLinkSample;
                        this.isSample = !this.isSample;
                        this.linkFiles = !this.linkFiles;

                        this.linkSampleFiles = false;
                        this.sampleFile = false;
                    },

                    showlinkSamples: function() {
                        this.linkSampleFiles = !this.linkSampleFiles;
                    },

                    showSamples: function() {
                        this.sampleFile = !this.sampleFile;
                    }
                }
        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Webkul/Bulkupload/src/Providers/../Resources/views/admin/bulk-upload/upload-files/index.blade.php ENDPATH**/ ?>