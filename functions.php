<?php
function register_nav_menu_main(){
register_nav_menu( 'main_header_menu', 'القائمة الأساسية main' );
}
add_action( 'init', 'register_nav_menu_main' );

function register_nav_menu_secandry()  {
register_nav_menu( 'secandry_header_menu', 'القائمة الثانوية' );
}
add_action( 'init', 'register_nav_menu_secandry' );
?>

<?php

function register_sidebar_abcdcommerce() {

$args3 = array('name' =>'sidebar',
            'id'=>'sidebar' ,
            'description'=> 'هذا هو السيدبار',
            'class'  => '',
            // 'before_widget' => '<div class="abcdcommerce-widget"><li id="%1$s" class="widget %2$s">',
            // 'after_widget'  => '</li></div>',
            // 'before_title'  => '<h3 class="widgettitle">',
            // 'after_title'   => '</h3>' 
        ); 
register_sidebar($args3);
}
add_action( 'init', 'register_sidebar_abcdcommerce' );        

function register_footer_abcdcommerce() {

$args3 = array('name' =>'footer-1',
            'id'=>'footer-1' ,
            'description'=> 'add footer',
            'class'  => '',
            'before_widget' => '<div class="abcdcommerce-widget"><li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>' ); 
register_sidebar($args3);
}
add_action( 'init', 'register_footer_abcdcommerce' ) ;       


function the_excerpt_more($more) {
    global $post;
 return ' <a class="moretag" href="'. get_permalink($post->ID) . '">   اقرأ المزيد...  </a>';
}
add_filter('excerpt_more', 'the_excerpt_more');

add_theme_support( 'post-thumbnails');
/*

//function the_excerpt_length( $length ) { return 60;}
//add_filter( 'excerpt_length', 'the_excerpt_length' );



	/*
    function register_sidebar_abcdcommerce() {
        $args3 = array('name' =>'sidebar',
            'id'=>'sidebar' ,
            'description'=> 'add sidebar',
            'class'  => '',
            'before_widget' => '<div class="abcdcommerce-widget"><li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>' ); 
        
        register_sidebar($args3);
        
        
        }
        
        add_action('widgets_init','register_sidebar_abcdcommerce');
    
        function register_sidebar_abcdcommerce_two() {
            $args3 = array('name' =>'sidebar2',
                'id'=>'sidebar2' ,
                'description'=> 'add sidebar',
                'class'  => '',
                'before_widget' => '<div class="ebcdcommerce-widget-two"><li id="%1$s" class="widget %2$s">',
                'after_widget'  => '</li></div>',
                'before_title'  => '<h3 class="widgettitle">',
                'after_title'   => '</h3>' ); 
            
            register_sidebar($args3);
            
            
            }	
            add_action('widgets_init','register_sidebar_abcdcommerce_two');
            
*/
//add_filter( 'show_admin_bar', '__return_false' );
function popular_posts_per_category() {
	global $post;
	$categories = get_the_category();
	foreach($categories as $category) {
		$cats[] = $category->cat_ID;
	}
	$cats_unique = array_unique($cats);
	$args = array(
		'category__in' => $cats_unique,
		'orderby' => 'comment_count',
		'order' => 'DESC',
		'post_type' => 'post',
		'post_status' => 'publish',
		'posts_per_page' => 4
	);
	echo '<div class="popular-posts-qwe">';
	$popular_posts = null;
	$popular_posts = new WP_Query($args);
	while ($popular_posts->have_posts()) : 
		$popular_posts->the_post();
		echo '<div class="popular-post-single-qwe">';
		the_post_thumbnail( );
		
	?>
    <div>
<a href="<?php the_permalink(); ?>"><?php echo the_title( ); ?></a>
    </div>
<?php echo '</div>'; 
	endwhile;
	rewind_posts();
	echo '</div>';
}


?>

<?php


function slider_qwe(){
    $recent_posts = wp_get_recent_posts(array(
        'numberposts' => 5, // Number of recent posts thumbnails to display
        'post_status' => 'publish' // Show only the published posts
        ));
        $io=1;
        foreach( $recent_posts as $post_item ) : 
?>
    
        <a class="abc-<?php echo $io; ?> abc-<?php echo $post_item['ID']; ?>" href="<?php echo get_permalink($post_item['ID']); ?>">
            <?php echo get_the_post_thumbnail($post_item['ID'], 'full'); ?>
            <!-- Assuming that the slider support captions  -->
            <p class="slider-caption-class"><?php //echo $post_item['post_title'] ?></p>
        </a>
    
        <?php $io++; endforeach;
}
?>

<?php
/* CUSTOM FIELDS: Add custom fields to Product/General pane in Woocommerce
  from http://www.remicorson.com/mastering-woocommerce-products-custom-fields/ */

