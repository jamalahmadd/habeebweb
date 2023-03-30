<?php $__env->startSection('page_title'); ?>
    <?php echo e(__('admin::app.catalog.attributes.add-title')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content">
        <form method="POST" action="<?php echo e(route('admin.catalog.attributes.store')); ?>" @submit.prevent="onSubmit" enctype="multipart/form-data">

            <div class="page-header">
                <div class="page-title">
                    <h1>
                        <i class="icon angle-left-icon back-link" onclick="window.location = '<?php echo e(route('admin.catalog.attributes.index')); ?>'"></i>

                        <?php echo e(__('admin::app.catalog.attributes.add-title')); ?>

                    </h1>
                </div>

                <div class="page-action">
                    <button type="submit" class="btn btn-lg btn-primary">
                        <?php echo e(__('admin::app.catalog.attributes.save-btn-title')); ?>

                    </button>
                </div>
            </div>

            <div class="page-content">
                <div class="form-container">
                    <?php echo csrf_field(); ?>

                    <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.general.before'); ?>


                    <accordian title="<?php echo e(__('admin::app.catalog.attributes.general')); ?>" :active="true">
                        <div slot="body">

                            <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.general.controls.before'); ?>


                            <div class="control-group" :class="[errors.has('code') ? 'has-error' : '']">
                                <label for="code" class="required"><?php echo e(__('admin::app.catalog.attributes.code')); ?></label>
                                <input type="text" v-validate="'required'" class="control" id="code" name="code" value="<?php echo e(old('code')); ?>"  data-vv-as="&quot;<?php echo e(__('admin::app.catalog.attributes.code')); ?>&quot;" v-code/>
                                <span class="control-error" v-if="errors.has('code')">{{ errors.first('code') }}</span>
                            </div>

                            <div class="control-group">
                                <label for="type" class="required"><?php echo e(__('admin::app.catalog.attributes.type')); ?></label>
                                <select class="control" id="type" name="type">
                                    <option value="text"><?php echo e(__('admin::app.catalog.attributes.text')); ?></option>
                                    <option value="textarea"><?php echo e(__('admin::app.catalog.attributes.textarea')); ?></option>
                                    <option value="price"><?php echo e(__('admin::app.catalog.attributes.price')); ?></option>
                                    <option value="boolean"><?php echo e(__('admin::app.catalog.attributes.boolean')); ?></option>
                                    <option value="select"><?php echo e(__('admin::app.catalog.attributes.select')); ?></option>
                                    <option value="multiselect"><?php echo e(__('admin::app.catalog.attributes.multiselect')); ?></option>
                                    <option value="datetime"><?php echo e(__('admin::app.catalog.attributes.datetime')); ?></option>
                                    <option value="date"><?php echo e(__('admin::app.catalog.attributes.date')); ?></option>
                                    <option value="image"><?php echo e(__('admin::app.catalog.attributes.image')); ?></option>
                                    <option value="file"><?php echo e(__('admin::app.catalog.attributes.file')); ?></option>
                                    <option value="checkbox"><?php echo e(__('admin::app.catalog.attributes.checkbox')); ?></option>
                                </select>
                            </div>

                            <div class="control-group hide">
                                <label for="enable_wysiwyg"><?php echo e(__('admin::app.catalog.attributes.enable-wysiwyg')); ?></label>

                                <label class="switch">
                                    <input type="checkbox" id="enable_wysiwyg" name="enable_wysiwyg" value="1" <?php echo e(old('enable_wysiwyg') ? 'checked' : ''); ?>>
                                    <span class="slider round"></span>
                                </label>
                            </div>

                            <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.general.controls.after'); ?>


                        </div>
                    </accordian>

                    <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.general.after'); ?>



                    <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.label.before'); ?>


                    <accordian title="<?php echo e(__('admin::app.catalog.attributes.label')); ?>" :active="true">
                        <div slot="body">

                            <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.label.controls.before'); ?>


                            <div class="control-group" :class="[errors.has('admin_name') ? 'has-error' : '']">
                                <label for="admin_name" class="required"><?php echo e(__('admin::app.catalog.attributes.admin')); ?></label>
                                <input type="text" v-validate="'required'" class="control" id="admin_name" name="admin_name" value="<?php echo e(old('admin_name')); ?>" data-vv-as="&quot;<?php echo e(__('admin::app.catalog.attributes.admin')); ?>&quot;"/>
                                <span class="control-error" v-if="errors.has('admin_name')">{{ errors.first('admin_name') }}</span>
                            </div>

                            <?php $__currentLoopData = app('Webkul\Core\Repositories\LocaleRepository')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <div class="control-group">
                                    <label for="locale-<?php echo e($locale->code); ?>"><?php echo e($locale->name . ' (' . $locale->code . ')'); ?></label>
                                    <input type="text" class="control" id="locale-<?php echo e($locale->code); ?>" name="<?php echo $locale->code; ?>[name]" value="<?php echo e(old($locale->code)['name'] ?? ''); ?>"/>
                                </div>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.label.controls.after'); ?>


                        </div>
                    </accordian>

                    <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.label.after'); ?>




                    <div class="hide">
                        <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.options.before'); ?>


                        <accordian title="<?php echo e(__('admin::app.catalog.attributes.options')); ?>" :active="true" :id="'options'">
                            <div slot="body">

                                <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.options.controls.before'); ?>


                                <option-wrapper></option-wrapper>

                                <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.options.controls.after'); ?>


                            </div>
                        </accordian>

                        <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.options.after'); ?>

                    </div>


                    <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.validations.before'); ?>


                    <accordian title="<?php echo e(__('admin::app.catalog.attributes.validations')); ?>" :active="true">
                        <div slot="body">

                            <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.options.controls.before'); ?>


                            <div class="control-group">
                                <label for="is_required"><?php echo e(__('admin::app.catalog.attributes.is_required')); ?></label>
                                <select class="control" id="is_required" name="is_required">
                                    <option value="0"><?php echo e(__('admin::app.catalog.attributes.no')); ?></option>
                                    <option value="1"><?php echo e(__('admin::app.catalog.attributes.yes')); ?></option>
                                </select>
                            </div>

                            <div class="control-group">
                                <label for="is_unique"><?php echo e(__('admin::app.catalog.attributes.is_unique')); ?></label>
                                <select class="control" id="is_unique" name="is_unique">
                                    <option value="0"><?php echo e(__('admin::app.catalog.attributes.no')); ?></option>
                                    <option value="1"><?php echo e(__('admin::app.catalog.attributes.yes')); ?></option>
                                </select>
                            </div>

                            <div class="control-group">
                                <label for="validation"><?php echo e(__('admin::app.catalog.attributes.input_validation')); ?></label>
                                <select class="control" id="validation" name="validation">
                                    <option value=""></option>
                                    <option value="numeric"><?php echo e(__('admin::app.catalog.attributes.number')); ?></option>
                                    <option value="email"><?php echo e(__('admin::app.catalog.attributes.email')); ?></option>
                                    <option value="decimal"><?php echo e(__('admin::app.catalog.attributes.decimal')); ?></option>
                                    <option value="url"><?php echo e(__('admin::app.catalog.attributes.url')); ?></option>
                                </select>
                            </div>

                            <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.options.controls.after'); ?>


                        </div>
                    </accordian>

                    <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.validations.after'); ?>



                    <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.configuration.before'); ?>


                    <accordian title="<?php echo e(__('admin::app.catalog.attributes.configuration')); ?>" :active="true">
                        <div slot="body">

                            <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.configuration.controls.before'); ?>


                            <div class="control-group">
                                <label for="value_per_locale"><?php echo e(__('admin::app.catalog.attributes.value_per_locale')); ?></label>
                                <select class="control" id="value_per_locale" name="value_per_locale">
                                    <option value="0"><?php echo e(__('admin::app.catalog.attributes.no')); ?></option>
                                    <option value="1"><?php echo e(__('admin::app.catalog.attributes.yes')); ?></option>
                                </select>
                            </div>

                            <div class="control-group">
                                <label for="value_per_channel"><?php echo e(__('admin::app.catalog.attributes.value_per_channel')); ?></label>
                                <select class="control" id="value_per_channel" name="value_per_channel">
                                    <option value="0"><?php echo e(__('admin::app.catalog.attributes.no')); ?></option>
                                    <option value="1"><?php echo e(__('admin::app.catalog.attributes.yes')); ?></option>
                                </select>
                            </div>

                            <div class="control-group">
                                <label for="is_filterable"><?php echo e(__('admin::app.catalog.attributes.is_filterable')); ?></label>
                                <select class="control" id="is_filterable" name="is_filterable" disabled="disabled">
                                    <option value="0"><?php echo e(__('admin::app.catalog.attributes.no')); ?></option>
                                    <option value="1"><?php echo e(__('admin::app.catalog.attributes.yes')); ?></option>
                                </select>
                            </div>

                            <div class="control-group">
                                <label for="is_configurable"><?php echo e(__('admin::app.catalog.attributes.is_configurable')); ?></label>
                                <select class="control" id="is_configurable" name="is_configurable">
                                    <option value="0"><?php echo e(__('admin::app.catalog.attributes.no')); ?></option>
                                    <option value="1"><?php echo e(__('admin::app.catalog.attributes.yes')); ?></option>
                                </select>
                            </div>

                            <div class="control-group">
                                <label for="is_visible_on_front"><?php echo e(__('admin::app.catalog.attributes.is_visible_on_front')); ?></label>
                                <select class="control" id="is_visible_on_front" name="is_visible_on_front">
                                    <option value="0"><?php echo e(__('admin::app.catalog.attributes.no')); ?></option>
                                    <option value="1"><?php echo e(__('admin::app.catalog.attributes.yes')); ?></option>
                                </select>
                            </div>

                            <div class="control-group">
                                <label for="use_in_flat"><?php echo e(__('admin::app.catalog.attributes.use_in_flat')); ?></label>
                                <select class="control" id="use_in_flat" name="use_in_flat">
                                    <option value="0"><?php echo e(__('admin::app.catalog.attributes.no')); ?></option>
                                    <option value="1"><?php echo e(__('admin::app.catalog.attributes.yes')); ?></option>
                                </select>
                            </div>

                            <div class="control-group">
                                <label for="is_comparable"><?php echo e(__('admin::app.catalog.attributes.is_comparable')); ?></label>
                                <select class="control" id="is_comparable" name="is_comparable">
                                    <option value="0"><?php echo e(__('admin::app.catalog.attributes.no')); ?></option>
                                    <option value="1"><?php echo e(__('admin::app.catalog.attributes.yes')); ?></option>
                                </select>
                            </div>

                            <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.configuration.controls.after'); ?>


                        </div>
                    </accordian>

                    <?php echo view_render_event('bagisto.admin.catalog.attribute.create_form_accordian.configuration.after'); ?>


                </div>
            </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="options-template">
        <div>

            <div class="control-group" v-if="show_swatch">
                <label for="swatch_type"><?php echo e(__('admin::app.catalog.attributes.swatch_type')); ?></label>
                <select class="control" id="swatch_type" name="swatch_type" v-model="swatch_type">
                    <option value="dropdown">
                        <?php echo e(__('admin::app.catalog.attributes.dropdown')); ?>

                    </option>

                    <option value="color">
                        <?php echo e(__('admin::app.catalog.attributes.color-swatch')); ?>

                    </option>

                    <option value="image">
                        <?php echo e(__('admin::app.catalog.attributes.image-swatch')); ?>

                    </option>

                    <option value="text">
                        <?php echo e(__('admin::app.catalog.attributes.text-swatch')); ?>

                    </option>
                </select>
            </div>

            <div class="control-group">
                <span class="checkbox">
                    <input type="checkbox" class="control" id="default-null-option" name="default-null-option" v-model="isNullOptionChecked" >

                    <label class="checkbox-view" for="default-null-option"></label>
                    <?php echo e(__('admin::app.catalog.attributes.default_null_option')); ?>

                </span>
            </div>

            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th v-if="show_swatch && (swatch_type == 'color' || swatch_type == 'image')"><?php echo e(__('admin::app.catalog.attributes.swatch')); ?></th>

                            <th><?php echo e(__('admin::app.catalog.attributes.admin_name')); ?></th>

                            <?php $__currentLoopData = app('Webkul\Core\Repositories\LocaleRepository')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <th><?php echo e($locale->name . ' (' . $locale->code . ')'); ?></th>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <th><?php echo e(__('admin::app.catalog.attributes.position')); ?></th>

                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr v-for="row in optionRows">
                            <td v-if="show_swatch && swatch_type == 'color'">
                                <swatch-picker :input-name="'options[' + row.id + '][swatch_value]'" :color="row.swatch_value" colors="text-advanced" show-fallback />
                            </td>

                            <td v-if="show_swatch && swatch_type == 'image'">
                                <div class="control-group" :class="[errors.has('options[' + row.id + '][swatch_value]') ? 'has-error' : '']">
                                    <input type="file" v-validate="'size:600'" accept="image/*" :name="'options[' + row.id + '][swatch_value]'"/>
                                    <span class="control-error" v-if="errors.has('options[' + row.id + '][swatch_value]')">The image size must be less than 600 KB</span>
                                </div>
                            </td>

                            <td>
                                <div class="control-group" :class="[errors.has(adminName(row)) ? 'has-error' : '']">
                                    <input type="text" v-validate="'required'" v-model="row['admin_name']" :name="adminName(row)" class="control" data-vv-as="&quot;<?php echo e(__('admin::app.catalog.attributes.admin_name')); ?>&quot;"/>
                                    <span class="control-error" v-if="errors.has(adminName(row))">{{ errors.first(adminName(row)) }}</span>
                                </div>
                            </td>

                            <?php $__currentLoopData = app('Webkul\Core\Repositories\LocaleRepository')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <td>
                                    <div class="control-group" :class="[errors.has(localeInputName(row, '<?php echo e($locale->code); ?>')) ? 'has-error' : '']">
                                        <input type="text" v-validate="getOptionValidation(row, '<?php echo e($locale->code); ?>')"  v-model="row['locales']['<?php echo e($locale->code); ?>']" :name="localeInputName(row, '<?php echo e($locale->code); ?>')" class="control" data-vv-as="&quot;<?php echo e($locale->name . ' (' . $locale->code . ')'); ?>&quot;"/>
                                        <span class="control-error" v-if="errors.has(localeInputName(row, '<?php echo e($locale->code); ?>'))">{{ errors.first(localeInputName(row, '<?php echo $locale->code; ?>')) }}</span>
                                    </div>
                                </td>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <td>
                                <div class="control-group" :class="[errors.has(sortOrderName(row)) ? 'has-error' : '']">
                                    <input type="text" v-validate="'required|numeric'" :name="sortOrderName(row)" class="control" data-vv-as="&quot;<?php echo e(__('admin::app.catalog.attributes.position')); ?>&quot;"/>
                                    <span class="control-error" v-if="errors.has(sortOrderName(row))">{{ errors.first(sortOrderName(row)) }}</span>
                                </div>
                            </td>

                            <td class="actions">
                                <i class="icon trash-icon" @click="removeRow(row)"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <button type="button" class="btn btn-lg btn-primary mt-20" id="add-option-btn" @click="addOptionRow(false)">
                <?php echo e(__('admin::app.catalog.attributes.add-option-btn-title')); ?>

            </button>
        </div>
    </script>

    <script>
        $(document).ready(function () {
            $('#type').on('change', function (e) {
                if (['select', 'multiselect', 'checkbox'].indexOf($(e.target).val()) === -1) {
                    $('#options').parent().addClass('hide');
                } else {
                    $('#options').parent().removeClass('hide');
                }

                if (['select', 'multiselect', 'checkbox', 'checkbox', 'price'].indexOf($(e.target).val()) === -1) {
                    $('#options').parent().addClass('hide');
                    $('#is_filterable').attr('disabled', 'disabled');
                } else {
                    $('#options').parent().removeClass('hide');
                    $('#is_filterable').removeAttr('disabled');
                }

                if (['textarea'].indexOf($(e.target).val()) > -1) {
                    $('#enable_wysiwyg').parents('.control-group').removeClass('hide');
                } else {
                    $('#enable_wysiwyg').parents('.control-group').addClass('hide');
                }

                if (['text'].indexOf($(e.target).val()) > -1) {
                    $('#validation').parents('.control-group').removeClass('hide');
                } else {
                    $('#validation').parents('.control-group').addClass('hide');
                }
            })
        });


        Vue.component('option-wrapper', {

            template: '#options-template',

            inject: ['$validator'],

            data: function() {
                return {
                    optionRowCount: 1,
                    optionRows: [],
                    show_swatch: false,
                    swatch_type: '',
                    isNullOptionChecked: false,
                    idNullOption: null
                }
            },

            created: function () {
                var this_this = this;

                $(document).ready(function () {
                    $('#type').on('change', function (e) {
                        if (['select'].indexOf($(e.target).val()) === -1) {
                            this_this.show_swatch = false;
                        } else {
                            this_this.show_swatch = true;
                        }
                    });
                });
            },

            methods: {
                addOptionRow: function (isNullOptionRow) {
                    const rowCount = this.optionRowCount++;
                    const id = 'option_' + rowCount;
                    let row = {'id': id, 'locales': {}};

                    <?php $__currentLoopData = app('Webkul\Core\Repositories\LocaleRepository')->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $locale): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        row['locales']['<?php echo e($locale->code); ?>'] = '';
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    row['notRequired'] = '';

                    if (isNullOptionRow) {
                        this.idNullOption = id;
                        row['notRequired'] = true;
                    }

                    this.optionRows.push(row);
                },

                removeRow: function (row) {
                    if (row.id === this.idNullOption) {
                        this.idNullOption = null;
                        this.isNullOptionChecked = false;
                    }

                    const index = this.optionRows.indexOf(row);
                    Vue.delete(this.optionRows, index);
                },

                adminName: function (row) {
                    return 'options[' + row.id + '][admin_name]';
                },

                localeInputName: function (row, locale) {
                    return 'options[' + row.id + '][' + locale + '][label]';
                },

                sortOrderName: function (row) {
                    return 'options[' + row.id + '][sort_order]';
                },

                getOptionValidation: (row, localeCode) => {
                    if (row.notRequired === true) {
                        return '';
                    }

                    return ('<?php echo e(app()->getLocale()); ?>' === localeCode) ? 'required' : '';
                }
            },


            watch: {
                isNullOptionChecked: function (val) {
                    if (val) {
                        if (! this.idNullOption) {
                            this.addOptionRow(true);
                        }
                    } else if(this.idNullOption !== null && typeof this.idNullOption !== 'undefined') {
                        const row = this.optionRows.find(optionRow => optionRow.id === this.idNullOption);
                        this.removeRow(row);
                    }
                }
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin::layouts.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Webkul/Admin/src/Providers/../Resources/views/catalog/attributes/create.blade.php ENDPATH**/ ?>