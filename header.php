<!DOCTYPE html>
<html <?php language_attributes(  ); ?>>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( $sep= "|", $display=true, $seplocation="" ); ?></title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(  );?>/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(  );?>/css/bootstrap-grid.rtl.css">
    <!--link rel="stylesheet" href="<?php echo get_template_directory_uri(  );?>/css/bootstrap-grid.css"-->

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;600&display=swap" rel="stylesheet">

<?php wp_head(  ); ?>
</head>
<body <?php body_class(  ); ?>>
<div class="container-1920 ">
    <header>
        <div class="sec-menu">
    <?php wp_nav_menu( array ('theme_location' => 'secandry_header_menu') ); ?>
</div>
<!-- latest-posts-class-qwe start-->
    <div id="latest-posts-id-qwe" class="slider-container-qwe col-xxl-12"><!--class="latest-posts-class-qwe-->
    <?php slider_qwe(); ?>
    <!-- <h2>أحدث المقالات</h2> -->
    <!-- <br> -->
    <!-- latest 2 post start-->
    <?php
	//$recent_posts = wp_get_recent_posts(array(
	//'numberposts' => 5, // Number of recent posts thumbnails to display
	//'post_status' => 'publish' // Show only the published posts
	//));
    //$io=1;
	//foreach( $recent_posts as $post_item ) : ?>
    <!-- <a class="abc-<?php echo $io; ?> abc-<?php echo $post_item['ID']; ?>" href="<?php echo get_permalink($post_item['ID']); ?>"> -->
        <?php //echo get_the_post_thumbnail($post_item['ID'], 'full'); ?>
        <!-- Assuming that the slider support captions  -->
        <!-- <p class="slider-caption-class"><?php //echo $post_item['post_title'] ?></p> -->
    <!-- </a> -->

    <?php //$io++; endforeach; ?>
    </div><!-- latest-posts-class-qwe end-->
<div class="fir-menu">
<?php wp_nav_menu( 'theme_location' , 'main_header_menu' ); ?>
    </div>    
</header>