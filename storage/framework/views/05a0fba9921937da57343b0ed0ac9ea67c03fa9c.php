<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title><?php echo e(__('mediamanager::app.admin.menu.heading')); ?></title>

        <!-- jQuery and jQuery UI (REQUIRED) -->
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/themes/smoothness/jquery-ui.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

        <!-- elFinder CSS (REQUIRED) -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/mediamanager/css/elfinder.min.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/mediamanager/css/theme.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(asset('vendor/mediamanager/custom/style.css')); ?>">

        <!-- elFinder JS (REQUIRED) -->
        <script src="<?php echo e(asset('vendor/mediamanager/js/elfinder.min.js')); ?>"></script>
        
        <!-- elFinder initialization (REQUIRED) -->
        <script type="text/javascript">
            var FileBrowserDialogue = {
                init: function() {
                    // Here goes your code for setting your custom things onLoad.
                },
                mySubmit: function (URL) {
                    // pass selected file path to TinyMCE
                    parent.tinymce.activeEditor.windowManager.getParams().setUrl(URL);

                    // close popup window
                    parent.tinymce.activeEditor.windowManager.close();
                }
            }

            $().ready(function() {
                var elf = $('#elfinder').elfinder({
                   customData: { 
                        _token: '<?php echo e(csrf_token()); ?>'
                    },
                    baseUrl: '/vendor/mediamanager/',
                    url: '<?php echo e(route("elfinder.connector")); ?>',
                    soundPath: '<?php echo e(asset('vendor/mediamanager/sounds')); ?>',
                    resizable: false,
                    defaultView: 'icons',
                    getFileCallback: function(file) { 
                        FileBrowserDialogue.mySubmit(file.url);
                    }
                }).elfinder('instance');
            });
        </script>
    </head>
    <body>

        <!-- Element where elFinder will be created (REQUIRED) -->
        <div id="elfinder"></div>

    </body>
</html><?php /**PATH /var/www/vhosts/hab.mobi/httpdocs/packages/Ridhima/MediaManager/src/Providers/../Resources/views/admin/mediamanager/popup.blade.php ENDPATH**/ ?>