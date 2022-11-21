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
        toolbar: true,
        element_format: 'html',
        file_picker_types: 'image',
        block_unsupported_drop: false,
        plugins: 'image code wordcount',
        images_file_types: 'jpg,png,jpeg',
        formats: {
            bold: { inline: 'b' },  
            italic: { inline: 'i' },
            underline: { inline: 'u' },
            // blockquote: { block: 'blockquote', classes: 'col', wrapper: true },
        },
    });
}

/**
 * Call Function
 */

if(document.getElementById('plugin-form-event')) {
    pluginFormEvent();
    tinyMCE();
}