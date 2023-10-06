<?php get_header('noslide') ?>
<div class="index-articles-and-sidebar">
<!-- <div class="prcent80"> -->
    <div class="prcent80 prcent80-1920 col-xxl-10 col-xl-4 col-lg-6 col-md-2 col-sm-6 col-6"> 
        
<?php   
if(have_posts(  )){
    while(have_posts(  )){
		echo '<div class="prcent100 col-xxl-12">'; 
        the_post();
        echo '<div class="thumbnail-single">';
		the_post_thumbnail();
        echo '</div>';
        ?>
         

		 
          <h2 class="post_title">
            <a href="">
                <?php the_title(  ); ?>
            </a>

			<?php
			// echo '<div class="postedby">';
			// echo '<b>';
			// echo '<a href="';
			//the_author_link();
			// echo '"><span>تم بواسطة الكاتب: ';
			// the_author();
			// the_author_posts_link();
			// echo ' , </span></a>';
			// echo '<a href="';
			// the_permalink();
			// echo '"><span> في تاريخ : ';
			// the_date( get_option( 'date_format', 'F Y'));
			// echo '</span></a>';
			// echo '<a><span>  التصنيفات : ';
			// the_category();
			// echo '</span></a>&#160';	
			// echo '<a><span>';
			// the_tags();
			echo "</span></a>";
			// echo '</b>';
			// echo '</div>';
			// echo '<!-- END post by class -->';
			
			?>

<div class="postedby">
<a href="<?php permalink_link(  ); ?>"><span>الكاتب:<?php the_author_posts_link();?>  , </span></a>
<a href="<?php the_permalink(); ?>"><span> النشر في :<?php the_date( get_option( 'date_format', 'F Y')); ?></span></a>
<a><span>  التصنيفات :<?php the_category(); ?> </span></a>
<a><span><?php the_tags(); ?> </span></a>
</div>
<!-- END post by class -->
          <h2>
            <div class="the_contents">
                <?php the_content(  ); ?>
                <?php //the_excerpt(  ); ?>
				<?php
// If comments are open or we have at least one comment, load up the comment template.
// if ( comments_open() || get_comments_number() ) {
	comments_template();
// }
				?>

            </div>
			</div><!-- class persent25 -->

        <?php
    }
}
?>
</div>

<div class="prcent20 col-xxl-2 col-xl-8 col-lg-6 col-md-9 col-sm-6 col-6">
<?php get_sidebar( ); ?>
</div>
</div><!-- index-articls-and-sidebar-->
<hr>

<?php get_footer(  ); ?>




















<!--main id="posts-page-single" class="posts-page-single-class-qwe">

		<?php
		while ( have_posts() ) :
			the_post();
			the_post_thumbnail();
			?>
			<div class="entry-meta">
				<?php
				default_posted_on();
				default_posted_by();
				?>
			    </div>
			<div class="post-content-qwe">

			<a href="<?php the_permalink(); ?>"><?php echo the_title( );?></a>
			<?php
			the_content();
			?>
			</div>
			<?php
			get_sidebar();
			the_post_navigation(
				array(
					'prev_text' => ''. esc_html__( 'السابق:', 'default' ) . '%title',
					'next_text' => '' . esc_html__( 'التالي:', 'default' ) . '%title',
				)
			);

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
		<?php ?>

	</main--><!-- #main -->


