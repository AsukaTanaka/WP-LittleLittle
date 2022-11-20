<?php 
/**
 * WP List Table
 */
if (!class_exists('WP_List_Table')) {
    require_once(ABSPATH . 'wp-admin/includes/class-wp-list-table.php');
}

/**
 * Get Package Table
 */

class WP_Custom_Package extends WP_List_Table {
    /**
     * Constructor Give Some Basic Params
     */

    public function __construct()
    {
        // global $status, $page;

        parent::__construct(
            array(
                'singular' => 'package',
                'plural' => 'package',
                'ajax' => true
            )
        );
    }

    /**
     * @param $item - row (key, value array)
     * @param $column_name - string (key)
     * @return HTML
     */

    public function column_default($item, $column_name)
    {
        switch ($item[$column_name]) 
        {
            case $item['price'] : 
                return number_format($item['price'], 0, '', ',') . ' vnđ ';
            // Doesn't match the above so return the database field contents
            default : 
                return $item[$column_name];
        }
    }

    /**
     * When Your Hover Row "Edit" | "Delete" Links Showed
     * @param $item - row (key, value array)
     * @return HTML
     */

    public function column_id($item)
    {
        $actions = array(
            'delete' => 
                sprintf(
                    '<a class="confirm__delete" href="?page=%s&action=delete&id=%s" onclick="return confirm(\'Bạn có chắc chắn muốn xóa?\')")>%s</a>', 
                    $_REQUEST['page'], $item['id'], __('Xoá', 'Package')
                ),
            'update' => 
                sprintf(
                    '<a href="?page=%s&id=%s">%s</a>' ,
                    __('package_update', 'Package'), $item['id'], __('Cập Nhật', 'Package')
                ),
        );

        return sprintf('%s %s', $item['id'], $this->row_actions($actions));
    }

    /** 
     * @param $item - row (key, value array)
     * @return HTML 
     */

    public function column_cb($item)
    {
        return sprintf(
            '<input type="checkbox" name="id[]" value="%s" />', $item['id']
        );
    }

    /** 
     * Skip Columns That You Do Not Want To Want
     */

    public function get_columns()
    {
        $columns = array(
            'cb' => '<input type="checkbox" />',
            'id' => __('#', 'Package'),
            'package' => __('Loại Gói', 'Package'),
            'price' => __('Số Tiền', 'Package'),
            'create_at' => __('Ngày Tạo', 'Package'),
        );

        return $columns;
    }

    /**
     * All Strings in Array - Is Column Names
     * Notice That True On Name Column Means That Its Default Sort
     */

    public function get_sortable_columns()
    {
        $sortable__columns = array(
            'id' => array('id', true),
            'package' => array('package', true),
            // 'price' => array('price', false),
            // 'create_at' => array('status', true),
        );

        return $sortable__columns;
    }

    /** 
     * @return array
     */

    public function get_bulk_actions()
    {
        $actions = array(
            'delete' => 'Xoá'
        );
        return $actions;
    }

    /**
     * It Can Be Outside of Class
     * It Can Not Use wp_redirect Coz There is Output Already
     * In This Example We Are Processing Delete Action
     * Message About Successful Deletion Will Be Shown On Page In Next Part
     */

    public function process_bulk_action()
    {
        global $wpdb;
        $table__name = $wpdb->prefix . 'package';

        if ('delete' === $this->current_action()) {
            $ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();

            if (is_array($ids)) $ids = implode(',', $ids);

            if (!empty($ids)) {
                $wpdb->query("DELETE FROM $table__name WHERE id IN($ids)");
            }
        }
    }

    /**
     * It Will Get Rows From Database and Prepare Them To Be Showed In Table
     */

    public function prepare_items()
    {
        global $wpdb;

        $table__name = $wpdb->prefix . 'package';
        $per__page = 10;
        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();

        // Cofigure Table Headers, Defined in Out
        $this->_column_headers = array($columns, $hidden, $sortable);

        // Process Bulk Action If Any
        $this->process_bulk_action();

        // Will Be Use Pagination Settings
        $total__items = $wpdb->get_var("SELECT COUNT(*) FROM $table__name");

        // Prepare Query Params, As Usual Page, Order By and Order Direction
        $paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged']) - 1) : 0;
        $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'id';
        $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'desc';

        if (isset($_REQUEST['s']) && $_REQUEST['s'] != '') {
            // $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table__name WHERE `name` LIKE '%".$_REQUEST['s']."%' ORDER BY $orderby $order LIMIT %d OFFSET %d", $per__page, $paged * $per__page), ARRAY_A);
            $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table__name WHERE `id` = '" . $_REQUEST['s'] . "' ORDER BY $orderby $order LIMIT %d OFFSET %d", $per__page, $paged * $per__page), ARRAY_A);
        } else {
            $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table__name ORDER BY $orderby $order LIMIT %d OFFSET %d", $per__page, $paged * $per__page), ARRAY_A);
        }

        $this->set_pagination_args(array(
            'total_items' => $total__items, // total items defined above
            'per_page' => $per__page, // per page constant defined at top of method
            'total_pages' => ceil($total__items / $per__page) // calculate pages count
        ));
    }
}

/**
 * Show Data List
 *
 * @return void
 */

function WP_Package_Form()
{
    $obj = new WP_Custom_Package();
    $obj->prepare_items();
    
    ?>

    <div class="wrap">
        <!-- <div class="icon32 icon32-posts-post" id="icon-edit"><br></div> -->
        <h2 class="wp-heading-inline"><?php _e('Danh Sách Loại Gói', 'Package')?> <a class="page-title-action" href="<?php echo admin_url('admin.php?page=package_create') ?>">Thêm Mới</a></h2>
        <form id="package-table" method="GET" enctype="multipart/form-data">
            <input type="hidden" name="page" value="<?php echo $_REQUEST['page'] ?>">
            <?php $obj->display(); ?>
        </form>
    </div>

<?php

}

WP_Package_Form();
?>