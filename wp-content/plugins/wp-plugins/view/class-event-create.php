<?php 
    global $wpdb;
    $table__name = $wpdb->prefix . 'event';
?>

<div class="wrap">
    <div class="container">
    <div class="form-design form-event">
            <div class="header">
                <h2>Thêm Mới Sự Kiện</h2>
            </div>
            <form action="" method="post" class="form-event-create" enctype="multipart/form-data" id="plugin-form-event">
                <div class="field">
                    <span class="span">Tựa Đề: <i class="get-error-msg error-title"></i></span>
                    <input type="text" placeholder="" value="" class="input-field" name="input-title" id="input-title">
                </div>
                <div class="field">
                    <span class="span">Địa Chỉ: <i class="get-error-msg error-address"></i></span>
                    <input type="text" placeholder="" value="" class="input-field" name="input-address" id="input-address">
                </div>
                <div class="field">
                    <span class="span">Ngày Bắt Đầu: <i class="get-error-msg error-start-date"></i></span>
                    <input type="text" placeholder="" value="" class="input-field" name="input-start-date" id="input-start-date">
                </div>
                <div class="field">
                    <span class="span">Ngày Kết Thúc: <i class="get-error-msg error-end-date"></i></span>
                    <input type="text" placeholder="" value="" class="input-field" name="input-end-date" id="input-end-date">
                </div>
                <div class="field">
                    <span class="span">Giá Tiền: <i class="get-error-msg error-balance"></i></span>
                    <input type="text" placeholder="" value="" class="input-field" name="input-balance" id="input-balance">
                </div>
                <div class="field">
                    <span class="span">Hình Ảnh: <i class="get-error-msg error-thumbnail"></i></span>
                    <!-- <div style="width: 100%">
                        <input type="file" class="btn-file" id="input-thumbnail" name="input-thumbnail" value="">
                    </div> -->
                    <div class="file">
                        <div class="thumbnail">
                            <img alt="" title="" class="thumbnail-upload" id="thumbnail-upload">
                        </div>
                        <div class="content">
                            <div class="icon">
                                <i class='bx bxs-cloud-upload'></i>         
                            </div>
                            <div class="text">
                                Chưa có tệp nào được chọn !
                            </div> 
                        </div>
                        <div class="btn-cancel" id="btn-cancel"><i class="bx bx-x"></i></div>
                        <div class="file-name" id="file-name"></div>
                    </div>
                    <input type="file" class="btn-default" id="input-thumbnail" name="input-thumbnail" style="display: none">
                    <button onclick="defaultBtnActive()" id="btn-custom" class="btn-custom" type="button">Chọn tệp</button>
                </div>
                <div class="field">
                    <span class="span">Nội Dung: <i class="get-error-msg error-content"></i></span>
                    <textarea name="input-content" id="input-content" class="input-textarea"></textarea>
                </div>
                <div class="form-link">
                    <a href="<?php echo admin_url('admin.php?page=event') ?>"><i class='bx bx-left-arrow-alt'></i> Trở lại trang sự kiện</a>
                    <input type="submit" class="button-submit button-click-submit" name="create-event" value="Tạo Mới" style="cursor: pointer !important">
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript"> 
    const errorTitle = document.querySelector('.error-title');
    const errorAddress = document.querySelector('.error-address');
    const errorStartDate = document.querySelector('.error-start-date');
    const errorEndDate = document.querySelector('.error-end-date');
    const errorBalance = document.querySelector('.error-balance');
    const errorThumbnail = document.querySelector('.error-thumbnail');
    const errorContent = document.querySelector('.error-content');

    const valueTitle = document.getElementById('input-title');
    const valueAddress = document.getElementById('input-address');
    const valueStartDate = document.getElementById('input-start-date');
    const valueEndDate = document.getElementById('input-end-date');
    const valueBalance = document.getElementById('input-balance');
    const valueThumbnail = document.getElementById('input-thumbnail');
    const valueContent = document.getElementById('input-content');

    valueThumbnail.setAttribute('accept', '.jpg, .jpeg, .png');

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
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | outdent indent',
        file_picker_types: 'image',
        images_file_types: 'jpg,png,jpeg',
        automatic_uploads: true,
        image_title: true,
        paste_block_drop: false,
        paste_data_images: true,
        paste_as_text: true,
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
    });
</script>

<?php 
    if(isset($_POST['create-event'])) {
        $title = $_POST['input-title'];
        $address = $_POST['input-address'];
        $startDate = $_POST['input-start-date'];
        $endDate = $_POST['input-end-date'];
        $balance = $_POST['input-balance'];
        $error = array();

        $content = $_POST['input-content'];

        if(empty(trim($title))) {
            $error['title']['required'] = "*Không được để trống";
        } else {
            if(strlen(trim($title))<6 || strlen(trim($title))>24) {
                $error['title']['strlen'] = "*Phải từ 6 đến 24 ký tự";
            }
        }

        if(empty(trim($addrss))) {
            $error['address']['required'] = "*Địa chỉ không được để trống";
        } else {
            if(strlen(trim($address))<6 || strlen(trim($address))>50) {
                $error['address']['strlen'] = "*Phải từ 6 đến 50 ký tự";
            }
        }
        
        if($_FILES['input-thumbnail']['error'] === 4) {
            $error['thumbnail']['required'] = "*Không được để trống";
        } else {
            $fileName = $_FILES['input-thumbnail']['name'];
            $fileSize = $_FILES['input-thumbnail']['size'];
            $tmpName = $_FILES['input-thumbnail']['tmp_name'];
            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $imageExtension = explode('.', $fileName);
            $imageExtension = strtolower(end($imageExtension));

            if(!in_array($imageExtension, $validImageExtension)) {
                $error['thumbnail']['invalid'] = "*Hình ảnh không hợp lệ";
            }
            else if($fileSize > 1000000) {
                $error['thumbnail']['size'] = "*Kích thước hình ảnh quá lớn";
            }
        }



    }
?>