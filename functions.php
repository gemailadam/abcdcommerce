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
            'description'=> 'add sidebar',
            'class'  => '',
            'before_widget' => '<div class="abcdcommerce-widget"><li id="%1$s" class="widget %2$s">',
            'after_widget'  => '</li></div>',
            'before_title'  => '<h3 class="widgettitle">',
            'after_title'   => '</h3>' ); 
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