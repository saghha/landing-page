<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _s
 */
global $is_portfolio;
if ($is_portfolio) {
    the_content();
    return true;
}
?>

<div class="blog-item">
    <div class="row">
        <div class="col-xs-12 col-sm-3 text-center">
            <div class="entry-meta">
                <span id="publish_date"><?php _s_posted_on(); ?></span>
                <span><i class="fa fa-user"></i> <a href="#"><?php echo get_the_author() ?></a></span>
                <span><i class="fa fa-comment"></i> <a href="#comments"><?php echo get_comments_number() ?> Comments</a></span>
            </div>
        </div>

        <div class="col-xs-12 col-sm-9 blog-content">
			<?php
        	if ( has_post_thumbnail( get_the_ID()) ):
        	?>
            <a href="#"><img class="img-responsive img-blog" src="<?php echo esc_url( get_the_post_thumbnail() ); ?>" width="100%" alt="" /></a>
            <?php endif ?>
            <?php the_title( sprintf( '<h2><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            <h3>
				<?php the_content(); ?>
				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', '_s' ),
						'after'  => '</div>',
					) );
				?>
            </h3>

            <footer class="entry-footer">
				<?php
					function custom_edit_post_link($output) {

					    return $output = str_replace(array(
					    	'">',
					    	'class="post-edit-link"'
					    ), 
					    array(
					    	'"><i class="fa fa-pencil"></i> ',
					    	'class="post-edit-link btn btn-warning"'
					    ), 
					    $output);
					}
					add_filter('edit_post_link', 'custom_edit_post_link');

					edit_post_link(
						sprintf(
							/* translators: %s: Name of current post */
							esc_html__( 'Edit %s', '_s' ),
							the_title( '<span class="screen-reader-text">"', '"</span>', false )
						)
					);
				?>
			</footer><!-- .entry-footer -->
        </div>
    </div>
</div><!--/.blog-item-->

<div class="media reply_section">
    <div class="pull-left post_reply text-center">
        <a href="#">
        	<?php echo get_avatar( get_the_author_meta( 'ID' ), 128, null, null, array('class'=>'img-circle')); ?>
        </a>
        <ul>
            <?php 
            $facebook = get_the_author_meta('wp_itaxxion_facebook');
            if ( !empty($facebook)) { ?>
            <li><a href="<?php echo $facebook; ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
            <?php  
            } 
            $twitter = get_the_author_meta('wp_itaxxion_twitter');
            if (!empty($twitter)) {
            ?>
            <li><a href="<?php echo $twitter; ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
            <?php
            }
            $gplus = get_the_author_meta('wp_itaxxion_gplus');
            if (!empty($gplus)) {
            ?>
            <li><a href="<?php echo $gplus; ?>" target="_blank"><i class="fa fa-google-plus"></i> </a></li>
            <?php
            }
            $github = get_the_author_meta('wp_itaxxion_github');
            if (!empty($github)) {
            ?>
            <li><a href="<?php echo $github; ?>" target="_blank"><i class="fa fa-github"></i> </a></li>
            <?php
            }
            ?>
        </ul>
    </div>
    <div class="media-body post_reply_content">
        <h3><?php echo get_the_author() ?></h3>
        <p class="lead"><?php echo get_the_author_meta( 'description' ) ?></p>
        <p><strong>Web:</strong> <a href="<?php echo get_the_author_meta( 'url' ) ?>"><?php echo get_the_author_meta( 'url' ) ?></a></p>
    </div>
</div>
