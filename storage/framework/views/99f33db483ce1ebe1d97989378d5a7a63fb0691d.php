<?php
    $dependField = $coreConfigRepository->getDependentFieldOrValue($field);
    $dependValue = $coreConfigRepository->getDependentFieldOrValue($field, 'value');

    $dependNameKey = $item['key'] . '.' . $dependField;
    $dependName = $coreConfigRepository->getNameField($dependNameKey);

    $field['options'] = $coreConfigRepository->getDependentFieldOptions($field, $value);

    $selectedOption = core()->getConfigData($nameKey, $channel, $locale) ?? '';
    $dependSelectedOption = core()->getConfigData($dependNameKey, $channel, $locale) ?? '';
?>

<?php if(strpos($field['validation'], 'required_if') !== false): ?>
    <required-if
        name = "<?php echo e($name); ?>"
        label = "<?php echo e(trans($field['title'])); ?>"
        :info = "'<?php echo e(trans(isset($field['info']) ? $field['info'] : '')); ?>'"
        :options = '<?php echo json_encode($field['options'], 15, 512) ?>'
        :result = "'<?php echo e($selectedOption); ?>'"
        :validations = "'<?php echo e($validations); ?>'"
        :depend = "'<?php echo e($dependName); ?>'"
        :depend-result= "'<?php echo e($dependSelectedOption); ?>'"
        :channel_locale = "'<?php echo e($channelLocaleInfo); ?>'"
    ></required-if>
<?php else: ?>
    <depends
        :options = '<?php echo json_encode($field['options'], 15, 512) ?>'
        name = "<?php echo e($name); ?>"
        :validations = "'<?php echo e($validations); ?>'"
        :depend = "'<?php echo e($dependName); ?>'"
        :value = "'<?php echo e($dependValue); ?>'"
        :field_name = "'<?php echo e(trans($field['title'])); ?>'"
        :channel_locale = "'<?php echo e($channelLocaleInfo); ?>'"
        :result = "'<?php echo e($selectedOption); ?>'"
        :depend-saved-value= "'<?php echo e($dependSelectedOption); ?>'"
    ></depends>
<?php endif; ?>

<?php $__env->startPush('scripts'); ?>
    <script type="text/x-template" id="depends-template">
        <div class="control-group"  :class="[errors.has(name) ? 'has-error' : '']" v-if="this.isVisible">
            <label :for="name" :class="[ isRequire ? 'required' : '']">
                {{ field_name }}
                <span class="locale"> {{ channel_locale }} </span>
            </label>

            <select v-if="this.options.length" v-validate= "validations" class="control" :id = "name" :name = "name" v-model="savedValue"
            :data-vv-as="field_name">
                <option v-for='(option, index) in this.options' :value="option.value"> {{ option.title }} </option>
            </select>

            <input v-else type="text"  class="control" v-validate= "validations" :id = "name" :name = "name" v-model="savedValue"
            :data-vv-as="field_name">

            <span class="control-error" v-if="errors.has(name)">
                {{ errors.first(name) }}
            </span>
        </div>
    </script>

    <script>
        Vue.component('depends', {

            template: '#depends-template',

            inject: ['$validator'],

            props: ['options', 'name', 'validations', 'depend', 'value', 'field_name', 'channel_locale', 'repository', 'result'],

            data: function() {
                return {
                    isRequire: false,
                    isVisible: false,
                    savedValue: "",
                }
            },

            mounted: function () {
                let self = this;

                self.savedValue = self.result;

                if (self.validations || (self.validations.indexOf("required") != -1)) {
                    self.isRequire = true;
                }

                $(document).ready(function(){
                    let dependentElement = document.getElementById(self.depend);
                    let dependValue = self.value;

                    if (dependValue == 'true') {
                        dependValue = 1;
                    } else if (dependValue == 'false') {
                        dependValue = 0;
                    }

                    $(document).on("change", "select.control", function() {
                        if (self.depend == this.name) {
                            if (self.value == this.value) {
                                self.isVisible = true;
                            } else {
                                self.isVisible = false;
                            }
                        }
                    })

                    if (dependentElement && dependentElement.value == dependValue) {
                        self.isVisible = true;
                    } else {
                        self.isVisible = false;
                    }

                    if (self.result) {
                        if (dependentElement.value == self.value) {
                            self.isVisible = true;
                        } else {
                            self.isVisible = false;
                        }
                    }
                });
            }
        });
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Webkul/Admin/src/Providers/../Resources/views/configuration/dependent-field-type.blade.php ENDPATH**/ ?>