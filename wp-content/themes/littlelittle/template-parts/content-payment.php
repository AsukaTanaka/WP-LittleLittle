<?php 

if(isset($_GET['b'])) {
    global $wpdb;
    $id = $_GET['b'];
    $error = array();

    $base64 = $_SESSION['base64'];

    $table__name = $wpdb->prefix . 'ticket';
    $table__package = $wpdb->prefix . 'package';

    $select = $wpdb->get_results("SELECT * FROM $table__name WHERE `base64` = '$id'");
    
    
    if(empty($select[0]->base64) || $select[0]->base64 != $id || $base64 != $id) {
        $error['base64']['check'] = "Lỗi 404 !";
    } else {

     

    }

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
                                            <input type="text" name="input-card" id="card" class="input-text">
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <label for="">Họ và tên chủ thẻ</label>
                                            <input type="text" name="input-cardhold" id="cardhold" class="input-text">
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <label for="">Ngày hết hạn</label>
                                            <div class="inline-form">
                                                <input type="text" name="input-expiry-date" id="js-datepick-month" class="input-text" readonly>
                                                <div class="date-box" id="js-month-year">
                                                    <div class="calendar-header">
                                                        <a class="cancel-button" id="js-cancel-button">Huỷ</a>
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
                                            <input type="text" name="input-cvv-cvc" id="cvv-cvc" class="input-text">
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
    <?php 

    if(isset($_POST['create-payment'])) {
        $card_number = $_POST['input-card'];
        $cardholder_name = $_POST['input-cardhold'];
        $expiry_date = $_POST['input-expiry-date'];
        $cvv_cvc = $_POST['input-cvv-cvc'];



    }

} else {
    ?>
    <script type="text/javascript">
        window.location = '<?php echo home_url() . '/home' ?>';
    </script>
    <?php

}