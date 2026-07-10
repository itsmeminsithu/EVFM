<?php
/**
 * Visa Guide category archive template.
 */
get_header();
$term = get_queried_object();
?>

<main id="primary" class="site-main">
  <section class="page-hero evm-guide-archive-hero">
    <div class="evm-container">
      <span class="section-kicker"><?php esc_html_e('Guide Category', 'easy-visa-myanmar'); ?></span>
      <h1><?php echo esc_html($term->name ?? __('Visa Guides', 'easy-visa-myanmar')); ?></h1>
      <?php if (!empty($term->description)) : ?>
        <p><?php echo esc_html(wp_strip_all_tags($term->description)); ?></p>
      <?php else : ?>
        <p><?php esc_html_e('Helpful guides for this service category.', 'easy-visa-myanmar'); ?></p>
      <?php endif; ?>
    </div>
  </section>

  <section class="evm-section evm-guide-archive-section">
    <div class="evm-container">
      <form class="evm-guide-search-form" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
        <label for="evm-guide-search"><?php esc_html_e('Search guides', 'easy-visa-myanmar'); ?></label>
        <input id="evm-guide-search" type="search" name="s" value="<?php echo esc_attr(get_search_query()); ?>" placeholder="<?php esc_attr_e('Search Visa Guides...', 'easy-visa-myanmar'); ?>">
        <input type="hidden" name="post_type" value="evm_visa_guide">
        <button type="submit"><?php esc_html_e('Search', 'easy-visa-myanmar'); ?></button>
      </form>

      <nav class="evm-guide-filter" aria-label="<?php esc_attr_e('Guide categories', 'easy-visa-myanmar'); ?>">
        <a href="<?php echo esc_url(get_post_type_archive_link('evm_visa_guide')); ?>"><?php esc_html_e('All Guides', 'easy-visa-myanmar'); ?></a>
      </nav>

      <div class="evm-guide-grid evm-guide-grid-archive">
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <article <?php post_class('evm-guide-card'); ?>>
              <a class="evm-guide-thumb" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
                <?php if (has_post_thumbnail()) : ?>
                  <?php the_post_thumbnail('evm-card'); ?>
                <?php else : ?>
                  <span><?php echo evm_icon_svg('blog'); ?></span>
                <?php endif; ?>
              </a>
              <div class="evm-guide-body">
                <div class="evm-guide-cats"><?php echo evm_get_guide_category_links(get_the_ID()); ?></div>
                <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                <small class="evm-guide-updated"><?php echo esc_html(sprintf(__('Updated: %s', 'easy-visa-myanmar'), get_the_modified_date())); ?></small>
                <p><?php echo esc_html(wp_trim_words(get_the_excerpt() ?: wp_strip_all_tags(get_the_content()), 26)); ?></p>
                <div class="evm-guide-actions">
                  <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read Guide', 'easy-visa-myanmar'); ?> →</a>
                  <a class="evm-guide-cta" href="<?php echo esc_url(evm_get_guide_cta_url(get_the_ID())); ?>"><?php echo esc_html(evm_get_guide_cta_text(get_the_ID())); ?></a>
                </div>
              </div>
            </article>
          <?php endwhile; ?>
        <?php else : ?>
          <article class="entry-content">
            <h2><?php esc_html_e('No guides found', 'easy-visa-myanmar'); ?></h2>
          </article>
        <?php endif; ?>
      </div>

      <?php the_posts_pagination(); ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
