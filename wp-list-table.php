<?php
/*
Plugin Name: Question Data
*/

if( ! class_exists( 'WP_List_Table' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

class My_Example_List_Table extends WP_List_Table {

    var $example_data = array(
            array( 'ID' => 1,'booktitle' => 'Quarter Share', 'author' => 'Nathan Lowell', 
                   'isbn' => '978-0982514542' ),
            array( 'ID' => 2, 'booktitle' => '7th Son: Descent','author' => 'J. C. Hutchins',
                   'isbn' => '0312384378' ),
            array( 'ID' => 3, 'booktitle' => 'Shadowmagic', 'author' => 'John Lenahan',
                   'isbn' => '978-1905548927' ),
            array( 'ID' => 4, 'booktitle' => 'The Crown Conspiracy', 'author' => 'Michael J. Sullivan',
                   'isbn' => '978-0979621130' ),
            array( 'ID' => 5, 'booktitle'     => 'Max Quick: The Pocket and the Pendant', 'author'    => 'Mark Jeffrey',
                   'isbn' => '978-0061988929' ),
            array('ID' => 6, 'booktitle' => 'Jack Wakes Up: A Novel', 'author' => 'Seth Harwood',
                  'isbn' => '978-0307454355' )
        );
    function __construct(){
    global $status, $page;

        parent::__construct( array(
            'singular'  => __( 'book', 'mylisttable' ),     //singular name of the listed records
            'plural'    => __( 'books', 'mylisttable' ),   //plural name of the listed records
            'ajax'      => false        //does this table support ajax?

    ) );

    add_action( 'admin_head', array( &$this, 'admin_header' ) );            

    }

  function admin_header() {
    $page = ( isset($_GET['page'] ) ) ? esc_attr( $_GET['page'] ) : false;
    if( 'my_list_test' != $page )
    return;
    echo '<style type="text/css">';
    echo '.wp-list-table .column-id { width: 5%; }';
    echo '.wp-list-table .column-booktitle { width: 40%; }';
    echo '.wp-list-table .column-author { width: 35%; }';
    echo '.wp-list-table .column-isbn { width: 20%;}';
    echo '</style>';
  }

  function no_items() {
    _e( 'No books found, dude.' );
  }

  function column_default( $item, $column_name ) {
    switch( $column_name ) { 
        case 'your_name':
        case 'mobile':
        case 'hair_fall':
		case 'body_frame':
		case 'sweat':
		case 'appetite':
		case 'hair_volume':
		case 'hair_type':
		case 'hair_texture':
		case 'scalp_texture':
		case 'dandruf':
		case 'gender':
		case 'age':
            return $item[ $column_name ];
        default:
            return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
    }
  }

function get_sortable_columns() {
  $sortable_columns = array(
    'your_name'  => array('your_name',false),
    'mobile' => array('mobile',false),
    'age'   => array('age',false)
  );
  return $sortable_columns;
}
		
function get_columns(){
        $columns = array(
            'cb'        => '<input type="checkbox" />',
            'your_name' => __( 'Name', 'mylisttable' ),
            'mobile'    => __( 'Mobile', 'mylisttable' ),
			'hair_fall'    => __( 'Hair fall', 'mylisttable' ),
			'body_frame'    => __( 'Body frame', 'mylisttable' ),
			'sweat'    => __( 'Sweat', 'mylisttable' ),
			'appetite'    => __( 'Appetite', 'mylisttable' ),
			'hair_volume'    => __( 'hair Volume', 'mylisttable' ),
			'hair_type'    => __( 'Hair Type', 'mylisttable' ),
			'hair_texture'    => __( 'Texture', 'mylisttable' ),
			'scalp_texture'    => __( 'Scalp', 'mylisttable' ),
			'dandruf'    => __( 'Dandruff', 'mylisttable' ),
			'gender'    => __( 'Gender', 'mylisttable' ),
			'age'      => __( 'Age', 'mylisttable' )		
        );
         return $columns;
    }

function usort_reorder( $a, $b ) {
  // If no sort, default to title
  $orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'booktitle';
  // If no order, default to asc
  $order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';
  // Determine sort order
  $result = strcmp( $a[$orderby], $b[$orderby] );
  // Send final sort direction to usort
  return ( $order === 'asc' ) ? $result : -$result;
}

function column_booktitle($item){
  $actions = array(
            'edit'      => sprintf('<a href="?page=%s&action=%s&id=%s">Edit</a>',$_REQUEST['page'],'edit',$item['id']),
            'delete'    => sprintf('<a href="?page=%s&action=%s&id=%s">Delete</a>',$_REQUEST['page'],'delete',$item['id']),
        );

  return sprintf('%1$s %2$s', $item['id'], $this->row_actions($actions) );
}

function get_bulk_actions() {
  $actions = array(
    'delete'    => 'Delete'	
  );
  return $actions;
}

function process_bulk_action()
{
	global $wpdb;
	$table_name = $wpdb->prefix . 'quiz'; 

	if ('delete' === $this->current_action()) {
		$ids = isset($_REQUEST['id']) ? $_REQUEST['id'] : array();
		if (is_array($ids)) $ids = implode(',', $ids);

		if (!empty($ids)) {
			$wpdb->query("DELETE FROM $table_name WHERE id IN($ids)");
		}
	}
}

function column_cb($item) {
        return sprintf(
            '<input type="checkbox" name="id[]" value="%s" />', $item['id']
        );    
    }


function prepare_items() {
        global $wpdb;
        $table_name = $wpdb->prefix . 'quiz'; 

        $per_page = 10; 

        $columns = $this->get_columns();
        $hidden = array();
        $sortable = $this->get_sortable_columns();
        
        $this->_column_headers = array($columns, $hidden, $sortable);
       
        $this->process_bulk_action();

        $total_items = $wpdb->get_var("SELECT COUNT(id) FROM $table_name");

		$paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged'] -1) * $per_page) : 0;
        //$paged = isset($_REQUEST['paged']) ? max(0, intval($_REQUEST['paged']) - 1) : 0;
        $orderby = (isset($_REQUEST['orderby']) && in_array($_REQUEST['orderby'], array_keys($this->get_sortable_columns()))) ? $_REQUEST['orderby'] : 'id';
        $order = (isset($_REQUEST['order']) && in_array($_REQUEST['order'], array('asc', 'desc'))) ? $_REQUEST['order'] : 'asc';


        $this->items = $wpdb->get_results($wpdb->prepare("SELECT * FROM $table_name ORDER BY $orderby $order LIMIT %d OFFSET %d", $per_page, $paged), ARRAY_A);


        $this->set_pagination_args(array(
            'total_items' => $total_items, 
            'per_page' => $per_page,			
            'total_pages' => ceil($total_items / $per_page) 
        ));
}

} //class



function my_add_menu_items(){
  $hook = add_menu_page( 'My Plugin List Table', 'Question Data', 'activate_plugins', 'my_list_test', 'my_render_list_page' );
  add_action( "load-$hook", 'add_options' );
}

function add_options() {
  global $myListTable;
  $option = 'per_page';
  $args = array(
         'label' => 'Books',
         'default' => 10,
         'option' => 'books_per_page'
         );
  add_screen_option( $option, $args );
  $myListTable = new My_Example_List_Table();
}
add_action( 'admin_menu', 'my_add_menu_items' );


function my_render_list_page(){
  global $myListTable;
  echo '</pre><div class="wrap"><h2>Question User Data</h2>'; 
  $myListTable->prepare_items(); 
?>
  <form method="post">
    <input type="hidden" name="page" value="ttest_list_table">
    <?php
    $myListTable->search_box( 'search', 'search_id' );

  $myListTable->display(); 
  echo '</form></div>'; 
}
