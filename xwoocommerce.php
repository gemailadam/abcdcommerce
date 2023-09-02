
<?php get_header('noslide'); ?>
<div class="prcent80 col-xxl-10 col-xl-4 col-lg-6 col-md-2 col-sm-6 col-6"> 

<?php   
if(have_posts(  )){
    woocommerce_content();
}

?>
</div>
<div class="prcent20 col-xxl-2 col-xl-8 col-lg-6 col-md-9 col-sm-6 col-6">
<?php get_sidebar( ); ?>
</div>
<?php get_footer(  ); ?>