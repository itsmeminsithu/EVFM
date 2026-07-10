<?php
/**
 * Single post template.
 */
get_header();
?>

<main id="primary" class="site-main">
  <?php while (have_posts()) : the_post(); ?>
    <section class="page-hero">
      <div class="evm-container">
        <span class="section-kicker"><?php echo esc_html(get_post_type_object(get_post_type())->labels->singular_name ?? 'Article'); ?></span>
        <h1><?php the_title(); ?></h1>
        <p class="post-meta">
          <span><?php echo esc_html(get_the_date()); ?></span>
          <span><?php esc_html_e('By', 'easy-visa-myanmar'); ?> <?php the_author(); ?></span>
        </p>
      </div>
    </section>

    <section class="evm-section">
      <div class="evm-container content-layout">
        <article <?php post_class('entry-content'); ?>>
          <?php if (has_post_thumbnail()) : ?>
            <div style="margin-bottom:28px;border-radius:24px;overflow:hidden;">
              <?php the_post_thumbnail('evm-wide'); ?>
            </div>
          <?php endif; ?>

          <?php the_content(); ?>

          <?php
          wp_link_pages(array(
            'before' => '<div class="page-links">',
            'after'  => '</div>',
          ));
          ?>
        </article>

        <aside class="sidebar-card">
          <h3><?php esc_html_e('Need travel help?', 'easy-visa-myanmar'); ?></h3>
          <p><?php esc_html_e('Contact Easy Visa For Myanmar for visa, flight, hotel and travel support.', 'easy-visa-myanmar'); ?></p>
          <a class="evm-btn evm-btn-primary" href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Contact Us', 'easy-visa-myanmar'); ?></a>
        </aside>
      </div>
    </section>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
