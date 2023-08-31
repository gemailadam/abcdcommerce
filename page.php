
<?php get_header( ) ?>
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
<?php get_footer(  ); ?>