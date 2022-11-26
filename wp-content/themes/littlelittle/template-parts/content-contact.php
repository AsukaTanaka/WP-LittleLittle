<!-- Section Start -->
    <section class="site-section">
        <div class="bg-vector">
            <div class="container">
                <div class="row row-center row-without-lgt">
                    <div class="col">
                        <div class="d-content">
                            <h4>Liên Hệ</h4>
                        </div>
                    </div>
                </div>
                <div class="row row-content row-section row-section-contact">
                    <div class="col-12 col-md-12 col-remove-dot col-section-01">

                    </div>
                    <div class="col-12 col-md-12 col-remove-dot col-section-02">
                        <div class="bg-skin get-height-bg">
                            <div class="content bg-solid-light get-position">
                                <div class="image-design image-09">
                                    <img src="<?php echo get_template_directory_uri() . '/templates/images/thumbnail/image-09.png' ?>" alt="" title="">
                                </div>
                                <div class="content-details">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ac mollis justo. Etiam volutpat tellus quis risus volutpat, ut posuere ex facilisis.</p>
                                </div>
                                <form action="" method="post" class="form form-contact" enctype="multipart/form-data" id="js-form-contact">
                                    <div class="row">
                                        <div class="col-12 col-md-12">
                                            <div class="inline-form">
                                                <input type="text" name="input-name" id="input-name" class="input-text input-60" value="">
                                                <input type="text" name="input-email" id="input-email" class="input-text" value="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="inline-form">
                                                <input type="text" name="input-phone" id="input-phone" class="input-text input-60" value="">
                                                <input type="text" name="input-address" id="input-address" class="input-text" value="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <textarea name="input-comment" id="input-comment" class="input-text input-textarea"></textarea>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="button-form">
                                                <button type="submit" class="button-red button-submit" value="send-contact" name="send-contact">Gửi Liên Hệ</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-remove-dot col-section-03">
                        <div class="get-height-bg">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-lg-12 pb-4">
                                    <div class="bg-skin">
                                        <div class="content bg-solid-light">
                                            <div class="inline-with-lgt">
                                                <img src="<?php echo get_template_directory_uri() . '/templates/images/icon/maker.png' ?>" alt="" title="">
                                                <div class="info-contact">
                                                    <h4>Địa chỉ:</h4>
                                                    <p>86/33 Âu Cơ, Phường 9, Quận Tân Bình, TP. Hồ Chí Minh</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-12 pb-4">
                                    <div class="bg-skin">
                                        <div class="content bg-solid-light">
                                            <div class="inline-with-lgt">
                                                <img src="<?php echo get_template_directory_uri() . '/templates/images/icon/email.png' ?>" alt="" title="">
                                                <div class="info-contact">
                                                    <h4>Email:</h4>
                                                    <p>investigate@your-site.com</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-12 pb-right-contact">
                                    <div class="bg-skin">
                                        <div class="content bg-solid-light">
                                            <div class="inline-with-lgt">
                                                <img src="<?php echo get_template_directory_uri() . '/templates/images/icon/phone.png' ?>" alt="" title="">
                                                <div class="info-contact">
                                                    <h4>Điện thoại</h4>
                                                    <p>+84 145 689 798</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Section End -->

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script type="text/javascript">
    const valueName = document.getElementById('input-name');
    const valueEmail = document.getElementById('input-email');
    const valuePhone = document.getElementById('input-phone');
    const valueAddress = document.getElementById('input-address');
    const valueComment = document.getElementById('input-comment');
</script>
<?php 

global $wpdb;
$table__name = $wpdb->prefix . 'contact';

if (isset($_POST["send-contact"])) {

    $name = $_POST["input-name"];
    $email = $_POST["input-email"];
    $phone = $_POST["input-phone"];
    $address = $_POST["input-address"];
    $comment = $_POST["input-comment"];
    $status = false;
    $error = array();
    date_default_timezone_set('Asia/Ho_Chi_Minh');

    if (empty(trim($name)) || empty(trim($email)) || empty(trim($phone)) || empty(trim($address)) || empty(trim($comment))) {
        $error['message']['required'] = 'Vui lòng điền đầy đủ thông tin!';
    } else {
        if (!filter_var(trim($email), FILTER_VALIDATE_EMAIL) || !preg_match('/^\+?[0-9]{10}$/', $phone)) {
            $error['message']['filter'] = 'Thông tin không hợp lệ, vui lòng kiểm tra lại!';
        }
    }

    if (empty($error)) {
        $wpdb->insert($table__name, array(
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'address' => $address,
            'comment' => $comment,
            'status' => $status,
            'create_at' => date('j/n/Y - g:i a')
        ));
        
    ?>
        <script type="text/javascript">
            Swal.fire({
                html:
                    '<div class="alert-message-contact success-contact">' +
                    '<p class="sa2-text">Gửi liên hệ thành công</p>' +
                    '<p class="sa2-text">Vui lòng kiên nhẫn đợi phản hồi từ chúng tôi, bạn nhé!</p>' + '</div>',
                showCloseButton: true,
                showCancelButton: false,
                showConfirmButton: false,
                focusConfirm: false,
            }).then((result) => { 

                valueName.value = '';
                valueEmail.value = '';
                valueAddress.value = '';
                valuePhone.value = '';
                valueComment.innerHTML = '';
                window.location = '<?php echo home_url() . '/contact' ?>';
            }); 
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
                    '<p class="sa2-text"><?php echo (!empty($error['message']['required'])) ? $error['message']['required'] : false; echo (!empty($error['message']['filter'])) ? $error['message']['filter'] : false; ?></p>'
                    + '</div>',
                showCancelButton: false,
                showConfirmButton: false,
                focusConfirm: false,
            }).then((result) => { 
                /* return */
            });    
            /* get value without return sweetalert */
            valueName.value = '<?php echo (!empty($_POST['input-name'])) ? $_POST['input-name'] : false; ?>';
            valueEmail.value = '<?php echo (!empty($_POST['input-email'])) ? $_POST['input-email'] : false; ?>';
            valueAddress.value = '<?php echo (!empty($_POST['input-address'])) ? $_POST['input-address'] : false;  ?>';
            valuePhone.value = '<?php echo (!empty($_POST['input-phone'])) ? $_POST['input-phone'] : false; ?>';
            valueComment.innerHTML = '<?php echo (!empty($_POST['input-comment'])) ? $_POST['input-comment'] : false; ?>';
        </script>
    
    <?php 
    }
} else {

}
?>