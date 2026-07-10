<?php
/**
 * Single Visa Guide template.
 */
get_header();
?>

<main id="primary" class="site-main">
  <?php while (have_posts()) : the_post(); ?>
    <section class="page-hero evm-guide-single-hero">
      <div class="evm-container">
        <span class="section-kicker"><?php esc_html_e('Visa Guide', 'easy-visa-myanmar'); ?></span>
        <h1><?php the_title(); ?></h1>
        <p class="post-meta">
          <span><?php echo esc_html(sprintf(__('Published: %s', 'easy-visa-myanmar'), get_the_date())); ?></span>
          <span><?php echo esc_html(sprintf(__('Updated: %s', 'easy-visa-myanmar'), get_the_modified_date())); ?></span>
          <span><?php echo evm_get_guide_category_links(get_the_ID()); ?></span>
        </p>
      </div>
    </section>

    <section class="evm-section">
      <div class="evm-container content-layout evm-guide-single-layout">
        <article <?php post_class('entry-content evm-guide-entry'); ?>>
          <?php if (has_post_thumbnail()) : ?>
            <div class="evm-guide-featured-image">
              <?php the_post_thumbnail('evm-wide'); ?>
            </div>
          <?php endif; ?>

          <?php the_content(); ?>

          <div class="evm-guide-inline-cta">
            <div>
              <span class="section-kicker"><?php esc_html_e('Ready to request?', 'easy-visa-myanmar'); ?></span>
              <h2><?php esc_html_e('Start with the correct service form', 'easy-visa-myanmar'); ?></h2>
              <p><?php esc_html_e('Submit only basic request details first. Our admin team will contact you through your selected method.', 'easy-visa-myanmar'); ?></p>
            </div>
            <a class="evm-btn evm-btn-primary" href="<?php echo esc_url(evm_get_guide_cta_url(get_the_ID())); ?>"><?php echo esc_html(evm_get_guide_cta_text(get_the_ID())); ?></a>
          </div>

          <?php
          wp_link_pages(array(
            'before' => '<div class="page-links">',
            'after'  => '</div>',
          ));
          ?>
        </article>

        <aside class="sidebar-card evm-guide-sidebar">
          <h3><?php esc_html_e('Need help?', 'easy-visa-myanmar'); ?></h3>
          <p><?php esc_html_e('Contact Easy Visa For Myanmar or start a service request from the booking area.', 'easy-visa-myanmar'); ?></p>
          <a class="evm-btn evm-btn-primary" href="<?php echo esc_url(evm_get_guide_cta_url(get_the_ID())); ?>"><?php echo esc_html(evm_get_guide_cta_text(get_the_ID())); ?></a>
          <a class="evm-btn evm-btn-outline" href="<?php echo esc_url(home_url('/visa-guides/')); ?>"><?php esc_html_e('All Visa Guides', 'easy-visa-myanmar'); ?></a>

          <div class="evm-guide-sidebar-note">
            <strong><?php esc_html_e('Safety note', 'easy-visa-myanmar'); ?></strong>
            <p><?php esc_html_e('Do not send passport photos, ID cards, bank details or private documents through public website forms.', 'easy-visa-myanmar'); ?></p>
          </div>
        </aside>
      </div>
    </section>

    <section class="evm-section evm-related-guides-section">
      <div class="evm-container">
        <div class="section-heading compact">
          <span class="section-kicker"><?php esc_html_e('Related Guides', 'easy-visa-myanmar'); ?></span>
          <h2><?php esc_html_e('Read more before submitting', 'easy-visa-myanmar'); ?></h2>
        </div>
        <?php echo do_shortcode('[evm_visa_guides limit="3"]'); ?>
      </div>
    </section>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
