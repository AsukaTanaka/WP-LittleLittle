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
            <div class="form__design form__contact">
                <div class="header">
                    <h2>Mã Liên Hệ Số <?php echo $select[0]->id ?></h2>
                </div>
                <form action="" method="post" class="form__contact__details" enctype="multipart/form-data">
                    <input type="hidden" placeholder="" value="<?php echo $select[0]->id ?>" class="input__field" readonly="true" name="input__id">

                    <div class="field">
                        <span for="">Tên:</span>
                        <input type="text" placeholder="" value="<?php echo $select[0]->name ?>" class="input__field" readonly="true" name="input__name">
                    </div>
                    <div class="field">
                        <span for="">Email:</span>
                        <input type="text" placeholder="" value="<?php echo $select[0]->email ?>" class="input__field" readonly="true" name="input__email">
                    </div>
                    <div class="field">
                        <span for="">Số điện thoại:</span>
                        <input type="text" placeholder="" value="<?php echo $select[0]->phone ?>" class="input__field" readonly="true" name="input__phone">
                    </div>
                    <div class="field">
                        <span for="">Địa chỉ:</span>
                        <input type="text" placeholder="" value="<?php echo $select[0]->address ?>" class="input__field" readonly="true" name="input__address">
                    </div>
                    <div class="field">
                        <span for="">Nội dung:</span>
                        <textarea cols="30" rows="10" class="input__textarea" readonly="true" name="input__comment"><?php echo $select[0]->comment ?></textarea>
                    </div>
                    <div class="form__link">
                        <a href="<?php echo admin_url('admin.php?page=contact') ?>"><i class='bx bx-left-arrow-alt'></i> Trở lại trang liên hệ</a>
                        <?php
                        if ($select[0]->status == false) {
                        ?>
                            <input type="submit" class="send__mail button__click__submit" name="send__mail" value="Gửi Mail" style="cursor: pointer !important" />
                        <?php
                        }
                        ?>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php 
    if (isset($_POST['send__mail'])) {
        $id = $_POST['input__id'];
        $name = $_POST['input__name'];
        $email = $_POST['input__email'];
        $phone = $_POST['input__phone'];
        $address = $_POST['input__address'];
        $comment = $_POST['input__comment'];

        $phpmailer->SMTPDebug = 2;
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
        $phpmailer->Body = $comment;

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