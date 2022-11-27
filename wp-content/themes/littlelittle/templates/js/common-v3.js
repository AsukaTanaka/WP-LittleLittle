/**
 * Call Function
 */
const datePick = document.getElementById('js-datepick');
const monthCalendar = document.getElementById('js-month-calendar');
const itemCalendar = document.getElementById('js-item-calendar');

const thisDate =  new Date();
let thisMonth = thisDate.getMonth();
let thisYear = thisDate.getFullYear();

const arrayMonth = [
    "Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", 
    "Tháng 7", "Tháng 8", "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12",
]

const tableMonth = [
    ["CN", "T2", "T3", "T4", "T5", "T6", "T7"]
]

/* Toggle Menu */
function toggleMenu() {
    const openMenu = document.querySelector('#js-sidebar-open');
    const closeMenu = document.querySelector('#js-sidebar-close');
    const sidebarMenu = document.querySelector('#js-sidebar');

    openMenu.addEventListener("click", () => {
        sidebarMenu.classList.toggle('active');
    });

    closeMenu.addEventListener("click", () => {
        sidebarMenu.classList.remove('active');
    });
}

/* Form Index */
function formIndex() {
    const fullname = document.querySelector('#js-form-index #fullname');
    const phone = document.querySelector('#js-form-index #phone');
    const email = document.querySelector('#js-form-index #email');
    const package = document.querySelector('#js-form-index #package');
    const amount = document.querySelector('#js-form-index #amount');
    const datepick = document.querySelector('#js-form-index #js-datepick');

    fullname.placeholder = "Họ và tên";
    phone.placeholder = "Số điện thoại";
    email.placeholder = "Địa chỉ email";
    package.placeholder = "Chọn gói";
    package.readOnly = true;
    amount.placeholder = "Số lượng vé";
    datepick.placeholder = "Ngày sử dụng";
    datepick.readOnly = true;
}

function selectMultipleButton() {
    // Package
    const selectValue = document.querySelector('.form-index .select-box .input-text');
    const optionsContainer = document.querySelector('.form-index .options-container');
    const optionList = document.querySelectorAll('.form-index .option');
    const buttonSelect = document.querySelector('.form-index .button-select');

    // Date 
    const bgDatepick = document.querySelector('.date-box .bg-datepick');
    const buttonDate = document.querySelector('.button-date');

    buttonSelect.addEventListener("click", () => {
        optionsContainer.classList.toggle("active");
        bgDatepick.classList.remove("active");
    });

    buttonDate.addEventListener("click", () => {
        bgDatepick.classList.toggle("active");
        optionsContainer.classList.remove("active");
    });

    // document.addEventListener('mouseup', function(e) {
    //     if(!bgDatepick.is(e.target) || bgDatepick.has(e.target).length === 0) {
    //         bgDatepick.classList.remove("active");
    //     }
        
    //     if(!optionsContainer.is(e.target) || optionsContainer.has(e.target).length === 0) {
    //         optionsContainer.classList.remove("active");
    //     }
    // });

    optionList.forEach(o => {
        o.addEventListener("click", (e)=> {
            selectValue.value = o.querySelector(".select-box .option label").innerHTML;
            optionsContainer.classList.remove("active");
        }); 
    });
}

function createCalendar() {
    // var arrayTableMonth = document.querySelector('.table-calendar thead');
    // for(var i = 0; i < tableMonth.length; i++) {
    //     var tr = document.createElement('tr');
    //     for(var j = 0; j < tableMonth[i].length; j++) {
    //         var th = document.createElement('th');
    //         var tn = document.createTextNode(tableMonth[i][j]);
    //         th.appendChild(tn);
    //         tr.appendChild(th);
    //     }
    //     arrayTableMonth.appendChild(tr);
    // }

    // datePick.value = `${thisDate.getDate()}/${thisMonth + 1}/${thisYear}`;

    monthCalendar.innerHTML = `${arrayMonth[thisMonth]}, ${thisYear}`;
    const dayOne = new Date(thisYear, thisMonth).getDay();
    const monthDays = 32 - new Date(thisYear, thisMonth, 32).getDate();
    
    dateCount = 1;

    for(let i = 0; i < 6; i++) {
        let row = document.createElement("tr");
        for(let j = 0; j < 7; j++) {
            let column = document.createElement("td");
            if(dateCount > monthDays) break;
            else if (i === 0 && j < dayOne) {
                let columnText = document.createTextNode("");
                column.classList.add("get-null");
                column.appendChild(columnText);
                row.appendChild(column);
            } else {
                let columnText = document.createTextNode(dateCount);
                column.appendChild(columnText);
                if(dateCount === thisDate.getDate() && thisMonth === thisDate.getMonth() && thisYear === thisDate.getFullYear()) {
                    column.classList.add("table-today");
                }
                column.addEventListener("click", () => {
                    datePick.value = `${column.textContent}/${thisMonth+1}/${thisYear}`;
                });
                row.appendChild(column);
                dateCount++;
            }
        }
        itemCalendar.appendChild(row);
    }
}

