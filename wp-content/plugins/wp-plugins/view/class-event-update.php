<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    global $wpdb;

    $table__name = $wpdb->prefix . 'event';

    $select = $wpdb->get_results("SELECT * FROM $table__name WHERE id = '$id'");

?>

    <div class="wrap">
        <div class="container">
            <div class="form-design form-event">
                <div class="header">
                    <h2>Cập Nhật Mã Số <?php echo $select[0]->id ?></h2>
                </div>
                <form action="" method="post" class="form-event-create" enctype="multipart/form-data" id="plugin-form-event">
                    <div class="field">
                        <span class="span">Tựa Đề: <i class="get-error-msg error-title"></i></span>
                        <input type="text" placeholder="" value="<?php echo $select[0]->title ?>" class="input-field" name="input-title" id="input-title">
                    </div>
                    <div class="field">
                        <span class="span">Địa Chỉ: <i class="get-error-msg error-address"></i></span>
                        <input type="text" placeholder="" value="<?php echo $select[0]->address ?>" class="input-field" name="input-address" id="input-address">
                    </div>
                    <div class="field">
                        <span class="span">Ngày Bắt Đầu: <i class="get-error-msg error-start-date"></i></span>
                        <input type="text" placeholder="" value="<?php echo $select[0]->start_date ?>" class="input-field" name="input-start-date" id="input-start-date" readonly="true">
                    </div>
                    <div class="field">
                        <span class="span">Ngày Kết Thúc: <i class="get-error-msg error-end-date"></i></span>
                        <input type="text" placeholder="" value="<?php echo $select[0]->end_date ?>" class="input-field" name="input-end-date" id="input-end-date" readonly="true">
                    </div>
                    <div class="field">
                        <span class="span">Giá Tiền: <i class="get-error-msg error-balance"></i></span>
                        <input type="text" placeholder="" value="<?php echo $select[0]->balance ?>" class="input-field" name="input-balance" id="input-balance">
                    </div>
                    <div class="field">
                        <span class="span">Hình Ảnh: <i class="get-error-msg error-thumbnail"></i></span>
                        <!-- <div style="width: 100%">
                        <input type="file" class="btn-file" id="input-thumbnail" name="input-thumbnail" value="">
                    </div> -->
                        <div class="file">
                            <div class="thumbnail">
                                <img src="../wp-uploads/files/thumbnail/<?php echo $select[0]->thumbnail ?>" alt="" title="" class="thumbnail-upload" id="thumbnail-upload">
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
                        <input type="file" class="btn-default" id="input-thumbnail" name="input-thumbnail" style="display: none" value="<?php echo $select[0]->thumbnail ?>">
                        <button onclick="defaultBtnActive()" id="btn-custom" class="btn-custom" type="button">Chọn tệp</button>
                    </div>
                    <div class="field">
                        <span class="span">Nội Dung: <i class="get-error-msg error-content"></i></span>
                        <textarea name="input-content" id="input-content" class="input-textarea" value=""><?php echo (!empty($_POST['input-content'])) ? stripslashes($_POST['input-content']) : $select[0]->content; ?></textarea>
                    </div>
                    <textarea name="get-content" id="get-content" style="display: none"></textarea>
                    <input id="get-array-picture" type="file" name="get-array-picture" style="display: none">
                    <div class="form-link">
                        <a href="<?php echo admin_url('admin.php?page=event') ?>"><i class='bx bx-left-arrow-alt'></i> Trở lại trang sự kiện</a>
                        <input type="submit" class="button-submit button-click-submit" name="update-event" value="Cập Nhật" style="cursor: pointer !important">
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
    </script>
    <?php
    if (isset($_POST['update-event'])) {
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

        // if ($_FILES['input-thumbnail']['error'] === 4) {
        //     $error['thumbnail']['required'] = "*Không được để trống";
        // } else {
        //     $fileName = $_FILES['input-thumbnail']['name'];
        //     $fileSize = $_FILES['input-thumbnail']['size'];
        //     $tmpName = $_FILES['input-thumbnail']['tmp_name'];
        //     $validImageExtension = ['jpg', 'jpeg', 'png'];
        //     $imageExtension = explode('.', $fileName);
        //     $imageExtension = strtolower(end($imageExtension));
        //     if (!in_array($imageExtension, $validImageExtension)) {
        //         $error['thumbnail']['invalid'] = "*Hình ảnh không hợp lệ";
        //     } else if ($fileSize > 1000000) {
        //         $error['thumbnail']['size'] = "*Kích thước hình ảnh quá lớn";
        //     }
        // }


        if (empty(trim(strip_tags($content))) || empty(trim($content))) {
            $error['content']['required'] = "*Không được để trống";
        } else {
            if (strlen(trim(strip_tags($content))) < 50 || strlen(trim(strip_tags($content))) > 2000) {
                $error['content']['strlen'] = "*Phải từ 50 đến 2000 ký tự";
            }
        }

        if (empty($error)) {
            // $newImageName = uniqid();
            // $newImageName .= '.' . $imageExtension;

            // $folderPath = "/wp-uploads/files/thumbnail/";

            // // mkdir(ABSPATH . $folderPath, 0777, true);
            // $target_path = ABSPATH . $folderPath . "/" . $newImageName;


            // chmod("{$target_path}", 0777);
            // if (move_uploaded_file($tmpName, $target_path)) {
                
            // }
            $wpdb->update(
                $table__name,
                array(
                    'title' => $title,
                    'address' => $address,
                    'start_date' => $startDate,
                    'end_date' => $endDate,
                    'balance' => $balance,
                    'thumbnail' => $select[0]->thumbnail,
                    'content' => stripslashes($newContent),
                ),
                array('id' => $id)
            );

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

                // errorThumbnail.innerHTML =
                //     '<?php
                //         echo (!empty($error['thumbnail']['required'])) ? $error['thumbnail']['required'] : false;
                //         echo (!empty($error['thumbnail']['invalid'])) ? $error['thumbnail']['invalid'] : false;
                //         echo (!empty($error['thumbnail']['size'])) ? $error['thumbnail']['size'] : false;
                //         ?>';

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
}
?>