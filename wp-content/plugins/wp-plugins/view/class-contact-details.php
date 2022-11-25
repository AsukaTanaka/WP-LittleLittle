<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/SMTP.php';


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    global $wpdb;

    $table__name = $wpdb->prefix . 'contact';

    $select = $wpdb->get_results("SELECT * FROM $table__name WHERE id = '$id'");

    $phpmailer = new PHPMailer();
?>

 <div class="wrap">
        <div class="container">
            <div class="form-design form-contact">
                <div class="header">
                    <h2>Mã Liên Hệ Số <?php echo $select[0]->id ?></h2>
                </div>
                <form action="" method="post" class="form-contact-details" enctype="multipart/form-data">
                    <input type="hidden" placeholder="" value="<?php echo $select[0]->id ?>" class="input-field" readonly="true" name="input-id">

                    <div class="field">
                        <span class="span">Tên:</span>
                        <input type="text" placeholder="" value="<?php echo $select[0]->name ?>" class="input-field" readonly="true" name="input-name">
                    </div>
                    <div class="field">
                        <span class="span">Email:</span>
                        <input type="text" placeholder="" value="<?php echo $select[0]->email ?>" class="input-field" readonly="true" name="input-email">
                    </div>
                    <div class="field">
                        <span class="span">Số điện thoại:</span>
                        <input type="text" placeholder="" value="<?php echo $select[0]->phone ?>" class="input-field" readonly="true" name="input-phone">
                    </div>
                    <div class="field">
                        <span class="span">Địa chỉ:</span>
                        <input type="text" placeholder="" value="<?php echo $select[0]->address ?>" class="input-field" readonly="true" name="input-address">
                    </div>
                    <div class="field">
                        <span class="span">Nội dung:</span>
                        <textarea cols="30" rows="10" class="input-textarea" readonly="true" name="input-comment"><?php echo $select[0]->comment ?></textarea>
                    </div>
                    <div class="form-link">
                        <a href="<?php echo admin_url('admin.php?page=contact') ?>"><i class='bx bx-left-arrow-alt'></i> Trở lại trang liên hệ</a>
                        <?php
                        if ($select[0]->status == false) {
                        ?>
                            <input type="submit" class="send-mail button-click-submit" name="send-mail" value="Gửi Mail" style="cursor: pointer !important" />
                        <?php
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php 
    if (isset($_POST['send-mail'])) {
        $id = $_POST['input-id'];
        $name = $_POST['input-name'];
        $email = $_POST['input-email'];
        $phone = $_POST['input-phone'];
        $address = $_POST['input-address'];
        $comment = $_POST['input-comment'];

        $phpmailer->SMTPDebug = 0;
        $phpmailer->isSMTP();
        $phpmailer->Host = SMTP_HOST;
        $phpmailer->SMTPAuth = SMTP_AUTH;
        $phpmailer->Username = SMTP_USER;
        $phpmailer->Password = SMTP_PASS;
        $phpmailer->SMTPSecure = SMTP_SECURE;
        $phpmailer->Port = SMTP_PORT;

        $phpmailer->setFrom(SMTP_USER);
        $phpmailer->addAddress($email);
        $phpmailer->isHTML(true);

        ob_start();
        include 'class-template-mail.php';
        $body = ob_get_contents();
        $phpmailer->Body = $body;
        ob_get_clean();

        if ($phpmailer->send()) {
            $wpdb->update(
                $table__name,
                array(
                    'status' => true,
                ),
                array('id' => $id)
            );
        ?>
        
        <script type="text/javascript">
            window.location = '<?php echo get_site_url() . '/wp-admin/admin.php?page=contact'; ?>';
        </script>

        <?php
        }
    }
}
?>