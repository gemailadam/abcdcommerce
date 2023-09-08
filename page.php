
<?php get_header('noslide'); ?>
<div class="wraperr">
<div class="prcent80 col-xxl-10 col-xl-4 col-lg-6 col-md-2 col-sm-6 col-6"> 

<?php   
if(have_posts(  )){
    while(have_posts(  )){
        the_post();

        ?>
          
          <h2 class="post_title">
            <a href="">
                <?php the_title(  ); ?>
            </a>
          <h2>
            <div class="the_contents">
                <?php the_content(  ); ?>
                <?php //the_excerpt(  ); ?>

            </div>

        <?php
    }
}

?>
</div>
<!-- <div class="prcent20"> -->
<div class="prcent20 col-xxl-2 col-xl-8 col-lg-6 col-md-9 col-sm-6 col-6">
<?php get_sidebar( ); ?>
</div>
</div>
<?php get_footer(  ); ?>