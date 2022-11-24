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