 <?php 
 
 if (isset($_GET['v'])) {
    $id = $_GET['v'];
    $error = array();
    global $wpdb;

    $table__name = $wpdb->prefix . 'event';

    $select = $wpdb->get_results("SELECT * FROM $table__name WHERE id = '$id'");
 
    if(empty($select[0]->id) || $select[0]->id != $id) {
        $error['id']['check'] = "Lỗi 404 !";
    }
 ?>
 <!-- Section Start -->
 <section class="site-section">
        <div class="bg-vector">
            <div class="container">
                <?php 
                
                if(!empty($error['id']['check'])){
                    ?>
                    <div class="row row-center row-without-lgt">
                        <div class="col">
                            <div class="d-content">
                                <h4><?php echo $error['id']['check']; ?></h4>
                            </div>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="row row-center row-without-lgt">
                        <div class="col">
                            <div class="d-content">
                                <h4><?php echo $select[0]->title; ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="row row-content row-section row-section-event">
                    <div class="col-12 col-md-12">
                        <div class="bg-skin get-height-bg">
                            <div class="content bg-solid-light">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 pb-2">
                                        <img src="<?php echo get_site_url() . '/wp-uploads/files/thumbnail/' . $select[0]->thumbnail ?>" alt="" title="">
                                        <div class="card-body">
                                            <p class="card-date"><i class="bx bx-calendar"></i>&nbsp;<?php echo $select[0]->start_date ?> - <?php echo $select[0]->end_date ?></p>
                                            <p class="card-title"><?php echo $select[0]->address ?></p>
                                            <p class="card-price"><?php echo number_format($select[0]->balance, 0, '', '.') . ' VNĐ ' ?></p>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                                        <div class="grid-ish">
                                            <?php echo $select[0]->content ?>
                                            <!-- <div class="col-ish">
                                                <p>
                                                    <b>Lorem Ipsum</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever
                                                    since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, 
                                                    but also the leap into electronic sdsd typesetting, remaining cssa essentially unchanged. It was popularised in the 1960s with the release of 
                                                    Letraset sheets containing Lorem Ipsum passages, of Lorem Ipsum
                                                </p>
                                            </div>
                                            <div class="col-ish">
                                                <img src="<?php //echo get_template_directory_uri() . '/templates/images/thumbnail/thumbnail-02.png' ?>" alt="" title="">
                                                <p>
                                                    Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. 
                                                    words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature,
                                                </p>
                                            </div>
                                            <div class="col-ish">
                                                <p>
                                                    Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. 
                                                    words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature,
                                                </p>
                                                <img src="<?php //echo get_template_directory_uri() . '/templates/images/thumbnail/thumbnail-03.png' ?>" alt="" title="">
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
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
 } else {
    ?>
    <script type="text/javascript">
        window.location = '<?php echo home_url() . '/event' ?>';
    </script>
    <?php

 }
?>