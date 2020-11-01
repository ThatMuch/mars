<?
/**
 * Articles Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       silence_1.0.0
 *
 */
 ?>


 <section class="section section-articles">
	<div class="container">
		<!-- Title -->
		<?php if (get_sub_field('title')) : ?>
			<h2 class="section__title primary"><?php echo  get_sub_field('title'); ?></h2>
		<?php endif; ?>
		<!-- Title -->

        <div class="row">
            <?php $args = array(
					'post_type' => 'post',
					'posts_per_page' => 3
				);
                	$query = new WP_Query( $args );

                    if ( $query->have_posts() ) {
                        while ( $query->have_posts() ) {
                        	$query->the_post();?>

                            <div class="col-md-4">
								<div class="card-blog">
									<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
									<div class="card-blog_wrapper">
										<img src="<?php echo $image[0]; ?>" class="card-blog_img" alt="<?php the_title(); ?>"/>
									</div>
									<h3 class="card-blog_title"><a href="<?php the_permalink() ?>" target="_blank" rel="noopener noreferrer"><?php the_title(); ?></a></h3>
									<div class="card-blog_excerpt">
									<?php  the_excerpt(); ?>
									</div>
								</div>
                            </div>
                              <?php
                        }
                  	}
				wp_reset_postdata();
			?>
        </div>
		<?php
			$link = get_sub_field('bouton');
			if( $link ):
				$link_url = $link['url'];
				$link_title = $link['title'];
		?>
			<a class="btn btn-primary mt-auto" href="<?php echo esc_url( $link_url ); ?>"><?php echo esc_html( $link_title ); ?></a>
		<?php endif; ?>
	</div>
 </section>