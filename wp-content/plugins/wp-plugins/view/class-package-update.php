<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    global $wpdb;

    $table__name = $wpdb->prefix . 'package';

    $select = $wpdb->get_results("SELECT * FROM $table__name WHERE id = '$id'");

?>

<div class="wrap">
    <div class="container">
        <div class="form-design form-package">
            <div class="header">
                <h2>Cập Nhật Mã Số <?php echo $select[0]->id ?></h2>
            </div>
            <form action="" method="post" class="form-package-create" enctype="multipart/form-data">
                <input type="hidden" placeholder="" value="<?php echo $select[0]->id ?>" class="input-field" readonly="true" name="input-id">
                <div class="field">
                    <span class="span">Loại gói: <i class="get-error-msg error-package"></i></span>
                    <input type="text" placeholder="" value="<?php echo $select[0]->package ?>" class="input-field" name="input-package" id="input-package">
                </div>
                <div class="field">
                    <span class="span">Giá tiền: <i class="get-error-msg error-price"></i></span>
                    <input type="text" placeholder="" value="<?php echo $select[0]->price ?>" class="input-field" name="input-price" id="input-price">
                </div>
                <!-- <div class="field-submit field-center">
                    <input type="submit" class="button-submit" name="create-package" value="Tạo Mới" style="cursor: pointer !important">
                </div> -->
                <div class="form-link">
                    <a href="<?php echo admin_url('admin.php?page=package') ?>"><i class='bx bx-left-arrow-alt'></i> Trở lại trang liên hệ</a>
                    <input type="submit" class="button-submit button-click-submit" name="update-package" value="Cập Nhật" style="cursor: pointer !important">
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    const errorPackage = document.querySelector('.error-package');
    const errorPrice = document.querySelector('.error-price');

    const valuePackage = document.getElementById('input-package');
    const valuePrice = document.getElementById('input-price');     
</script>
<?php 

if(isset($_POST['update-package']))
{
    $id = $_POST['input-id'];
    $package = $_POST['input-package'];
    $price = $_POST['input-price'];
    $error = array();
    $get_min = 10000;
    $get_max = 5000000;
    
    if(empty(trim($package)))
    {
        $error['package']['required'] = '*Không được để trống';
    } else {
        if(strlen(trim($package))<6 || strlen(trim($package))>24) {
            $error['package']['strlen'] = '*Phải từ 6 đến 24 ký tự';
        }
    }

    if(empty(trim($price)))  {
        $error['price']['required'] = '*Không được để trống';
    } else {
        if(!is_numeric($price)) {
            $error['price']['numeric'] = '*Chỉ nhận giá trị số';
        }
        else if(filter_var($price, FILTER_VALIDATE_INT, array("options" => array("min_range"=>$get_min, "max_range"=>$get_max))) === false) {
            $error['price']['filter'] = '*Chỉ nhận từ 10.000 đến 5.000.000 (vnđ)';
        }
    }

    if(empty($error))
    {
        $wpdb->update(
            $table__name,
            array(
                'package' => $package,
                'price' => $price,
            ),
            array('id' => $id)
        );
        ?>

        <script type="text/javascript">
            window.location = '<?php echo get_site_url() . '/wp-admin/admin.php?page=package'; ?>';
        </script>

        <?php 
    } else {
        ?>

        <script type="text/javascript">
            errorPackage.innerHTML = 
                '<?php 
                    echo (!empty($error['package']['required'])) ? $error['package']['required'] : false;
                    echo (!empty($error['package']['strlen'])) ? $error['package']['strlen'] : false;
                ?>';

            errorPrice.innerHTML = 
                '<?php 
                    echo (!empty($error['price']['required'])) ? $error['price']['required'] : false;
                    echo (!empty($error['price']['numeric'])) ? $error['price']['numeric'] : false;
                    echo (!empty($error['price']['filter'])) ? $error['price']['filter'] : false;
                ?>';

            valuePackage.value = '<?php echo (!empty($_POST['input-package'])) ? $_POST['input-package'] : false; ?>'
            valuePrice.value = '<?php echo (!empty($_POST['input-price'])) ? $_POST['input-price'] : false; ?>'
        </script>

        <?php 
    }
}

}
?>