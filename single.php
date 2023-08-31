<?php get_header( ) ?>
<?php   
if(have_posts(  )){
    while(have_posts(  )){
        the_post();
		echo '<div class="thumbnail-all">';
		the_post_thumbnail();
        echo '</div>';
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


