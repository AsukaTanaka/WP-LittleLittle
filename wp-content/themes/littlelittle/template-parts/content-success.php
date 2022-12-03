<?php 

if(isset($_GET['e'])) { 
    global $wpdb;
    $id = $_GET['e'];
    $error = array();

    $replace_id = base64_decode($id);
    $table__name = $wpdb->prefix . 'ticket';
    $table__bill = $wpdb->prefix . 'bill';

    $select = $wpdb->get_results("SELECT * FROM $table__name WHERE `email` = '$replace_id'");
    
    if(empty($select[0]->email) || $select[0]->email != $replace_id) {
        $error['email']['check'] = "Không có kết quả !";
    } else {

    }
}

?>

    <!-- Section Start -->
    <section class="site-section">
        <div class="bg-vector">
            <div class="container">
            <?php 
                
                if(!empty($error['email']['check'])) {
                    ?>

                    <div class="row row-center row-without-lgt" >
                        <div class="col">
                            <div class="d-content">
                                <h4><?php echo $error['email']['check'] ?></h4>
                            </div>
                        </div>
                    </div>

                    <?php
                } else {
                    ?>
                <div class="row row-center row-without-lgt">
                    
                    <div class="col">
                        <div class="d-content">
                            <h4>Thanh Toán Thành Công</h4>
                        </div>
                    </div>
                </div>
                <div class="row row-content row-section row-section-success">
                    <div class="col-12 col-md-12 col-section-01">
                      
                    </div>
                    <div class="col-12 col-md-12 col-section-02">
                        <div class="bg-skin">
                            <div class="content bg-solid-light get-position">
                                <div class="image-design image-11">
                                    <img src="<?php echo get_template_directory_uri() . '/templates/images/thumbnail/image-11.png' ?>" alt="" title="">
                                </div>
                                <div class="slider slider-success" id="js-slider-success">
                                    <div class="swiper">
                                        <div class="swiper-wrapper">
                                            <?php 
                                            
                                            $get_bill = $wpdb->get_results("SELECT * FROM $table__bill WHERE `email` = '$id' ORDER BY id DESC");
                                            foreach ($get_bill as $row) {
                                            ?>
                                            <div class="swiper-slide slider-card">
                                                <img src="<?php echo get_site_url() . '/wp-uploads/files/qrcode/' . $row->qrcode ?>" alt="" title="">
                                                <div class="card-body">
                                                    <h4><?php echo $row->id ?></h4>
                                                    <p class="card-gate-ticket">Vé Cổng</p>
                                                    <p class="card-date">Ngày sử dụng: <?php echo $row->start_date ?></p>
                                                    <i class="bx bxs-check-circle"></i>
                                                </div>
                                            </div>
                                            <?php
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="swiper-button-next">
                                        <i class='bx bxs-right-arrow'></i>
                                    </div>
                                    <div class="swiper-button-prev">
                                        <i class='bx bxs-left-arrow'></i>
                                    </div>
                                    <div class="swiper-total-pages">
                                        <div class="div-total-pages">
                                            <span id="total-pages"></span>
                                        </div>
                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-section-03">
                        <form action="" method="post" class="form form-success" enctype="multipart/form-data" id="form-success">
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <div class="inline-form">
                                        <button class="button-red button-download">Tải Vé</button>
                                        <button class="button-red button-mail">Gửi Email</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- Section End -->