<?
/**
 * The template for displaying all single posts and attachments
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       mars_1.0.0
 */
?>

<?php get_header(); ?>
<div class="container container-post">
  <main id="post" class="content-area">
<section>
  <?php if (have_posts() ) : while (have_posts()) : the_post(); ?>
    <article>
      <h1 class="text-center mb-5"><?php the_title(); ?></h1>
  <?php if ( $alt = get_the_post_thumbnail_caption() ) {
    // Nothing to do here
      } else {
          $alt = get_the_title();
      }?>
      <img src=" <?= the_post_thumbnail_url('large')?>" alt="<?= $alt ?>">
      <div class="postinfo mb-5"><?php echo  get_the_date_mars(); ?></div>
      <?php the_content(); ?>
    </article>
  <?php endwhile; endif; ?>
</section>

</main>
<?php // get_sidebar();?>
</div>

<?php get_footer(); ?>
