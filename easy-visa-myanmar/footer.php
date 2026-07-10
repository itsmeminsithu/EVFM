<?php
/**
 * Footer template.
 */
?>

<div class="floating-contact-widget" aria-label="<?php esc_attr_e('Quick contact links', 'easy-visa-myanmar'); ?>">
  <button class="floating-contact-toggle" type="button" aria-expanded="false" aria-controls="evm-floating-contact-panel">
    <span class="floating-contact-toggle-icon"><?php echo evm_icon_svg('chat'); ?></span>
    <span class="floating-contact-toggle-text"><?php esc_html_e('Contact', 'easy-visa-myanmar'); ?></span>
  </button>

  <div id="evm-floating-contact-panel" class="floating-contact-panel" hidden>
    <?php foreach (evm_get_social_links() as $social_key => $social) : ?>
      <?php if (!empty($social['url'])) : ?>
        <a class="floating-contact floating-<?php echo esc_attr($social_key); ?>" href="<?php echo esc_url($social['url']); ?>" target="_blank" rel="noopener noreferrer me" aria-label="<?php echo esc_attr($social['label']); ?>">
          <span class="floating-contact-icon"><?php echo evm_icon_svg($social['icon']); ?></span>
          <em class="floating-contact-label"><?php echo esc_html($social['label']); ?></em>
        </a>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</div>

<footer class="site-footer">
  <div class="evm-container">
    <div class="footer-grid">
      <div>
        <div class="footer-logo">
          <?php if (file_exists(get_theme_file_path('/assets/images/logo.png'))) : ?>
            <img src="<?php echo esc_url(get_theme_file_uri('/assets/images/logo.png')); ?>" alt="<?php bloginfo('name'); ?>">
          <?php else : ?>
            <h3><?php bloginfo('name'); ?></h3>
          <?php endif; ?>
        </div>

        <p><?php echo esc_html(evm_get_option('evm_footer_text', 'Worldwide visa and travel support for all customers.')); ?></p>

        <div class="footer-social-cloud" aria-label="<?php esc_attr_e('Social media links', 'easy-visa-myanmar'); ?>">
          <span class="footer-social-cloud-title"><?php esc_html_e('Follow us', 'easy-visa-myanmar'); ?></span>
          <div class="footer-social-cloud-links">
            <?php foreach (evm_get_social_links() as $social_key => $social) : ?>
              <?php if (!empty($social['url'])) : ?>
                <a class="footer-social-cloud-link footer-social-<?php echo esc_attr($social_key); ?>" href="<?php echo esc_url($social['url']); ?>" target="_blank" rel="noopener noreferrer me" aria-label="<?php echo esc_attr($social['label']); ?>">
                  <span class="footer-social-cloud-icon"><?php echo evm_icon_svg($social['icon']); ?></span>
                  <span class="footer-social-cloud-label"><?php echo esc_html($social['label']); ?></span>
                </a>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <div>
        <h3><?php esc_html_e('Quick Links', 'easy-visa-myanmar'); ?></h3>
        <?php
        wp_nav_menu(array(
          'theme_location' => 'footer',
          'container'      => false,
          'fallback_cb'    => 'evm_footer_fallback_menu',
        ));
        ?>
      </div>

      <div>
        <h3><?php esc_html_e('Services', 'easy-visa-myanmar'); ?></h3>
        <ul>
          <li><a href="<?php echo esc_url(home_url('/flight-ticket-booking/')); ?>"><?php esc_html_e('Flight Ticket Booking', 'easy-visa-myanmar'); ?></a></li>
          <li><a href="<?php echo esc_url(home_url('/hotel-rent/')); ?>"><?php esc_html_e('Hotel Rent', 'easy-visa-myanmar'); ?></a></li>
          <li><a href="<?php echo esc_url(home_url('/easy-pass-service/')); ?>"><?php esc_html_e('Easy Pass', 'easy-visa-myanmar'); ?></a></li>
          <li><a href="<?php echo esc_url(home_url('/easy-extension-service/')); ?>"><?php esc_html_e('Easy Extension', 'easy-visa-myanmar'); ?></a></li>
          <li><a href="<?php echo esc_url(home_url('/letter-service/')); ?>"><?php esc_html_e('Letter Service', 'easy-visa-myanmar'); ?></a></li>
          <li><a href="<?php echo esc_url(home_url('/tm30-service/')); ?>"><?php esc_html_e('TM30 Service', 'easy-visa-myanmar'); ?></a></li>
        </ul>
      </div>

      <div>
        <h3><?php esc_html_e('Help & Support', 'easy-visa-myanmar'); ?></h3>
        <ul>
          <li><a href="<?php echo esc_url(home_url('/about-us/')); ?>"><?php esc_html_e('About Us', 'easy-visa-myanmar'); ?></a></li>
          <li><a href="<?php echo esc_url(home_url('/destinations/')); ?>"><?php esc_html_e('Destinations', 'easy-visa-myanmar'); ?></a></li>
          <li><a href="<?php echo esc_url(home_url('/visa-guides/')); ?>"><?php esc_html_e('Visa Guides', 'easy-visa-myanmar'); ?></a></li>
          <li><a href="<?php echo esc_url(home_url('/contact/')); ?>"><?php esc_html_e('Contact Us', 'easy-visa-myanmar'); ?></a></li>
          <li><a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>"><?php esc_html_e('Privacy Policy', 'easy-visa-myanmar'); ?></a></li>
          <li><a href="<?php echo esc_url(home_url('/terms/')); ?>"><?php esc_html_e('Terms & Conditions', 'easy-visa-myanmar'); ?></a></li>
        </ul>
      </div>
      <div>
        <h3><?php esc_html_e('Contact Details', 'easy-visa-myanmar'); ?></h3>
        <ul class="footer-contact-list">
          <?php foreach (evm_get_contact_links() as $contact) : ?>
            <?php if (!empty($contact['url']) && !empty($contact['value'])) : ?>
              <li>
                <a href="<?php echo esc_url($contact['url']); ?>" target="<?php echo strpos($contact['url'], 'http') === 0 ? '_blank' : '_self'; ?>" rel="noopener noreferrer">
                  <span><?php echo evm_icon_svg($contact['icon']); ?></span>
                  <em><?php echo esc_html($contact['label']); ?></em>
                  <strong><?php echo esc_html($contact['value']); ?></strong>
                </a>
              </li>
            <?php endif; ?>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>

    <div class="footer-bottom">
      <div>© <?php echo esc_html(date('Y')); ?> <?php bloginfo('name'); ?>. <?php esc_html_e('All rights reserved.', 'easy-visa-myanmar'); ?></div>
      <div><?php esc_html_e('Worldwide visa and travel support for all customers.', 'easy-visa-myanmar'); ?></div>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
