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

<h1 style="color:green;">ok</h1>

<?php
//echo do_shortcode("[woocommerce_recently_viewed_products per_page='5']");
?>

<div class="fir-menu">
<?php wp_nav_menu( 'theme_location' , 'main_header_menu' ); ?>
    </div>    
</header>