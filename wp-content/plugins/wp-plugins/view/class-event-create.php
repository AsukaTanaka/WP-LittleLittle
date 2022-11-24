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
                    <input type="text" placeholder="" value="" class="input-field" name="input-start-date" id="input-start-date" readonly="true">
                </div>
                <div class="field">
                    <span class="span">Ngày Kết Thúc: <i class="get-error-msg error-end-date"></i></span>
                    <input type="text" placeholder="" value="" class="input-field" name="input-end-date" id="input-end-date" readonly="true">
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
                    <textarea name="input-content" id="input-content" class="input-textarea"><?php echo (!empty($_POST['input-content'])) ? stripslashes($_POST['input-content']) : false; ?></textarea>
                </div>
                <textarea name="get-content" id="get-content" style="display: none"></textarea>
                <input id="get-array-picture" type="file" name="get-array-picture" style="display: none">
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

    const getValueThumbnail = document.querySelector('.thumbnail-upload');

    valueThumbnail.setAttribute('accept', '.jpg, .jpeg, .png');

    tinymce.init({
        selector: "textarea.input-textarea",
        width: "100%",
        statubar: true,
        menubar: true,
        element_format: 'html',
        block_unsupported_drop: false,
        language: 'vi',
        menubar: 'view | insert | format | tools',
        plugins: [
            'advlist', 'autolink', 'link', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'insertdatetime',
            'media', 'table', 'emoticons', 'template', 'image', 'code',
        ],
        toolbar: 'undo redo | styles | bold italic underline | alignleft aligncenter alignright alignjustify | outdent indent | link code image',
        file_picker_types: 'image',
        image_advtab: true,
        images_file_types: 'jpg,png,jpeg',
        automatic_uploads: true,
        image_title: true,
        paste_block_drop: false,
        paste_data_images: true,
        paste_as_text: true,
        cleanup: true,
        allow_html_in_named_anchor: true,
        autosave_restore_when_empty: true,
        entity_encoding : 'raw',
        formats: {
            bold: {
                inline: 'b'
            },
            italic: {
                inline: 'i'
            },
            underline: {
                inline: 'u'
            },
            div: {
                block: 'div',
                classes: 'col-ish',
                wrapper: true
            },
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

        file_picker_callback: (callback, value, meta) => {
            // if (meta.filetype == 'image') {
            //     var input = document.getElementById('get-array-picture');
            //     input.click();

            //     input.onchange = function() {
            //         var file = this.files[0];
            //         if(file) {

            //             // };
            //             var reader = new FileReader();
            //             reader.onload = function (e) {
            //                 callback(e.target.result, {
            //                     // alt: file.name,
            //                     title: file.name,
            //                 });
            //             };
            //             reader.readAsDataURL(file);
            //         }
            //         // if(input.value) {
            //         //     let valueStore = input.value.match(regExp);
            //         //     input.setAttribute('value', valueStore);
            //         // }

            //     };
            // }
            var input = document.getElementById('get-array-picture');
            // input.setAttribute('type', 'file');
            // input.setAttribute('accept', '.jpg, .jpeg, .png');

            input.onchange = function() {
                var file = this.files[0];

                var reader = new FileReader();
                reader.readAsDataURL(file);
                reader.onload = function() {
                    // Note: Now we need to register the blob in TinyMCEs image blob
                    // registry. In the next release this part hopefully won't be
                    // necessary, as we are looking to handle it internally.
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache = tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);

                    // call the callback and populate the Title field with the file name
                    callback(blobInfo.blobUri(), {
                        title: file.name
                    });
                };
            };
            input.click();
        }

    });
    
</script>
<?php