// Display Fields
add_action('woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields');
// Save Fields
// add_action('woocommerce_process_product_meta', 'woo_add_custom_general_fields_save');
add_action('woocommerce_process_product_meta', 'woo_add_custom_general_fields_save', 99);

function woo_add_custom_general_fields()
{
    global $woocommerce, $post;
    echo '<div class="options_group">';

    // Product Height
    woocommerce_wp_text_input(
        array(
            'id' => '_product_height',
            // 'label' => __('Product Height (inches)', 'woocommerce'),
            'label' => __('الارض بالمتر', 'woocommerce'),
            'placeholder' => '',
            'description' => __('ادخل عرض الارض', 'woocommerce'),
            'type' => 'number',
            'custom_attributes' => array(
                'step' => 'any',
                'min' => '0'
            )
        )
    );

    // Product Width
    woocommerce_wp_text_input(
        array(
            'id' => '_product_width',
            // 'label' => __('Product Width (inches)', 'woocommerce'),
            'label' => __('كم عدد الادوار', 'woocommerce'),
            'placeholder' => '',
            'description' => __('ادخل عدد الادوار', 'woocommerce'),
            'type' => 'number',
            'custom_attributes' => array(
                'step' => 'any',
                'min' => '0'
            )
        )
    );

    // Product Area Multiplier
    woocommerce_wp_text_input(
        array(
            'id' => '_product_area_mult',
            // 'label' => __('Product Area Multiplier', 'woocommerce'),
            'label' => __('الضرب في سعر المتر للارض', 'woocommerce'),
            'placeholder' => '',
            // 'description' => __('Enter Product Area Multiplier. ', 'woocommerce'),
            'description' => __('سعر المتر للارض ', 'woocommerce'),
            'type' => 'number',
            'custom_attributes' => array(
                'step' => 'any',
                'min' => '0'
            )
        )
    );

    // Product Area Price: added this field to check if this value is being calculated
    woocommerce_wp_text_input(
        array(
            'id' => '_product_area_price',
            // 'label' => __('Product Area Price', 'woocommerce'),
            'label' => __('السعر التقريبي', 'woocommerce'),
            'placeholder' => '',
            // 'description' => __('Product Area Price. Calculated automatically', 'woocommerce'),
            'description' => __('لا تكتب شي فسيتم الحساب لسعر العقار تلقائيا', 'woocommerce'),
            'type' => 'number',
            'custom_attributes' => array(
                'step' => 'any',
                'min' => '0'
            )
        )
    );

    echo '</div>';
}

function woo_add_custom_general_fields_save($post_id)
{
    $woocommerce_product_height = $_POST['_product_height'];
    $woocommerce_product_width = $_POST['_product_width'];
    $woocommerce_product_area_mult = $_POST['_product_area_mult'];
    $woocommerce_product_area_price = $_POST['_product_area_price'];

    // save height, width, multiplier
    if (!empty($woocommerce_product_height))
        update_post_meta($post_id, '_product_height', esc_attr($woocommerce_product_height));

    if (!empty($woocommerce_product_width))
        update_post_meta($post_id, '_product_width', esc_attr($woocommerce_product_width));

    if (!empty($woocommerce_product_area_mult))
        update_post_meta($post_id, '_product_area_mult', esc_attr($woocommerce_product_area_mult));


    // calculate and save _product_area_price, _regular_price, price as Height*Width*Mult
    if (!empty($woocommerce_product_height) && !empty($woocommerce_product_width) && !empty($woocommerce_product_area_mult))
        $woocommerce_product_area_price = $woocommerce_product_height * $woocommerce_product_width * $woocommerce_product_area_mult;

    if (!empty($woocommerce_product_area_price))
        update_post_meta($post_id, '_product_area_price', esc_attr($woocommerce_product_area_price));

    if (!empty($woocommerce_product_area_price))
    {
        update_post_meta($post_id, '_regular_price', esc_attr($woocommerce_product_area_price));
        update_post_meta($post_id, '_price', esc_attr($woocommerce_product_area_price));
    }


}



// remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
// remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

// //Then hook in your own functions to display the wrappers your theme requires:

// add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
// add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

// function my_theme_wrapper_start() {
//     echo '<section id="main">';
// }

// function my_theme_wrapper_end() {
//     echo '</section>';
// }


// function mytheme_add_woocommerce_support() {
// 	add_theme_support( 'woocommerce', array(
// 		'thumbnail_image_width' => 150,
// 		'single_image_width'    => 300,

//         'product_grid'          => array(
//             'default_rows'    => 3,
//             'min_rows'        => 2,
//             'max_rows'        => 8,
//             'default_columns' => 4,
//             'min_columns'     => 2,
//             'max_columns'     => 5,
//         ),
// 	) );
// }
// add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );

?>