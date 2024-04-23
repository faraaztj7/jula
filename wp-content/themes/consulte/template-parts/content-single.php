<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package consulte
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
            if ( is_singular() ) :
                the_title( '<h1 class="entry-title">', '</h1>' );
            else :
                the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' );
            endif;
        ?>
    </header><!-- .entry-header -->
    <?php consulte_post_thumbnail(); ?>

     <ul class="consulte-blog-meta-info">
        <li><i class="icofont-folder-open"></i>    
            <?php the_category( ', ' ); ?>
   </li>
        <li><i class="icofont-ui-clock"></i> <?php echo esc_html( get_the_modified_date() ); ?></li>

        <li><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>"><i class="icofont-user-alt-5"></i> <?php the_author(); ?></a></li>
        

    </ul>   

    <div class="consulte-excerpt">
        <?php the_content(); ?>

    </div><!-- .entry-content -->

    <?php if(wp_link_pages()): ?>
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
    <?php endif; ?>  
        <?php 
            $posttags = get_the_tags();
            if( $posttags ){ ?>
            <div class="tagcloud"><?php the_tags( ' ', ' ' ); ?></div>
        <?php } ?>


            <?php 
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    $blog_prev_text = get_option( 'consulte_blog_prev_text', esc_html__( 'Prev','consulte' ));
                    $blog_next_text = get_option( 'consulte_blog_next_text', esc_html__( 'Next','consulte' ));
                    
                 if ( !empty( $prev_post ) || !empty( $next_post ) ): ?>
                    <div class="next-prev clear">
                        <?php
                        if (!empty( $prev_post )): ?>
                          <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="prev-btn" ><i class="icofont-rounded-left"></i><?php if ( !empty( $blog_prev_text )  ) { echo wp_kses_post( $blog_prev_text); } ?></a>
                        <?php endif ?>

                        <?php
                        if (!empty( $next_post )): ?>
                          <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="next-btn"><?php if ( !empty( $blog_next_text )  ) { echo wp_kses_post( $blog_next_text); } ?><i class="icofont-rounded-right"></i></a>
                        <?php endif; ?>
                    </div> 
                <?php endif ?>
        <?php 
            $related = get_posts( array( 
                'category__in' => wp_get_post_categories($post->ID),
                'numberposts' =>2,
                'post_type' => 'post', 
                'post__not_in' => array($post->ID) 
            ) );
        ?>
        <?php if ( $related ): ?>
            <div class="consulte-related-post">
                <h2><?php echo esc_html__('Related Posts','consulte' ); ?></h2>
                <div class="row">
                    <?php
                        if( $related ) foreach( $related as $post ) { 
                        setup_postdata($post); ?>
                        <div class="col-sm-6">
                            <div class="single-related-post">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <a href="<?php the_permalink(); ?>"> 
                                <?php the_post_thumbnail('consulte_size_370X370');  ?> 
                                </a> 
                            <?php endif; ?>
                                <div class="consulte-category-list">
                                    <?php the_category( ', ' ); ?>
                                </div>
                                <div class="related-post-title">
                                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                </div>
                            </div>
                        </div>

                    <?php  } wp_reset_postdata(); ?> 
                </div>
            </div>
        <?php endif ?>

</article><!-- #post- -->
