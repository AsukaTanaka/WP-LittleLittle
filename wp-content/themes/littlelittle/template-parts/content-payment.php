<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';
require 'phpqrcode/qrlib.php';

if(isset($_GET['b'])) {

    global $wpdb;
    $id = $_GET['b'];
    $error = array();

    $base64 = $_SESSION['base64'];

    if(empty($base64)) {
        ?>
        <script type="text/javascript">
            window.location = '<?php echo home_url() . '/home' ?>';
        </script>
        <?php
    }

    $table__name = $wpdb->prefix . 'ticket';
    $table__package = $wpdb->prefix . 'package';
    $table__bill = $wpdb->prefix . 'bill';

    $select = $wpdb->get_results("SELECT * FROM $table__name WHERE `base64` = '$id'");
    
    
    if(empty($select[0]->base64) || $select[0]->base64 != $id || $base64 != $id || $select[0]->status === false) {
        $error['base64']['check'] = "Không có kết quả !";
    } else {

    }

    $phpmailer = new PHPMailer();


?>

    <!-- Section Start -->
    <section class="site-section">
        <div class="bg-vector">
            <div class="container">
                <?php 
                
                if(!empty($error['base64']['check'])) {
                    ?>

                    <div class="row row-center row-without-lgt" >
                        <div class="col">
                            <div class="d-content">
                                <h4><?php echo $error['base64']['check'] ?></h4>
                            </div>
                        </div>
                    </div>

                    <?php
                } else {

                    $str = 'Gói';

                    $get_id_package = $select[0]->package_id;
                    $get_package = $wpdb->get_results("SELECT * FROM $table__package WHERE id = '$get_id_package'");
                    
                    $get_salary = $select[0]->amount * $get_package[0]->price;

                    ?>

                <div class="row row-center row-without-lgt" >
                    <div class="col">
                        <div class="d-content">
                            <h4>Thanh Toán</h4>
                        </div>
                    </div>
                </div>
                <div class="row row-content row-section row-section-payment">
                    <div class="col-12 col-md-12 col-active-dot col-section-01">
                        <div class="bg-skin get-height-bg">
                            <div class="content bg-solid-light get-position">
                                <div class="image-design image-10">
                                    <img src="<?php echo get_template_directory_uri() . '/templates/images/thumbnail/image-10.png' ?>" alt="" title="">
                                </div>
                                <div class="box-ticket">
                                    <div class="line-ticket">
                                        <h4>Vé Cổng - Vé <?php echo trim($get_package[0]->package, $str) ?></h4>
                                    </div>
                                </div>
                                <form class="form form-payment">
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="">Số tiền thanh toán</label>
                                            <input type="text" name="" id="" class="input-text" value="<?php echo number_format($get_salary, 0, '', '.') . ' VNĐ ' ?>" readonly>
                                            <input type="text" name="input-balance" id="balance" value="<?php echo $get_salary ?>" style="display: none">
                                        </div>
                                        <div class="col-4">
                                            <label for="">Số lượng vé</label>
                                            <div class="form-number">
                                                <input type="text" name="input-amount" id="amount" class="input-text" value="<?php echo $select[0]->amount ?>" readonly>
                                                <span class="span-ticket">Vé</span>
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <label for="">Ngày sử dụng</label>
                                            <input type="text" name="input-start-use" id="date" class="input-text" value="<?php echo $select[0]->start_use ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Thông tin liên hệ</label>
                                            <input type="text" name="input-fullname" id="fullname" class="input-text" value="<?php echo $select[0]->fullname ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <label for="">Điện thoại</label>
                                            <input type="text" name="input-phone" id="phone" class="input-text" value="<?php echo $select[0]->phone ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Email</label>
                                            <input type="text" name="input-email" id="email" class="input-text" value="<?php echo $select[0]->email ?>" readonly>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-active-dot col-section-02">
                        <div class="shape-dot"></div>
                    </div>
                    <div class="col-12 col-md-12 col-active-dot col-section-03">
                        <div class="bg-skin get-height-bg">
                            <div class="content bg-solid-light">
                                <div class="box-ticket">
                                    <div class="line-ticket">
                                        <h4>Thông Tin Thanh Toán</h4>
                                    </div>
                                </div>
                                <form action="" method="post" class="form form-payment" enctype="multipart/form-data" id="js-payment-03">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <label for="">Số thẻ</label>
                                            <input type="text" name="input-card" id="card" class="input-text" value="<?php echo (!empty($_POST['input-card'])) ? $_POST['input-card'] : false; ?>">
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <label for="">Họ và tên chủ thẻ</label>
                                            <input type="text" name="input-cardhold" id="cardhold" class="input-text" value="<?php echo (!empty($_POST['input-cardhold'])) ? $_POST['input-cardhold'] : false; ?>">
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <label for="">Ngày hết hạn</label>
                                            <div class="inline-form">
                                                <input type="text" name="input-expiry-date" id="js-datepick-month" class="input-text" readonly value="<?php echo (!empty($_POST['input-expiry-date'])) ? $_POST['input-expiry-date'] : false; ?>">
                                                <div class="date-box" id="js-month-year">
                                                    <div class="calendar-header">
                                                        <a class="cancel-button" id="js-cancel-button">Đóng</a>
                                                        <!-- <a class="set-button" id="js-set-button">Đặt</a> -->
                                                    </div>
                                                    <div class="calendar-body">
                                                        <i class="bx bx-chevron-left prev-year" id="js-prev-year"></i>
                                                        <h4 class="year-calendar" id="js-year-calendar"></h4>
                                                        <i class="bx bx-chevron-right next-year" id="js-next-year"></i>
                                                    </div>
                                                    <table class="table-calendar">
                                                        <tbody class="tbody item-month" id="js-item-month">
                                                            <tr>
                                                                <td id="T1">T1</td>
                                                                <td id="T2">T2</td>
                                                                <td id="T3">T3</td>
                                                            </tr>
                                                            <tr>
                                                                <td id="T4">T4</td>
                                                                <td id="T5">T5</td>
                                                                <td id="T6">T6</td>
                                                            </tr>
                                                            <tr>
                                                                <td id="T7">T7</td>
                                                                <td id="T8">T8</td>
                                                                <td id="T9">T9</td>
                                                            </tr>
                                                            <tr>
                                                                <td id="T10">T10</td>
                                                                <td id="T11">T11</td>
                                                                <td id="T12">T12</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <a class="button-date button-icon button-yellow" js="js-button-month-year">
                                                    <i class="bx bx-calendar"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <label for="">CVV/CVC</label>
                                            <input type="text" name="input-cvv-cvc" id="cvv-cvc" class="input-text" value="<?php echo (!empty($_POST['input-cvv-cvc'])) ? $_POST['input-cvv-cvc'] : false; ?>">
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="button-form">
                                                <button type="submit" class="button-red button-submit" name="create-payment">Thanh Toán</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                    <?php

                }

                ?>

            </div>
        </div>
    </section>
    <!-- Section End -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <?php 

    if(isset($_POST['create-payment'])) {
        $card_number = $_POST['input-card'];
        $cardholder_name = $_POST['input-cardhold'];
        $expiry_date = $_POST['input-expiry-date'];
        $cvv_cvc = $_POST['input-cvv-cvc'];
        $error_msg = array();

        if(empty(trim($card_number)) || empty(trim($cardholder_name)) || empty(trim($expiry_date)) || empty(trim($cvv_cvc))) {
            $error_msg['message']['required'] = 'Vui lòng điền đầy đủ thông tin!';
        } else {
            if(!preg_match('/^\+?[0-9]{3}$/', $cvv_cvc) || !preg_match('/^\+?[0-9]{16}$/', $card_number)) {
                $error_msg['message']['filter'] = 'Thông tin không hợp lệ, vui lòng kiểm tra lại!';
            }
        }




        if(empty($error_msg)) {

            $phpmailer->SMTPDebug = 0;
            $phpmailer->isSMTP();
            $phpmailer->Host = SMTP_HOST;
            $phpmailer->SMTPAuth = SMTP_AUTH;
            $phpmailer->Username = SMTP_USER;
            $phpmailer->Password = SMTP_PASS;
            $phpmailer->SMTPSecure = SMTP_SECURE;
            $phpmailer->Port = SMTP_PORT;
    
            $phpmailer->setFrom(SMTP_USER);
            $phpmailer->addAddress($select[0]->email);
            $phpmailer->isHTML(true);

            $phpmailer->setFrom(SMTP_USER);
            $phpmailer->addAddress($select[0]->email);
            $phpmailer->isHTML(true);
    
            // $qrcode = uniqid();
            // $qrcode_image = $qrcode.".png";
            // $folderPath = "qrcode/";
            // $qual = 'H';
            // $padding = 0;
            // $size = 6;
            
            // QRcode :: png($qrcode, $folderPath, $qrcode_image, $qual, $size, $padding);

            // ob_start();
            // include 'content-mail-success.php';
            // $body = ob_get_contents();
            // $body = str_replace('{get_email}', $select[0]->email, $body);
            // $body = str_replace('{get_email_url}', str_replace('@gmail.com', '', $select[0]->email), $body);
            // $body = str_replace('{get_qrcode}', $qrcode_image, $body);

            // $phpmailer->Body = $body;
            // ob_get_clean();


    
            // $target_path = ABSPATH . $folderPath . "/" . $qrcode_image;

            // if($phpmailer->send()) {
                
            //     // $_SESSION['email'] =  $select[0]->email;

            //     $wpdb->insert($table__bill, array(
            //         'qrcode' => $qrcode_image,
            //         'start_date' => $select[0]->start_use,
            //         'ticket_id' => $select[0]->id
            //     ));

            //     $wpdb->update(
            //         $table__name,
            //         array(
            //             'status' => true,
            //         ),
            //         array('id' => $select[0]->id)
            //     );

            // }

            ?>
            <!-- <script type="text/javascript">
                Swal.fire({
                    html:
                        '<div class="alert-message-contact success-contact">' +
                        '<p class="sa2-text">Thanh toán thành công</p>' +
                        '<p class="sa2-text">Vui lòng kiểm tra email của bạn!</p>' + '</div>',
                    showCloseButton: true,
                    showCancelButton: false,
                    showConfirmButton: false,
                    focusConfirm: false,
                }).then((result) => { 
                    window.location = '<?php //echo home_url() . '/home' ?>';
                }); 
            </script> -->
            <?php
            

        } else {
            ?>
            <script type="text/javascript">
            Swal.fire({
                html:
                    '<div class="alert-error-contact">' +
                    '<img src="<?php echo get_template_directory_uri() . "/templates/images/icon/error.png" ?>" alt="">' + '</div>' +
                    '<div class="alert-message-contact">' +
                    '<p class="sa2-text"><?php echo (!empty($error_msg['message']['required'])) ? $error_msg['message']['required'] : false; echo (!empty($error_msg['message']['filter'])) ? $error_msg['message']['filter'] : false; ?></p>'
                    + '</div>',
                showCancelButton: false,
                showConfirmButton: false,
                focusConfirm: false,
            }).then((result) => { 
                /* return */
            });


            </script>
            <?php
        }
     

    }

} else {

    ?>
    <script type="text/javascript">
        window.location = '<?php echo home_url() . '/home' ?>';
    </script>
    <?php

}