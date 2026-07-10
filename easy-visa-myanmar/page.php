<?php
/**
 * Page template.
 */
get_header();
?>

<main id="primary" class="site-main">
  <?php while (have_posts()) : the_post(); ?>
    <section class="page-hero">
      <div class="evm-container">
        <h1><?php the_title(); ?></h1>
      </div>
    </section>

    <section class="evm-section">
      <div class="evm-container">
        <article <?php post_class('entry-content'); ?>>
          <?php if (has_post_thumbnail()) : ?>
            <div style="margin-bottom:28px;border-radius:24px;overflow:hidden;">
              <?php the_post_thumbnail('evm-wide'); ?>
            </div>
          <?php endif; ?>

          <?php the_content(); ?>
        </article>
      </div>
    </section>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
