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
                                                <input type="text" name="name" id="name" class="input-text input-60" value="">
                                                <input type="text" name="email" id="email" class="input-text" value="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="inline-form">
                                                <input type="text" name="phone" id="phone" class="input-text input-60" value="">
                                                <input type="text" name="address" id="address" class="input-text" value="">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <textarea name="comment" id="comment" class="input-text input-textarea"></textarea>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="button-form">
                                                <button class="button-red button-submit" value="send-contact" name="send-contact">Gửi Liên Hệ</button>
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
        const valueName = document.getElementById('name');
        const valueEmail = document.getElementById('email');
        const valuePhone = document.getElementById('phone');
        const valueAddress = document.getElementById('address');
        const valueComment = document.getElementById('comment');

    </script>
<?php 

global $wpdb;
$table__name = $wpdb->prefix . 'contact';

if (isset($_POST["send-contact"])) {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $comment = $_POST["comment"];
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
                    '<div class="alert__message__contact success__contact">' +
                    '<p class="sa2__text">Gửi liên hệ thành công</p>' +
                    '<p class="sa2__text">Vui lòng kiên nhẫn đợi phản hồi từ chúng tôi, bạn nhé!</p>' + '</div>',
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
                window.location = '<?php echo 'http://localhost/WP-LittleLittle/contact' ?>';
            }); 
        </script>
    
    <?php
    } else {

    ?>
        <script type="text/javascript">
            Swal.fire({
                html:
                    '<div class="alert__error__contact">' +
                    '<img src="<?php echo get_template_directory_uri() . "/templates/images/icon/error.png" ?>" alt="">' + '</div>' +
                    '<div class="alert__message__contact">' +
                    '<p class="sa2__text"><?php echo (!empty($error['message']['required'])) ? $error['message']['required'] : false; echo (!empty($error['message']['filter'])) ? $error['message']['filter'] : false; ?></p>'
                    + '</div>',
                showCancelButton: false,
                showConfirmButton: false,
                focusConfirm: false,
            }).then((result) => { 
                /* return */
            });    
            /* get value without return sweetalert */
            valueName.value = '<?php echo (!empty($_POST['name'])) ? $_POST['name'] : false; ?>';
            valueEmail.value = '<?php echo (!empty($_POST['email'])) ? $_POST['email'] : false; ?>';
            valueAddress.value = '<?php echo (!empty($_POST['address'])) ? $_POST['address'] : false;  ?>';
            valuePhone.value = '<?php echo (!empty($_POST['phone'])) ? $_POST['phone'] : false; ?>';
            valueComment.innerHTML = '<?php echo (!empty($_POST['comment'])) ? $_POST['comment'] : false; ?>';
        </script>
    
    <?php 
    }
}
?>