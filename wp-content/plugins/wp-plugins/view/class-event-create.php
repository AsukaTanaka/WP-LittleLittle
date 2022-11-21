<?php 
    global $wpdb;
    $table__name = $wpdb->prefix . 'event';
?>

<div class="wrap">
    <div class="container">
    <div class="form-design form-event">
            <div class="header">
                <h2>Thêm Mới Sự Kiện</h2>
            </div>
            <form action="" method="post" class="form-event-create" enctype="multipart/form-data" id="plugin-form-event">
                <div class="field">
                    <span class="span">Tựa Đề: <i class="get-error-msg error-title"></i></span>
                    <input type="text" placeholder="" value="" class="input-field" name="input-title" id="input-title">
                </div>
                <div class="field">
                    <span class="span">Địa Chỉ: <i class="get-error-msg error-address"></i></span>
                    <input type="text" placeholder="" value="" class="input-field" name="input-address" id="input-address">
                </div>
                <div class="field">
                    <span class="span">Ngày Bắt Đầu: <i class="get-error-msg error-start-date"></i></span>
                    <input type="text" placeholder="" value="" class="input-field" name="input-start-date" id="input-start-date">
                </div>
                <div class="field">
                    <span class="span">Ngày Kết Thúc: <i class="get-error-msg error-end-date"></i></span>
                    <input type="text" placeholder="" value="" class="input-field" name="input-end-date" id="input-end-date">
                </div>
                <div class="field">
                    <span class="span">Giá Tiền: <i class="get-error-msg error-balance"></i></span>
                    <input type="text" placeholder="" value="" class="input-field" name="input-balance" id="input-balance">
                </div>
                <div class="field">
                    <span class="span">Hình Ảnh: <i class="get-error-msg error-thumbnail"></i></span>
                    <!-- <div style="width: 100%">
                        <input type="file" class="btn-file" id="input-thumbnail" name="input-thumbnail" value="">
                    </div> -->
                    <div class="file">
                        <div class="thumbnail">
                            <img alt="" title="" class="thumbnail-upload" id="thumbnail-upload">
                        </div>
                        <div class="content">
                            <div class="icon">
                                <i class='bx bxs-cloud-upload'></i>         
                            </div>
                            <div class="text">
                                Chưa có tệp nào được chọn !
                            </div> 
                        </div>
                        <div class="btn-cancel" id="btn-cancel"><i class="bx bx-x"></i></div>
                        <div class="file-name" id="file-name"></div>
                    </div>
                    <input type="file" class="btn-default" id="input-thumbnail" name="input-thumbnail" style="display: none">
                    <button onclick="defaultBtnActive()" id="btn-custom" class="btn-custom" type="button">Chọn tệp</button>
                </div>
                <div class="field">
                    <span class="span">Nội Dung: <i class="get-error-msg error-content"></i></span>
                    <textarea name="input-content" id="input-content" class="input-textarea"></textarea>
                </div>
            </form>
        </div>
    </div>
</div>


<?php 
    
?>