
/**
 * Config Function
 */
function defaultBtnActive() {
    // document.getElementById('input-thumbnail').click();
}

function pluginFormEvent() {

    defaultBtn.addEventListener('change', function() {
        const file = this.files[0];
        if(file) {
            const reader = new FileReader();
            reader.onload = function() {
                const result = reader.result;
                document.getElementById('thumbnail-upload').src = result;
            }
            reader.readAsDataURL(file);
        }
    
        if(this.value) {
            let valueStore = this.value.match('/[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/');
            document.getElementById('file-name').textContent = valueStore;
        }
       
    });
    
}
   

/**
 * Call Function
 */

if(document.getElementById('plugin-form-event')) {

    // pluginFormEvent();
}