<?php
if (isset($data['notification-info'])) {
    showInfo($data['notification-info']);
}

if (isset($data['notification-error'])) {
    showError($data['notification-error']);
}

$edit = $data['edit'];
if ($edit) {
    $blog = $data['blog'];
    ?>
    <div  class="container has-text-centered"><div style="display: none;" id="edit-true" class="notification is-success"><button class="delete"></button><span id="notification-true-text">Blogeintrag wurde geändert. Weiterleitung in 5 Sekunden...</span></div></div>
    <div  class="container has-text-centered"><div style="display: none;" id="edit-false" class="notification is-danger"><button class="delete"></button><span id="notification-false-text">Fehler, bitte erneut versuchen.</span></div></div>

    <form id= "edit-form" class="edit-form">
        <input class="hidden" type="hidden" name="id" value="<?php echo $blog->getId(); ?>" />
        <div class="field">
            <label class="label">Titel</label>
            <div class="control">
                <input class="input is-medium" name="title" type="text" value="<?php echo htmlspecialchars($blog->getTitle()); ?>">
            </div>
        </div>

        <div class="field">
            <label class="label">Text</label>
            <div class="control">
                <textarea id="full-featured-non-premium" name="text" class="textarea"><?php echo htmlspecialchars($blog->getText()); ?></textarea>
            </div>
        </div>

        <a href="#"><button id="edit-button" type="button" class="button is-block is-primary is-fullwidth is-medium">Submit</button></a>
        <br />
    </form>  

    <script>
        tinymce.init({
            selector: 'textarea#full-featured-non-premium',
            plugins: 'print preview paste importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists wordcount imagetools textpattern noneditable help charmap quickbars emoticons',
            imagetools_cors_hosts: ['picsum.photos'],
            menubar: 'file edit view insert format tools table help',
            toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
            toolbar_sticky: true,
            autosave_ask_before_unload: true,
            autosave_interval: "30s",
            autosave_prefix: "{path}{query}-{id}-",
            autosave_restore_when_empty: false,
            autosave_retention: "2m",
            image_advtab: true,
            content_css: '//www.tiny.cloud/css/codepen.min.css',
            link_list: [
                {title: 'My page 1', value: 'http://www.tinymce.com'},
                {title: 'My page 2', value: 'http://www.moxiecode.com'}
            ],
            image_list: [
                {title: 'My page 1', value: 'http://www.tinymce.com'},
                {title: 'My page 2', value: 'http://www.moxiecode.com'}
            ],
            image_class_list: [
                {title: 'None', value: ''},
                {title: 'Some class', value: 'class-name'}
            ],
            importcss_append: true,
            file_picker_callback: function (callback, value, meta) {
                /* Provide file and text for the link dialog */
                if (meta.filetype === 'file') {
                    callback('https://www.google.com/logos/google.jpg', {text: 'My text'});
                }

                /* Provide image and alt text for the image dialog */
                if (meta.filetype === 'image') {
                    callback('https://www.google.com/logos/google.jpg', {alt: 'My alt text'});
                }

                /* Provide alternative source and posted for the media dialog */
                if (meta.filetype === 'media') {
                    callback('movie.mp4', {source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg'});
                }
            },
            templates: [
                {title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'},
                {title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...'},
                {title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'}
            ],
            template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
            template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
            height: 600,
            image_caption: true,
            quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
            noneditable_noneditable_class: "mceNonEditable",
            toolbar_mode: 'sliding',
            contextmenu: "link image imagetools table",
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            }
        });
    </script>
    <?php
}


