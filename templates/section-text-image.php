<?

/**
 * Texte-Image Block
 * This is a (very basic) default ACF-Block using the "Flexible Element" field-type
 * it is included through 'functions-sections.php' which is triggered by 'sections.php'.
 *
 * @author      ThatMuch
 * @version     0.1.0
 * @since       mars_1.0.0
 *
 */
?>

<section id="section-<?php echo  sectionID(get_sub_field('title'));?>" class="section section-text-image">
    <div class="container">
        <div class="section-text-image__title">
            <?php if (get_sub_field('title')) : ?>
                <h2 class="inline"><?php echo get_sub_field('title'); ?></h2>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-12 section-text-image__image">
                <div class="block__image--bordered">
                    <div class="img-box">
                    <?php if (get_sub_field('image')) : $img = get_sub_field('image'); ?>
                        <img src="<?php echo  $img['url']?>" class="img-fluid" />
                    <?php endif; ?>
                    </div>
                    <div class="bordered left-bottom"></div>
                </div>
                <!-- Button -->
                <?php if ( get_sub_field('button') ) : $link = get_sub_field('button'); ?>
                <div class="section-text-image__btn d-none d-md-block" target="<?php echo  $link['target']; ?>">
                    <a class="btn btn-primary" href="<?php echo  $link['url']; ?>">
                        <?php echo  $link['title']; ?>
                    </a>
                </div>
                <?php endif; ?>
                <!-- Button -->
            </div>
            <div class="col-md-8 col-sm-12 section-text-image__text">
                <div class="section-text-image__text__inner">
                    <!-- Text -->
                    <?php if (get_sub_field('text')) : ?>
                        <?php echo  get_sub_field('text'); ?>
                    <?php endif; ?>
                    <!-- Text -->
                   <!-- Button -->
                   <?php if ( get_sub_field('button') ) : $link = get_sub_field('button'); ?>
                <div class="section-text-image__btn d-md-none d-block" target="<?php echo  $link['target']; ?>">
                    <a class="btn btn-primary" href="<?php echo  $link['url']; ?>">
                        <?php echo  $link['title']; ?>
                    </a>
                </div>
                <?php endif; ?>
                <!-- Button -->
                </div>
            </div>
        </div>
    </div>
</section>