if (isset($_POST['create-event'])) {
    $title = $_POST['input-title'];
    $address = $_POST['input-address'];
    $startDate = $_POST['input-start-date'];
    $endDate = $_POST['input-end-date'];
    $balance = $_POST['input-balance'];
    $get_min = 10000;
    $get_max = 5000000;
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    $error = array();

    $content = $_POST['input-content'];
    $newContent = $_POST['get-content'];

    if (empty(trim($title))) {
        $error['title']['required'] = "*Không được để trống";
    } else {
        if (strlen(trim($title)) < 6 || strlen(trim($title)) > 24) {
            $error['title']['strlen'] = "*Phải từ 6 đến 24 ký tự";
        }
    }

    if (empty(trim($address))) {
        $error['address']['required'] = "*Không được để trống";
    } else {
        if (strlen(trim($address)) < 6 || strlen(trim($address)) > 50) {
            $error['address']['strlen'] = "*Phải từ 6 đến 50 ký tự";
        }
    }

    if (empty(trim($startDate))) {
        $error['start-date']['required'] = "*Không được để trống";
    } else {
    }

    if (empty(trim($endDate))) {
        $error['end-date']['required'] = "*Không được để trống";
    } else {
    }

    if (empty(trim($balance))) {
        $error['balance']['required'] = "*Không được để trống";
    } else {
        if (!is_numeric($balance)) {
            $error['balance']['numeric'] = '*Chỉ nhận giá trị số';
        } else if (filter_var($balance, FILTER_VALIDATE_INT, array("options" => array("min_range" => $get_min, "max_range" => $get_max))) === false) {
            $error['balance']['filter'] = '*Chỉ nhận từ 10.000 đến 5.000.000 (vnđ)';
        }
    }

    if ($_FILES['input-thumbnail']['error'] === 4) {
        $error['thumbnail']['required'] = "*Không được để trống";
    } else {
        $fileName = $_FILES['input-thumbnail']['name'];
        $fileSize = $_FILES['input-thumbnail']['size'];
        $tmpName = $_FILES['input-thumbnail']['tmp_name'];
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)) {
            $error['thumbnail']['invalid'] = "*Hình ảnh không hợp lệ";
        } else if ($fileSize > 1000000) {
            $error['thumbnail']['size'] = "*Kích thước hình ảnh quá lớn";
        }
    }


    if (empty(trim(strip_tags($content))) || empty(trim($content))) {
        $error['content']['required'] = "*Không được để trống";
    } else {
        if (strlen(trim(strip_tags($content))) < 50 || strlen(trim(strip_tags($content))) > 2000) {
            $error['content']['strlen'] = "*Phải từ 50 đến 2000 ký tự";
        }
    }

    if (empty($error)) {
        $newImageName = uniqid();
        $newImageName .= '.' . $imageExtension;

        $folderPath = "/wp-uploads/files/thumbnail/";

        // mkdir(ABSPATH . $folderPath, 0777, true);
        $target_path = ABSPATH . $folderPath . "/" . $newImageName;


        // chmod("{$target_path}", 0777);
        if (move_uploaded_file($tmpName, $target_path)) {
            $wpdb->insert($table__name, array(
                'title' => $title,
                'address' => $address,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'balance' => $balance,
                'thumbnail' => $newImageName,
                'content' => stripslashes($newContent),
                'create_at' => date('j/n/Y - g:i a')
            ));
        }


    ?>

        <script type="text/javascript">
            window.location = '<?php echo get_site_url() . '/wp-admin/admin.php?page=event'; ?>';
        </script>

    <?php
    } else {
    ?>

        <script type="text/javascript">
            errorTitle.innerHTML =
                '<?php
                    echo (!empty($error['title']['required'])) ? $error['title']['required'] : false;
                    echo (!empty($error['title']['strlen'])) ? $error['title']['strlen'] : false;
                    ?>';

            errorAddress.innerHTML =
                '<?php
                    echo (!empty($error['address']['required'])) ? $error['address']['required'] : false;
                    echo (!empty($error['address']['strlen'])) ? $error['address']['strlen'] : false;
                    ?>';

            errorStartDate.innerHTML =
                '<?php
                    echo (!empty($error['start-date']['required'])) ? $error['start-date']['required'] : false;
                    ?>';

            errorEndDate.innerHTML =
                '<?php
                    echo (!empty($error['end-date']['required'])) ? $error['end-date']['required'] : false;
                    ?>';

            errorBalance.innerHTML =
                '<?php
                    echo (!empty($error['balance']['required'])) ? $error['balance']['required'] : false;
                    echo (!empty($error['balance']['numeric'])) ? $error['balance']['numeric'] : false;
                    echo (!empty($error['balance']['filter'])) ? $error['balance']['filter'] : false;
                    ?>';

            errorThumbnail.innerHTML =
                '<?php
                    echo (!empty($error['thumbnail']['required'])) ? $error['thumbnail']['required'] : false;
                    echo (!empty($error['thumbnail']['invalid'])) ? $error['thumbnail']['invalid'] : false;
                    echo (!empty($error['thumbnail']['size'])) ? $error['thumbnail']['size'] : false;
                    ?>';

            errorContent.innerHTML =
                '<?php
                    echo (!empty($error['content']['required'])) ? $error['content']['required'] : false;
                    echo (!empty($error['content']['strlen'])) ? $error['content']['strlen'] : false;

                    ?>';

            valueTitle.value = '<?php echo (!empty($_POST['input-title'])) ? $_POST['input-title'] : false; ?>';
            valueAddress.value = '<?php echo (!empty($_POST['input-address'])) ? $_POST['input-address'] : false; ?>';
            valueStartDate.value = '<?php echo (!empty($_POST['input-start-date'])) ? $_POST['input-start-date'] : false; ?>';
            valueEndDate.value = '<?php echo (!empty($_POST['input-end-date'])) ? $_POST['input-end-date'] : false; ?>';
            valueBalance.value = '<?php echo (!empty($_POST['input-balance'])) ? $_POST['input-balance'] : false; ?>';
            // valueContent.innerHTML = '<?php //echo (!empty($_POST['input-content'])) ? stripslashes($_POST['input-content']) : false; ?>';
        </script>

<?php
    }
}
?>