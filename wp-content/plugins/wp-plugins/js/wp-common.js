const fileDiv = document.querySelector('.file');
const fileName = document.querySelector('.file-name');
const defaultBtn = document.querySelector('.btn-default');
const customBtn = document.querySelector('.btn-custom');
const getImg = document.querySelector('.thumbnail-upload');
const cancelBtn = document.querySelector('.btn-cancel');
var regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
/**
 * Config Function
 */
function defaultBtnActive() {
    defaultBtn.click();
}

function pluginFormEvent() {
    defaultBtn.addEventListener('change', () => {
        const file = defaultBtn.files[0];
        if(file) {
            const reader = new FileReader();
            reader.onload = function() {
                const result = reader.result;
                getImg.src = result;
                fileDiv.classList.add('active');
            }
            
            cancelBtn.addEventListener("click", () => {
                getImg.src = '';
                fileDiv.classList.remove('active');
            });

            reader.readAsDataURL(file);
        }
      
        if(defaultBtn.value) {
            let valueStore = defaultBtn.value.match(regExp);
            fileName.innerHTML = valueStore;
            defaultBtn.setAttribute('value', valueStore);
        }
       
    });
    
}

function tinyMCE() {
    tinymce.init({
        selector: "textarea.input-textarea",
        width: "100%",
        statubar: true,
        menubar: true,
        element_format: 'html',
        file_picker_types: 'image',
        block_unsupported_drop: false,
        language: 'vi',
        menubar: 'view | insert | format | tools',
        plugins: [
            'advlist', 'autolink', 'link', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'insertdatetime',
            'media', 'table', 'emoticons', 'template', 'image', 'code',
        ],
        toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent | link code | link image',
        file_picker_types: 'image',
        images_file_types: 'jpg,png,jpeg',
        automatic_uploads: true,
        image_title: true,
        paste_block_drop: false,
        paste_data_images: true,
        paste_as_text: true,
        cleanup : true,
        allow_html_in_named_anchor: true,
        autosave_restore_when_empty: true,
        entity_encoding : 'raw',

        formats: {
            bold: { inline: 'b' },  
            italic: { inline: 'i' },
            underline: { inline: 'u' },
            div: { block: 'div', classes: 'col-ish', wrapper: true },
            // blockquote: { block: 'blockquote', classes: 'col', wrapper: true },
        },
        content_style: `
            .mce-content-body:not([dir=rtl]) blockquote {
                border-left: none !important;
                margin: 0 !important;
                padding: 0 !important;
            }
        `,
        // protect: [
        //     /\<\/?(if|endif)\>/g,  // Protect <if> & </endif>
        //     /\<xsl\:[^>]+\>/g,  // Protect <xsl:...>
        //     /<\?php.*?\?>/g,  // Protect php code
        // ],
        setup: function(editor, ed) {
            editor.on('init keydown change', function(e) {
                document.getElementById('get-content').innerHTML = editor.getContent();
            });

        },
        images_upload_credentials: true,
        file_picker_callback: (callback, value, meta) => {
            var input = document.getElementById('get-array-picture');
            input.click();

            input.onchange = function() {
                var file = this.files[0];
                if(file) {
                    // var reader = new FileReader();
                    
                    // reader.onload = function() {
                    //     var id = 'blobid' + (new Date()).getTime();
                    //     var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    //     var base64 = reader.result.split(',')[1];
                    //     var blobInfo = blobCache.create(id, file, base64);
                    //     blobCache.add(blobInfo);
                    //     callback(blobInfo.blobUri(), { title: file.name });

                    // };
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        callback(e.target.result, {
                            // alt: file.name,
                            title: file.name,
                        });
                    };
                    reader.readAsDataURL(file);
                }
                // if(input.value) {
                //     let valueStore = input.value.match(regExp);
                //     input.setAttribute('value', valueStore);
                // }
                
            };
        },

    });    
}

function datepickerForm() {
    // var start = new Date();
    // var end = new Date(new Date().setYear(start.getFullYear() + 1));
    
    (function($) {

        $( "#input-start-date" ).datepicker({
            dateFormat: 'dd/mm/yy',
            // startDate: start,
            // endDate: end,
            minDate: +1,
            yearRange: new Date().getFullYear() + ':' + new Date().getFullYear(),
            onSelect: function(date) {
                var start = $('#input-start-date').datepicker('getDate');
                var date = new Date(Date.parse(start));
                date.setDate(date.getDate() + 1);
                var newDate = date.toDateString();
                newDate = new Date(Date.parse(newDate));
                $('#input-end-date').datepicker("option", "minDate", newDate);
            },
        });

        $( "#input-end-date" ).datepicker({
            dateFormat: 'dd/mm/yy',
            // startDate: start,
            // endDate: end,
            minDate: +2,
            yearRange: new Date().getFullYear() + ':' + new Date().getFullYear(),
            enableOnReadonly: true,
        });
    })(jQuery);
}


/**
 * Call Function
 */

if(document.getElementById('plugin-form-event')) {
    pluginFormEvent();
    tinyMCE();
    datepickerForm();
}