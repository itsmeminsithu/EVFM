<?php
/**
 * 404 template.
 */
get_header();

$travel_quotes = array(
  'Your destination is not here, but the journey can continue.',
  'This page missed its flight. Let’s get you back to the terminal.',
  'Looks like this route is not available today.',
  'The visa for this page was not approved.',
  'This destination is hidden on the map. Try another path.',
  'Oops, your travel guide got lost near the boarding gate.',
);

$quote = $travel_quotes[array_rand($travel_quotes)];
?>

<main id="primary" class="site-main">
  <section class="page-hero">
    <div class="evm-container">
      <span class="section-kicker"><?php esc_html_e('404 Travel Detour', 'easy-visa-myanmar'); ?></span>
      <h1><?php esc_html_e('Page Not Found', 'easy-visa-myanmar'); ?></h1>

      <div class="travel-quote-card">
        <strong><?php echo esc_html($quote); ?></strong>
        <p><?php esc_html_e('No worries. You can return home, search again, or explore travel guides for your next Myanmar journey.', 'easy-visa-myanmar'); ?></p>
      </div>

      <div class="hero-actions">
        <a class="evm-btn evm-btn-primary" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back to Home', 'easy-visa-myanmar'); ?> →</a>
        <a class="evm-btn evm-btn-outline" href="<?php echo esc_url(home_url('/#booking')); ?>"><?php esc_html_e('Plan a Trip', 'easy-visa-myanmar'); ?></a>
      </div>

      <div style="margin-top:28px;max-width:620px;">
        <?php get_search_form(); ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
