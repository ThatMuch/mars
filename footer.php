<?

/**
 * @author      ThatMuch
 * @version     0.1.0
 * @since       mars_1.0.0
 */
?>
</div><!-- #content -->
<footer class="footer">
<?php $images = get_field('bg_img', 'option');?>
	<div class="footer__upper" style="background-image: url(<?= $images ?>)">
	<div class="container">
		<div class="row">
			<div class="col-sm-5 footer__upper__img ">
				<?php if ( get_field('img', 'option') ) : $image = get_field('img', 'option'); ?>
					<!-- Thumbnail image -->
					<img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" class="img-circle img-shadow"/>

				<?php endif; ?>
			</div>
			<div class="col-sm-7 footer__upper__content">
				<?php if (get_field('title', 'option')) : ?>
				<h4 class="text-white"><?php echo  get_field('title', 'option'); ?></h4>
				<?php endif; ?>
				<?php if (get_field('text', 'option')) : ?>
				<p class="mb-4"><?php echo  get_field('text', 'option'); ?></p>
				<?php endif; ?>
				<?php
				$link = get_field('cta', 'option');
				if( $link ):
					$link_url = $link['url'];
					$link_title = $link['title'];
					$link_target = $link['target'] ? $link['target'] : '_self';
					?>
					<a class="btn btn-light" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
				<?php endif; ?>
			</div>

		</div>
	</div>
	</div>
	<div class="container">
		<div class="row footer__lower footer__inner">
			<?php if (have_rows('rs', 'options')) : ?>
				<div class="col-md-3 col-sm-12 text-center d-flex flex-column justify-content-center">
					<div class="footer__logo">
						<img data-src="<?php echo  get_template_directory_uri() ?>/assets/images/MarsLogoWhite.webp" alt="logo footer">
					</div>
					<p class="footer__follow-us">Suivez nous !</p>
					<?php while (have_rows('rs', 'options')) : the_row(); ?>
						<ul class="footer__rs">
							<?php if (get_sub_field('facebook')) : ?>
								<li class="footer__rs__item">
									<a href="<?php the_sub_field('facebook'); ?>">
										<i class="fab fa-facebook" aria-hidden="true"></i>
									</a>
								</li>
							<?php endif; ?>
							<?php if (get_sub_field('twitter')) : ?>
								<li class="footer__rs__item">
									<a href="<?php the_sub_field('twitter'); ?>">
										<i class="fab fa-twitter" aria-hidden="true"></i>
									</a>
								</li>
							<?php endif; ?>
							<?php if (get_sub_field('linkedin')) : ?>
								<li class="footer__rs__item">
									<a href="<?php the_sub_field('linkedin'); ?>">
										<i class="fab fa-linkedin" aria-hidden="true"></i>
									</a>
								</li>
							<?php endif; ?>
							<?php if (get_sub_field('instagram')) : ?>
								<li class="footer__rs__item">
									<a href="<?php the_sub_field('instagram'); ?>">
										<i class="fab fa-instagram" aria-hidden="true"></i>
									</a>
								</li>
							<?php endif; ?>
						</ul>
					<?php endwhile; ?>
				</div>
			<?php endif; ?>

			<?php if (is_active_sidebar('footer-1')) {
				dynamic_sidebar('footer-1');
			} ?>

			<div class="col-md-3 col-sm-12 footer__infos">
						<p><?php echo  get_bloginfo('name'); ?></p>
					<?php if (get_field('adress', 'option')) : ?>
							<p class="mb-2"><?php echo  get_field('adress', 'option'); ?></p>
					<?php endif; ?>
					<?php if (get_field('contact_mail', 'option')) : ?>
							<a href="mailto:<?= get_field('contact_mail', 'option');?>"><?php echo  get_field('contact_mail', 'option'); ?></a>
					<?php endif; ?>
					<?php if (get_field('phone', 'option')) : ?>
							<a href="tel:<?= get_field('phone', 'option'); ?>"><?php echo  get_field('phone', 'option'); ?></a>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="footer__credits">
		<div class="container">
			<div class="p-2">
				©Copyright <?php echo date("Y"); ?>, Tous droits réservés <?php echo get_bloginfo( 'name' )?>
			</div>
			<a class="footer__credits__thatmuch" href="https://thatmuch.fr" target="_blank" rel="noopener noreferrer">
				<img src="<?php echo  get_template_directory_uri() ?>/assets/images/thatmuch-logo.webp" alt="logo that much">
			</a>
		</div>
	</div>
</footer>
<?php wp_footer() ?>
</body>

</html>