function preMonth() {
    const prevMonth = document.querySelector(".bg-datepick .prev-month");

    prevMonth.addEventListener("click", () => {
        thisMonth = thisMonth - 1;
        itemCalendar.innerHTML = "";
        if(thisMonth < 0) {
            thisYear = thisYear - 1;
            thisMonth = 11;
        }

        createCalendar();
        return thisMonth;
    });
}

function nextMonth() {
    const nextMonth = document.querySelector(".bg-datepick .next-month");

    nextMonth.addEventListener("click", () => {
        thisMonth = thisMonth + 1;
        itemCalendar.innerHTML = "";
        if(thisMonth > 11) {
            thisYear = thisYear + 1;
            thisMonth = 0;
        }

        createCalendar();
        return thisMonth;
    });
}

function formContact() {
    const name = document.getElementById('input-name');
    const email = document.getElementById('input-email');
    const phone = document.getElementById('input-phone');
    const address = document.getElementById('input-address');
    const comment = document.getElementById('input-comment');

    name.placeholder = "Tên";
    email.placeholder = "Email";
    phone.placeholder = "Số điện thoại";
    address.placeholder = "Địa chỉ";
    comment.placeholder = "Lời nhắn";
}

function swiperSlider() {
    new Swiper('.slider-event .swiper', {
        spaceBetween: 20,
        slidesPerView: 4,
        loop: false,
        autoHeight: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            0 : {
                slidesPerView: 1,
            }, 
            425 : {
                slidesPerView: 1.25,
            },
            500 : {
                slidesPerView: 1.5,
            },
            567 : {
                slidesPerView: 2,
            }, 
            768 : {
                slidesPerView: 3,
            }, 
            991 : {
                slidesPerView: 3,
            }, 
            1200 : {
                slidesPerView: 4,
            }
        },
    });
    new Swiper('.slider-success .swiper', {
        spaceBetween: 20,
        slidesPerView: 4,
        loop: false,
        autoHeight: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
            renderFraction: function (currentClass, totalClass) {
                return 'Trang&nbsp;' + '<span class="' + currentClass + '"></span>' + '/' + '<span class="' + totalClass + '"></span>';
            },
        },
        on: {
            init: function (sw) {
                var totalPages = document.querySelector('.row-section-success #total-pages');
                totalPages.innerHTML = 'Số lượng: ' + sw.slides.length + ' vé';
            },
        },
        centeredSlides: false,
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
        breakpoints: {
            0 : {
                slidesPerView: 1,
                centeredSlides: false,
            }, 
            425 : {
                slidesPerView: 1.45,
                centeredSlides: true,
            },
            550 : {
                slidesPerView: 2,
                centeredSlides: false,
            },
            567 : {
                slidesPerView: 2,
                centeredSlides: false,
            }, 
            768 : {
                slidesPerView: 3,
                centeredSlides: false,
            }, 
            991 : {
                slidesPerView: 3,
                centeredSlides: false,
            }, 
            1200 : {
                slidesPerView: 4,
                centeredSlides: false,
            }
        },
    });
}

/**
 * Show Function
 */

if(document.getElementById('js-menu')) {
    toggleMenu();
}

if(document.getElementById('js-select-package') && document.getElementById('js-date')) {
    selectMultipleButton();
}

if(document.getElementById('js-form-index')) {
    formIndex();
}

if(document.getElementById('js-datepick')) {
    createCalendar();
    preMonth();
    nextMonth();
}

if(document.getElementById('js-form-contact')) {
    formContact();
}

if(document.getElementById('js-slider-event') || document.getElementById('js-slider-success')) {
    swiperSlider();
}