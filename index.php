<?php get_header( ) ?>
<div class="index-articles-and-sidebar">
<!-- <div class="prcent80"> -->
    <div class="prcent80 prcent80-1920 col-xxl-10 col-xl-4 col-lg-6 col-md-2 col-sm-6 col-6"> 
        
        <?php  
if(have_posts(  )){
    while(have_posts(  )){
        echo '<div class="prcent25 col-xxl-3">'; 
        the_post();
        echo '<div class="thumbnail-all">';
		the_post_thumbnail();
        echo '</div>';
        ?>
          
          <h2 class="post_title">
    <a href="<?php the_permalink(); ?>">
                <?php the_title(  ); ?>
            </a>
          </h2>

          <?php
			// echo '<div class="postedby-index">';
			// echo '<b>';
			// echo '<a href="';
			//the_author_link();
			// echo '"><span>الكاتب: ';
			// the_author();
			// the_author_posts_link();
			// echo ' , </span></a>';
			// echo '<a href="';
			// the_permalink();
			// echo '"><span> النشر في : ';
			// the_date( get_option( 'date_format', 'F Y'));
			// echo '</span></a>';
			// echo '</div>';
			// echo '<!-- END post by class -->';
			
			?>
<div class="postedby-index">
<a href="<?php permalink_link(  ); ?>"><span>الكاتب:<?php the_author_posts_link();?>  , </span></a>
<a href="<?php the_permalink(); ?>"><span> النشر في :<?php the_date( get_option( 'date_format', 'F Y')); ?></span></a>
</div>
<!-- END post by class -->


            <div class="the_contents">
                <?php //the_content(  ); ?>
                <?php the_excerpt( ); ?>

            </div>
        </div><!-- class persent25 -->

        <?php
    }
}

?>
</div>
<!-- <div class="prcent20"> -->
<div class="prcent20 col-xxl-2 col-xl-8 col-lg-6 col-md-9 col-sm-6 col-6">
<?php get_sidebar( ); ?>
</div>
</div><!-- index-articls-and-sidebar-->
<hr>
<div class="most-seen-posts-qwe">
    <br>
    <h2>الأكثر مشاهدة</h2>
    <br>
    <?php popular_posts_per_category();?>
</div><!-- most-seen-posts-qwe -->

<hr>
<?php get_footer( ); ?>
