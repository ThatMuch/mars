<?
/**
 * The template displaying the posts-overview
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       mars_1.0.0
 */

?>

<?php get_header(); ?>
<main id="blog">
<div class="container">
<section>
  <div class="row card-blog-featured">
        <?php $args = array(
            'post_type' => 'post',
            'posts_per_page' => 1
          );
                    $query = new WP_Query( $args );
                      if ( $query->have_posts() ) {
                          while ( $query->have_posts() ) {
                $query->the_post();?>
                  <?php if(get_post_thumbnail_id( $post->ID )) : ?>
                <div class="col-sm-6">
                  <div class="card-blog-featured_wrapper">
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <img data-src="<?php echo $image[0]; ?>" class="card-blog-featured_img" alt="<?php the_title(); ?>"/>
                  </div>
                </div>
                <?php endif; ?>
                <div class="col-sm-6">
                  <div class="p-3">
                    <h3 ><a href="<?php the_permalink() ?>" target="_blank" rel="noopener noreferrer"><?php the_title(); ?></a></h3>
                    <div class="card-blog-featured_excerpt">
                      <?php  excerpt(55); ?>
                      </div>
                  </div>
                </div>
                <?php }} wp_reset_postdata(); ?>
      </div>
          <div class="row mb-5">
              <?php $args = array(
            'post_type' => 'post',
            'posts_per_page' => 3
          );
                    $query = new WP_Query( $args );

                      if ( $query->have_posts() ) {
                          while ( $query->have_posts() ) {
                            $query->the_post();?>

                              <div class="col-sm-4">
                  <div class="card-blog">
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                    <?php if(get_post_thumbnail_id( $post->ID )) : ?>
                    <div class="card-blog_wrapper">
                      <img data-src="<?php echo $image[0]; ?>" class="card-blog_img" alt="<?php the_title(); ?>"/>
                    </div>
                    <?php endif; ?>
                    <div class="card-blog_title d-none d-md-block">
                      <h3 ><a href="<?php the_permalink() ?>" target="_blank" rel="noopener noreferrer"><?php the_title(); ?></a></h3>
                    </div>
                    <div class="card-blog_title mobile d-block d-md-none">
                      <h3><a href="<?php the_permalink() ?>" target="_blank" rel="noopener noreferrer"><?php the_title(); ?></a></h3>
                    </div>
                    <div class="card-blog_excerpt">
                    <?php echo excerpt(15); ?>
                    </div>
                  </div>
                              </div>
                                <?php
                          }
                      }
          wp_reset_postdata();
        ?>
          </div>

</section>

<section></section>
<section class="catgories"></section>
<?php the_posts_pagination( array(
	'mid_size'  => 2,
	'prev_text' => __( '<', 'stanlee' ),
  'next_text' => __( '>', 'stanlee' ),
  'screen_reader_text' => __( '&nbsp;' )
) ); ?>

</div>
</main>
<?php get_footer(); ?>
