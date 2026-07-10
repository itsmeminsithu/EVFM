<?php
/**
 * Main template file.
 */
get_header();
?>

<main id="primary" class="site-main">
  <section class="page-hero">
    <div class="evm-container">
      <h1><?php bloginfo('name'); ?></h1>
      <p><?php bloginfo('description'); ?></p>
    </div>
  </section>

  <section class="evm-section">
    <div class="evm-container archive-grid">
      <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
          <article <?php post_class('post-list-card'); ?>>
            <a class="post-thumb" href="<?php the_permalink(); ?>">
              <?php if (has_post_thumbnail()) : the_post_thumbnail('evm-card'); endif; ?>
            </a>
            <div class="card-body">
              <span class="post-category"><?php echo esc_html(get_post_type_object(get_post_type())->labels->singular_name ?? 'Post'); ?></span>
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
              <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'easy-visa-myanmar'); ?> →</a>
            </div>
          </article>
        <?php endwhile; ?>
      <?php else : ?>
        <article class="entry-content">
          <h2><?php esc_html_e('No posts found', 'easy-visa-myanmar'); ?></h2>
          <p><?php esc_html_e('Please add some posts from WordPress admin.', 'easy-visa-myanmar'); ?></p>
        </article>
      <?php endif; ?>
    </div>

    <div class="evm-container">
      <?php the_posts_pagination(); ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>
