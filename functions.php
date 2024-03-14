<?php

// user 1 at my team work for programming or developing new app or website

//// زميلنا المطور رقم 3 سيقوم بإضافة الاكواد التالية للمراجعة 

// المطور 4 سيقوم باضافة الكود الجديد الآن

// تم التحسين للكود الساعة 12:46  يوم 16-3-2024

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
            <p class="slider-caption-class"><?php echo $post_item['post_title'] ?></p>
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



/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * https://codex.wordpress.org/Function_Reference/register_taxonomy
 */
function add_custom_taxonomies() {
    // Add new "Locations" taxonomy to Posts
    register_taxonomy('location', 'post', array(
      // Hierarchical taxonomy (like categories)
      'hierarchical' => true,
      // This array of options controls the labels displayed in the WordPress Admin UI
      'labels' => array(
        'name' => _x( 'Locations', 'taxonomy general name' ),
        'singular_name' => _x( 'Location', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Locations' ),
        'all_items' => __( 'All Locations' ),
        'parent_item' => __( 'Parent Location' ),
        'parent_item_colon' => __( 'Parent Location:' ),
        'edit_item' => __( 'Edit Location' ),
        'update_item' => __( 'Update Location' ),
        'add_new_item' => __( 'Add New Location' ),
        'new_item_name' => __( 'New Location Name' ),
        'menu_name' => __( 'Locations' ),
      ),
      // Control the slugs used for this taxonomy
      'rewrite' => array(
        'slug' => 'locations', // This controls the base slug that will display before each term
        'with_front' => false, // Don't display the category base before "/locations/"
        'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
      ),
    ));
  }
  add_action( 'init', 'add_custom_taxonomies', 0 );
/////////////////////////////////////////
/////////////////////////////////////////
////////////////////////////////////////
////////////////////////////////////////
//spechial comment function
//comment-template.php
////////////////////////////////////////
/////////////////////////////////////////
////////////////////////////////////////
/////////////////////////////////////////
function comment_formh( $args = array(), $post = null ) {
	$post = get_post( $post );

	// Exit the function if the post is invalid or comments are closed.
	if ( ! $post || ! comments_open( $post ) ) {
		/**
		 * Fires after the comment form if comments are closed.
		 *
		 * For backward compatibility, this action also fires if comment_form()
		 * is called with an invalid post object or ID.
		 *
		 * @since 3.0.0
		 */
		do_action( 'comment_form_comments_closed' );

		return;
	}

	$post_id       = $post->ID;
	$commenter     = wp_get_current_commenter();
	$user          = wp_get_current_user();
	$user_identity = $user->exists() ? $user->display_name : '';

	$args = wp_parse_args( $args );
	if ( ! isset( $args['format'] ) ) {
		$args['format'] = current_theme_supports( 'html5', 'comment-form' ) ? 'html5' : 'xhtml';
	}

	$req   = get_option( 'require_name_email' );
	$html5 = 'html5' === $args['format'];

	// Define attributes in HTML5 or XHTML syntax.
	$required_attribute = ( $html5 ? ' required' : ' required="required"' );
	$checked_attribute  = ( $html5 ? ' checked' : ' checked="checked"' );

	// Identify required fields visually and create a message about the indicator.
	$required_indicator = ' ' . wp_required_field_indicator();
	$required_text      = ' ' . wp_required_field_message();

	$fields = array(
		'author' => sprintf(
			'<p class="comment-form-author">%s %s</p>',
			sprintf(
				'<label for="author">%s%s</label>',
				__( 'Name' ),
				( $req ? $required_indicator : '' )
			),
			sprintf(
				'<input id="author" name="author" type="text" value="%s" size="30" maxlength="245" autocomplete="name"%s />',
				esc_attr( $commenter['comment_author'] ),
				( $req ? $required_attribute : '' )
			)
		),
		'email'  => sprintf(
			'<p class="comment-form-email">%s %s</p>',
			sprintf(
				'<label for="email">%s%s</label>',
				__( 'Email' ),
				( $req ? $required_indicator : '' )
			),
			sprintf(
				'<input id="email" name="email" %s value="%s" size="30" maxlength="100" aria-describedby="email-notes" autocomplete="email"%s />',
				( $html5 ? 'type="email"' : 'type="text"' ),
				esc_attr( $commenter['comment_author_email'] ),
				( $req ? $required_attribute : '' )
			)
		),
		'url'    => sprintf(
			'<p class="comment-form-url">%s %s</p>',
			sprintf(
				'<label for="url">%s</label>',
				__( 'Website' )
			),
			sprintf(
				'<input id="url" name="url" %s value="%s" size="30" maxlength="200" autocomplete="url" />',
				( $html5 ? 'type="url"' : 'type="text"' ),
				esc_attr( $commenter['comment_author_url'] )
			)
		),
	);

	if ( has_action( 'set_comment_cookies', 'wp_set_comment_cookies' ) && get_option( 'show_comments_cookies_opt_in' ) ) {
		$consent = empty( $commenter['comment_author_email'] ) ? '' : $checked_attribute;

		$fields['cookies'] = sprintf(
			'<p class="comment-form-cookies-consent">%s %s</p>',
			sprintf(
				'<input id="wp-comment-cookies-consent" name="wp-comment-cookies-consent" type="checkbox" value="yes"%s />',
				$consent
			),
			sprintf(
				'<label for="wp-comment-cookies-consent">%s</label>',
				__( 'Save my name, email, and website in this browser for the next time I comment.' )
			)
		);

		// Ensure that the passed fields include cookies consent.
		if ( isset( $args['fields'] ) && ! isset( $args['fields']['cookies'] ) ) {
			$args['fields']['cookies'] = $fields['cookies'];
		}
	}

	/**
	 * Filters the default comment form fields.
	 *
	 * @since 3.0.0
	 *
	 * @param string[] $fields Array of the default comment fields.
	 */
	$fields = apply_filters( 'comment_form_default_fields', $fields );

	$defaults = array(
		'fields'               => $fields,
		'comment_field'        => sprintf(
			'<p class="comment-form-comment">%s %s</p>',
			sprintf(
				'<label for="comment">%s%s</label>',
				_x( 'Comment', 'noun' ),
				$required_indicator
			),
			'<textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525"' . esc_html( $required_attribute ) . '></textarea>'
		),
		'must_log_in'          => sprintf(
			'<p class="must-log-in">%s</p>',
			sprintf(
				/* translators: %s: Login URL. */
				__( 'You must be <a href="%s">logged in</a> to post a comment.' ),
				/** This filter is documented in wp-includes/link-template.php */
				wp_login_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
			)
		),
		'logged_in_as'         => sprintf(
			'<p class="logged-in-as">%s%s</p>',
			sprintf(
				/* translators: 1: User name, 2: Edit user link, 3: Logout URL. */
				__( 'Logged in as %1$s. <a href="%2$s">Edit your profile</a>. <a href="%3$s">Log out?</a>' ),
				$user_identity,
				get_edit_user_link(),
				/** This filter is documented in wp-includes/link-template.php */
				wp_logout_url( apply_filters( 'the_permalink', get_permalink( $post_id ), $post_id ) )
			),
			$required_text
		),
		'comment_notes_before' => sprintf(
			'<p class="comment-notes">%s%s</p>',
			sprintf(
				'<span id="email-notes">%s</span>',
				__( 'Your email address will not be published.' )
			),
			$required_text
		),
		'comment_notes_after'  => '',
		'action'               => site_url( '/wp-comments-post.php' ),
		'id_form'              => 'commentform',
		'id_submit'            => 'submit',
		'class_container'      => 'comment-respond',
		'class_form'           => 'comment-form',
		'class_submit'         => 'submit',
		'name_submit'          => 'submit',
		'title_reply'          => __( 'Leave a Reply' ),
		/* translators: %s: Author of the comment being replied to. */
		'title_reply_to'       => __( 'Leave a Reply to %s' ),
		'title_reply_before'   => '<h3 id="reply-title" class="comment-reply-title">',
		'title_reply_after'    => '</h3>',
		'cancel_reply_before'  => ' <small>',
		'cancel_reply_after'   => '</small>',
		'cancel_reply_link'    => __( 'Cancel reply' ),
		'label_submit'         => __( 'Post Comment' ),
		'submit_button'        => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
		'submit_field'         => '<p class="form-submit">%1$s %2$s</p>',
		'format'               => 'xhtml',
	);

	/**
	 * Filters the comment form default arguments.
	 *
	 * Use {@see 'comment_form_default_fields'} to filter the comment fields.
	 *
	 * @since 3.0.0
	 *
	 * @param array $defaults The default comment form arguments.
	 */
	$args = wp_parse_args( $args, apply_filters( 'comment_form_defaults', $defaults ) );

	// Ensure that the filtered arguments contain all required default values.
	$args = array_merge( $defaults, $args );

	// Remove `aria-describedby` from the email field if there's no associated description.
	if ( isset( $args['fields']['email'] ) && ! str_contains( $args['comment_notes_before'], 'id="email-notes"' ) ) {
		$args['fields']['email'] = str_replace(
			' aria-describedby="email-notes"',
			'',
			$args['fields']['email']
		);
	}

	/**
	 * Fires before the comment form.
	 *
	 * @since 3.0.0
	 */
	do_action( 'comment_form_before' );
	?>
	<div id="respond" class="<?php echo esc_attr( $args['class_container'] ); ?>">
		<?php
		echo $args['title_reply_before'];

		comment_form_title( $args['title_reply'], $args['title_reply_to'], true, $post_id );

		if ( get_option( 'thread_comments' ) ) {
			echo $args['cancel_reply_before'];

			cancel_comment_reply_link( $args['cancel_reply_link'] );

			echo $args['cancel_reply_after'];
		}

		echo $args['title_reply_after'];

		if ( get_option( 'comment_registration' ) && ! is_user_logged_in() ) :

			echo $args['must_log_in'];
			/**
			 * Fires after the HTML-formatted 'must log in after' message in the comment form.
			 *
			 * @since 3.0.0
			 */
			do_action( 'comment_form_must_log_in_after' );

		else :

			printf(
				'<form action="%s" method="post" id="%s" class="%s"%s>',
				esc_url( $args['action'] ),
				esc_attr( $args['id_form'] ),
				esc_attr( $args['class_form'] ),
				( $html5 ? ' novalidate' : '' )
			);

			/**
			 * Fires at the top of the comment form, inside the form tag.
			 *
			 * @since 3.0.0
			 */
			do_action( 'comment_form_top' );

			if ( is_user_logged_in() ) :

				/**
				 * Filters the 'logged in' message for the comment form for display.
				 *
				 * @since 3.0.0
				 *
				 * @param string $args_logged_in The HTML for the 'logged in as [user]' message,
				 *                               the Edit profile link, and the Log out link.
				 * @param array  $commenter      An array containing the comment author's
				 *                               username, email, and URL.
				 * @param string $user_identity  If the commenter is a registered user,
				 *                               the display name, blank otherwise.
				 */
				echo apply_filters( 'comment_form_logged_in', $args['logged_in_as'], $commenter, $user_identity );

				/**
				 * Fires after the is_user_logged_in() check in the comment form.
				 *
				 * @since 3.0.0
				 *
				 * @param array  $commenter     An array containing the comment author's
				 *                              username, email, and URL.
				 * @param string $user_identity If the commenter is a registered user,
				 *                              the display name, blank otherwise.
				 */
				do_action( 'comment_form_logged_in_after', $commenter, $user_identity );

			else :

				echo $args['comment_notes_before'];

			endif;

			// Prepare an array of all fields, including the textarea.
			$comment_fields = array( 'comment' => $args['comment_field'] ) + (array) $args['fields'];

			/**
			 * Filters the comment form fields, including the textarea.
			 *
			 * @since 4.4.0
			 *
			 * @param array $comment_fields The comment fields.
			 */
			$comment_fields = apply_filters( 'comment_form_fields', $comment_fields );

			// Get an array of field names, excluding the textarea.
			$comment_field_keys = array_diff( array_keys( $comment_fields ), array( 'comment' ) );

			// Get the first and the last field name, excluding the textarea.
			$first_field = reset( $comment_field_keys );
			$last_field  = end( $comment_field_keys );

			foreach ( $comment_fields as $name => $field ) {

				if ( 'comment' === $name ) {

					/**
					 * Filters the content of the comment textarea field for display.
					 *
					 * @since 3.0.0
					 *
					 * @param string $args_comment_field The content of the comment textarea field.
					 */
					echo apply_filters( 'comment_form_field_comment', $field );

					echo $args['comment_notes_after'];

				} elseif ( ! is_user_logged_in() ) {

					if ( $first_field === $name ) {
						/**
						 * Fires before the comment fields in the comment form, excluding the textarea.
						 *
						 * @since 3.0.0
						 */
						do_action( 'comment_form_before_fields' );
					}

					/**
					 * Filters a comment form field for display.
					 *
					 * The dynamic portion of the hook name, `$name`, refers to the name
					 * of the comment form field.
					 *
					 * Possible hook names include:
					 *
					 *  - `comment_form_field_comment`
					 *  - `comment_form_field_author`
					 *  - `comment_form_field_email`
					 *  - `comment_form_field_url`
					 *  - `comment_form_field_cookies`
					 *
					 * @since 3.0.0
					 *
					 * @param string $field The HTML-formatted output of the comment form field.
					 */
					echo apply_filters( "comment_form_field_{$name}", $field ) . "\n";

					if ( $last_field === $name ) {
						/**
						 * Fires after the comment fields in the comment form, excluding the textarea.
						 *
						 * @since 3.0.0
						 */
						do_action( 'comment_form_after_fields' );
					}
				}
			}

			$submit_button = sprintf(
				$args['submit_button'],
				esc_attr( $args['name_submit'] ),
				esc_attr( $args['id_submit'] ),
				esc_attr( $args['class_submit'] ),
				esc_attr( $args['label_submit'] )
			);

			/**
			 * Filters the submit button for the comment form to display.
			 *
			 * @since 4.2.0
			 *
			 * @param string $submit_button HTML markup for the submit button.
			 * @param array  $args          Arguments passed to comment_form().
			 */
			$submit_button = apply_filters( 'comment_form_submit_button', $submit_button, $args );

			$submit_field = sprintf(
				$args['submit_field'],
				$submit_button,
				get_comment_id_fields( $post_id )
			);

			/**
			 * Filters the submit field for the comment form to display.
			 *
			 * The submit field includes the submit button, hidden fields for the
			 * comment form, and any wrapper markup.
			 *
			 * @since 4.2.0
			 *
			 * @param string $submit_field HTML markup for the submit field.
			 * @param array  $args         Arguments passed to comment_form().
			 */
			echo apply_filters( 'comment_form_submit_field', $submit_field, $args );

			/**
			 * Fires at the bottom of the comment form, inside the closing form tag.
			 *
			 * @since 1.5.0
			 *
			 * @param int $post_id The post ID.
			 */
			do_action( 'comment_form', $post_id );

			echo '</form>';

		endif;
		?>
	</div><!-- #respond -->
	<?php

	/**
	 * Fires after the comment form.
	 *
	 * @since 3.0.0
	 */
	do_action( 'comment_form_after' );
}


?>