<?php
/**
 * Header template.
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php if (file_exists(get_theme_file_path('/assets/images/favicon.png'))) : ?>
    <link rel="icon" type="image/png" sizes="512x512" href="<?php echo esc_url(get_theme_file_uri('/assets/images/favicon.png') . '?v=' . EVM_THEME_VERSION); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_theme_file_uri('/assets/images/favicon.png') . '?v=' . EVM_THEME_VERSION); ?>">
  <?php endif; ?>
  <?php if (file_exists(get_theme_file_path('/assets/images/favicon.ico'))) : ?>
    <link rel="shortcut icon" href="<?php echo esc_url(get_theme_file_uri('/assets/images/favicon.ico') . '?v=' . EVM_THEME_VERSION); ?>">
  <?php endif; ?>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="site-header">
  <div class="evm-container header-inner">
    <div class="site-branding">
      <?php if (has_custom_logo()) : ?>
        <?php the_custom_logo(); ?>
      <?php elseif (file_exists(get_theme_file_path('/assets/images/logo.png'))) : ?>
        <a class="site-logo-fallback" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php bloginfo('name'); ?>">
          <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/logo.png')); ?>" alt="<?php bloginfo('name'); ?>" decoding="async">
        </a>
      <?php else : ?>
        <a class="site-title-text" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
      <?php endif; ?>
    </div>

    <button class="mobile-menu-toggle" type="button" aria-label="<?php esc_attr_e('Open menu', 'easy-visa-myanmar'); ?>" aria-expanded="false">
      ☰
    </button>

    <nav class="primary-nav" aria-label="<?php esc_attr_e('Primary Menu', 'easy-visa-myanmar'); ?>">
      <ul class="evm-header-menu">
        <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Home', 'easy-visa-myanmar'); ?></a></li>
        <li><a href="<?php echo esc_url(home_url('/destinations/')); ?>"><?php esc_html_e('Destinations', 'easy-visa-myanmar'); ?></a></li>

        <li class="menu-item-has-children evm-book-menu">
          <a href="<?php echo esc_url(home_url('/#booking')); ?>"><?php esc_html_e('Book Travel & Services', 'easy-visa-myanmar'); ?></a>
          <ul class="sub-menu">
            <li><a href="<?php echo esc_url(home_url('/?tab=flight#booking')); ?>"><?php esc_html_e('Flight Ticket', 'easy-visa-myanmar'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/?tab=hotel#booking')); ?>"><?php esc_html_e('Hotel Rent', 'easy-visa-myanmar'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/?tab=easy-pass#booking')); ?>"><?php esc_html_e('Easy Pass', 'easy-visa-myanmar'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/?tab=easy-extension#booking')); ?>"><?php esc_html_e('Easy Extension', 'easy-visa-myanmar'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/letter-service/')); ?>"><?php esc_html_e('Letter Service', 'easy-visa-myanmar'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/tm30-service/')); ?>"><?php esc_html_e('TM30 Service', 'easy-visa-myanmar'); ?></a></li>
          </ul>
        </li>
        <li><a href="<?php echo esc_url(home_url('/visa-guides/')); ?>"><?php esc_html_e('Visa Guides', 'easy-visa-myanmar'); ?></a></li>

        <li class="menu-item-has-children evm-about-menu">
          <a href="<?php echo esc_url(home_url('/about-us/')); ?>"><?php esc_html_e('About Us', 'easy-visa-myanmar'); ?></a>
          <ul class="sub-menu">
            <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Contact Us', 'easy-visa-myanmar'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'easy-visa-myanmar'); ?></a></li>
            <li><a href="<?php echo esc_url(home_url('/terms/')); ?>"><?php esc_html_e('Terms & Conditions', 'easy-visa-myanmar'); ?></a></li>
          </ul>
        </li>

        <li><a href="<?php echo esc_url(home_url('/#help-support')); ?>"><?php esc_html_e('Help & Support', 'easy-visa-myanmar'); ?></a></li>
      </ul>
    </nav>

    <div class="evm-language-switcher header-language-switcher" aria-label="<?php esc_attr_e('Language switcher', 'easy-visa-myanmar'); ?>">
      <button type="button" class="evm-lang-btn active" data-evm-lang="en" aria-pressed="true">EN</button>
      <button type="button" class="evm-lang-btn" data-evm-lang="my" aria-pressed="false">မြန်မာ</button>
    </div>

    <a class="header-cta" href="<?php echo esc_url(home_url('/#booking')); ?>">
      <?php esc_html_e('Start Request', 'easy-visa-myanmar'); ?> →
    </a>
  </div>
</header>
