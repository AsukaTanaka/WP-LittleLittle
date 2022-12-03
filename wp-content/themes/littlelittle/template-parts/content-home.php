<?php 

global $wpdb;
$table__package = $wpdb->prefix . 'package';
$table__ticket = $wpdb->prefix . 'ticket';
$error__package = array();

$select = $wpdb->get_results("SELECT * FROM $table__package");

if(empty($select)) {
    $error__package['package']['empty'] = 'Không Tìm Thấy Kết Quả !';
}

?>

    <!-- Section Start -->
    <section class="site-section">
        <div class="bg-vector">
            <div class="container">
                <div class="row row-block row-lgt">
                    <div class="col">
                        <div class="d-content">
                            <img src="<?php echo get_template_directory_uri() . '/templates/images/icon/park.png" alt="" ' ?>title="">
                            <h4>Đầm Sen Park</h4>
                        </div>
                    </div>
                </div>
                <div class="row row-content row-section row-section-index">
                    <div class="col-12 col-md-12">
                        <div class="get-position">
                            <div class="image-design image-02">
                                <img src="<?php echo get_template_directory_uri() . '/templates/images/thumbnail/image-02.png' ?>" alt="" title="">
                            </div>
                            <div class="image-design image-03">
                                <img src="<?php echo get_template_directory_uri() . '/templates/images/thumbnail/image-03.png' ?>" alt="" title="">
                            </div>
                            <div class="image-design image-04">
                                <img src="<?php echo get_template_directory_uri() . '/templates/images/thumbnail/image-04.png' ?>" alt="" title="">
                            </div>
                            <div class="image-design image-05">
                                <img src="<?php echo get_template_directory_uri() . '/templates/images/thumbnail/image-05.png' ?>" alt="" title="">
                            </div>
                            <div class="image-design image-07">
                                <img src="<?php echo get_template_directory_uri() . '/templates/images/thumbnail/image-07.png' ?>" alt="" title="">
                            </div>
                            <div class="image-design image-08">
                                <img src="<?php echo get_template_directory_uri() . '/templates/images/thumbnail/image-08.png' ?>" alt="" title="">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-active-dot col-section-01">
                        <div class="bg-skin get-height-bg">
                            <div class="content bg-solid-light get-position">
                                <div class="image-design image-01">
                                    <img src="<?php echo get_template_directory_uri() . '/templates/images/thumbnail/image-01.png' ?>" alt="" title="">
                                </div>
                                <div class="content-details">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ac mollis justo. Etiam volutpat tellus quis risus volutpat, ut posuere ex facilisis.</p>
                                    <p>Suspendisse iaculis libero lobortis condimentum gravida. Aenean auctor iaculis risus, lobortis molestie lectus consequat a.</p>
                                    <ul class="ul-list">
                                        <li>
                                            <span><i class="bx bxs-star"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                        </li>
                                        <li>
                                            <span><i class="bx bxs-star"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                        </li>
                                        <li>
                                            <span><i class="bx bxs-star"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                        </li>
                                        <li>
                                            <span><i class="bx bxs-star"></i> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-active-dot col-section-02">
                        <div class="shape-dot"></div>
                    </div>
                    <div class="col-12 col-md-12 col-active-dot col-section-03">
                        <div class="get-position">
                            <div class="image-design image-06">
                                <img src="<?php echo get_template_directory_uri() . '/templates/images/thumbnail/image-06.png' ?>" alt="" title="">
                            </div>
                        </div>
                        <div class="bg-skin get-height-bg">
                            <div class="content bg-solid-light">
                                <div class="box-ticket">
                                    <div class="line-ticket">
                                        <h4>Vé Của Bạn</h4>
                                    </div>
                                </div>
                                <form action="" method="post" class="form form-index" enctype="multipart/form-data" id="js-form-index">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="inline-form">
                                                <div class="select-box">
                                                    <input type="text" name="input-package" id="package" class="input-text" value="<?php echo (!empty($_POST['input-package'])) ? $_POST['input-package'] : false; ?>">
                                                    <?php 
                                                        if(!empty($error__package['package']['empty'])) {
                                                            ?>
                                                                <div class="options-container">
                                                                    <!-- <div class="option">
                                                                        <input type="radio" name="" id="" class="input-radio">
                                                                        <label for=""></label>
                                                                    </div> -->
                                                                    <div class="option-error">
                                                                        <?php echo $error__package['package']['empty']; ?>
                                                                    </div>
                                                                </div>
                                                            <?php
                                                        } else {
                                                            ?>
                                                                <div class="options-container">
                                                            <?php
                                                            foreach ($select as $row) {
                                                                ?>
                                                                    <div class="option">
                                                                        <input type="radio" name="package" value="<?php echo $row->id ?>" class="input-radio">
                                                                        <label for=""><?php echo $row->package ?></label>
                                                                    </div>
                                                                <?php
                                                            }
                                                            ?>
                                                                </div>
                                                            <?php
                                                        }
                                                    ?>
                                                </div>
                                                <a class="button-select button-icon button-yellow" id="js-select-package">
                                                    <i class="bx bxs-down-arrow"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="inline-form">
                                                <div class="date-box">
                                                    <input type="text" name="input-amount" id="amount" class="input-text input-number input-60" value="<?php echo (!empty($_POST['input-amount'])) ? $_POST['input-amount'] : false; ?>">
                                                    <div class="form-date">
                                                        <input type="text" name="input-date" id="js-datepick" class="input-text" value="<?php echo (!empty($_POST['input-date'])) ? $_POST['input-date'] : false; ?>">
                                                        <div class="bg-datepick" id="js-calendar">
                                                            <div class="calendar-header">
                                                                <i class="bx bx-chevron-left prev-month" id="js-prev-month"></i>
                                                                <h4 class="month-calendar" id="js-month-calendar"></h4>
                                                                <i class="bx bx-chevron-right next-month" id="js-next-month"></i>
                                                            </div>
                                                            <table class="table-calendar">
                                                                <thead class="thead">
                                                                    <tr>
                                                                        <th>CN</th>
                                                                        <th>T2</th>
                                                                        <th>T3</th>
                                                                        <th>T4</th>
                                                                        <th>T5</th>
                                                                        <th>T6</th>
                                                                        <th>T7</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody class="tbody item-calendar" id="js-item-calendar"></tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="button-date button-icon button-yellow" id="js-date">
                                                    <i class="bx bx-calendar"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <input type="text" name="input-fullname" id="fullname" class="input-text" value="<?php echo (!empty($_POST['input-fullname'])) ? $_POST['input-fullname'] : false; ?>">
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <input type="text" name="input-phone" id="phone" class="input-text" value="<?php echo (!empty($_POST['input-phone'])) ? $_POST['input-phone'] : false; ?>">
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <input type="text" name="input-email" id="email" class="input-text" value="<?php echo (!empty($_POST['input-email'])) ? $_POST['input-email'] : false; ?>">
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="button-form">
                                                <button type="submit" class="button-red button-submit" name="create-ticket">Đặt Vé</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section End -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php 
    if(isset($_POST['create-ticket'])) {
        $package = $_POST['input-package'];
        $amount = $_POST['input-amount'];
        $date = $_POST['input-date'];
        $fullname = $_POST['input-fullname'];
        $phone = $_POST['input-phone'];
        $email = $_POST['input-email'];
        $status = false;

        $currentDate = date("d/m/Y");

        $error = array();
        date_default_timezone_set('Asia/Ho_Chi_Minh');

       
        
        $create_url = uniqid();

        $base64 = base64_encode($create_url);

        if(empty(trim($amount)) || empty(trim($date)) || empty(trim($fullname)) || empty(trim($phone)) || empty(trim($email))) {
            $error['message']['required'] = 'Vui lòng điền đầy đủ thông tin!';
        } else {
            if(empty($select) || empty(trim($package))) {
                $error['message']['package'] = 'Chưa có loại gói, không thể tạo vé!';
            } else if(!filter_var(trim($email), FILTER_VALIDATE_EMAIL) || !preg_match('/^\+?[0-9]{10}$/', $phone) || !is_numeric($amount)) {
                $error['message']['filter'] = 'Thông tin không hợp lệ, vui lòng kiểm tra lại!';
            } else if (filter_var($amount, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1))) === false) {
                $error['message']['amount'] = 'Số lượng phải từ 1 trở lên!';
            // } else if($date < $currentDate) {
            //     $error['message']['datetime'] = 'Ngày sử dụng phải từ hôm nay trở đi!';
            }
        }

        if(empty($error)) {
            $get_id_package =  $wpdb->get_results("SELECT * FROM $table__package WHERE `package` = '$package'");
            $package_id = $get_id_package[0]->id;
            
            $wpdb->insert($table__ticket, array(
                'fullname' => $fullname,
                'phone' => $phone,
                'email' => $email,
                'amount' => $amount,
                'start_use' => $date,
                'create_at' => date('j/n/Y - g:i a'),
                'status' => $status,
                'base64' =>  $base64,
                'package_id' => $package_id,
            ));
            ?>
            
            <script type="text/javascript">
                window.location = '<?php echo home_url() . '/payment?b=' . $base64 ?>';
            </script>

            <?php
        } else {
            ?>
            <script type="text/javascript">
            Swal.fire({
                html:
                    '<div class="alert-error-contact">' +
                    '<img src="<?php echo get_template_directory_uri() . "/templates/images/icon/error.png" ?>" alt="">' + '</div>' +
                    '<div class="alert-message-contact">' +
                    '<p class="sa2-text"><?php echo (!empty($error['message']['required'])) ? $error['message']['required'] : false; echo (!empty($error['message']['package'])) ? $error['message']['package'] : false; echo (!empty($error['message']['filter'])) ? $error['message']['filter'] : false; echo (!empty($error['message']['amount'])) ? $error['message']['amount'] : false; echo (!empty($error['message']['datetime'])) ? $error['message']['datetime'] : false; ?></p>'
                    + '</div>',
                showCancelButton: false,
                showConfirmButton: false,
                focusConfirm: false,
            }).then((result) => { 
                /* return */
            });    
            /* get value without return sweetalert */
    
        </script>
            <?php
        }
       
    }

   
?>

