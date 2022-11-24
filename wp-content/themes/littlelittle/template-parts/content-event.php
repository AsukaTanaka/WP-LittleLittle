    <!-- Section Start -->
    <section class="site-section">
        <div class="bg-vector">
            <div class="container">
                <div class="row row-center row-without-lgt">
                    <div class="col">
                        <div class="d-content">
                            <h4>Sự Kiện</h4>
                        </div>
                    </div>
                </div>
                <form action="" method="get" class="form form-event" enctype="multipart/form-data" id="js-form-event">
                    <div class="slider slider-event" id="js-slider-event">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php 
                                    global $wpdb;
                                    $table__name = $wpdb->prefix . 'event';
                                    $list = $wpdb->get_results("SELECT * FROM $table__name ORDER BY id DESC LIMIT 10");
                                    foreach ($list as $row) {
                                        ?>
                                        <div class="swiper-slide slider-card">
                                            <img src="<?php echo get_site_url() . '/wp-uploads/files/thumbnail/' . $row->thumbnail ?>" alt="" title="">
                                            <div class="card-body">
                                                <h4><?php echo $row->title; ?></h4>
                                                <p class="card-title"><?php echo $row->address; ?></p>
                                                <p class="card-date"><i class="bx bx-calendar"></i>&nbsp;<?php echo $row->start_date; ?> - <?php echo $row->end_date; ?></p>
                                                <p class="card-price"><?php echo number_format($row->balance, 0, '', '.') . ' VNĐ ' ?></p>
                                                <a href="<?php echo home_url() . '/event-details?v=' . $row->id ?>" class="button-red button-link">Xem chi tiết</a>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                ?>
                                <!-- <div class="swiper-slide slider-card">
                                    <img src="<?php //echo get_template_directory_uri() . '/templates/images/thumbnail/thumbnail-01.png' ?>" alt="" title="">
                                    <div class="card-body">
                                        <h4>Sự kiện 1</h4>
                                        <p class="card-title">Đầm sen Park</p>
                                        <p class="card-date"><i class="bx bx-calendar"></i>&nbsp;30/05/2021 - 01/06/2021</p>
                                        <p class="card-price">25.000 VNĐ</p>
                                        <a href="#" class="button-red button-link">Xem chi tiết</a>
                                    </div>
                                </div>
                                <div class="swiper-slide slider-card">
                                    <img src="<?php //echo get_template_directory_uri() . '/templates/images/thumbnail/thumbnail-02.png' ?>" alt="" title="">
                                    <div class="card-body">
                                        <h4>Sự kiện 2</h4>
                                        <p class="card-title">Đầm sen Park</p>
                                        <p class="card-date"><i class="bx bx-calendar"></i>&nbsp;30/05/2021 - 01/06/2021</p>
                                        <p class="card-price">25.000 VNĐ</p>
                                        <a href="#" class="button-red button-link">Xem chi tiết</a>
                                    </div>
                                </div>
                                <div class="swiper-slide slider-card">
                                    <img src="<?php //echo get_template_directory_uri() . '/templates/images/thumbnail/thumbnail-03.png' ?>" alt="" title="">
                                    <div class="card-body">
                                        <h4>Sự kiện 3</h4>
                                        <p class="card-title">Đầm sen Park</p>
                                        <p class="card-date"><i class="bx bx-calendar"></i>&nbsp;30/05/2021 - 01/06/2021</p>
                                        <p class="card-price">50.000 VNĐ</p>
                                        <a href="#" class="button-red button-link">Xem chi tiết</a>
                                    </div>
                                </div>
                                <div class="swiper-slide slider-card">
                                    <img src="<?php //echo get_template_directory_uri() . '/templates/images/thumbnail/thumbnail-04.png' ?>" alt="" title="">
                                    <div class="card-body">
                                        <h4>Sự kiện 4</h4>
                                        <p class="card-title">Đầm sen Park</p>
                                        <p class="card-date"><i class="bx bx-calendar"></i>&nbsp;30/05/2021 - 01/06/2021</p>
                                        <p class="card-price">55.000 VNĐ</p>
                                        <a href="#" class="button-red button-link">Xem chi tiết</a>
                                    </div>
                                </div>
                                <div class="swiper-slide slider-card">
                                    <img src="<?php //echo get_template_directory_uri() . '/templates/images/thumbnail/thumbnail-04.png' ?>" alt="" title="">
                                    <div class="card-body">
                                        <h4>Sự kiện 5</h4>
                                        <p class="card-title">Đầm sen Park</p>
                                        <p class="card-date"><i class="bx bx-calendar"></i>&nbsp;30/05/2021 - 01/06/2021</p>
                                        <p class="card-price">55.000 VNĐ</p>
                                        <a href="#" class="button-red button-link">Xem chi tiết</a>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                        <div class="swiper-button-next">
                            <i class='bx bxs-right-arrow'></i>
                        </div>
                        <div class="swiper-button-prev">
                            <i class='bx bxs-left-arrow'></i>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Section End -->