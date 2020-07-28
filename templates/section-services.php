<?

/**
 * Services Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       mars_1.0.0
 *
 */
?>
<?php $fond = get_sub_field('fond'); ?>
<section class="section section-services <?php echo  $fond == "Couleur" ? "bg-primary": $fond == "Gris" ? "bg-light" : "" ?>">
      <div class="container">
            <!-- Title -->
            <?php if (get_sub_field('title')) : ?>
                  <h2 class="section__title primary text-left"><?php echo  get_sub_field('title'); ?></h2>
            <?php endif; ?>
            <!-- Title -->
            <div class="row mt-5">
                  <!-- Service -->
                  <?php if (have_rows('service')) : ?>
                        <?php while (have_rows('service')) : the_row(); ?>
                              <div class="col-lg-4 col-md-12 section-services__item">
                                    <?php if (get_sub_field('link')) : ?>
                                          <a class="no-style" href="<?php echo  get_sub_field('link'); ?>">
                                                <!-- Image -->
                                                <?php if (get_sub_field('image')) : $img = get_sub_field('image'); ?>
                                                      <div class="block__image--bordered">
                                                            <div class="img-box">
                                                                  <img class="section-service__image shadow" src="<?php echo  $img['sizes']['medium'] ?>" alt="<?php echo  $img['alt']; ?>">
                                                            </div>
                                                            <div class="bordered left-bottom"></div>
                                                      </div>
                                                <?php endif; ?>
                                                <!-- Image -->

                                                <!-- Icon title -->
                                                <?php if (get_sub_field('title')) : ?>
                                                      <h3 class="section-services__item__title">
                                                            <?php echo  get_sub_field('title'); ?>
                                                      </h3>
                                                <?php endif; ?>
                                                <!-- Icon title -->
                                                <!-- Texte -->
                                                <?php if (get_sub_field('text')) : ?>
                                                      <p class="section-services__item__text"> <?php echo  get_sub_field('text'); ?></p>
                                                <?php endif; ?>
                                                <!-- Texte -->
                                          </a>
                                    <?php endif; ?>
                              </div>
                        <?php endwhile; ?>
                  <?php endif; ?>
                  <!-- Service -->
            </div>
      </div>
</section>