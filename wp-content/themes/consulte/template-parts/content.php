<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package consulte
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'consulte-single-blog' ); ?>>
	
    <div class="consulte-blog-content-area">
        <?php if(has_post_thumbnail()): ?>
        <div class="consulte-blog-thumb">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'consulte_size_250X156' ); ?></a>
        </div>
        <?php endif; ?>
        <div class="consulte-blog-content <?php if( !has_post_thumbnail()){ echo "consulte-no-padding"; } ?> ">
            <div class="consulte-category-list">
            <?php the_category( ', ' ); ?>
            </div>
    		<?php
    		if ( is_singular() ) :
    			the_title( '<h1 class="entry-title">', '</h1>' );
    		else :
    			the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );
    		endif;

    		if ( 'post' === get_post_type() ) :
    			?>
            <ul class="consulte-blog-meta-info">
                <li><?php echo esc_html( get_the_modified_date() ); ?></li>
                <li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><?php the_author(); ?></a></li>
                
            </ul>
    		<?php endif; ?>

            <?php if ( get_option('consulte_show_content') == true ): ?>
            <div class="consulte-excerpt">
        		<?php echo wp_trim_words( get_the_content(), 25, '...' ); ?>

            </div>
            <?php endif; ?>
            <div class="desc fix">

                <?php
                 wp_link_pages( array(
                        'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'consulte' ) . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                        'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'consulte' ) . ' </span>%',
                        'separator'   => '<span class="screen-reader-text">, </span>',
                    ) );
                ?>
                
            </div>
            
    		<?php
                $read_more_text = get_option( 'consulte_read_more_text' );
                $show_read_more_button = get_option('consulte_show_read_more_button');
             if ( !is_singular() && $show_read_more_button == "1" && !empty( $read_more_text ) ): ?>
    	       <a class="consulte-read_more_btn" href="<?php the_permalink();?>"><?php echo wp_kses_post( $read_more_text);?></a>
    		<?php endif; ?>
            
        </div>
    </div>

</article><!-- #post- -->

