<?php
/**
 * Easy Visa For Myanmar theme functions.
 */

if (!defined('ABSPATH')) {
  exit;
}

define('EVM_THEME_VERSION', '1.5.8');

/* EVM V13 security constants */
if (!defined('DISALLOW_FILE_EDIT')) {
  define('DISALLOW_FILE_EDIT', true);
}

function evm_theme_setup() {
  load_theme_textdomain('easy-visa-myanmar', get_template_directory() . '/languages');

  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
  add_theme_support('automatic-feed-links');
  add_theme_support('custom-logo', array(
    'height'      => 160,
    'width'       => 360,
    'flex-height' => true,
    'flex-width'  => true,
  ));
  add_theme_support('html5', array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
    'style',
    'script'
  ));

  register_nav_menus(array(
    'primary' => __('Primary Menu', 'easy-visa-myanmar'),
    'footer'  => __('Footer Menu', 'easy-visa-myanmar'),
  ));

  add_image_size('evm-card', 720, 480, true);
  add_image_size('evm-wide', 1200, 675, true);
}
add_action('after_setup_theme', 'evm_theme_setup');

function evm_enqueue_assets() {
  wp_enqueue_style(
    'evm-google-fonts',
    'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&family=Noto+Sans+Myanmar:wght@400;500;600;700;800;900&display=swap',
    array(),
    null
  );

  wp_enqueue_style(
    'evm-style',
    get_stylesheet_uri(),
    array('evm-google-fonts'),
    EVM_THEME_VERSION
  );

  wp_enqueue_script(
    'evm-main',
    get_template_directory_uri() . '/assets/js/main.js',
    array(),
    EVM_THEME_VERSION,
    true
  );
}
add_action('wp_enqueue_scripts', 'evm_enqueue_assets');

function evm_get_option($key, $default = '') {
  return get_theme_mod($key, $default);
}

function evm_sanitize_url_or_hash($value) {
  $value = trim($value);
  if ($value === '#' || strpos($value, '#') === 0) {
    return sanitize_text_field($value);
  }
  return esc_url_raw($value);
}

function evm_customize_register($wp_customize) {
  $wp_customize->add_section('evm_home', array(
    'title'    => __('Easy Visa Home Settings', 'easy-visa-myanmar'),
    'priority' => 30,
  ));

  $settings = array(
    'evm_hero_badge' => array(
      'label' => __('Hero Badge', 'easy-visa-myanmar'),
      'default' => 'Thailand · Singapore · Vietnam · Laos · Worldwide',
      'sanitize' => 'sanitize_text_field',
      'type' => 'text',
    ),
    'evm_hero_title' => array(
      'label' => __('Hero Title', 'easy-visa-myanmar'),
      'default' => 'Worldwide visa and travel support',
      'sanitize' => 'sanitize_text_field',
      'type' => 'text',
    ),
    'evm_hero_subtitle' => array(
      'label' => __('Hero Subtitle', 'easy-visa-myanmar'),
      'default' => 'For customers traveling to Thailand, Singapore, Vietnam, Laos and other countries. Choose a service and our admin will contact you soon.',
      'sanitize' => 'sanitize_textarea_field',
      'type' => 'textarea',
    ),
    'evm_primary_cta_text' => array(
      'label' => __('Primary Button Text', 'easy-visa-myanmar'),
      'default' => 'Start Booking',
      'sanitize' => 'sanitize_text_field',
      'type' => 'text',
    ),
    'evm_primary_cta_url' => array(
      'label' => __('Primary Button URL', 'easy-visa-myanmar'),
      'default' => '#booking',
      'sanitize' => 'evm_sanitize_url_or_hash',
      'type' => 'text',
    ),
    'evm_secondary_cta_text' => array(
      'label' => __('Secondary Button Text', 'easy-visa-myanmar'),
      'default' => 'Choose Service',
      'sanitize' => 'sanitize_text_field',
      'type' => 'text',
    ),
    'evm_secondary_cta_url' => array(
      'label' => __('Secondary Button URL', 'easy-visa-myanmar'),
      'default' => '#booking',
      'sanitize' => 'evm_sanitize_url_or_hash',
      'type' => 'text',
    ),
    'evm_flight_action_url' => array(
      'label' => __('Flight Search Action URL', 'easy-visa-myanmar'),
      'default' => '#',
      'sanitize' => 'evm_sanitize_url_or_hash',
      'type' => 'text',
    ),
    'evm_hotel_action_url' => array(
      'label' => __('Hotel Search Action URL', 'easy-visa-myanmar'),
      'default' => '#',
      'sanitize' => 'evm_sanitize_url_or_hash',
      'type' => 'text',
    ),
    'evm_flight_redirect_url' => array(
      'label' => __('Flight Form Redirect URL', 'easy-visa-myanmar'),
      'default' => 'https://www.facebook.com/easyvisaformyanmar',
      'sanitize' => 'esc_url_raw',
      'type' => 'text',
    ),
    'evm_hotel_redirect_url' => array(
      'label' => __('Hotel Form Redirect URL', 'easy-visa-myanmar'),
      'default' => 'https://line.me/ti/p/s1yC8g82I3',
      'sanitize' => 'esc_url_raw',
      'type' => 'text',
    ),
    'evm_easy_pass_redirect_url' => array(
      'label' => __('Easy Pass Facebook Redirect URL', 'easy-visa-myanmar'),
      'default' => 'https://www.facebook.com/easyvisaformyanmar',
      'sanitize' => 'esc_url_raw',
      'type' => 'text',
    ),
    'evm_google_site_verification' => array(
      'label' => __('Google Site Verification Code', 'easy-visa-myanmar'),
      'default' => '',
      'sanitize' => 'sanitize_text_field',
      'type' => 'text',
    ),
    'evm_bing_site_verification' => array(
      'label' => __('Bing Site Verification Code', 'easy-visa-myanmar'),
      'default' => '',
      'sanitize' => 'sanitize_text_field',
      'type' => 'text',
    ),
    'evm_yandex_verification' => array(
      'label' => __('Yandex Verification Code', 'easy-visa-myanmar'),
      'default' => '',
      'sanitize' => 'sanitize_text_field',
      'type' => 'text',
    ),
    'evm_support_email' => array(
      'label' => __('Support Email', 'easy-visa-myanmar'),
      'default' => 'support@easyvisaformyanmar.com',
      'sanitize' => 'sanitize_email',
      'type' => 'email',
    ),
    'evm_phone_number' => array(
      'label' => __('Phone Number', 'easy-visa-myanmar'),
      'default' => '062 663 9569',
      'sanitize' => 'sanitize_text_field',
      'type' => 'text',
    ),
    'evm_whatsapp_number' => array(
      'label' => __('WhatsApp Number', 'easy-visa-myanmar'),
      'default' => '+959 766 37 4565',
      'sanitize' => 'sanitize_text_field',
      'type' => 'text',
    ),
    'evm_telegram_handle' => array(
      'label' => __('Telegram Username', 'easy-visa-myanmar'),
      'default' => '@itsmeminsithu',
      'sanitize' => 'sanitize_text_field',
      'type' => 'text',
    ),
    'evm_facebook_url' => array(
      'label' => __('Facebook URL', 'easy-visa-myanmar'),
      'default' => 'https://www.facebook.com/easyvisaformyanmar',
      'sanitize' => 'esc_url_raw',
      'type' => 'text',
    ),
    'evm_instagram_url' => array(
      'label' => __('Instagram URL', 'easy-visa-myanmar'),
      'default' => 'https://www.instagram.com/easyvisaformyanmar',
      'sanitize' => 'esc_url_raw',
      'type' => 'text',
    ),
    'evm_line_url' => array(
      'label' => __('LINE URL', 'easy-visa-myanmar'),
      'default' => 'https://line.me/ti/p/s1yC8g82I3',
      'sanitize' => 'esc_url_raw',
      'type' => 'text',
    ),
    'evm_whatsapp_url' => array(
      'label' => __('WhatsApp URL', 'easy-visa-myanmar'),
      'default' => 'https://wa.me/959766374565',
      'sanitize' => 'esc_url_raw',
      'type' => 'text',
    ),
    'evm_telegram_url' => array(
      'label' => __('Telegram URL', 'easy-visa-myanmar'),
      'default' => 'https://t.me/itsmeminsithu',
      'sanitize' => 'esc_url_raw',
      'type' => 'text',
    ),
    'evm_tiktok_url' => array(
      'label' => __('TikTok URL', 'easy-visa-myanmar'),
      'default' => 'https://www.tiktok.com/@easyvisaformyanmar',
      'sanitize' => 'esc_url_raw',
      'type' => 'text',
    ),
    'evm_footer_text' => array(
      'label' => __('Footer About Text', 'easy-visa-myanmar'),
      'default' => 'Worldwide visa and travel support for all customers.',
      'sanitize' => 'sanitize_textarea_field',
      'type' => 'textarea',
    ),
  );

  foreach ($settings as $id => $setting) {
    $wp_customize->add_setting($id, array(
      'default'           => $setting['default'],
      'sanitize_callback' => $setting['sanitize'],
      'transport'         => 'refresh',
    ));

    $control_class = $setting['type'] === 'textarea' ? 'WP_Customize_Control' : 'WP_Customize_Control';
    $wp_customize->add_control(new $control_class($wp_customize, $id, array(
      'label'   => $setting['label'],
      'section' => 'evm_home',
      'type'    => $setting['type'],
    )));
  }
}
add_action('customize_register', 'evm_customize_register');


/* ===== EVM V44 form helpers and business disclaimer ===== */
function evm_business_disclaimer_text() {
  return __('Easy Visa For Myanmar provides travel support and request coordination. We do not guarantee airline, hotel, immigration or visa approval decisions.', 'easy-visa-myanmar');
}

function evm_render_preferred_contact_field($prefix = 'contact') {
  $id = sanitize_html_class($prefix . '-preferred-contact');

  echo '<div class="form-field evm-preferred-contact-field">';
  echo '<label for="' . esc_attr($id) . '">' . esc_html__('Preferred Contact Method', 'easy-visa-myanmar') . '</label>';
  echo '<select id="' . esc_attr($id) . '" name="preferred_contact_method" required>';
  echo '<option value="">' . esc_html__('Choose Contact Method', 'easy-visa-myanmar') . '</option>';
  echo '<option value="Phone">' . esc_html__('Phone', 'easy-visa-myanmar') . '</option>';
  echo '<option value="Email">' . esc_html__('Email', 'easy-visa-myanmar') . '</option>';
  echo '<option value="Facebook">' . esc_html__('Facebook', 'easy-visa-myanmar') . '</option>';
  echo '<option value="LINE">' . esc_html__('LINE', 'easy-visa-myanmar') . '</option>';
  echo '<option value="Message">' . esc_html__('Message', 'easy-visa-myanmar') . '</option>';
  echo '<option value="Telegram">' . esc_html__('Telegram', 'easy-visa-myanmar') . '</option>';
  echo '<option value="WhatsApp">' . esc_html__('WhatsApp', 'easy-visa-myanmar') . '</option>';
  echo '</select>';
  echo '</div>';
}

function evm_render_privacy_consent_field($allow_documents = false) {
  echo '<div class="form-field form-field-wide evm-consent-field">';
  echo '<label>';
  echo '<input type="checkbox" name="privacy_consent" value="yes" required>';
  echo '<span>' . esc_html__('I agree that Easy Visa For Myanmar can contact me about this request. I understand I should not send passport photos, ID cards, bank details or private documents through this form.', 'easy-visa-myanmar') . '</span>';
  echo '</label>';
  echo '</div>';
}


function evm_create_form_token($service_type) {
  $issued_at = time();
  $payload = sanitize_text_field($service_type) . '|' . $issued_at;
  $signature = hash_hmac('sha256', $payload, wp_salt('auth'));
  return $issued_at . ':' . $signature;
}

function evm_validate_form_token($service_type, $token) {
  $token = sanitize_text_field((string) $token);
  $parts = explode(':', $token, 2);

  if (count($parts) !== 2 || !ctype_digit($parts[0]) || empty($parts[1])) {
    return new WP_Error('evm_bad_form_token', __('Please refresh the page and submit the form again.', 'easy-visa-myanmar'));
  }

  $issued_at = absint($parts[0]);
  $signature = $parts[1];
  $payload = sanitize_text_field($service_type) . '|' . $issued_at;
  $expected = hash_hmac('sha256', $payload, wp_salt('auth'));

  if (!hash_equals($expected, $signature)) {
    return new WP_Error('evm_bad_form_token', __('Please refresh the page and submit the form again.', 'easy-visa-myanmar'));
  }

  $age = time() - $issued_at;

  if ($age < 3) {
    return new WP_Error('evm_fast_submit', __('Please wait a moment before submitting the form.', 'easy-visa-myanmar'));
  }

  if ($age > 4 * HOUR_IN_SECONDS) {
    return new WP_Error('evm_expired_form_token', __('This form session expired. Please refresh the page and try again.', 'easy-visa-myanmar'));
  }

  return true;
}

function evm_render_extra_security_fields($service_type) {
  echo '<div class="evm-hp-field" aria-hidden="true">';
  echo '<label>' . esc_html__('Confirm Email', 'easy-visa-myanmar') . '</label>';
  echo '<input type="text" name="evm_confirm_email" tabindex="-1" autocomplete="off">';
  echo '</div>';
  echo '<input type="hidden" name="evm_form_token" value="' . esc_attr(evm_create_form_token($service_type)) . '">';
  echo '<input type="hidden" name="evm_js_check" value="0">';
}


/* ===== EVM V48 random quote helper ===== */
function evm_get_random_quote($context = 'general') {
  $quotes = array(
    'general' => array(
      __('Plan clearly. Travel confidently.', 'easy-visa-myanmar'),
      __('Small details make travel easier.', 'easy-visa-myanmar'),
      __('Choose your service. We will guide the next step.', 'easy-visa-myanmar'),
      __('Worldwide support, simple request, clear follow-up.', 'easy-visa-myanmar'),
      __('For Thailand, Singapore, Vietnam, Laos and more — start with one request.', 'easy-visa-myanmar'),
      __('Travel support should be simple, safe and easy to contact.', 'easy-visa-myanmar'),
      __('Submit basic details today. Our admin team will contact you soon.', 'easy-visa-myanmar'),
      __('One request can start a smoother trip.', 'easy-visa-myanmar'),
    ),
    'thank_you' => array(
      __('Your request is received. We will check the details and contact you soon.', 'easy-visa-myanmar'),
      __('Thank you for trusting Easy Visa For Myanmar. Our team will guide you step by step.', 'easy-visa-myanmar'),
      __('Travel feels easier when someone helps with the details. We will be in touch soon.', 'easy-visa-myanmar'),
      __('We received your request. Please wait for our admin team to reply.', 'easy-visa-myanmar'),
      __('Your next step starts here. Our team will contact you soon.', 'easy-visa-myanmar'),
      __('Thank you. We will review your service request carefully.', 'easy-visa-myanmar'),
    ),
  );

  if (empty($quotes[$context])) {
    $context = 'general';
  }

  return $quotes[$context][array_rand($quotes[$context])];
}

function evm_register_post_types() {
  register_post_type('evm_visa_guide', array(
    'labels' => array(
      'name'          => __('Visa Guides', 'easy-visa-myanmar'),
      'singular_name' => __('Visa Guide', 'easy-visa-myanmar'),
      'add_new_item'  => __('Add New Visa Guide', 'easy-visa-myanmar'),
      'edit_item'     => __('Edit Visa Guide', 'easy-visa-myanmar'),
    ),
    'public'       => true,
    'menu_icon'    => 'dashicons-media-document',
    'supports'     => array('title', 'editor', 'excerpt', 'thumbnail', 'author'),
    'has_archive'  => true,
    'rewrite'      => array('slug' => 'visa-guides'),
    'show_in_rest' => true,
  ));


  register_taxonomy('evm_guide_category', array('evm_visa_guide'), array(
    'labels' => array(
      'name'          => __('Guide Categories', 'easy-visa-myanmar'),
      'singular_name' => __('Guide Category', 'easy-visa-myanmar'),
      'add_new_item'  => __('Add New Guide Category', 'easy-visa-myanmar'),
      'edit_item'     => __('Edit Guide Category', 'easy-visa-myanmar'),
    ),
    'public'            => true,
    'hierarchical'      => true,
    'show_admin_column' => true,
    'show_in_rest'      => true,
    'rewrite'           => array('slug' => 'visa-guide-category'),
  ));

  register_post_type('evm_destination', array(
    'labels' => array(
      'name'          => __('Destinations', 'easy-visa-myanmar'),
      'singular_name' => __('Destination', 'easy-visa-myanmar'),
      'add_new_item'  => __('Add New Destination', 'easy-visa-myanmar'),
      'edit_item'     => __('Edit Destination', 'easy-visa-myanmar'),
    ),
    'public'       => true,
    'menu_icon'    => 'dashicons-location-alt',
    'supports'     => array('title', 'editor', 'excerpt', 'thumbnail', 'author'),
    'has_archive'  => true,
    'rewrite'      => array('slug' => 'destinations'),
    'show_in_rest' => true,
  ));
  register_post_type('evm_inquiry', array(
    'labels' => array(
      'name'          => __('Inquiries', 'easy-visa-myanmar'),
      'singular_name' => __('Inquiry', 'easy-visa-myanmar'),
      'add_new_item'  => __('Add New Inquiry', 'easy-visa-myanmar'),
      'edit_item'     => __('View Inquiry', 'easy-visa-myanmar'),
    ),
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_icon'           => 'dashicons-clipboard',
    'supports'            => array('title'),
    'capability_type'     => 'post',
    'exclude_from_search' => true,
  ));

  register_post_type('evm_popup', array(
    'labels' => array(
      'name'          => __('Popup Messages', 'easy-visa-myanmar'),
      'singular_name' => __('Popup Message', 'easy-visa-myanmar'),
      'add_new_item'  => __('Add New Popup Message', 'easy-visa-myanmar'),
      'edit_item'     => __('Edit Popup Message', 'easy-visa-myanmar'),
    ),
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_icon'           => 'dashicons-megaphone',
    'supports'            => array('title', 'editor', 'thumbnail', 'excerpt'),
    'capability_type'     => 'post',
    'exclude_from_search' => true,
  ));

  register_post_type('evm_hero_slide', array(
    'labels' => array(
      'name'          => __('Hero Slides', 'easy-visa-myanmar'),
      'singular_name' => __('Hero Slide', 'easy-visa-myanmar'),
      'add_new_item'  => __('Add New Hero Slide', 'easy-visa-myanmar'),
      'edit_item'     => __('Edit Hero Slide', 'easy-visa-myanmar'),
    ),
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_icon'           => 'dashicons-format-gallery',
    'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'page-attributes'),
    'capability_type'     => 'post',
    'exclude_from_search' => true,
  ));

}
add_action('init', 'evm_register_post_types');


function evm_icon_svg($name) {
  $icons = array(
    'plane' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M3 11.5 21 4l-7.5 18-3-7-7.5-3.5Z"/><path d="m10.5 14.5 4-4"/></svg>',
    'hotel' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 21V5a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v16"/><path d="M3 21h18"/><path d="M8 7h1M12 7h1M8 11h1M12 11h1"/><path d="M8 21v-5h5v5"/></svg>',
    'passport' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 3h10a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2Z"/><path d="M9 7h6"/><circle cx="12" cy="13" r="3"/><path d="M9 17h6"/></svg>',
    'car' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 17h14v-5l-2-5H7l-2 5v5Z"/><path d="M7 17v2M17 17v2"/><path d="M7 12h10"/><circle cx="8" cy="15" r="1"/><circle cx="16" cy="15" r="1"/></svg>',
    'map' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m9 18-5 3V6l5-3 6 3 5-3v15l-5 3-6-3Z"/><path d="M9 3v15M15 6v15"/></svg>',
    'blog' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 4h14v16H5z"/><path d="M8 8h8M8 12h8M8 16h5"/></svg>',
    'visa' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 7h16v10H4z"/><path d="M4 10h16"/><path d="M7 14h3M13 14h4"/></svg>',
    'shield' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 3 5 6v5c0 5 3 8 7 10 4-2 7-5 7-10V6l-7-3Z"/><path d="m9.5 12 1.7 1.7 3.5-4"/></svg>',
    'chat' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M5 5h14v10H8l-3 4V5Z"/><path d="M8 9h8M8 12h5"/></svg>',
    'phone' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 4h4l2 5-2.4 1.4a12.5 12.5 0 0 0 5 5L17 13l5 2v4c0 1.1-.9 2-2 2C10.6 21 3 13.4 3 4c0-1.1.9-2 2-2h2Z"/></svg>',
    'whatsapp' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M4 20l1.2-4A8 8 0 1 1 8 18.8L4 20Z"/><path d="M9.2 8.4c.2-.4.4-.4.7-.4h.5c.2 0 .4.1.5.5l.7 1.6c.1.3 0 .5-.2.7l-.4.5c.8 1.4 1.9 2.5 3.4 3.2l.5-.5c.2-.2.5-.3.8-.2l1.5.7c.3.1.4.3.4.6v.5c0 .3-.1.5-.4.7-.5.3-1.1.5-1.8.4-3.5-.4-6.8-3.7-7.2-7.1-.1-.7.1-1.3.4-1.7Z"/></svg>',
    'telegram' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M21 4 3 11.4l6.5 2.1L17 8l-5.7 6.6L11 20l3.2-4 4.7 3L21 4Z"/></svg>',
    'star' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="m12 3 2.7 5.5 6.1.9-4.4 4.3 1 6.1L12 16.9 6.6 19.8l1-6.1-4.4-4.3 6.1-.9L12 3Z"/></svg>',
    'facebook' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14.2 8.2h2.3V4.7h-2.7c-2.7 0-4.3 1.7-4.3 4.6v2H7v3.4h2.5V20h3.7v-5.3h2.7l.5-3.4h-3.2V9.5c0-.9.3-1.3 1-1.3Z"/></svg>',
    'instagram' => '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="4" y="4" width="16" height="16" rx="5"/><circle cx="12" cy="12" r="3.4"/><path d="M17.2 6.8h.1"/></svg>',
    'line' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M12 4.5c-4.4 0-8 2.9-8 6.5 0 3.1 2.7 5.7 6.4 6.3l-.5 2.2 3.2-2.1h.9c4.4 0 8-2.9 8-6.4s-3.6-6.5-8-6.5Z"/><path d="M8.1 9.7v3.4h1.8M11.3 9.7v3.4M13.2 9.7v3.4l2-3.4v3.4M17.1 9.7h2M17.1 11.4h1.6M17.1 13.1h2"/></svg>',
    'tiktok' => '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M14.1 4v9.1a3.3 3.3 0 1 1-2.6-3.2v3.1a1.1 1.1 0 1 0 .8 1V4h1.8Z"/><path d="M14.1 4c.6 2.2 2.2 3.7 4.4 3.9v3.1c-1.7-.1-3.1-.7-4.4-1.8"/></svg>',
  );

  if (!isset($icons[$name])) {
    $name = 'shield';
  }

  return $icons[$name];
}

function evm_default_services() {
  return array(
    array('icon' => 'passport', 'title' => 'Myanmar Visa Service', 'text' => 'Fast, reliable and beginner-friendly visa and eVisa guidance.', 'url' => home_url('/myanmar-visa-service/')),
    array('icon' => 'visa', 'title' => 'Easy Extension', 'text' => 'Visa extension support with e Extension and Walk In VIP Extension options.', 'url' => home_url('/easy-extension/')),
    array('icon' => 'blog', 'title' => 'Letter Service', 'text' => 'Recommendation letter requests for visa extension, bank, driving license and vehicle buying support.', 'url' => home_url('/letter-service/')),
    array('icon' => 'passport', 'title' => 'TM30 Service', 'text' => 'TM30 request support for Bangkok, Chiang Mai and Mae Sot with selected file delivery method.', 'url' => home_url('/tm30-service/')),
    array('icon' => 'plane', 'title' => 'Flight Ticket Booking', 'text' => 'Compare and book domestic and international flight tickets.', 'url' => home_url('/flight-ticket-booking/')),
    array('icon' => 'hotel', 'title' => 'Hotel Rent', 'text' => 'Find hotels, apartments and guesthouses for comfortable stays.', 'url' => home_url('/hotel-rent/')),
    array('icon' => 'car', 'title' => 'Airport Transfer', 'text' => 'Airport pick-up, taxi, private car and local transport support.', 'url' => home_url('/thailand-easy-pass-service/')),
    array('icon' => 'map', 'title' => 'Travel Guide', 'text' => 'Explore places, culture, food, safety and local travel tips.', 'url' => home_url('/myanmar-travel-guide/')),
    array('icon' => 'blog', 'title' => 'Visa Guides / Blog', 'text' => 'Useful guides about TM30, visa extension, letters, travel support and customer safety.', 'url' => home_url('/visa-guides/')),
  );
}



function evm_get_support_email() {
  $email = evm_get_option('evm_support_email', 'support@easyvisaformyanmar.com');
  $email = sanitize_email($email);

  if (empty($email)) {
    $email = 'support@easyvisaformyanmar.com';
  }

  return $email;
}


/* ===== EVM V49 contact helpers ===== */
function evm_get_phone_number() {
  return evm_get_option('evm_phone_number', '062 663 9569');
}

function evm_get_whatsapp_number() {
  return evm_get_option('evm_whatsapp_number', '+959 766 37 4565');
}

function evm_normalize_phone_for_url($number) {
  return preg_replace('/[^0-9]/', '', (string) $number);
}

function evm_get_whatsapp_url() {
  $custom_url = evm_get_option('evm_whatsapp_url', 'https://wa.me/959766374565');
  if (!empty($custom_url)) {
    return $custom_url;
  }

  $number = evm_normalize_phone_for_url(evm_get_whatsapp_number());
  return $number ? 'https://wa.me/' . $number : '';
}

function evm_get_telegram_handle() {
  return evm_get_option('evm_telegram_handle', '@itsmeminsithu');
}

function evm_get_telegram_url() {
  $custom_url = evm_get_option('evm_telegram_url', 'https://t.me/itsmeminsithu');
  if (!empty($custom_url)) {
    return $custom_url;
  }

  $handle = trim(evm_get_telegram_handle());
  $handle = ltrim($handle, '@');
  return $handle ? 'https://t.me/' . rawurlencode($handle) : '';
}

function evm_get_contact_links() {
  return array(
    'phone' => array(
      'label' => __('Phone', 'easy-visa-myanmar'),
      'value' => evm_get_phone_number(),
      'url'   => 'tel:' . evm_normalize_phone_for_url(evm_get_phone_number()),
      'icon'  => 'phone',
    ),
    'email' => array(
      'label' => __('Email', 'easy-visa-myanmar'),
      'value' => evm_get_support_email(),
      'url'   => 'mailto:' . evm_get_support_email(),
      'icon'  => 'chat',
    ),
    'whatsapp' => array(
      'label' => __('WhatsApp', 'easy-visa-myanmar'),
      'value' => evm_get_whatsapp_number(),
      'url'   => evm_get_whatsapp_url(),
      'icon'  => 'whatsapp',
    ),
    'telegram' => array(
      'label' => __('Telegram', 'easy-visa-myanmar'),
      'value' => evm_get_telegram_handle(),
      'url'   => evm_get_telegram_url(),
      'icon'  => 'telegram',
    ),
  );
}

function evm_get_social_links() {
  return array(
    'facebook' => array(
      'label' => 'Facebook',
      'url'   => evm_get_option('evm_facebook_url', 'https://www.facebook.com/easyvisaformyanmar'),
      'icon'  => 'facebook',
    ),
    'instagram' => array(
      'label' => 'Instagram',
      'url'   => evm_get_option('evm_instagram_url', 'https://www.instagram.com/easyvisaformyanmar'),
      'icon'  => 'instagram',
    ),
    'line' => array(
      'label' => 'LINE',
      'url'   => evm_get_option('evm_line_url', 'https://line.me/ti/p/s1yC8g82I3'),
      'icon'  => 'line',
    ),
    'whatsapp' => array(
      'label' => 'WhatsApp',
      'url'   => evm_get_whatsapp_url(),
      'icon'  => 'whatsapp',
    ),
    'telegram' => array(
      'label' => 'Telegram',
      'url'   => evm_get_telegram_url(),
      'icon'  => 'telegram',
    ),
    'tiktok' => array(
      'label' => 'TikTok',
      'url'   => evm_get_option('evm_tiktok_url', 'https://www.tiktok.com/@easyvisaformyanmar'),
      'icon'  => 'tiktok',
    ),
  );
}

/**
 * Auto SEO meta tags.
 * If a major SEO plugin is active, this theme does not output duplicate meta tags.
 */
function evm_seo_plugin_active() {
  return defined('WPSEO_VERSION') ||
         defined('RANK_MATH_VERSION') ||
         defined('AIOSEO_VERSION') ||
         defined('SEOPRESS_VERSION') ||
         class_exists('WPSEO_Frontend') ||
         class_exists('RankMath');
}

function evm_get_meta_description() {
  if (is_singular()) {
    $post_id = get_queried_object_id();

    if (has_excerpt($post_id)) {
      return wp_strip_all_tags(get_the_excerpt($post_id));
    }

    $content = get_post_field('post_content', $post_id);
    $trimmed = wp_trim_words(wp_strip_all_tags($content), 28);
    if (!empty($trimmed)) {
      return $trimmed;
    }
  }

  if (is_category() || is_tag() || is_tax()) {
    $description = term_description();
    if (!empty($description)) {
      return wp_strip_all_tags($description);
    }
  }

  $site_description = get_bloginfo('description');
  if (!empty($site_description)) {
    return $site_description;
  }

  return 'Easy Visa For Myanmar helps all customers with visa support, flight tickets, hotel rental, Easy Pass, Easy Extension and travel support for Thailand, Singapore, Vietnam, Laos and other destinations.';
}

function evm_get_meta_image() {
  if (is_singular() && has_post_thumbnail()) {
    return get_the_post_thumbnail_url(get_queried_object_id(), 'full');
  }

  if (file_exists(get_theme_file_path('/assets/images/og-default.jpg'))) {
    return get_theme_file_uri('/assets/images/og-default.jpg');
  }

  if (file_exists(get_theme_file_path('/assets/images/logo.png'))) {
    return get_theme_file_uri('/assets/images/logo.png');
  }

  return '';
}

function evm_get_canonical_url() {
  if (is_singular()) {
    return get_permalink();
  }

  if (is_front_page() || is_home()) {
    return home_url('/');
  }

  if (is_category() || is_tag() || is_tax()) {
    $term_link = get_term_link(get_queried_object());
    return !is_wp_error($term_link) ? $term_link : home_url('/');
  }

  global $wp;
  return home_url(add_query_arg(array(), $wp->request ?? ''));
}

function evm_output_auto_meta_tags() {
  if (evm_seo_plugin_active()) {
    return;
  }

  $title       = wp_get_document_title();
  $description = evm_get_meta_description();
  $url         = evm_get_canonical_url();
  $image       = evm_get_meta_image();
  $site_name   = get_bloginfo('name');
  $type        = is_singular() ? 'article' : 'website';

  echo "\n<!-- Easy Visa For Myanmar Auto SEO Meta -->\n";
  echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n";
  echo '<link rel="canonical" href="' . esc_url($url) . '">' . "\n";
  echo '<meta property="og:type" content="' . esc_attr($type) . '">' . "\n";
  echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
  echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
  echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
  echo '<meta property="og:site_name" content="' . esc_attr($site_name) . '">' . "\n";

  if (!empty($image)) {
    echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
    echo '<meta name="twitter:image" content="' . esc_url($image) . '">' . "\n";
  }

  echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
  echo '<meta name="twitter:title" content="' . esc_attr($title) . '">' . "\n";
  echo '<meta name="twitter:description" content="' . esc_attr($description) . '">' . "\n";
}
add_action('wp_head', 'evm_output_auto_meta_tags', 5);

/**
 * Search engine indexing helpers.
 * These features do not guarantee instant indexing, but they make the public site easier for crawlers to discover.
 */
function evm_output_search_engine_verification_tags() {
  $google = evm_get_option('evm_google_site_verification', '');
  $bing   = evm_get_option('evm_bing_site_verification', '');
  $yandex = evm_get_option('evm_yandex_verification', '');

  if (!empty($google)) {
    echo '<meta name="google-site-verification" content="' . esc_attr($google) . '">' . "\n";
  }

  if (!empty($bing)) {
    echo '<meta name="msvalidate.01" content="' . esc_attr($bing) . '">' . "\n";
  }

  if (!empty($yandex)) {
    echo '<meta name="yandex-verification" content="' . esc_attr($yandex) . '">' . "\n";
  }
}
add_action('wp_head', 'evm_output_search_engine_verification_tags', 4);

function evm_output_indexing_meta() {
  if (evm_seo_plugin_active()) {
    return;
  }

  if ((int) get_option('blog_public') !== 1) {
    return;
  }

  echo '<meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1">' . "\n";
}
add_action('wp_head', 'evm_output_indexing_meta', 6);

function evm_output_schema_json_ld() {
  if (evm_seo_plugin_active()) {
    return;
  }

  if ((int) get_option('blog_public') !== 1) {
    return;
  }

  $logo = '';
  if (file_exists(get_theme_file_path('/assets/images/logo.png'))) {
    $logo = get_theme_file_uri('/assets/images/logo.png');
  }

  $schema = array(
    '@context' => 'https://schema.org',
    '@type'    => 'TravelAgency',
    'name'     => get_bloginfo('name'),
    'url'      => home_url('/'),
    'description' => evm_get_meta_description(),
    'sameAs'   => array_values(array_filter(array_map(function($item) {
      return !empty($item['url']) ? $item['url'] : '';
    }, evm_get_social_links()))),
  );

  if (!empty($logo)) {
    $schema['logo'] = $logo;
    $schema['image'] = $logo;
  }

  echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";

  $website_schema = array(
    '@context' => 'https://schema.org',
    '@type'    => 'WebSite',
    'name'     => get_bloginfo('name'),
    'url'      => home_url('/'),
    'potentialAction' => array(
      '@type' => 'SearchAction',
      'target' => home_url('/?s={search_term_string}'),
      'query-input' => 'required name=search_term_string',
    ),
  );

  echo '<script type="application/ld+json">' . wp_json_encode($website_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . '</script>' . "\n";
}
add_action('wp_head', 'evm_output_schema_json_ld', 20);

function evm_add_sitemap_to_robots_txt($output, $public) {
  if ($public) {
    $output .= "\nSitemap: " . home_url('/wp-sitemap.xml') . "\n";
  }

  return $output;
}
add_filter('robots_txt', 'evm_add_sitemap_to_robots_txt', 10, 2);


/* ===== EVM V6 business tools: inquiry saving, admin columns, starter pages ===== */

function evm_inquiry_field_labels() {
  return array(
    'inquiry_type'   => __('Inquiry Type', 'easy-visa-myanmar'),
    'name'           => __('Name', 'easy-visa-myanmar'),
    'contact'        => __('Contact', 'easy-visa-myanmar'),
    'preferred_contact_method' => __('Preferred Contact Method', 'easy-visa-myanmar'),
    'delivery_method' => __('Delivery Method', 'easy-visa-myanmar'),
    'nationality'    => __('Nationality', 'easy-visa-myanmar'),
    'country'        => __('Country', 'easy-visa-myanmar'),
    'arrive_airport' => __('Arrive Airport', 'easy-visa-myanmar'),
    'from'           => __('From', 'easy-visa-myanmar'),
    'to'             => __('To', 'easy-visa-myanmar'),
    'departure'      => __('Departure', 'easy-visa-myanmar'),
    'return'         => __('Return', 'easy-visa-myanmar'),
    'passengers'     => __('Passengers', 'easy-visa-myanmar'),
    'destination'    => __('Destination', 'easy-visa-myanmar'),
    'checkin'        => __('Check-in', 'easy-visa-myanmar'),
    'checkout'       => __('Check-out', 'easy-visa-myanmar'),
    'guests'         => __('Guests', 'easy-visa-myanmar'),
    'rooms'          => __('Rooms', 'easy-visa-myanmar'),
    'visa_type'      => __('Visa Type', 'easy-visa-myanmar'),
    'current_visa_type' => __('Current Visa Type', 'easy-visa-myanmar'),
    'extension_method' => __('Extension Method', 'easy-visa-myanmar'),
    'letter_type'    => __('Letter Type', 'easy-visa-myanmar'),
    'region'         => __('Region', 'easy-visa-myanmar'),
    'visa_expiry_date' => __('Visa Expiry Date', 'easy-visa-myanmar'),
    'preferred_date' => __('Preferred Date', 'easy-visa-myanmar'),
    'message'        => __('Message', 'easy-visa-myanmar'),
    'privacy_consent' => __('Privacy Consent', 'easy-visa-myanmar'),
  );
}

function evm_get_client_ip_hash() {
  $ip_keys = array('HTTP_CF_CONNECTING_IP', 'HTTP_X_FORWARDED_FOR', 'REMOTE_ADDR');
  $ip = 'unknown';

  foreach ($ip_keys as $key) {
    if (!empty($_SERVER[$key])) {
      $ip = sanitize_text_field(wp_unslash($_SERVER[$key]));
      $ip = explode(',', $ip)[0];
      break;
    }
  }

  return hash('sha256', $ip . wp_salt('nonce'));
}

function evm_allowed_redirect_url($url) {
  $url = esc_url_raw($url);

  if (empty($url)) {
    return home_url('/');
  }

  $host = wp_parse_url($url, PHP_URL_HOST);
  $home_host = wp_parse_url(home_url('/'), PHP_URL_HOST);

  $allowed_hosts = array(
    $home_host,
    'facebook.com',
    'www.facebook.com',
    'm.facebook.com',
    'messenger.com',
    'm.me',
    'line.me',
    't.me',
    'telegram.me',
    'wa.me',
    'api.whatsapp.com',
    'instagram.com',
    'www.instagram.com',
    'tiktok.com',
    'www.tiktok.com',
  );

  if ($host && in_array(strtolower($host), array_map('strtolower', $allowed_hosts), true)) {
    return $url;
  }

  return home_url('/');
}


function evm_security_ip_key($prefix = 'security') {
  return 'evm_' . sanitize_key($prefix) . '_' . evm_get_client_ip_hash();
}

function evm_is_client_temporarily_blocked() {
  return (bool) get_transient(evm_security_ip_key('blocked'));
}

function evm_register_security_event($reason = 'suspicious') {
  $key = evm_security_ip_key('events');
  $count = absint(get_transient($key));
  $count++;
  set_transient($key, $count, 30 * MINUTE_IN_SECONDS);

  if ($count >= 8) {
    set_transient(evm_security_ip_key('blocked'), sanitize_text_field($reason), 60 * MINUTE_IN_SECONDS);
  }
}

function evm_count_urls_in_text($text) {
  $text = (string) $text;
  preg_match_all('/\b(?:https?:\/\/|www\.|[a-z0-9.-]+\.(?:com|net|org|info|biz|xyz|top|shop|site|online)\b)/i', $text, $matches);
  return isset($matches[0]) ? count($matches[0]) : 0;
}

function evm_contains_blocked_spam_terms($text) {
  $text = strtolower((string) $text);
  $blocked = array(
    'casino', 'gambling', 'betting', 'crypto investment', 'forex signal', 'binary option',
    'viagra', 'cialis', 'loan offer', 'payday loan', 'adult dating', 'escort',
    'make money fast', 'work from home income', 'telegram pump', 'seo backlinks'
  );

  foreach ($blocked as $term) {
    if (strpos($text, $term) !== false) {
      return true;
    }
  }

  return false;
}

function evm_validate_inquiry_security_layer($saved) {
  $errors = array();
  $combined = implode("\n", array_map('strval', $saved));

  if (evm_count_urls_in_text($combined) > 2) {
    $errors[] = __('Please remove extra links from your request and submit again.', 'easy-visa-myanmar');
  }

  if (!empty($saved['name']) && evm_count_urls_in_text($saved['name']) > 0) {
    $errors[] = __('Name should not include website links.', 'easy-visa-myanmar');
  }

  if (evm_contains_blocked_spam_terms($combined)) {
    $errors[] = __('Your request looks like spam. Please contact us directly if this is a real service request.', 'easy-visa-myanmar');
  }

  foreach (array('name', 'contact', 'from', 'to', 'destination', 'country', 'nationality') as $short_field) {
    if (!empty($saved[$short_field]) && mb_strlen($saved[$short_field]) > 120) {
      $errors[] = __('Some fields are too long. Please shorten your request and submit again.', 'easy-visa-myanmar');
      break;
    }
  }

  if (!empty($saved['message']) && mb_strlen($saved['message']) > 1000) {
    $errors[] = __('Message is too long. Please keep it short and our team will ask follow-up questions.', 'easy-visa-myanmar');
  }

  return $errors;
}


function evm_inquiry_status_options() {
  return array(
    'New'              => __('New', 'easy-visa-myanmar'),
    'Contacted'        => __('Contacted', 'easy-visa-myanmar'),
    'Waiting Customer' => __('Waiting Customer', 'easy-visa-myanmar'),
    'Processing'       => __('Processing', 'easy-visa-myanmar'),
    'Completed'        => __('Completed', 'easy-visa-myanmar'),
    'Cancelled'        => __('Cancelled', 'easy-visa-myanmar'),
  );
}

function evm_inquiry_allowed_choices() {
  return array(
    'contact_methods' => array('Phone', 'Email', 'Facebook', 'LINE', 'Message', 'Telegram', 'WhatsApp'),
    'arrive_airports' => array('DMK', 'BKK', 'CNX'),
    'easy_pass_visa_types' => array(
      'TR Visa', 'ED Visa', 'DTV Visa', 'Non-LA Visa', 'Visa on Arrival', 'Business Visa',
      'Non-B Visa', 'Non-O Visa', 'Non-Immigrant Visa', 'Transit Visa', 'Other Visa'
    ),
    'extension_current_visa_types' => array('Arrival Visa', 'TR Visa'),
    'extension_methods' => array('e Extension', 'Walk In VIP Extension'),
    'letter_types' => array(
      'Visa Extension (ဗီဇာသက်တမ်းတိုး)',
      'Bank Recommendation Letter (ဘဏ်ဖွင့်ဖို့ ထောက်ခံစာ)',
      'Driving License Recommendation Letter (ယာဉ်မောင်းလိုင်စင်ပြုလုပ်ဖို့ - တိုးဖို့ ထောက်ခံစာ)',
      'Motorcycle / Car Buying Letter (ယာဉ်ဝယ်ဖို့ ထောက်ခံစာ)',
    ),
    'tm30_regions' => array('Bangkok', 'Chiang Mai', 'Mae Sot'),
    'tm30_delivery_methods' => array('LINE', 'Facebook', 'Email', 'Message', 'Telegram', 'WhatsApp'),
  );
}

function evm_inquiry_value_is_blank($saved, $key) {
  return !isset($saved[$key]) || trim((string) $saved[$key]) === '';
}

function evm_validate_required_fields($saved, $fields, &$errors) {
  $labels = evm_inquiry_field_labels();
  foreach ($fields as $field) {
    if (evm_inquiry_value_is_blank($saved, $field)) {
      $errors[] = sprintf(__('%s is required.', 'easy-visa-myanmar'), isset($labels[$field]) ? $labels[$field] : $field);
    }
  }
}

function evm_validate_choice_field($saved, $field, $allowed, &$errors) {
  $labels = evm_inquiry_field_labels();
  if (!evm_inquiry_value_is_blank($saved, $field) && !in_array($saved[$field], $allowed, true)) {
    $errors[] = sprintf(__('Please choose a valid %s.', 'easy-visa-myanmar'), isset($labels[$field]) ? $labels[$field] : $field);
  }
}

function evm_validate_inquiry_submission($saved) {
  $errors = array();
  $choices = evm_inquiry_allowed_choices();
  $type = !empty($saved['inquiry_type']) ? $saved['inquiry_type'] : 'General';

  if (!in_array($type, array('Flight Ticket', 'Hotel Rent', 'Easy Pass', 'Easy Extension', 'Letter Service', 'TM30 Service', 'General'), true)) {
    $errors[] = __('Please choose a valid service type.', 'easy-visa-myanmar');
  }

  evm_validate_required_fields($saved, array('name', 'contact'), $errors);

  if ($type !== 'TM30 Service') {
    evm_validate_required_fields($saved, array('preferred_contact_method'), $errors);
    evm_validate_choice_field($saved, 'preferred_contact_method', $choices['contact_methods'], $errors);
  }

  switch ($type) {
    case 'Flight Ticket':
      evm_validate_required_fields($saved, array('from', 'to'), $errors);
      break;

    case 'Hotel Rent':
      evm_validate_required_fields($saved, array('destination'), $errors);
      break;

    case 'Easy Pass':
      evm_validate_required_fields($saved, array('nationality', 'arrive_airport', 'from', 'visa_type'), $errors);
      evm_validate_choice_field($saved, 'arrive_airport', $choices['arrive_airports'], $errors);
      evm_validate_choice_field($saved, 'visa_type', $choices['easy_pass_visa_types'], $errors);
      break;

    case 'Easy Extension':
      evm_validate_required_fields($saved, array('nationality', 'current_visa_type', 'visa_expiry_date', 'extension_method'), $errors);
      evm_validate_choice_field($saved, 'current_visa_type', $choices['extension_current_visa_types'], $errors);
      evm_validate_choice_field($saved, 'extension_method', $choices['extension_methods'], $errors);
      break;

    case 'Letter Service':
      evm_validate_required_fields($saved, array('nationality', 'letter_type'), $errors);
      if (!evm_inquiry_value_is_blank($saved, 'nationality') && $saved['nationality'] !== 'Myanmar') {
        $errors[] = __('Letter Service nationality must be Myanmar.', 'easy-visa-myanmar');
      }
      evm_validate_choice_field($saved, 'letter_type', $choices['letter_types'], $errors);
      break;

    case 'TM30 Service':
      evm_validate_required_fields($saved, array('country', 'region', 'delivery_method'), $errors);
      evm_validate_choice_field($saved, 'region', $choices['tm30_regions'], $errors);
      evm_validate_choice_field($saved, 'delivery_method', $choices['tm30_delivery_methods'], $errors);
      break;
  }

  return $errors;
}

function evm_redirect_with_inquiry_errors($errors) {
  $errors = array_values(array_filter(array_map('wp_strip_all_tags', (array) $errors)));
  if (empty($errors)) {
    $errors = array(__('Please check your request and try again.', 'easy-visa-myanmar'));
  }

  $token = strtolower(wp_generate_password(20, false, false));
  set_transient('evm_form_errors_' . $token, $errors, 5 * MINUTE_IN_SECONDS);

  $redirect = wp_get_referer();
  if (empty($redirect)) {
    $redirect = home_url('/#booking');
  }

  $redirect = remove_query_arg('evm_form_error', $redirect);
  $redirect = add_query_arg('evm_form_error', rawurlencode($token), $redirect);

  if (strpos($redirect, '#') === false) {
    $redirect .= '#booking';
  }

  wp_safe_redirect($redirect);
  exit;
}

function evm_get_form_errors_from_request() {
  if (empty($_GET['evm_form_error'])) {
    return array();
  }

  $token = sanitize_key(wp_unslash($_GET['evm_form_error']));
  if (empty($token)) {
    return array();
  }

  $errors = get_transient('evm_form_errors_' . $token);
  delete_transient('evm_form_errors_' . $token);

  return is_array($errors) ? $errors : array();
}

function evm_render_form_error_notice() {
  $errors = evm_get_form_errors_from_request();
  if (empty($errors)) {
    return;
  }
  ?>
  <div class="evm-form-error-notice" role="alert">
    <strong><?php esc_html_e('Please check your request', 'easy-visa-myanmar'); ?></strong>
    <p><?php esc_html_e('Some details were missing or invalid. Please review the messages below and submit again.', 'easy-visa-myanmar'); ?></p>
    <ul>
      <?php foreach ($errors as $error) : ?>
        <li><?php echo esc_html($error); ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
  <?php
}

function evm_die_with_inquiry_errors($errors) {
  evm_redirect_with_inquiry_errors($errors);
}

function evm_handle_inquiry_submission() {
  if (evm_is_client_temporarily_blocked()) {
    evm_redirect_with_inquiry_errors(array(__('Too many suspicious requests. Please wait and try again later, or contact us directly.', 'easy-visa-myanmar')));
  }

  if (!isset($_POST['evm_inquiry_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['evm_inquiry_nonce'])), 'evm_submit_inquiry')) {
    evm_register_security_event('bad_nonce');
    wp_die(esc_html__('Security check failed. Please go back and try again.', 'easy-visa-myanmar'));
  }

  /* Honeypots: real visitors should never fill these hidden fields. */
  if (!empty($_POST['evm_company_website']) || !empty($_POST['evm_confirm_email'])) {
    evm_register_security_event('honeypot');
    wp_safe_redirect(home_url('/'));
    exit;
  }

  $submitted_type = isset($_POST['inquiry_type']) ? sanitize_text_field(wp_unslash($_POST['inquiry_type'])) : 'General';
  $form_token = isset($_POST['evm_form_token']) ? sanitize_text_field(wp_unslash($_POST['evm_form_token'])) : '';
  $token_check = evm_validate_form_token($submitted_type, $form_token);

  if (is_wp_error($token_check)) {
    evm_register_security_event('bad_form_token');
    evm_redirect_with_inquiry_errors(array($token_check->get_error_message()));
  }

  if (empty($_POST['privacy_consent']) || sanitize_text_field(wp_unslash($_POST['privacy_consent'])) !== 'yes') {
    evm_redirect_with_inquiry_errors(array(__('Please agree to the privacy consent before submitting your request.', 'easy-visa-myanmar')));
  }

  /* Flood limit: 5 submissions per 10 minutes per hashed IP. This helps with form floods; real DDoS still needs hosting/CDN protection. */
  $rate_key = 'evm_inquiry_rate_' . evm_get_client_ip_hash();
  $attempts = absint(get_transient($rate_key));

  if ($attempts >= 5) {
    evm_register_security_event('rate_limit');
    evm_redirect_with_inquiry_errors(array(__('Too many requests. Please wait a few minutes and try again.', 'easy-visa-myanmar')));
  }

  set_transient($rate_key, $attempts + 1, 10 * MINUTE_IN_SECONDS);

  $labels = evm_inquiry_field_labels();
  $saved  = array();

  foreach ($labels as $key => $label) {
    if (isset($_POST[$key])) {
      $value = wp_unslash($_POST[$key]);

      if ($key === 'message') {
        $saved[$key] = sanitize_textarea_field($value);
      } else {
        $saved[$key] = sanitize_text_field($value);
      }

      $saved[$key] = mb_substr($saved[$key], 0, 500);
    }
  }

  $type = !empty($saved['inquiry_type']) ? $saved['inquiry_type'] : 'General';

  if ($type === 'Letter Service') {
    $saved['nationality'] = 'Myanmar';
  }

  if (!empty($_FILES)) {
    foreach ($_FILES as $file) {
      if (!empty($file['name'])) {
        evm_redirect_with_inquiry_errors(array(__('File upload is disabled on this form. Please submit basic details only; our team will contact you through your selected method.', 'easy-visa-myanmar')));
      }
    }
  }

  $validation_errors = array_merge(evm_validate_inquiry_submission($saved), evm_validate_inquiry_security_layer($saved));
  if (!empty($validation_errors)) {
    evm_register_security_event('invalid_inquiry');
    evm_die_with_inquiry_errors($validation_errors);
  }

  $name = !empty($saved['name']) ? $saved['name'] : __('Guest', 'easy-visa-myanmar');

  $post_id = wp_insert_post(array(
    'post_type'   => 'evm_inquiry',
    'post_status' => 'private',
    'post_title'  => sprintf('%s Request - %s - %s', $type, $name, current_time('Y-m-d H:i')),
  ));

  if (!is_wp_error($post_id) && $post_id) {
    foreach ($saved as $key => $value) {
      update_post_meta($post_id, '_evm_' . $key, $value);
    }

    update_post_meta($post_id, '_evm_status', 'New');
    update_post_meta($post_id, '_evm_admin_note', '');
    update_post_meta($post_id, '_evm_data_notice', 'Customer was warned not to upload or send passport photos, ID cards, bank details or private documents through website forms.');

    $email_lines = array();
    foreach ($saved as $key => $value) {
      if ($value !== '') {
        $email_lines[] = $labels[$key] . ': ' . $value;
      }
    }

    $email_lines[] = '';
    $email_lines[] = __('Privacy note: Do not ask customers to upload passport photos, ID cards, bank details or private documents through website forms. Continue any sensitive discussion through verified contact channels only when necessary.', 'easy-visa-myanmar');

    wp_mail(
      evm_get_support_email(),
      sprintf(__('New %s inquiry from Easy Visa For Myanmar', 'easy-visa-myanmar'), $type),
      implode("
", $email_lines)
    );
  }

  $redirect_to = isset($_POST['redirect_to']) ? evm_allowed_redirect_url(wp_unslash($_POST['redirect_to'])) : home_url('/');
  wp_redirect($redirect_to);
  exit;
}
add_action('admin_post_evm_submit_inquiry', 'evm_handle_inquiry_submission');
add_action('admin_post_nopriv_evm_submit_inquiry', 'evm_handle_inquiry_submission');

function evm_inquiry_meta_box() {
  add_meta_box(
    'evm_inquiry_details',
    __('Inquiry Details', 'easy-visa-myanmar'),
    'evm_render_inquiry_meta_box',
    'evm_inquiry',
    'normal',
    'high'
  );
}
add_action('add_meta_boxes', 'evm_inquiry_meta_box');

function evm_render_inquiry_meta_box($post) {
  $labels = evm_inquiry_field_labels();
  $status = get_post_meta($post->ID, '_evm_status', true) ?: 'New';
  $admin_note = get_post_meta($post->ID, '_evm_admin_note', true);

  wp_nonce_field('evm_save_inquiry_admin_fields', 'evm_inquiry_admin_nonce');

  echo '<table class="widefat striped">';
  echo '<tbody>';

  foreach ($labels as $key => $label) {
    $value = get_post_meta($post->ID, '_evm_' . $key, true);
    if ($value !== '') {
      echo '<tr>';
      echo '<th style="width:180px;">' . esc_html($label) . '</th>';
      echo '<td>' . nl2br(esc_html($value));
      if (in_array($key, array('inquiry_type', 'name', 'contact', 'message'), true)) {
        echo ' <button type="button" class="button button-small evm-copy-value" data-copy="' . esc_attr($value) . '">' . esc_html__('Copy', 'easy-visa-myanmar') . '</button>';
      }
      echo '</td>';
      echo '</tr>';
    }
  }

  echo '<tr><th>' . esc_html__('Status', 'easy-visa-myanmar') . '</th><td>';
  echo '<select name="evm_inquiry_status">';
  foreach (evm_inquiry_status_options() as $value => $label) {
    echo '<option value="' . esc_attr($value) . '" ' . selected($status, $value, false) . '>' . esc_html($label) . '</option>';
  }
  echo '</select>';
  echo '</td></tr>';

  echo '<tr><th>' . esc_html__('Admin Note', 'easy-visa-myanmar') . '</th><td>';
  echo '<textarea name="evm_admin_note" rows="5" style="width:100%;max-width:760px;" placeholder="' . esc_attr__('Private note for admin workflow only.', 'easy-visa-myanmar') . '">' . esc_textarea($admin_note) . '</textarea>';
  echo '<p class="description">' . esc_html__('Use this for internal follow-up notes. It is not shown to customers.', 'easy-visa-myanmar') . '</p>';
  echo '</td></tr>';

  echo '</tbody></table>';
}

function evm_save_inquiry_admin_fields($post_id) {
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  if (empty($_POST['evm_inquiry_admin_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['evm_inquiry_admin_nonce'])), 'evm_save_inquiry_admin_fields')) {
    return;
  }

  if (isset($_POST['evm_inquiry_status'])) {
    $status = sanitize_text_field(wp_unslash($_POST['evm_inquiry_status']));
    if (array_key_exists($status, evm_inquiry_status_options())) {
      update_post_meta($post_id, '_evm_status', $status);
    }
  }

  if (isset($_POST['evm_admin_note'])) {
    update_post_meta($post_id, '_evm_admin_note', sanitize_textarea_field(wp_unslash($_POST['evm_admin_note'])));
  }
}
add_action('save_post_evm_inquiry', 'evm_save_inquiry_admin_fields');

function evm_inquiry_columns($columns) {
  return array(
    'cb'           => $columns['cb'],
    'title'        => __('Inquiry', 'easy-visa-myanmar'),
    'inquiry_type' => __('Type', 'easy-visa-myanmar'),
    'contact'      => __('Contact', 'easy-visa-myanmar'),
    'service_detail' => __('Detail', 'easy-visa-myanmar'),
    'status'       => __('Status', 'easy-visa-myanmar'),
    'date'         => __('Date', 'easy-visa-myanmar'),
  );
}
add_filter('manage_evm_inquiry_posts_columns', 'evm_inquiry_columns');

function evm_inquiry_column_content($column, $post_id) {
  if ($column === 'inquiry_type') {
    echo esc_html(get_post_meta($post_id, '_evm_inquiry_type', true));
  }

  if ($column === 'contact') {
    echo esc_html(get_post_meta($post_id, '_evm_contact', true));
  }

  if ($column === 'service_detail') {
    $details = array_filter(array(
      get_post_meta($post_id, '_evm_arrive_airport', true),
      get_post_meta($post_id, '_evm_region', true),
      get_post_meta($post_id, '_evm_letter_type', true),
      get_post_meta($post_id, '_evm_visa_type', true),
      get_post_meta($post_id, '_evm_extension_method', true),
    ));
    echo esc_html(implode(' / ', array_slice($details, 0, 2)));
  }

  if ($column === 'status') {
    echo esc_html(get_post_meta($post_id, '_evm_status', true) ?: 'New');
  }
}
add_action('manage_evm_inquiry_posts_custom_column', 'evm_inquiry_column_content', 10, 2);

function evm_inquiry_admin_filters() {
  global $typenow;
  if ($typenow !== 'evm_inquiry') {
    return;
  }

  $selected_type = isset($_GET['evm_filter_type']) ? sanitize_text_field(wp_unslash($_GET['evm_filter_type'])) : '';
  $selected_status = isset($_GET['evm_filter_status']) ? sanitize_text_field(wp_unslash($_GET['evm_filter_status'])) : '';
  $types = array('Flight Ticket', 'Hotel Rent', 'Easy Pass', 'Easy Extension', 'Letter Service', 'TM30 Service', 'General');

  echo '<select name="evm_filter_type">';
  echo '<option value="">' . esc_html__('All service types', 'easy-visa-myanmar') . '</option>';
  foreach ($types as $type) {
    echo '<option value="' . esc_attr($type) . '" ' . selected($selected_type, $type, false) . '>' . esc_html($type) . '</option>';
  }
  echo '</select>';

  echo '<select name="evm_filter_status">';
  echo '<option value="">' . esc_html__('All statuses', 'easy-visa-myanmar') . '</option>';
  foreach (evm_inquiry_status_options() as $value => $label) {
    echo '<option value="' . esc_attr($value) . '" ' . selected($selected_status, $value, false) . '>' . esc_html($label) . '</option>';
  }
  echo '</select>';
}
add_action('restrict_manage_posts', 'evm_inquiry_admin_filters');

function evm_filter_inquiry_admin_query($query) {
  global $pagenow;

  if (!is_admin() || $pagenow !== 'edit.php' || !$query->is_main_query()) {
    return;
  }

  if ($query->get('post_type') !== 'evm_inquiry') {
    return;
  }

  $meta_query = (array) $query->get('meta_query');

  if (!empty($_GET['evm_filter_type'])) {
    $meta_query[] = array(
      'key' => '_evm_inquiry_type',
      'value' => sanitize_text_field(wp_unslash($_GET['evm_filter_type'])),
      'compare' => '=',
    );
  }

  if (!empty($_GET['evm_filter_status'])) {
    $meta_query[] = array(
      'key' => '_evm_status',
      'value' => sanitize_text_field(wp_unslash($_GET['evm_filter_status'])),
      'compare' => '=',
    );
  }

  if (!empty($meta_query)) {
    $query->set('meta_query', $meta_query);
  }
}
add_action('pre_get_posts', 'evm_filter_inquiry_admin_query');

function evm_admin_inquiry_copy_assets($hook) {
  $screen = function_exists('get_current_screen') ? get_current_screen() : null;
  if (!$screen || $screen->post_type !== 'evm_inquiry') {
    return;
  }

  wp_register_script('evm-admin-inquiry-tools', '', array(), EVM_THEME_VERSION, true);
  wp_enqueue_script('evm-admin-inquiry-tools');
  wp_add_inline_script('evm-admin-inquiry-tools', "document.addEventListener('click',function(event){var button=event.target.closest('.evm-copy-value');if(!button)return;event.preventDefault();var text=button.getAttribute('data-copy')||'';function done(){var old=button.textContent;button.textContent='Copied';window.setTimeout(function(){button.textContent=old;},1200);}if(navigator.clipboard&&navigator.clipboard.writeText){navigator.clipboard.writeText(text).then(done).catch(function(){});}else{var area=document.createElement('textarea');area.value=text;document.body.appendChild(area);area.select();try{document.execCommand('copy');done();}catch(e){}document.body.removeChild(area);}});");

  wp_register_style('evm-admin-inquiry-tools', false, array(), EVM_THEME_VERSION);
  wp_enqueue_style('evm-admin-inquiry-tools');
  wp_add_inline_style('evm-admin-inquiry-tools', '.evm-copy-value{margin-left:8px}.post-type-evm_inquiry .tablenav select{max-width:190px;margin-right:6px}');
}
add_action('admin_enqueue_scripts', 'evm_admin_inquiry_copy_assets');


function evm_prepare_starter_page_content($content) {
  return preg_replace_callback('/href="(\/[^"#?]*(?:\?[^"#]*)?(?:#[^"]*)?|\/[#?][^"]*)"/', function($matches) {
    return 'href="' . esc_url(home_url($matches[1])) . '"';
  }, $content);
}

function evm_should_refresh_starter_page($post_id, $slug) {
  $content = trim(wp_strip_all_tags((string) get_post_field('post_content', $post_id)));
  $theme_page = get_post_meta($post_id, '_evm_starter_page', true);

  if ($theme_page) {
    return true;
  }

  if (strlen($content) < 1200) {
    return true;
  }

  $old_phrases = array(
    'Easy Visa For Myanmar helps customers with flight ticket requests',
    'Find support for domestic and international flight ticket booking',
    'Hotel, apartment and guesthouse support for travelers',
    'DMK, BKK and CNX are supported',
    'By using this website, you agree to submit accurate basic travel details',
    'We collect only the information needed to respond',
    'Use this page to contact Easy Visa For Myanmar',
    'worldwide visa and travel support',
    'not only for Myanmar travel',
    'Myanmar customers',
    'for Myanmar customers',
    '[evm_faq]',
    '[evm_destinations]'
  );

  foreach ($old_phrases as $phrase) {
    if (stripos($content, $phrase) !== false) {
      return true;
    }
  }

  return false;
}

function evm_create_starter_pages() {
  $pages = array(
    'destinations' => array(
      'title' => 'Destinations',
      'content' => '[evm_destinations]'
    ),
    'flight-ticket-booking' => array(
      'title' => 'Flight Ticket Booking',
      'content' => <<<'HTML_FLIGHT_TICKET_BOOKING'
<div class="evm-page-shell evm-service-page">
  <section class="evm-page-panel evm-page-intro">
    <span class="section-kicker">Flight Ticket Booking</span>
    <h2>Flight support for worldwide destinations</h2>
    <p>Easy Visa For Myanmar helps customers send flight ticket requests for many destinations, including Thailand, Singapore, Vietnam, Laos and other countries. Submit basic information first, then our admin team will contact you to confirm options and next steps.</p>
    <div class="evm-page-actions">
      <a class="evm-btn evm-btn-primary" href="/?tab=flight#booking">Start Flight Request</a>
      <a class="evm-btn evm-btn-ghost" href="/faq/">Read FAQ</a>
    </div>
  </section>


  <section class="evm-page-panel">
    <h2>Main destinations we support</h2>
    <div class="evm-destination-pills">
      <span>Thailand</span>
      <span>Singapore</span>
      <span>Vietnam</span>
      <span>Laos</span>
      <span>Malaysia</span>
      <span>Other countries</span>
    </div>
    <p>Easy Visa For Myanmar provides worldwide visa and travel support. We support customers from different countries who need visa and travel support for international trips.</p>
  </section>

  <section class="evm-page-grid evm-page-grid-3">
    <div class="evm-page-card"><h3>What we help with</h3><p>One-way or return flight request, route notes, date preference and passenger details.</p></div>
    <div class="evm-page-card"><h3>Who it is for</h3><p>Customers who want admin support before choosing a ticket or travel route.</p></div>
    <div class="evm-page-card"><h3>How we reply</h3><p>We contact you through your preferred contact method after receiving the request.</p></div>
  </section>

  <section class="evm-page-panel">
    <h2>How the process works</h2>
    <ol class="evm-step-list">
      <li><strong>Choose Flight Ticket tab.</strong><span>Fill name, contact, route, dates and passenger count.</span></li>
      <li><strong>Submit your request.</strong><span>Your request is saved in WordPress Admin → Inquiries and email reminder is sent to admin.</span></li>
      <li><strong>Admin contacts you.</strong><span>We confirm details and continue the booking discussion through your selected contact method.</span></li>
    </ol>
  </section>

  <section class="evm-page-panel evm-page-warning">
    <h2>Important note</h2>
    <p>Flight ticket availability and prices can change. Easy Visa For Myanmar provides travel support and request coordination. We do not guarantee airline availability, ticket price, schedule change, immigration approval or visa decisions.</p>
  </section>
</div>
HTML_FLIGHT_TICKET_BOOKING,
    ),
    'hotel-rent' => array(
      'title' => 'Hotel Rent',
      'content' => <<<'HTML_HOTEL_RENT'
<div class="evm-page-shell evm-service-page">
  <section class="evm-page-panel evm-page-intro">
    <span class="section-kicker">Hotel Rent</span>
    <h2>Hotel, apartment and guesthouse support</h2>
    <p>Use Hotel Rent when you need help finding stay options by destination, check-in date, check-out date, guests, rooms and budget preference. Submit basic details first and our admin team will contact you.</p>
    <div class="evm-page-actions">
      <a class="evm-btn evm-btn-primary" href="/?tab=hotel#booking">Start Hotel Request</a>
      <a class="evm-btn evm-btn-ghost" href="/contact/">Contact Support</a>
    </div>
  </section>

  <section class="evm-page-grid evm-page-grid-3">
    <div class="evm-page-card"><h3>Stay types</h3><p>Hotel, apartment, guesthouse and other stay support depending on destination and availability.</p></div>
    <div class="evm-page-card"><h3>Useful details</h3><p>Destination, dates, number of guests, rooms, budget and preferred area help us reply faster.</p></div>
    <div class="evm-page-card"><h3>Customer safety</h3><p>Do not send passport photos, ID cards or payment details through public forms.</p></div>
  </section>

  <section class="evm-page-panel">
    <h2>How the process works</h2>
    <ol class="evm-step-list">
      <li><strong>Choose Hotel Rent tab.</strong><span>Add destination, dates, guests and rooms.</span></li>
      <li><strong>Add notes if needed.</strong><span>You can mention budget, location preference or family travel needs.</span></li>
      <li><strong>Wait for admin reply.</strong><span>We contact you to confirm stay options and next steps.</span></li>
    </ol>
  </section>

  <section class="evm-page-panel evm-page-warning">
    <h2>Important note</h2>
    <p>Stay availability, prices, policies and booking rules depend on hotel or property providers. Easy Visa For Myanmar helps coordinate requests but does not guarantee third-party availability or approval.</p>
  </section>
</div>
HTML_HOTEL_RENT,
    ),
    'easy-pass-service' => array(
      'title' => 'Easy Pass Service',
      'content' => <<<'HTML_EASY_PASS_SERVICE'
<div class="evm-page-shell evm-service-page">
  <section class="evm-page-panel evm-page-intro">
    <span class="section-kicker">Easy Pass Service</span>
    <h2>Airport arrival support request</h2>
    <p>Easy Pass helps customers send airport support requests for DMK, BKK and CNX. Submit your name, nationality, arrival airport, departure city, visa type and special notes so our team can contact you.</p>
    <div class="evm-page-actions">
      <a class="evm-btn evm-btn-primary" href="/?tab=easy-pass#booking">Start Easy Pass Request</a>
      <a class="evm-btn evm-btn-ghost" href="/faq/">Read FAQ</a>
    </div>
  </section>

  <section class="evm-page-grid evm-page-grid-3">
    <div class="evm-page-card"><h3>Supported airports</h3><p>DMK Don Mueang, BKK Suvarnabhumi and CNX Chiang Mai.</p></div>
    <div class="evm-page-card"><h3>Supported visa notes</h3><p>TR Visa, ED Visa, DTV Visa, Non-B, Non-O, Visa on Arrival and other customer-selected visa types.</p></div>
    <div class="evm-page-card"><h3>Best for</h3><p>Customers who want airport arrival support coordination and admin follow-up.</p></div>
  </section>

  <section class="evm-page-panel">
    <h2>How the process works</h2>
    <ol class="evm-step-list">
      <li><strong>Choose Easy Pass tab.</strong><span>Enter nationality, airport, departure city and visa type.</span></li>
      <li><strong>Add arrival notes.</strong><span>Mention arrival time, urgent note, family members or preferred contact time.</span></li>
      <li><strong>Admin follows up.</strong><span>We reply through your preferred contact method with next steps.</span></li>
    </ol>
  </section>

  <section class="evm-page-panel evm-page-warning">
    <h2>Important note</h2>
    <p>Easy Pass is a support request service. Airport, airline, immigration and visa decisions are made by the relevant authorities or providers. We do not guarantee approval or official decision outcomes.</p>
  </section>
</div>
HTML_EASY_PASS_SERVICE,
    ),
    'easy-extension-service' => array(
      'title' => 'Easy Extension Service',
      'content' => <<<'HTML_EASY_EXTENSION_SERVICE'
<div class="evm-page-shell evm-service-page">
  <section class="evm-page-panel evm-page-intro">
    <span class="section-kicker">Easy Extension Service</span>
    <h2>Arrival Visa and TR Visa extension request support</h2>
    <p>Easy Extension helps customers send visa extension requests with current visa type, visa expiry date, preferred extension date and extension method. Choose e Extension or Walk In VIP Extension depending on timing and urgency.</p>
    <div class="evm-page-actions">
      <a class="evm-btn evm-btn-primary" href="/?tab=easy-extension#booking">Start Extension Request</a>
      <a class="evm-btn evm-btn-ghost" href="/contact/">Contact Support</a>
    </div>
  </section>

  <section class="evm-page-grid evm-page-grid-2">
    <div class="evm-page-card"><h3>e Extension</h3><p>Best when you can prepare early, usually 10 to 15 days before visa expiry.</p></div>
    <div class="evm-page-card"><h3>Walk In VIP Extension</h3><p>Best for urgent cases or when you need admin consultation before choosing next steps.</p></div>
  </section>

  <section class="evm-page-panel">
    <h2>Required basic information</h2>
    <ul class="evm-check-list">
      <li>Name and contact information</li>
      <li>Nationality</li>
      <li>Current visa type: Arrival Visa or TR Visa</li>
      <li>Visa expiry date</li>
      <li>Preferred extension date</li>
      <li>Extension method and special notes</li>
    </ul>
  </section>

  <section class="evm-page-panel evm-page-warning">
    <h2>Important note</h2>
    <p>Easy Visa For Myanmar provides travel support and request coordination. Immigration and visa approval decisions are made by the relevant authority. We do not guarantee approval, processing time or official decision outcomes.</p>
  </section>
</div>
HTML_EASY_EXTENSION_SERVICE,
    ),
    'letter-service' => array(
      'title' => 'Letter Service',
      'content' => <<<'HTML_LETTER_SERVICE'
<div class="evm-page-shell evm-service-page evm-focused-service-page">
  <section class="evm-page-panel evm-page-intro">
    <span class="section-kicker">Letter Service</span>
    <h2>Recommendation letter support for Myanmar customers</h2>
    <p>Use this page to understand the Letter Service first, then start a request when you are ready. This service is currently for Myanmar nationality only.</p>
    <div class="evm-page-actions">
      <a class="evm-btn evm-btn-primary" href="/?tab=letter-service#booking">Start Letter Request</a>
      <a class="evm-btn evm-btn-ghost" href="/contact/">Contact Support</a>
    </div>
  </section>

  <section class="evm-page-grid evm-page-grid-2">
    <div class="evm-page-card"><h3>Who can use this service?</h3><p>Letter Service is currently set for Myanmar nationality only. The request form keeps nationality fixed as Myanmar.</p></div>
    <div class="evm-page-card"><h3>What happens after submit?</h3><p>Your request is saved in WordPress Admin → Inquiries. Admin receives an email reminder and contacts the customer through the selected method.</p></div>
  </section>

  <section class="evm-page-panel">
    <h2>Letter types</h2>
    <ul class="evm-check-list">
      <li>Visa Extension — ဗီဇာသက်တမ်းတိုး</li>
      <li>Bank Recommendation Letter — ဘဏ်ဖွင့်ဖို့ ထောက်ခံစာ</li>
      <li>Driving License Recommendation Letter — ယာဉ်မောင်းလိုင်စင်ပြုလုပ်ဖို့ - တိုးဖို့ ထောက်ခံစာ</li>
      <li>Motorcycle / Car Buying Letter — ယာဉ်ဝယ်ဖို့ ထောက်ခံစာ</li>
    </ul>
  </section>

  <section class="evm-page-panel">
    <h2>Required basic information</h2>
    <div class="evm-page-grid evm-page-grid-3">
      <div class="evm-page-card"><h3>Name</h3><p>Customer full name for the letter request.</p></div>
      <div class="evm-page-card"><h3>Nationality</h3><p>Myanmar only.</p></div>
      <div class="evm-page-card"><h3>Contact info</h3><p>Phone, email, LINE, Facebook, Telegram or WhatsApp.</p></div>
    </div>
  </section>

  <section class="evm-page-panel">
    <h2>How it works</h2>
    <ol class="evm-step-list">
      <li><strong>Choose Letter Service.</strong><span>Select the letter type and submit basic contact information.</span></li>
      <li><strong>Admin checks the request.</strong><span>We confirm the letter purpose, spelling and next steps through the selected contact method.</span></li>
      <li><strong>Receive follow-up.</strong><span>The team explains the next step and how the customer can receive the completed letter.</span></li>
    </ol>
  </section>

  [evm_service_faq group="letter-service" title="Letter Service FAQ" subtitle="Questions about recommendation letter support"]

  [evm_testimonials_section title="Trust and support" text="Real customer reviews appear here after you add them in WordPress Admin."]

  <section class="evm-page-panel">
    <h2>Related guides</h2>
    <div class="evm-feature-list">
      <a href="/visa-guides/how-to-request-a-recommendation-letter/"><strong>How to request a recommendation letter</strong><span>Learn the basic steps before submitting Letter Service.</span></a>
      <a href="/visa-guides/thailand-visa-extension-basic-guide/"><strong>Thailand visa extension basic guide</strong><span>Helpful if the letter is for visa extension support.</span></a>
      <a href="/visa-guides/"><strong>Visa Guides / Blog</strong><span>Read all service guides, safety notes and updates.</span></a>
      <a href="/#booking"><strong>Book Travel & Services Form</strong><span>Open the homepage booking form.</span></a>
    </div>
  </section>

  <section class="evm-page-panel evm-page-warning">
    <h2>Safety note</h2>
    <p>Please submit only basic request information on the website form. Do not upload or send passport photos, ID cards, bank details or unrelated private documents through website forms.</p>
  </section>

  <section class="evm-page-panel">
    <h2>Help &amp; Support</h2>
    <p>Need help choosing the correct letter type? Contact Easy Visa For Myanmar and our team will guide you.</p>
    <div class="evm-page-actions">
      <a class="evm-btn evm-btn-primary" href="/?tab=letter-service#booking">Start Letter Request</a>
      <a class="evm-btn evm-btn-ghost" href="/contact/">Contact Support</a>
    </div>
  </section>
</div>
HTML_LETTER_SERVICE,
    ),
    'tm30-service' => array(
      'title' => 'TM30 Service',
      'content' => <<<'HTML_TM30_SERVICE'
<div class="evm-page-shell evm-service-page evm-focused-service-page">
  <section class="evm-page-panel evm-page-intro">
    <span class="section-kicker">TM30 Service</span>
    <h2>TM30 request support for Bangkok, Chiang Mai and Mae Sot</h2>
    <p>Use this page to understand the TM30 Service first, then start a request. The website form collects only basic details and does not include passport upload.</p>
    <div class="evm-page-actions">
      <a class="evm-btn evm-btn-primary" href="/?tab=tm30-service#booking">Start TM30 Request</a>
      <a class="evm-btn evm-btn-ghost" href="/contact/">Contact Support</a>
    </div>
  </section>

  <section class="evm-page-grid evm-page-grid-3">
    <div class="evm-page-card"><h3>Supported regions</h3><p>Bangkok, Chiang Mai and Mae Sot only.</p></div>
    <div class="evm-page-card"><h3>Basic details only</h3><p>The online request form collects name, country, contact info, region and completed-file delivery method.</p></div>
    <div class="evm-page-card"><h3>No passport upload</h3><p>Customers do not upload passport photos or private documents on the website form.</p></div>
  </section>

  <section class="evm-page-panel">
    <h2>How customers receive the completed file</h2>
    <div class="evm-page-grid evm-page-grid-3">
      <div class="evm-page-card"><h3>LINE</h3><p>Customer can choose LINE delivery.</p></div>
      <div class="evm-page-card"><h3>Facebook</h3><p>Customer can choose Facebook delivery.</p></div>
      <div class="evm-page-card"><h3>Email</h3><p>Customer can choose email delivery.</p></div>
      <div class="evm-page-card"><h3>Message</h3><p>Customer can choose SMS / message delivery.</p></div>
      <div class="evm-page-card"><h3>Telegram</h3><p>Customer can choose Telegram delivery.</p></div>
      <div class="evm-page-card"><h3>WhatsApp</h3><p>Customer can choose WhatsApp delivery.</p></div>
    </div>
  </section>

  <section class="evm-page-panel">
    <h2>How it works</h2>
    <ol class="evm-step-list">
      <li><strong>Choose TM30 Service.</strong><span>Submit name, country, contact info, region and delivery method.</span></li>
      <li><strong>Admin follows up.</strong><span>The team checks the request and contacts the customer through the selected channel.</span></li>
      <li><strong>Receive completed file.</strong><span>The customer receives the completed file through LINE, Facebook, Email, Message, Telegram or WhatsApp.</span></li>
    </ol>
  </section>

  [evm_service_faq group="tm30-service" title="TM30 Service FAQ" subtitle="Questions about TM30 request support and completed-file delivery"]

  [evm_testimonials_section title="Trust and support" text="Real customer reviews appear here after you add them in WordPress Admin."]

  <section class="evm-page-panel">
    <h2>Related guides</h2>
    <div class="evm-feature-list">
      <a href="/visa-guides/what-is-tm30-in-thailand/"><strong>What is TM30 in Thailand?</strong><span>Read a simple guide before submitting TM30 Service.</span></a>
      <a href="/visa-guides/how-customers-receive-completed-documents/"><strong>How customers receive completed documents</strong><span>Understand delivery methods like LINE, Email, Telegram and WhatsApp.</span></a>
      <a href="/visa-guides/"><strong>Visa Guides / Blog</strong><span>Read all guides and customer safety notes.</span></a>
      <a href="/#booking"><strong>Book Travel & Services Form</strong><span>Open the homepage booking form.</span></a>
    </div>
  </section>

  <section class="evm-page-panel evm-page-warning">
    <h2>Important safety note</h2>
    <p>Please do not upload or send passport photos, ID cards, bank details or private documents through the website form. Submit basic details first. If more information is needed, our team will guide you through your selected contact method.</p>
  </section>

  <section class="evm-page-panel">
    <h2>Help &amp; Support</h2>
    <p>Need help with TM30 region or delivery method? Contact Easy Visa For Myanmar and our team will guide you.</p>
    <div class="evm-page-actions">
      <a class="evm-btn evm-btn-primary" href="/?tab=tm30-service#booking">Start TM30 Request</a>
      <a class="evm-btn evm-btn-ghost" href="/contact/">Contact Support</a>
    </div>
  </section>
</div>
HTML_TM30_SERVICE,
    ),
    'about-us' => array(
      'title' => 'About Us',
      'content' => <<<'HTML_ABOUT_US'
<div class="evm-page-shell evm-about-page">
  <section class="evm-page-panel evm-page-intro">
    <span class="section-kicker">About Easy Visa For Myanmar</span>
    <h2>Worldwide visa and travel support for all customers</h2>
    <p>Easy Visa For Myanmar helps customers with visa and travel support around the world, mainly Thailand, Singapore, Vietnam, Laos and nearby destinations. Our services include flight ticket requests, hotel rent support, Easy Pass airport support, Easy Extension, Letter Service and TM30 Service. We mainly support Thailand, Singapore, Vietnam, Laos and other international destinations.</p>
  </section>

  <section class="evm-page-grid evm-page-grid-3">
    <div class="evm-page-card"><h3>Clear service choices</h3><p>Customers choose one service tab and submit only the basic information needed for admin follow-up.</p></div>
    <div class="evm-page-card"><h3>Admin follow-up</h3><p>Every request is saved in WordPress Admin → Inquiries and admin receives an email reminder.</p></div>
    <div class="evm-page-card"><h3>Safer communication</h3><p>We warn customers not to send passport photos, ID cards, bank details or private documents through public forms.</p></div>
  </section>

  <section class="evm-page-panel">
    <h2>What we help with</h2>
    <div class="evm-feature-list">
      <a href="/flight-ticket-booking/"><strong>Flight Ticket Booking</strong><span>Route, date and passenger request support.</span></a>
      <a href="/hotel-rent/"><strong>Hotel Rent</strong><span>Hotel, apartment and guesthouse request support.</span></a>
      <a href="/easy-pass-service/"><strong>Easy Pass</strong><span>Airport arrival support request for DMK, BKK and CNX.</span></a>
      <a href="/easy-extension-service/"><strong>Easy Extension</strong><span>Arrival Visa and TR Visa extension request support.</span></a>
      <a href="/letter-service/"><strong>Letter Service</strong><span>Recommendation letter request support for Myanmar customers.</span></a>
      <a href="/tm30-service/"><strong>TM30 Service</strong><span>TM30 request support for Bangkok, Chiang Mai and Mae Sot.</span></a>
    </div>
  </section>

  <section class="evm-page-panel">
    <h2>How customer requests work</h2>
    <ol class="evm-step-list">
      <li><strong>Choose a service.</strong><span>Select Flight, Hotel, Easy Pass, Easy Extension, Letter Service or TM30 Service.</span></li>
      <li><strong>Submit basic details.</strong><span>Fill the form and choose preferred contact method.</span></li>
      <li><strong>Admin contacts you.</strong><span>Our team replies through the contact method you selected.</span></li>
    </ol>
  </section>

  <section class="evm-page-panel evm-page-warning">
    <h2>Important disclaimer</h2>
    <p>Easy Visa For Myanmar provides travel support and request coordination. We do not guarantee airline, hotel, immigration or visa approval decisions.</p>
  </section>
</div>
HTML_ABOUT_US,
    ),
    'faq' => array(
      'title' => 'FAQ',
      'content' => '[evm_faq]',
    ),
    'contact' => array(
      'title' => 'Contact Us',
      'content' => <<<'HTML_CONTACT'
<div class="evm-page-shell evm-contact-page">
  <section class="evm-page-panel evm-page-intro">
    <span class="section-kicker">Contact Support</span>
    <h2>Need help before submitting?</h2>
    <p>Use the booking form for service requests. For general questions, contact our support team.</p>
    <div class="evm-page-actions">
      <a class="evm-btn evm-btn-primary" href="/#booking">Start Booking</a>
      <a class="evm-btn evm-btn-ghost" href="mailto:support@easyvisaformyanmar.com">support@easyvisaformyanmar.com</a>
    </div>
  </section>

  <section class="evm-page-grid evm-page-grid-2">
    <div class="evm-page-card"><h3>Support email</h3><p><a href="mailto:support@easyvisaformyanmar.com">support@easyvisaformyanmar.com</a></p></div>
    <div class="evm-page-card"><h3>Safety reminder</h3><p>Do not send passport photos, ID cards, bank details or private documents through public forms.</p></div>
  </section>
</div>
HTML_CONTACT,
      'template' => 'template-contact.php',
    ),
    'privacy-policy' => array(
      'title' => 'Privacy Policy',
      'content' => <<<'HTML_PRIVACY_POLICY'
<div class="evm-page-shell evm-policy-page">
  <section class="evm-page-panel evm-page-intro">
    <span class="section-kicker">Privacy Policy</span>
    <h2>How we handle customer request information</h2>
    <p>We collect only information needed to respond to travel, flight, hotel, Easy Pass, Easy Extension, Letter Service and TM30 requests.</p>
  </section>

  <section class="evm-page-panel">
    <h2>Information we collect</h2>
    <ul class="evm-check-list">
      <li>Name and contact information</li>
      <li>Preferred contact method</li>
      <li>Travel route, date, passenger or stay details</li>
      <li>Nationality, airport, visa type, letter type, region or extension request details when relevant</li>
      <li>Special request notes provided by the customer</li>
    </ul>
  </section>

  <section class="evm-page-panel evm-page-warning">
    <h2>Do not send sensitive documents</h2>
    <p>Please do not send passport photos, ID cards, bank details or private documents through website forms. Submit only basic request details; sensitive discussions should continue only through verified contact channels when necessary.</p>
  </section>

  <section class="evm-page-panel">
    <h2>How we use information</h2>
    <p>We use submitted information to reply to the customer, understand the service request and coordinate next steps. Inquiry records may be cleaned up after a reasonable retention period.</p>
  </section>
</div>
HTML_PRIVACY_POLICY,
    ),
    'terms' => array(
      'title' => 'Terms & Conditions',
      'content' => <<<'HTML_TERMS'
<div class="evm-page-shell evm-policy-page">
  <section class="evm-page-panel evm-page-intro">
    <span class="section-kicker">Terms & Conditions</span>
    <h2>Website use and service request terms</h2>
    <p>By using this website, you agree to submit accurate basic travel details and understand that website forms are for inquiry requests only.</p>
  </section>

  <section class="evm-page-panel">
    <h2>Service request only</h2>
    <p>Submitting a form does not confirm ticket booking, hotel booking, airport support, visa extension, immigration approval or any third-party service. Our admin team will contact you to confirm next steps.</p>
  </section>

  <section class="evm-page-panel">
    <h2>Customer responsibility</h2>
    <ul class="evm-check-list">
      <li>Submit accurate information.</li>
      <li>Check official airline, hotel, airport, immigration and visa requirements before travel.</li>
      <li>Do not submit passport photos, ID cards, bank details or sensitive documents through public website forms.</li>
      <li>Respond to admin follow-up if more details are needed.</li>
    </ul>
  </section>

  <section class="evm-page-panel evm-page-warning">
    <h2>No approval guarantee</h2>
    <p>Easy Visa For Myanmar provides travel support and request coordination. We do not guarantee airline, hotel, immigration or visa approval decisions.</p>
  </section>
</div>
HTML_TERMS,
    ),
    'thailand-easy-pass-service' => array(
      'title' => 'Thailand Easy Pass Service',
      'content' => <<<'HTML_THAILAND_EASY_PASS_SERVICE'
<div class="evm-page-shell evm-service-page">
  <section class="evm-page-panel evm-page-intro">
    <span class="section-kicker">Thailand Easy Pass Service</span>
    <h2>Airport arrival support request</h2>
    <p>This page supports the Easy Pass service for customers arriving at DMK, BKK and CNX. For the newest form, use the Easy Pass tab on the homepage.</p>
    <div class="evm-page-actions"><a class="evm-btn evm-btn-primary" href="/?tab=easy-pass#booking">Start Easy Pass Request</a></div>
  </section>
</div>
HTML_THAILAND_EASY_PASS_SERVICE,
    ),
    'easy-extension' => array(
      'title' => 'Easy Extension',
      'content' => <<<'HTML_EASY_EXTENSION'
<div class="evm-page-shell evm-service-page">
  <section class="evm-page-panel evm-page-intro">
    <span class="section-kicker">Easy Extension</span>
    <h2>Arrival Visa and TR Visa extension request support</h2>
    <p>This page supports Easy Extension requests. For the newest form, use the Easy Extension tab on the homepage.</p>
    <div class="evm-page-actions"><a class="evm-btn evm-btn-primary" href="/?tab=easy-extension#booking">Start Extension Request</a></div>
  </section>
</div>
HTML_EASY_EXTENSION,
    ),
    'myanmar-travel-guide' => array(
      'title' => 'Myanmar Travel Guide',
      'content' => <<<'HTML_MYANMAR_TRAVEL_GUIDE'
<div class="evm-page-shell">
  <section class="evm-page-panel evm-page-intro">
    <span class="section-kicker">Travel Guide</span>
    <h2>Useful worldwide travel notes</h2>
    <p>Travel tips, visa notes, destination guides, airport information and useful knowledge for customers traveling to Thailand, Singapore, Vietnam, Laos and other countries. More articles can be added from WordPress Admin → Posts.</p>
  </section>
</div>
HTML_MYANMAR_TRAVEL_GUIDE,
    ),
    'myanmar-visa-service' => array(
      'title' => 'Myanmar Visa Service',
      'content' => <<<'HTML_MYANMAR_VISA_SERVICE'
<div class="evm-page-shell">
  <section class="evm-page-panel evm-page-intro">
    <span class="section-kicker">Visa Support</span>
    <h2>Worldwide visa and travel support information</h2>
    <p>Easy Visa For Myanmar helps customers understand visa and travel support steps for many destinations. Use the service request forms for Flight, Hotel, Easy Pass, Easy Extension, Letter Service and TM30 support.</p>
  </section>
</div>
HTML_MYANMAR_VISA_SERVICE,
    ),
    'terms-and-conditions' => array(
      'title' => 'Terms and Conditions',
      'content' => <<<'HTML_TERMS_AND_CONDITIONS'
<div class="evm-page-shell evm-policy-page">
  <section class="evm-page-panel evm-page-intro">
    <span class="section-kicker">Terms & Conditions</span>
    <h2>Website use and service request terms</h2>
    <p>Please use the current Terms page for the newest terms information.</p>
    <div class="evm-page-actions"><a class="evm-btn evm-btn-primary" href="/terms/">Open Terms</a></div>
  </section>
</div>
HTML_TERMS_AND_CONDITIONS,
    ),
    'thank-you' => array(
      'title' => 'Thank You',
      'content' => <<<'HTML_THANK_YOU'
Thank you. We received your request and our team will contact you soon.
HTML_THANK_YOU,
      'template' => 'template-thank-you.php',
    )
  );

  $upgrade_done = get_option('evm_starter_pages_v49_done');

  foreach ($pages as $slug => $page) {
    $existing = get_page_by_path($slug);

    if (!$existing) {
      $page_id = wp_insert_post(array(
        'post_type'    => 'page',
        'post_status'  => 'publish',
        'post_name'    => $slug,
        'post_title'   => $page['title'],
        'post_content' => evm_prepare_starter_page_content($page['content']),
      ));

      if (!is_wp_error($page_id) && $page_id) {
        update_post_meta($page_id, '_evm_starter_page', '1');
        update_post_meta($page_id, '_evm_starter_content_version', 'v55');

        if (!empty($page['template'])) {
          update_post_meta($page_id, '_wp_page_template', $page['template']);
        }
      }

      continue;
    }

    if (!$upgrade_done && evm_should_refresh_starter_page($existing->ID, $slug)) {
      wp_update_post(array(
        'ID'           => $existing->ID,
        'post_title'   => $page['title'],
        'post_content' => evm_prepare_starter_page_content($page['content']),
      ));

      update_post_meta($existing->ID, '_evm_starter_page', '1');
      update_post_meta($existing->ID, '_evm_starter_content_version', 'v55');

      if (!empty($page['template'])) {
        update_post_meta($existing->ID, '_wp_page_template', $page['template']);
      }
    }
  }

  $service_pages_v52_done = get_option('evm_service_pages_v52_done');
  if (!$service_pages_v52_done) {
    foreach (array('letter-service', 'tm30-service') as $service_slug) {
      $existing_service_page = get_page_by_path($service_slug);
      if ($existing_service_page && isset($pages[$service_slug]) && evm_should_refresh_starter_page($existing_service_page->ID, $service_slug)) {
        wp_update_post(array(
          'ID'           => $existing_service_page->ID,
          'post_title'   => $pages[$service_slug]['title'],
          'post_content' => evm_prepare_starter_page_content($pages[$service_slug]['content']),
        ));
        update_post_meta($existing_service_page->ID, '_evm_starter_page', '1');
        update_post_meta($existing_service_page->ID, '_evm_starter_content_version', 'v55');
      }
    }
    update_option('evm_service_pages_v52_done', '1');
  }

  $service_pages_v53_done = get_option('evm_service_pages_v53_done');
  if (!$service_pages_v53_done) {
    foreach (array('letter-service', 'tm30-service') as $service_slug) {
      $existing_service_page = get_page_by_path($service_slug);
      if ($existing_service_page && isset($pages[$service_slug]) && evm_should_refresh_starter_page($existing_service_page->ID, $service_slug)) {
        wp_update_post(array(
          'ID'           => $existing_service_page->ID,
          'post_title'   => $pages[$service_slug]['title'],
          'post_content' => evm_prepare_starter_page_content($pages[$service_slug]['content']),
        ));
        update_post_meta($existing_service_page->ID, '_evm_starter_page', '1');
        update_post_meta($existing_service_page->ID, '_evm_starter_content_version', 'v55');
      }
    }
    update_option('evm_service_pages_v53_done', '1');
  }

  $service_pages_v55_done = get_option('evm_service_pages_v55_done');
  if (!$service_pages_v55_done) {
    foreach (array('letter-service', 'tm30-service') as $service_slug) {
      $existing_service_page = get_page_by_path($service_slug);
      if ($existing_service_page && isset($pages[$service_slug]) && evm_should_refresh_starter_page($existing_service_page->ID, $service_slug)) {
        wp_update_post(array(
          'ID'           => $existing_service_page->ID,
          'post_title'   => $pages[$service_slug]['title'],
          'post_content' => evm_prepare_starter_page_content($pages[$service_slug]['content']),
        ));
        update_post_meta($existing_service_page->ID, '_evm_starter_page', '1');
        update_post_meta($existing_service_page->ID, '_evm_starter_content_version', 'v55');
      }
    }
    update_option('evm_service_pages_v55_done', '1');
  }


  $service_pages_v56_done = get_option('evm_service_pages_v56_done');
  if (!$service_pages_v56_done) {
    foreach (array('letter-service', 'tm30-service') as $service_slug) {
      $existing_service_page = get_page_by_path($service_slug);
      if ($existing_service_page && isset($pages[$service_slug]) && evm_should_refresh_starter_page($existing_service_page->ID, $service_slug)) {
        wp_update_post(array(
          'ID'           => $existing_service_page->ID,
          'post_title'   => $pages[$service_slug]['title'],
          'post_content' => evm_prepare_starter_page_content($pages[$service_slug]['content']),
        ));
        update_post_meta($existing_service_page->ID, '_evm_starter_page', '1');
        update_post_meta($existing_service_page->ID, '_evm_starter_content_version', 'v56');
      }
    }
    update_option('evm_service_pages_v56_done', '1');
  }

  if (!$upgrade_done) {
    update_option('evm_starter_pages_v49_done', '1');
  }
}
add_action('after_switch_theme', 'evm_create_starter_pages');

function evm_register_theme_setup_page() {
  add_theme_page(
    __('Easy Visa Setup', 'easy-visa-myanmar'),
    __('Easy Visa Setup', 'easy-visa-myanmar'),
    'manage_options',
    'evm-theme-setup',
    'evm_render_theme_setup_page'
  );
}
add_action('admin_menu', 'evm_register_theme_setup_page');

function evm_render_theme_setup_page() {
  if (!current_user_can('manage_options')) {
    return;
  }

  echo '<div class="wrap">';
  echo '<h1>' . esc_html__('Easy Visa Theme Setup', 'easy-visa-myanmar') . '</h1>';

  if (!empty($_GET['evm_setup']) && sanitize_key(wp_unslash($_GET['evm_setup'])) === 'done') {
    echo '<div class="notice notice-success"><p>' . esc_html__('Starter pages were created/refreshed where safe.', 'easy-visa-myanmar') . '</p></div>';
  }

  echo '<p>' . esc_html__('Use this button after updating the theme if you want to create missing starter pages or refresh theme-owned Letter Service/TM30 starter pages. Customer-edited pages are not overwritten unless they are still marked as theme starter pages.', 'easy-visa-myanmar') . '</p>';
  echo '<form method="post" action="' . esc_url(admin_url('admin-post.php')) . '">';
  wp_nonce_field('evm_refresh_starter_pages');
  echo '<input type="hidden" name="action" value="evm_refresh_starter_pages">';
  submit_button(__('Create / Refresh Starter Pages', 'easy-visa-myanmar'));
  echo '</form>';
  echo '<hr>';
  echo '<h2>' . esc_html__('Security layer status', 'easy-visa-myanmar') . '</h2>';
  echo '<ul style="list-style:disc;padding-left:22px;max-width:820px;">';
  echo '<li>' . esc_html__('Inquiry forms use nonce checks, honeypots, timed form tokens, flood limits and spam/link checks.', 'easy-visa-myanmar') . '</li>';
  echo '<li>' . esc_html__('Login attempts are rate-limited and login errors are generic.', 'easy-visa-myanmar') . '</li>';
  echo '<li>' . esc_html__('XML-RPC, author enumeration, comments and public REST user listing are restricted to reduce abuse.', 'easy-visa-myanmar') . '</li>';
  echo '<li>' . esc_html__('Theme security headers are enabled. For real DDoS protection, use Cloudflare, a hosting WAF, or another edge firewall in front of WordPress.', 'easy-visa-myanmar') . '</li>';
  echo '</ul>';
  echo '</div>';
}

function evm_handle_refresh_starter_pages() {
  if (!current_user_can('manage_options')) {
    wp_die(esc_html__('You do not have permission to do this.', 'easy-visa-myanmar'));
  }

  check_admin_referer('evm_refresh_starter_pages');
  evm_create_starter_pages();
  wp_safe_redirect(add_query_arg('evm_setup', 'done', admin_url('themes.php?page=evm-theme-setup')));
  exit;
}
add_action('admin_post_evm_refresh_starter_pages', 'evm_handle_refresh_starter_pages');

/* ===== End EVM V6 business tools ===== */


/* ===== EVM V13 security, privacy, speed helpers ===== */

function evm_add_security_headers() {
  if (!headers_sent()) {
    header('X-Content-Type-Options: nosniff');
    header('X-Frame-Options: SAMEORIGIN');
    header('Referrer-Policy: strict-origin-when-cross-origin');
    header('Permissions-Policy: geolocation=(), camera=(), microphone=(), payment=(), usb=(), accelerometer=(), gyroscope=()');
    header('X-Permitted-Cross-Domain-Policies: none');
    header('Cross-Origin-Resource-Policy: same-origin');
    header('Cross-Origin-Opener-Policy: same-origin-allow-popups');
    header_remove('X-Pingback');

    if (is_ssl()) {
      header('Strict-Transport-Security: max-age=31536000; includeSubDomains');
      header('Content-Security-Policy: upgrade-insecure-requests');
    }
  }
}
add_action('send_headers', 'evm_add_security_headers');

function evm_remove_sensitive_wp_headers($headers) {
  unset($headers['X-Pingback']);
  return $headers;
}
add_filter('wp_headers', 'evm_remove_sensitive_wp_headers');

remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
add_filter('the_generator', '__return_empty_string');
add_filter('xmlrpc_enabled', '__return_false');
add_filter('login_errors', function () {
  return __('Login failed. Please check your details and try again.', 'easy-visa-myanmar');
});

function evm_disable_comments_and_pings() {
  foreach (get_post_types() as $post_type) {
    if (post_type_supports($post_type, 'comments')) {
      remove_post_type_support($post_type, 'comments');
    }
    if (post_type_supports($post_type, 'trackbacks')) {
      remove_post_type_support($post_type, 'trackbacks');
    }
  }
}
add_action('init', 'evm_disable_comments_and_pings', 100);
add_filter('comments_open', '__return_false', 20, 2);
add_filter('pings_open', '__return_false', 20, 2);
add_filter('comments_array', '__return_empty_array', 10, 2);

function evm_stop_author_enumeration() {
  if (is_admin() || is_user_logged_in()) {
    return;
  }

  if (isset($_GET['author']) || is_author()) {
    wp_safe_redirect(home_url('/'), 301);
    exit;
  }
}
add_action('template_redirect', 'evm_stop_author_enumeration');

function evm_protect_rest_user_endpoints($result) {
  if (!empty($result) || is_user_logged_in()) {
    return $result;
  }

  $route = isset($_SERVER['REQUEST_URI']) ? sanitize_text_field(wp_unslash($_SERVER['REQUEST_URI'])) : '';
  if (preg_match('#/wp-json/wp/v2/users#i', $route)) {
    return new WP_Error('evm_rest_users_blocked', __('Public user listing is disabled.', 'easy-visa-myanmar'), array('status' => 403));
  }

  return $result;
}
add_filter('rest_authentication_errors', 'evm_protect_rest_user_endpoints');

function evm_login_throttle_key() {
  return evm_security_ip_key('login_fail');
}

function evm_login_block_key() {
  return evm_security_ip_key('login_block');
}

function evm_throttle_login_attempts($user, $username, $password) {
  if (empty($username) || empty($password)) {
    return $user;
  }

  if (get_transient(evm_login_block_key())) {
    return new WP_Error('evm_login_blocked', __('Too many failed login attempts. Please wait and try again later.', 'easy-visa-myanmar'));
  }

  return $user;
}
add_filter('authenticate', 'evm_throttle_login_attempts', 1, 3);

function evm_record_failed_login_attempt() {
  $key = evm_login_throttle_key();
  $count = absint(get_transient($key));
  $count++;
  set_transient($key, $count, 20 * MINUTE_IN_SECONDS);

  if ($count >= 6) {
    set_transient(evm_login_block_key(), '1', 30 * MINUTE_IN_SECONDS);
  }
}
add_action('wp_login_failed', 'evm_record_failed_login_attempt');

function evm_clear_login_throttle() {
  delete_transient(evm_login_throttle_key());
  delete_transient(evm_login_block_key());
}
add_action('wp_login', 'evm_clear_login_throttle');

function evm_secure_upload_mimes($mimes) {
  unset($mimes['exe'], $mimes['scr'], $mimes['php'], $mimes['phtml'], $mimes['js']);
  return $mimes;
}
add_filter('upload_mimes', 'evm_secure_upload_mimes');

function evm_schedule_inquiry_cleanup() {
  if (!wp_next_scheduled('evm_daily_cleanup_inquiries')) {
    wp_schedule_event(time() + HOUR_IN_SECONDS, 'daily', 'evm_daily_cleanup_inquiries');
  }
}
add_action('after_switch_theme', 'evm_schedule_inquiry_cleanup');

function evm_cleanup_old_inquiries() {
  $old = new WP_Query(array(
    'post_type'      => 'evm_inquiry',
    'post_status'    => 'private',
    'posts_per_page' => 50,
    'date_query'     => array(
      array(
        'before' => '90 days ago',
      ),
    ),
    'fields' => 'ids',
  ));

  foreach ($old->posts as $post_id) {
    wp_delete_post($post_id, true);
  }
}
add_action('evm_daily_cleanup_inquiries', 'evm_cleanup_old_inquiries');

function evm_add_logo_preload() {
  if (file_exists(get_theme_file_path('/assets/images/logo.png'))) {
    echo '<link rel="preload" as="image" href="' . esc_url(get_theme_file_uri('/assets/images/logo.png')) . '">' . "\n";
  }
}
add_action('wp_head', 'evm_add_logo_preload', 1);

function evm_add_theme_resource_hints($urls, $relation_type) {
  if ('preconnect' === $relation_type) {
    $urls[] = array(
      'href' => 'https://fonts.gstatic.com',
      'crossorigin' => 'anonymous',
    );
  }

  return $urls;
}
add_filter('wp_resource_hints', 'evm_add_theme_resource_hints', 10, 2);

/* ===== End EVM V13 security, privacy, speed helpers ===== */


/* ===== EVM V16 CMS popup message manager ===== */

function evm_popup_defaults() {
  return array(
    'live'       => '0',
    'frequency'  => 'daily',
    'delay'      => '1200',
    'cta_text'   => '',
    'cta_url'    => '',
    'small_label'=> 'Travel Notice',
  );
}

function evm_popup_meta_box() {
  add_meta_box(
    'evm_popup_settings',
    __('Popup Settings', 'easy-visa-myanmar'),
    'evm_render_popup_meta_box',
    'evm_popup',
    'side',
    'high'
  );

  add_meta_box(
    'evm_popup_preview_help',
    __('Preview & Live Control', 'easy-visa-myanmar'),
    'evm_render_popup_preview_box',
    'evm_popup',
    'normal',
    'high'
  );
}
add_action('add_meta_boxes', 'evm_popup_meta_box');

function evm_render_popup_meta_box($post) {
  wp_nonce_field('evm_save_popup_meta', 'evm_popup_nonce');
  $defaults = evm_popup_defaults();

  $live       = get_post_meta($post->ID, '_evm_popup_live', true) ?: $defaults['live'];
  $frequency  = get_post_meta($post->ID, '_evm_popup_frequency', true) ?: $defaults['frequency'];
  $delay      = get_post_meta($post->ID, '_evm_popup_delay', true) ?: $defaults['delay'];
  $cta_text   = get_post_meta($post->ID, '_evm_popup_cta_text', true) ?: $defaults['cta_text'];
  $cta_url    = get_post_meta($post->ID, '_evm_popup_cta_url', true) ?: $defaults['cta_url'];
  $small_label= get_post_meta($post->ID, '_evm_popup_small_label', true) ?: $defaults['small_label'];
  ?>
  <p>
    <label>
      <input type="checkbox" name="evm_popup_live" value="1" <?php checked($live, '1'); ?>>
      <strong><?php esc_html_e('Make this popup Live', 'easy-visa-myanmar'); ?></strong>
    </label>
  </p>

  <p>
    <label for="evm_popup_frequency"><strong><?php esc_html_e('Show Frequency', 'easy-visa-myanmar'); ?></strong></label>
    <select id="evm_popup_frequency" name="evm_popup_frequency" style="width:100%;">
      <option value="once" <?php selected($frequency, 'once'); ?>><?php esc_html_e('Once per visitor', 'easy-visa-myanmar'); ?></option>
      <option value="daily" <?php selected($frequency, 'daily'); ?>><?php esc_html_e('Once per day', 'easy-visa-myanmar'); ?></option>
      <option value="session" <?php selected($frequency, 'session'); ?>><?php esc_html_e('Once per session', 'easy-visa-myanmar'); ?></option>
      <option value="always" <?php selected($frequency, 'always'); ?>><?php esc_html_e('Every visit', 'easy-visa-myanmar'); ?></option>
    </select>
  </p>

  <p>
    <label for="evm_popup_delay"><strong><?php esc_html_e('Delay before showing', 'easy-visa-myanmar'); ?></strong></label>
    <input id="evm_popup_delay" type="number" name="evm_popup_delay" min="0" step="100" value="<?php echo esc_attr($delay); ?>" style="width:100%;">
    <small><?php esc_html_e('Milliseconds. Example: 1200 = 1.2 seconds.', 'easy-visa-myanmar'); ?></small>
  </p>

  <p>
    <label for="evm_popup_small_label"><strong><?php esc_html_e('Small label', 'easy-visa-myanmar'); ?></strong></label>
    <input id="evm_popup_small_label" type="text" name="evm_popup_small_label" value="<?php echo esc_attr($small_label); ?>" style="width:100%;" placeholder="Travel Notice">
  </p>

  <p>
    <label for="evm_popup_cta_text"><strong><?php esc_html_e('Button Text', 'easy-visa-myanmar'); ?></strong></label>
    <input id="evm_popup_cta_text" type="text" name="evm_popup_cta_text" value="<?php echo esc_attr($cta_text); ?>" style="width:100%;" placeholder="Contact Us">
  </p>

  <p>
    <label for="evm_popup_cta_url"><strong><?php esc_html_e('Button URL', 'easy-visa-myanmar'); ?></strong></label>
    <input id="evm_popup_cta_url" type="url" name="evm_popup_cta_url" value="<?php echo esc_url($cta_url); ?>" style="width:100%;" placeholder="https://...">
  </p>

  <p><small><?php esc_html_e('Use Featured Image for the popup image. Use the editor for the message text.', 'easy-visa-myanmar'); ?></small></p>
  <?php
}

function evm_render_popup_preview_box($post) {
  $preview_url = add_query_arg(
    array(
      'evm_popup_preview' => $post->ID,
      'evm_popup_nonce'   => wp_create_nonce('evm_popup_preview_' . $post->ID),
    ),
    home_url('/')
  );
  ?>
  <p><?php esc_html_e('How to use:', 'easy-visa-myanmar'); ?></p>
  <ol>
    <li><?php esc_html_e('Add a title, message and optional featured image.', 'easy-visa-myanmar'); ?></li>
    <li><?php esc_html_e('Click Update/Publish to save changes.', 'easy-visa-myanmar'); ?></li>
    <li><?php esc_html_e('Open Preview to see it on the homepage.', 'easy-visa-myanmar'); ?></li>
    <li><?php esc_html_e('Enable Make this popup Live when ready.', 'easy-visa-myanmar'); ?></li>
  </ol>
  <p>
    <a class="button button-primary" href="<?php echo esc_url($preview_url); ?>" target="_blank" rel="noopener noreferrer">
      <?php esc_html_e('Preview Popup on Homepage', 'easy-visa-myanmar'); ?>
    </a>
  </p>
  <p><strong><?php esc_html_e('Support email:', 'easy-visa-myanmar'); ?></strong> <?php echo esc_html(evm_get_support_email()); ?></p>
  <?php
}

function evm_save_popup_meta($post_id) {
  if (!isset($_POST['evm_popup_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['evm_popup_nonce'])), 'evm_save_popup_meta')) {
    return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  $live = isset($_POST['evm_popup_live']) ? '1' : '0';
  update_post_meta($post_id, '_evm_popup_live', $live);

  $frequency = isset($_POST['evm_popup_frequency']) ? sanitize_key(wp_unslash($_POST['evm_popup_frequency'])) : 'daily';
  if (!in_array($frequency, array('once', 'daily', 'session', 'always'), true)) {
    $frequency = 'daily';
  }

  $delay = isset($_POST['evm_popup_delay']) ? absint($_POST['evm_popup_delay']) : 1200;
  if ($delay > 10000) {
    $delay = 10000;
  }

  update_post_meta($post_id, '_evm_popup_frequency', $frequency);
  update_post_meta($post_id, '_evm_popup_delay', (string) $delay);
  update_post_meta($post_id, '_evm_popup_small_label', isset($_POST['evm_popup_small_label']) ? sanitize_text_field(wp_unslash($_POST['evm_popup_small_label'])) : 'Travel Notice');
  update_post_meta($post_id, '_evm_popup_cta_text', isset($_POST['evm_popup_cta_text']) ? sanitize_text_field(wp_unslash($_POST['evm_popup_cta_text'])) : '');
  update_post_meta($post_id, '_evm_popup_cta_url', isset($_POST['evm_popup_cta_url']) ? esc_url_raw(wp_unslash($_POST['evm_popup_cta_url'])) : '');
}
add_action('save_post_evm_popup', 'evm_save_popup_meta');

function evm_popup_columns($columns) {
  return array(
    'cb'        => $columns['cb'],
    'title'     => __('Popup', 'easy-visa-myanmar'),
    'live'      => __('Live', 'easy-visa-myanmar'),
    'frequency' => __('Frequency', 'easy-visa-myanmar'),
    'shortcode' => __('Preview', 'easy-visa-myanmar'),
    'date'      => __('Date', 'easy-visa-myanmar'),
  );
}
add_filter('manage_evm_popup_posts_columns', 'evm_popup_columns');

function evm_popup_column_content($column, $post_id) {
  if ($column === 'live') {
    echo get_post_meta($post_id, '_evm_popup_live', true) === '1' ? esc_html__('Live', 'easy-visa-myanmar') : esc_html__('Draft/Off', 'easy-visa-myanmar');
  }

  if ($column === 'frequency') {
    echo esc_html(get_post_meta($post_id, '_evm_popup_frequency', true) ?: 'daily');
  }

  if ($column === 'shortcode') {
    $preview_url = add_query_arg(
      array(
        'evm_popup_preview' => $post_id,
        'evm_popup_nonce'   => wp_create_nonce('evm_popup_preview_' . $post_id),
      ),
      home_url('/')
    );
    echo '<a href="' . esc_url($preview_url) . '" target="_blank" rel="noopener noreferrer">' . esc_html__('Preview', 'easy-visa-myanmar') . '</a>';
  }
}
add_action('manage_evm_popup_posts_custom_column', 'evm_popup_column_content', 10, 2);

function evm_get_active_popup() {
  $preview_id = isset($_GET['evm_popup_preview']) ? absint($_GET['evm_popup_preview']) : 0;

  if ($preview_id && current_user_can('edit_post', $preview_id)) {
    $nonce = isset($_GET['evm_popup_nonce']) ? sanitize_text_field(wp_unslash($_GET['evm_popup_nonce'])) : '';
    if (wp_verify_nonce($nonce, 'evm_popup_preview_' . $preview_id)) {
      return get_post($preview_id);
    }
  }

  $popups = get_posts(array(
    'post_type'      => 'evm_popup',
    'post_status'    => array('publish', 'private'),
    'posts_per_page' => 1,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'meta_query'     => array(
      array(
        'key'   => '_evm_popup_live',
        'value' => '1',
      ),
    ),
  ));

  return !empty($popups) ? $popups[0] : null;
}

function evm_render_popup_message() {
  if (is_admin()) {
    return;
  }

  $popup = evm_get_active_popup();

  if (!$popup) {
    return;
  }

  $frequency   = get_post_meta($popup->ID, '_evm_popup_frequency', true) ?: 'daily';
  $delay       = get_post_meta($popup->ID, '_evm_popup_delay', true) ?: '1200';
  $cta_text    = get_post_meta($popup->ID, '_evm_popup_cta_text', true);
  $cta_url     = get_post_meta($popup->ID, '_evm_popup_cta_url', true);
  $small_label = get_post_meta($popup->ID, '_evm_popup_small_label', true) ?: __('Travel Notice', 'easy-visa-myanmar');
  $image       = get_the_post_thumbnail_url($popup->ID, 'large');
  $preview     = isset($_GET['evm_popup_preview']) ? '1' : '0';
  ?>
  <div class="evm-popup" data-popup-id="<?php echo esc_attr($popup->ID); ?>" data-frequency="<?php echo esc_attr($frequency); ?>" data-delay="<?php echo esc_attr($delay); ?>" data-preview="<?php echo esc_attr($preview); ?>" hidden>
    <div class="evm-popup-backdrop" data-popup-close></div>
    <section class="evm-popup-card" role="dialog" aria-modal="true" aria-labelledby="evm-popup-title-<?php echo esc_attr($popup->ID); ?>">
      <button class="evm-popup-close" type="button" aria-label="<?php esc_attr_e('Close popup', 'easy-visa-myanmar'); ?>" data-popup-close>×</button>

      <?php if ($image) : ?>
        <div class="evm-popup-image">
          <img src="<?php echo esc_url($image); ?>" alt="<?php echo esc_attr(get_the_title($popup)); ?>" loading="lazy" decoding="async">
        </div>
      <?php endif; ?>

      <div class="evm-popup-content">
        <span class="evm-popup-label"><?php echo esc_html($small_label); ?></span>
        <h2 id="evm-popup-title-<?php echo esc_attr($popup->ID); ?>"><?php echo esc_html(get_the_title($popup)); ?></h2>
        <div class="evm-popup-text">
          <?php echo wp_kses_post(wpautop($popup->post_content)); ?>
        </div>

        <?php if (!empty($cta_text) && !empty($cta_url)) : ?>
          <a class="evm-popup-cta" href="<?php echo esc_url($cta_url); ?>">
            <?php echo esc_html($cta_text); ?>
          </a>
        <?php endif; ?>

        <small><?php esc_html_e('You can close this message anytime.', 'easy-visa-myanmar'); ?></small>
      </div>
    </section>
  </div>
  <?php
}
add_action('wp_footer', 'evm_render_popup_message', 20);

/* ===== End EVM V16 CMS popup message manager ===== */




function evm_create_default_popup_message() {
  $existing = get_posts(array(
    'post_type'      => 'evm_popup',
    'post_status'    => array('publish', 'draft', 'private'),
    'posts_per_page' => 1,
    'fields'         => 'ids',
  ));

  if (!empty($existing)) {
    return;
  }

  $popup_id = wp_insert_post(array(
    'post_type'    => 'evm_popup',
    'post_status'  => 'publish',
    'post_title'   => 'Welcome to Easy Visa For Myanmar',
    'post_content' => 'Need help with visa, flight, hotel or Easy Pass service? Send your basic travel details and continue with our team through Facebook or LINE.',
    'post_excerpt' => 'Travel support message',
  ));

  if (!is_wp_error($popup_id) && $popup_id) {
    update_post_meta($popup_id, '_evm_popup_live', '0');
    update_post_meta($popup_id, '_evm_popup_frequency', 'daily');
    update_post_meta($popup_id, '_evm_popup_delay', '1200');
    update_post_meta($popup_id, '_evm_popup_small_label', 'Travel Support');
    update_post_meta($popup_id, '_evm_popup_cta_text', 'Contact Us');
    update_post_meta($popup_id, '_evm_popup_cta_url', 'https://www.facebook.com/easyvisaformyanmar');
  }
}
add_action('after_switch_theme', 'evm_create_default_popup_message');


/* ===== EVM V25 CMS hero slides ===== */
function evm_get_hero_slides() {
  $custom_slides = get_posts(array(
    'post_type'      => 'evm_hero_slide',
    'post_status'    => 'publish',
    'posts_per_page' => 6,
    'orderby'        => array(
      'menu_order' => 'ASC',
      'date'       => 'DESC',
    ),
  ));

  $slides = array();

  foreach ($custom_slides as $slide) {
    $image = get_the_post_thumbnail_url($slide->ID, 'large');

    if (!$image) {
      continue;
    }

    $label = trim(get_the_excerpt($slide));
    if ($label === '') {
      $label = __('Travel Inspiration', 'easy-visa-myanmar');
    }

    $text = wp_strip_all_tags($slide->post_content);
    if ($text === '') {
      $text = get_the_title($slide);
    }

    $slides[] = array(
      'image' => $image,
      'label' => $label,
      'title' => get_the_title($slide),
      'text'  => $text,
    );
  }

  if (!empty($slides)) {
    return $slides;
  }

  return array(
    array(
      'image' => get_theme_file_uri('/assets/images/hero-slide-1.jpg'),
      'label' => __('Bagan', 'easy-visa-myanmar'),
      'title' => __('Golden mornings and unforgettable views', 'easy-visa-myanmar'),
      'text'  => __('Every journey begins with a beautiful view and a clear plan.', 'easy-visa-myanmar'),
    ),
    array(
      'image' => get_theme_file_uri('/assets/images/hero-slide-2.jpg'),
      'label' => __('Inle Lake', 'easy-visa-myanmar'),
      'title' => __('Peaceful water, local culture and calm travel moments', 'easy-visa-myanmar'),
      'text'  => __('Travel slowly, enjoy the water, and let every stop tell a story.', 'easy-visa-myanmar'),
    ),
    array(
      'image' => get_theme_file_uri('/assets/images/hero-slide-3.jpg'),
      'label' => __('Coastal Escape', 'easy-visa-myanmar'),
      'title' => __('Beautiful landscapes, fresh air and relaxing travel inspiration', 'easy-visa-myanmar'),
      'text'  => __('Beautiful landscapes make every holiday feel lighter and more memorable.', 'easy-visa-myanmar'),
    ),
  );
}

function evm_create_default_hero_slide_note() {
  if (get_option('evm_default_hero_slide_note_created')) {
    return;
  }

  update_option('evm_default_hero_slide_note_created', '1');
}
add_action('after_switch_theme', 'evm_create_default_hero_slide_note');
/* ===== End EVM V25 CMS hero slides ===== */




/* ===== EVM V49 FAQ, destinations, testimonials CMS ===== */
function evm_register_v49_post_types() {
  register_post_type('evm_faq', array(
    'labels' => array(
      'name'          => __('FAQs', 'easy-visa-myanmar'),
      'singular_name' => __('FAQ', 'easy-visa-myanmar'),
      'add_new_item'  => __('Add New FAQ', 'easy-visa-myanmar'),
      'edit_item'     => __('Edit FAQ', 'easy-visa-myanmar'),
    ),
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_icon'           => 'dashicons-editor-help',
    'supports'            => array('title', 'editor', 'page-attributes'),
    'exclude_from_search' => true,
    'show_in_rest'        => true,
  ));

  register_post_type('evm_testimonial', array(
    'labels' => array(
      'name'          => __('Customer Reviews', 'easy-visa-myanmar'),
      'singular_name' => __('Customer Review', 'easy-visa-myanmar'),
      'add_new_item'  => __('Add New Review', 'easy-visa-myanmar'),
      'edit_item'     => __('Edit Review', 'easy-visa-myanmar'),
    ),
    'public'              => false,
    'show_ui'             => true,
    'show_in_menu'        => true,
    'menu_icon'           => 'dashicons-star-filled',
    'supports'            => array('title', 'editor', 'page-attributes'),
    'exclude_from_search' => true,
    'show_in_rest'        => true,
  ));
}
add_action('init', 'evm_register_v49_post_types', 6);

function evm_v49_meta_boxes() {
  add_meta_box('evm_faq_settings', __('FAQ Settings', 'easy-visa-myanmar'), 'evm_render_faq_settings_meta_box', 'evm_faq', 'side', 'default');
  add_meta_box('evm_destination_settings', __('Destination Settings', 'easy-visa-myanmar'), 'evm_render_destination_settings_meta_box', 'evm_destination', 'side', 'default');
  add_meta_box('evm_testimonial_settings', __('Review Settings', 'easy-visa-myanmar'), 'evm_render_testimonial_settings_meta_box', 'evm_testimonial', 'side', 'default');
}
add_action('add_meta_boxes', 'evm_v49_meta_boxes');

function evm_render_faq_settings_meta_box($post) {
  wp_nonce_field('evm_v49_save_meta', 'evm_v49_meta_nonce');
  $service = get_post_meta($post->ID, '_evm_faq_service', true);
  $services = array(
    'general' => __('General', 'easy-visa-myanmar'),
    'flight' => __('Flight Ticket', 'easy-visa-myanmar'),
    'hotel' => __('Hotel Rent', 'easy-visa-myanmar'),
    'easy-pass' => __('Easy Pass', 'easy-visa-myanmar'),
    'easy-extension' => __('Easy Extension', 'easy-visa-myanmar'),
    'letter-service' => __('Letter Service', 'easy-visa-myanmar'),
    'tm30-service' => __('TM30 Service', 'easy-visa-myanmar'),
    'safety' => __('Safety', 'easy-visa-myanmar'),
  );

  echo '<p><label for="evm_faq_service"><strong>' . esc_html__('FAQ Group', 'easy-visa-myanmar') . '</strong></label></p>';
  echo '<select id="evm_faq_service" name="evm_faq_service" style="width:100%;">';
  foreach ($services as $value => $label) {
    echo '<option value="' . esc_attr($value) . '"' . selected($service, $value, false) . '>' . esc_html($label) . '</option>';
  }
  echo '</select>';
  echo '<p class="description">' . esc_html__('Title = question. Editor = answer.', 'easy-visa-myanmar') . '</p>';
}

function evm_render_destination_settings_meta_box($post) {
  wp_nonce_field('evm_v49_save_meta', 'evm_v49_meta_nonce');
  $badge = get_post_meta($post->ID, '_evm_destination_badge', true);
  $services = get_post_meta($post->ID, '_evm_destination_services', true);
  $cta = get_post_meta($post->ID, '_evm_destination_cta', true);

  echo '<p><label><strong>' . esc_html__('Badge / Region', 'easy-visa-myanmar') . '</strong></label></p>';
  echo '<input type="text" name="evm_destination_badge" value="' . esc_attr($badge) . '" style="width:100%;" placeholder="Popular">';
  echo '<p><label><strong>' . esc_html__('Service Notes', 'easy-visa-myanmar') . '</strong></label></p>';
  echo '<textarea name="evm_destination_services" rows="4" style="width:100%;" placeholder="Visa support, flight, hotel...">' . esc_textarea($services) . '</textarea>';
  echo '<p><label><strong>' . esc_html__('CTA URL', 'easy-visa-myanmar') . '</strong></label></p>';
  echo '<input type="text" name="evm_destination_cta" value="' . esc_attr($cta) . '" style="width:100%;" placeholder="/#booking">';
}

function evm_render_testimonial_settings_meta_box($post) {
  wp_nonce_field('evm_v49_save_meta', 'evm_v49_meta_nonce');
  $customer = get_post_meta($post->ID, '_evm_testimonial_customer', true);
  $location = get_post_meta($post->ID, '_evm_testimonial_location', true);
  $rating = get_post_meta($post->ID, '_evm_testimonial_rating', true);
  $live = get_post_meta($post->ID, '_evm_testimonial_live', true);

  echo '<p><label><strong>' . esc_html__('Customer Name / Initial', 'easy-visa-myanmar') . '</strong></label></p>';
  echo '<input type="text" name="evm_testimonial_customer" value="' . esc_attr($customer) . '" style="width:100%;" placeholder="Customer">';
  echo '<p><label><strong>' . esc_html__('Location / Service', 'easy-visa-myanmar') . '</strong></label></p>';
  echo '<input type="text" name="evm_testimonial_location" value="' . esc_attr($location) . '" style="width:100%;" placeholder="Thailand service">';
  echo '<p><label><strong>' . esc_html__('Rating', 'easy-visa-myanmar') . '</strong></label></p>';
  echo '<select name="evm_testimonial_rating" style="width:100%;">';
  for ($i = 5; $i >= 1; $i--) {
    echo '<option value="' . esc_attr($i) . '"' . selected((string) $rating, (string) $i, false) . '>' . esc_html($i) . ' / 5</option>';
  }
  echo '</select>';
  echo '<p><label><input type="checkbox" name="evm_testimonial_live" value="1"' . checked($live, '1', false) . '> ' . esc_html__('Show on homepage', 'easy-visa-myanmar') . '</label></p>';
  echo '<p class="description">' . esc_html__('Title = short headline. Editor = review text.', 'easy-visa-myanmar') . '</p>';
}

function evm_save_v49_meta($post_id) {
  if (!isset($_POST['evm_v49_meta_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['evm_v49_meta_nonce'])), 'evm_v49_save_meta')) {
    return;
  }

  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
    return;
  }

  if (!current_user_can('edit_post', $post_id)) {
    return;
  }

  $post_type = get_post_type($post_id);

  if ($post_type === 'evm_faq') {
    $service = isset($_POST['evm_faq_service']) ? sanitize_key(wp_unslash($_POST['evm_faq_service'])) : 'general';
    update_post_meta($post_id, '_evm_faq_service', $service);
  }

  if ($post_type === 'evm_destination') {
    update_post_meta($post_id, '_evm_destination_badge', isset($_POST['evm_destination_badge']) ? sanitize_text_field(wp_unslash($_POST['evm_destination_badge'])) : '');
    update_post_meta($post_id, '_evm_destination_services', isset($_POST['evm_destination_services']) ? sanitize_textarea_field(wp_unslash($_POST['evm_destination_services'])) : '');
    update_post_meta($post_id, '_evm_destination_cta', isset($_POST['evm_destination_cta']) ? esc_url_raw(wp_unslash($_POST['evm_destination_cta'])) : '');
  }

  if ($post_type === 'evm_testimonial') {
    update_post_meta($post_id, '_evm_testimonial_customer', isset($_POST['evm_testimonial_customer']) ? sanitize_text_field(wp_unslash($_POST['evm_testimonial_customer'])) : '');
    update_post_meta($post_id, '_evm_testimonial_location', isset($_POST['evm_testimonial_location']) ? sanitize_text_field(wp_unslash($_POST['evm_testimonial_location'])) : '');
    update_post_meta($post_id, '_evm_testimonial_rating', isset($_POST['evm_testimonial_rating']) ? absint($_POST['evm_testimonial_rating']) : 5);
    update_post_meta($post_id, '_evm_testimonial_live', isset($_POST['evm_testimonial_live']) ? '1' : '');
  }
}
add_action('save_post', 'evm_save_v49_meta');

function evm_fallback_faqs($service = 'general') {
  $faqs = array(
    'flight' => array(
      array('Can I request one-way flight?', 'Yes. Return date is optional in the flight request form.'),
      array('What happens after submit?', 'Admin receives your flight request by email and can see it in CMS Inquiries.'),
      array('Can admin help if I am not sure about date?', 'Yes. Submit the route and contact information first. Admin will confirm the travel date with you.'),
    ),
    'hotel' => array(
      array('Can I request apartment or guesthouse?', 'Yes. Submit hotel request and admin will contact you for exact stay type.'),
      array('Can I ask for budget or location preference?', 'Yes. Add your preference in notes or tell admin after submitting the request.'),
      array('Do you guarantee hotel availability?', 'No. Availability and prices depend on the hotel or property provider.'),
    ),
    'easy-pass' => array(
      array('Which airports are supported?', 'DMK, BKK and CNX are supported.'),
      array('Can I add urgent arrival notes?', 'Yes. Write arrival time, urgent note or family member details in Special Request.'),
      array('Does Easy Pass guarantee immigration approval?', 'No. Immigration and visa decisions are made by the relevant authorities.'),
    ),
    'easy-extension' => array(
      array('When should I choose e Extension?', 'Choose e Extension when you can book 10 to 15 days before visa expiry.'),
      array('When should I choose Walk In VIP?', 'Choose Walk In VIP for urgent cases or admin consultation.'),
      array('Which current visa types are supported?', 'Easy Extension currently supports Arrival Visa and TR Visa extension requests.'),
    ),
    'letter-service' => array(
      array('Who can use Letter Service?', 'Letter Service is currently set for Myanmar nationality only.'),
      array('Which letter types can I request?', 'Visa Extension, Bank Recommendation Letter, Driving License Recommendation Letter, and Motorcycle / Car Buying Letter.'),
      array('What happens after I submit?', 'Admin receives your letter request and contacts you through your selected contact method.'),
    ),
    'tm30-service' => array(
      array('Which regions are supported for TM30?', 'Bangkok, Chiang Mai and Mae Sot are supported.'),
      array('How can I receive the completed file?', 'You can choose LINE, Facebook, Email, Message, Telegram or WhatsApp.'),
      array('Do I upload passport in the form?', 'No. The TM30 website form collects only basic request details. Our team will contact you through your selected method if more information is needed.'),
    ),
    'general' => array(
      array('Who can use Easy Visa For Myanmar?', 'All customers can request worldwide visa and travel support.'),
      array('Which destinations are common?', 'Thailand, Singapore, Vietnam, Laos, Malaysia and other countries.'),
      array('Is approval guaranteed?', 'No. We provide support and request coordination only.'),
    ),
    'safety' => array(
      array('Should I upload passport photos?', 'Do not send passport photos, ID cards, bank details or sensitive documents through website forms.'),
      array('How will admin contact me?', 'We reply through the contact method you selected in the form.'),
    ),
  );

  return isset($faqs[$service]) ? $faqs[$service] : $faqs['general'];
}

function evm_get_faq_items($service = 'general', $limit = 6) {
  $items = array();
  $posts = get_posts(array(
    'post_type'      => 'evm_faq',
    'post_status'    => 'publish',
    'posts_per_page' => $limit,
    'meta_key'       => '_evm_faq_service',
    'meta_value'     => $service,
    'orderby'        => array('menu_order' => 'ASC', 'date' => 'DESC'),
  ));

  foreach ($posts as $post) {
    $items[] = array(
      'question' => get_the_title($post),
      'answer'   => wp_strip_all_tags(apply_filters('the_content', $post->post_content)),
    );
  }

  if (empty($items)) {
    foreach (evm_fallback_faqs($service) as $faq) {
      $items[] = array('question' => $faq[0], 'answer' => $faq[1]);
    }
  }

  return $items;
}

function evm_render_faq_details($service = 'general') {
  $items = evm_get_faq_items($service, 9);
  $out = '';

  foreach ($items as $index => $item) {
    $out .= '<details' . ($index === 0 ? ' open' : '') . '>';
    $out .= '<summary>' . esc_html($item['question']) . '</summary>';
    $out .= '<p>' . esc_html($item['answer']) . '</p>';
    $out .= '</details>';
  }

  return $out;
}

function evm_render_booking_faq_panel($service, $label, $heading, $active = false) {
  ?>
  <article class="booking-faq-panel <?php echo $active ? 'active' : ''; ?>" data-booking-faq="<?php echo esc_attr($service); ?>">
    <div class="booking-faq-head">
      <span><?php echo esc_html($label); ?></span>
      <h3><?php echo esc_html($heading); ?></h3>
    </div>
    <div class="booking-faq-grid">
      <?php echo evm_render_faq_details($service); ?>
    </div>
  </article>
  <?php
}

function evm_faq_shortcode() {
  $groups = array(
    'general' => __('General FAQ', 'easy-visa-myanmar'),
    'flight' => __('Flight Ticket FAQ', 'easy-visa-myanmar'),
    'hotel' => __('Hotel Rent FAQ', 'easy-visa-myanmar'),
    'easy-pass' => __('Easy Pass FAQ', 'easy-visa-myanmar'),
    'easy-extension' => __('Easy Extension FAQ', 'easy-visa-myanmar'),
    'letter-service' => __('Letter Service FAQ', 'easy-visa-myanmar'),
    'tm30-service' => __('TM30 Service FAQ', 'easy-visa-myanmar'),
    'safety' => __('Safety FAQ', 'easy-visa-myanmar'),
  );

  ob_start();
  echo '<div class="evm-page-shell evm-faq-page evm-cms-faq-page">';
  foreach ($groups as $service => $title) {
    echo '<section class="evm-faq-section">';
    echo '<h2>' . esc_html($title) . '</h2>';
    echo '<div class="evm-faq-grid">' . evm_render_faq_details($service) . '</div>';
    echo '</section>';
  }
  echo '</div>';

  return ob_get_clean();
}
add_shortcode('evm_faq', 'evm_faq_shortcode');

function evm_service_faq_shortcode($atts) {
  $atts = shortcode_atts(array(
    'group'    => 'general',
    'title'    => __('Service FAQ', 'easy-visa-myanmar'),
    'subtitle' => '',
  ), $atts, 'evm_service_faq');

  $group = sanitize_key($atts['group']);
  if (!$group) {
    $group = 'general';
  }

  ob_start();
  echo '<section class="evm-faq-section evm-service-faq-section">';
  echo '<h2>' . esc_html($atts['title']) . '</h2>';
  if (!empty($atts['subtitle'])) {
    echo '<p>' . esc_html($atts['subtitle']) . '</p>';
  }
  echo '<div class="evm-faq-grid">' . evm_render_faq_details($group) . '</div>';
  echo '</section>';
  return ob_get_clean();
}
add_shortcode('evm_service_faq', 'evm_service_faq_shortcode');

function evm_get_destination_items($limit = 12) {
  $items = array();
  $posts = get_posts(array(
    'post_type'      => 'evm_destination',
    'post_status'    => 'publish',
    'posts_per_page' => $limit,
    'orderby'        => array('menu_order' => 'ASC', 'date' => 'DESC'),
  ));

  foreach ($posts as $post) {
    $items[] = array(
      'title' => get_the_title($post),
      'badge' => get_post_meta($post->ID, '_evm_destination_badge', true),
      'text' => has_excerpt($post) ? get_the_excerpt($post) : wp_trim_words(wp_strip_all_tags($post->post_content), 24),
      'services' => get_post_meta($post->ID, '_evm_destination_services', true),
      'url' => get_post_meta($post->ID, '_evm_destination_cta', true) ?: home_url('/#booking'),
    );
  }

  if (empty($items)) {
    $fallback = array(
      array('Thailand', 'Main destination', 'Easy Pass, Easy Extension, Letter Service, TM30, flight, hotel and travel support.', 'Easy Pass · Easy Extension · Letter · TM30 · Flight · Hotel'),
      array('Singapore', 'Popular', 'Flight, hotel and travel support requests for Singapore trips.', 'Flight · Hotel · Travel support'),
      array('Vietnam', 'Popular', 'Travel request support for Vietnam routes and stay planning.', 'Flight · Hotel · Travel support'),
      array('Laos', 'Nearby', 'Travel support requests for Laos trips and route planning.', 'Flight · Hotel · Travel support'),
      array('Malaysia', 'Popular', 'Travel support requests for Malaysia trips.', 'Flight · Hotel · Travel support'),
      array('Other countries', 'Worldwide', 'Contact admin for other international visa and travel support requests.', 'Visa · Flight · Hotel · Support'),
    );

    foreach ($fallback as $row) {
      $items[] = array(
        'title' => $row[0],
        'badge' => $row[1],
        'text' => $row[2],
        'services' => $row[3],
        'url' => home_url('/#booking'),
      );
    }
  }

  return $items;
}

function evm_destinations_shortcode() {
  $items = evm_get_destination_items();
  ob_start();
  ?>
  <div class="evm-page-shell evm-destinations-page evm-cms-destinations">
    <section class="evm-page-panel evm-page-intro">
      <span class="section-kicker"><?php esc_html_e('Destinations', 'easy-visa-myanmar'); ?></span>
      <h2><?php esc_html_e('Worldwide visa and travel support', 'easy-visa-myanmar'); ?></h2>
      <p><?php esc_html_e('Add and edit destination cards from WordPress Admin → Destinations.', 'easy-visa-myanmar'); ?></p>
    </section>
    <section class="evm-page-grid evm-page-grid-3">
      <?php foreach ($items as $item) : ?>
        <article class="evm-page-card evm-destination-card">
          <?php if (!empty($item['badge'])) : ?><span class="evm-destination-badge"><?php echo esc_html($item['badge']); ?></span><?php endif; ?>
          <h3><?php echo esc_html($item['title']); ?></h3>
          <p><?php echo esc_html($item['text']); ?></p>
          <?php if (!empty($item['services'])) : ?><small><?php echo esc_html($item['services']); ?></small><?php endif; ?>
          <a href="<?php echo esc_url($item['url']); ?>"><?php esc_html_e('Start request', 'easy-visa-myanmar'); ?></a>
        </article>
      <?php endforeach; ?>
    </section>
  </div>
  <?php
  return ob_get_clean();
}
add_shortcode('evm_destinations', 'evm_destinations_shortcode');

function evm_get_testimonial_items($limit = 6) {
  $items = array();
  $posts = get_posts(array(
    'post_type'      => 'evm_testimonial',
    'post_status'    => 'publish',
    'posts_per_page' => $limit,
    'meta_query'     => array(
      array(
        'key' => '_evm_testimonial_live',
        'value' => '1',
      ),
    ),
    'orderby' => array('menu_order' => 'ASC', 'date' => 'DESC'),
  ));

  foreach ($posts as $post) {
    $items[] = array(
      'title' => get_the_title($post),
      'text' => wp_trim_words(wp_strip_all_tags($post->post_content), 34),
      'customer' => get_post_meta($post->ID, '_evm_testimonial_customer', true) ?: __('Customer', 'easy-visa-myanmar'),
      'location' => get_post_meta($post->ID, '_evm_testimonial_location', true),
      'rating' => max(1, min(5, absint(get_post_meta($post->ID, '_evm_testimonial_rating', true) ?: 5))),
    );
  }

  return $items;
}

function evm_has_public_testimonials() {
  return !empty(evm_get_testimonial_items(1));
}

function evm_testimonials_shortcode() {
  $items = evm_get_testimonial_items();
  if (empty($items)) {
    return '';
  }

  ob_start();
  ?>
  <div class="evm-testimonial-grid">
    <?php foreach ($items as $item) : ?>
      <article class="evm-testimonial-card">
        <div class="evm-testimonial-stars" aria-label="<?php echo esc_attr($item['rating'] . ' stars'); ?>">
          <?php for ($i = 0; $i < $item['rating']; $i++) : ?><span>★</span><?php endfor; ?>
        </div>
        <h3><?php echo esc_html($item['title']); ?></h3>
        <p><?php echo esc_html($item['text']); ?></p>
        <strong><?php echo esc_html($item['customer']); ?></strong>
        <?php if (!empty($item['location'])) : ?><small><?php echo esc_html($item['location']); ?></small><?php endif; ?>
      </article>
    <?php endforeach; ?>
  </div>
  <?php
  return ob_get_clean();
}
add_shortcode('evm_testimonials', 'evm_testimonials_shortcode');

function evm_testimonials_section_shortcode($atts) {
  $atts = shortcode_atts(array(
    'title' => __('Trusted by customers who need simple support', 'easy-visa-myanmar'),
    'kicker' => __('Customer Reviews', 'easy-visa-myanmar'),
    'text' => __('Real reviews appear here after you add and publish them from WordPress Admin → Customer Reviews.', 'easy-visa-myanmar'),
  ), $atts, 'evm_testimonials_section');

  if (!evm_has_public_testimonials()) {
    return '';
  }

  ob_start();
  ?>
  <section class="evm-page-panel evm-testimonials-inline-section">
    <span class="section-kicker"><?php echo esc_html($atts['kicker']); ?></span>
    <h2><?php echo esc_html($atts['title']); ?></h2>
    <p><?php echo esc_html($atts['text']); ?></p>
    <?php echo do_shortcode('[evm_testimonials]'); ?>
  </section>
  <?php
  return ob_get_clean();
}
add_shortcode('evm_testimonials_section', 'evm_testimonials_section_shortcode');

function evm_seed_v49_cms_content() {
  if (get_option('evm_v49_cms_seeded')) {
    return;
  }

  if (!get_posts(array('post_type' => 'evm_faq', 'post_status' => 'any', 'posts_per_page' => 1))) {
    $seed_faqs = array(
      array('flight', 'Can I request one-way flight?', 'Yes. Return date is optional in the flight request form.'),
      array('hotel', 'Can I request apartment or guesthouse?', 'Yes. Submit hotel request and admin will contact you for exact stay type.'),
      array('easy-pass', 'Which airports are supported?', 'DMK, BKK and CNX are supported.'),
      array('easy-extension', 'Which current visa types are supported?', 'Arrival Visa and TR Visa extension requests are supported.'),
      array('letter-service', 'Which letter types can I request?', 'Visa Extension, Bank Recommendation Letter, Driving License Recommendation Letter, and Motorcycle / Car Buying Letter are supported.'),
      array('tm30-service', 'Which TM30 regions are supported?', 'Bangkok, Chiang Mai and Mae Sot are supported. You can choose LINE, Facebook, Email, Message, Telegram or WhatsApp delivery.'),
      array('general', 'Who can use this service?', 'All customers can request worldwide visa and travel support.'),
      array('safety', 'Should I send passport photos through the form?', 'Do not send passport photos, ID cards, bank details or sensitive documents through website forms.'),
    );

    foreach ($seed_faqs as $index => $faq) {
      $post_id = wp_insert_post(array(
        'post_type' => 'evm_faq',
        'post_status' => 'publish',
        'post_title' => $faq[1],
        'post_content' => $faq[2],
        'menu_order' => $index,
      ));
      if (!is_wp_error($post_id)) {
        update_post_meta($post_id, '_evm_faq_service', $faq[0]);
      }
    }
  }

  if (!get_posts(array('post_type' => 'evm_destination', 'post_status' => 'any', 'posts_per_page' => 1))) {
    $destinations = array(
      array('Thailand', 'Main destination', 'Easy Pass, Easy Extension, Letter Service, TM30, flight, hotel and travel support.', 'Easy Pass · Easy Extension · Letter · TM30 · Flight · Hotel'),
      array('Singapore', 'Popular', 'Flight, hotel and travel support requests for Singapore trips.', 'Flight · Hotel · Travel support'),
      array('Vietnam', 'Popular', 'Travel request support for Vietnam routes and stay planning.', 'Flight · Hotel · Travel support'),
      array('Laos', 'Nearby', 'Travel support requests for Laos trips and route planning.', 'Flight · Hotel · Travel support'),
      array('Malaysia', 'Popular', 'Travel support requests for Malaysia trips.', 'Flight · Hotel · Travel support'),
      array('Other countries', 'Worldwide', 'Contact admin for other international visa and travel support requests.', 'Visa · Flight · Hotel · Support'),
    );

    foreach ($destinations as $index => $dest) {
      $post_id = wp_insert_post(array(
        'post_type' => 'evm_destination',
        'post_status' => 'publish',
        'post_title' => $dest[0],
        'post_content' => $dest[2],
        'post_excerpt' => $dest[2],
        'menu_order' => $index,
      ));
      if (!is_wp_error($post_id)) {
        update_post_meta($post_id, '_evm_destination_badge', $dest[1]);
        update_post_meta($post_id, '_evm_destination_services', $dest[3]);
        update_post_meta($post_id, '_evm_destination_cta', home_url('/#booking'));
      }
    }
  }

  /* v56: do not seed public sample reviews. Add real reviews from WordPress Admin → Customer Reviews. */

  update_option('evm_v49_cms_seeded', '1');
}
add_action('after_switch_theme', 'evm_seed_v49_cms_content');
add_action('init', 'evm_seed_v49_cms_content', 30);

function evm_seed_v50_new_service_faqs() {
  if (get_option('evm_v50_new_service_faqs_seeded')) {
    return;
  }

  $seed_faqs = array(
    array('letter-service', 'Which letter types can I request?', 'Visa Extension, Bank Recommendation Letter, Driving License Recommendation Letter, and Motorcycle / Car Buying Letter are supported.'),
    array('tm30-service', 'Which TM30 regions are supported?', 'Bangkok, Chiang Mai and Mae Sot are supported.'),
    array('tm30-service', 'How can I receive the completed TM30 file?', 'Choose LINE, Facebook, Email, Message, Telegram or WhatsApp in the TM30 form.'),
  );

  foreach ($seed_faqs as $index => $faq) {
    $existing = get_page_by_title($faq[1], OBJECT, 'evm_faq');
    if ($existing) {
      continue;
    }

    $post_id = wp_insert_post(array(
      'post_type' => 'evm_faq',
      'post_status' => 'publish',
      'post_title' => $faq[1],
      'post_content' => $faq[2],
      'menu_order' => $index,
    ));

    if (!is_wp_error($post_id)) {
      update_post_meta($post_id, '_evm_faq_service', $faq[0]);
    }
  }

  update_option('evm_v50_new_service_faqs_seeded', '1');
}
add_action('after_switch_theme', 'evm_seed_v50_new_service_faqs');
add_action('init', 'evm_seed_v50_new_service_faqs', 31);


/* ===== V53 Visa Guides / Blog features ===== */

function evm_guide_category_terms() {
  return array(
    'thailand-visa' => __('Thailand Visa', 'easy-visa-myanmar'),
    'tm30' => __('TM30', 'easy-visa-myanmar'),
    'visa-extension' => __('Visa Extension', 'easy-visa-myanmar'),
    'letter-service' => __('Letter Service', 'easy-visa-myanmar'),
    'travel-tips' => __('Travel Tips', 'easy-visa-myanmar'),
    'myanmar-language-guides' => __('Myanmar Language Guides', 'easy-visa-myanmar'),
  );
}

function evm_get_guide_cta_url($post_id = 0) {
  $post_id = $post_id ? absint($post_id) : get_the_ID();
  $terms = wp_get_post_terms($post_id, 'evm_guide_category', array('fields' => 'slugs'));
  if (is_wp_error($terms)) {
    $terms = array();
  }

  if (in_array('tm30', $terms, true)) {
    return home_url('/?tab=tm30-service#booking');
  }
  if (in_array('letter-service', $terms, true)) {
    return home_url('/?tab=letter-service#booking');
  }
  if (in_array('visa-extension', $terms, true)) {
    return home_url('/?tab=easy-extension#booking');
  }
  if (in_array('thailand-visa', $terms, true)) {
    return home_url('/?tab=easy-pass#booking');
  }

  $title = strtolower(get_the_title($post_id));
  if (strpos($title, 'tm30') !== false) {
    return home_url('/?tab=tm30-service#booking');
  }
  if (strpos($title, 'letter') !== false || strpos($title, 'recommendation') !== false) {
    return home_url('/?tab=letter-service#booking');
  }
  if (strpos($title, 'extension') !== false) {
    return home_url('/?tab=easy-extension#booking');
  }

  return home_url('/#booking');
}

function evm_get_guide_cta_text($post_id = 0) {
  $post_id = $post_id ? absint($post_id) : get_the_ID();
  $terms = wp_get_post_terms($post_id, 'evm_guide_category', array('fields' => 'slugs'));
  if (is_wp_error($terms)) {
    $terms = array();
  }

  if (in_array('tm30', $terms, true)) {
    return __('Start TM30 Request', 'easy-visa-myanmar');
  }
  if (in_array('letter-service', $terms, true)) {
    return __('Start Letter Request', 'easy-visa-myanmar');
  }
  if (in_array('visa-extension', $terms, true)) {
    return __('Start Extension Request', 'easy-visa-myanmar');
  }
  return __('Start Request', 'easy-visa-myanmar');
}

function evm_get_guide_category_links($post_id = 0) {
  $post_id = $post_id ? absint($post_id) : get_the_ID();
  $terms = get_the_terms($post_id, 'evm_guide_category');
  if (empty($terms) || is_wp_error($terms)) {
    return '';
  }

  $links = array();
  foreach ($terms as $term) {
    $links[] = '<a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a>';
  }

  return implode(' ', $links);
}

function evm_visa_guides_preview_shortcode($atts) {
  $atts = shortcode_atts(array(
    'limit' => 3,
    'category' => '',
  ), $atts, 'evm_visa_guides');

  $args = array(
    'post_type' => 'evm_visa_guide',
    'post_status' => 'publish',
    'posts_per_page' => max(1, min(9, absint($atts['limit']))),
  );

  if (!empty($atts['category'])) {
    $args['tax_query'] = array(array(
      'taxonomy' => 'evm_guide_category',
      'field' => 'slug',
      'terms' => sanitize_title($atts['category']),
    ));
  }

  $guides = new WP_Query($args);
  ob_start();
  ?>
  <div class="evm-guide-grid">
    <?php if ($guides->have_posts()) : ?>
      <?php while ($guides->have_posts()) : $guides->the_post(); ?>
        <article class="evm-guide-card">
          <a class="evm-guide-thumb" href="<?php the_permalink(); ?>" aria-label="<?php the_title_attribute(); ?>">
            <?php if (has_post_thumbnail()) : ?>
              <?php the_post_thumbnail('evm-card'); ?>
            <?php else : ?>
              <span><?php echo evm_icon_svg('blog'); ?></span>
            <?php endif; ?>
          </a>
          <div class="evm-guide-body">
            <div class="evm-guide-cats"><?php echo evm_get_guide_category_links(get_the_ID()); ?></div>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <p><?php echo esc_html(wp_trim_words(get_the_excerpt() ?: wp_strip_all_tags(get_the_content()), 22)); ?></p>
            <div class="evm-guide-actions">
              <a class="read-more" href="<?php the_permalink(); ?>"><?php esc_html_e('Read Guide', 'easy-visa-myanmar'); ?> →</a>
              <a class="evm-guide-cta" href="<?php echo esc_url(evm_get_guide_cta_url(get_the_ID())); ?>"><?php echo esc_html(evm_get_guide_cta_text(get_the_ID())); ?></a>
            </div>
          </div>
        </article>
      <?php endwhile; wp_reset_postdata(); ?>
    <?php else : ?>
      <article class="evm-guide-card evm-guide-empty">
        <div class="evm-guide-body">
          <span class="post-category"><?php esc_html_e('Visa Guides', 'easy-visa-myanmar'); ?></span>
          <h3><?php esc_html_e('Add your first guide', 'easy-visa-myanmar'); ?></h3>
          <p><?php esc_html_e('Create customer guide posts from WordPress Admin → Visa Guides. They will appear here automatically.', 'easy-visa-myanmar'); ?></p>
        </div>
      </article>
    <?php endif; ?>
  </div>
  <?php
  return ob_get_clean();
}
add_shortcode('evm_visa_guides', 'evm_visa_guides_preview_shortcode');

function evm_seed_v53_visa_guides() {
  if (!post_type_exists('evm_visa_guide') || !taxonomy_exists('evm_guide_category')) {
    return;
  }

  foreach (evm_guide_category_terms() as $slug => $name) {
    if (!term_exists($slug, 'evm_guide_category')) {
      wp_insert_term($name, 'evm_guide_category', array('slug' => $slug));
    }
  }

  if (get_option('evm_v53_visa_guides_seeded')) {
    return;
  }

  $existing = get_posts(array(
    'post_type' => 'evm_visa_guide',
    'post_status' => 'any',
    'posts_per_page' => 1,
  ));

  if (empty($existing)) {
    $guides = array(
      array(
        'title' => 'What is TM30 in Thailand?',
        'excerpt' => 'A simple customer guide for TM30 request support in Bangkok, Chiang Mai and Mae Sot.',
        'terms' => array('tm30', 'thailand-visa'),
        'content' => '<h2>TM30 Service overview</h2><p>TM30 Service helps customers send a basic request for TM30 support in Bangkok, Chiang Mai or Mae Sot. The website form collects only basic request details, not passport uploads.</p><h2>What information should customers submit?</h2><ul><li>Name</li><li>Country</li><li>Contact information</li><li>Region: Bangkok, Chiang Mai or Mae Sot</li><li>Preferred completed-file delivery method</li></ul><h2>Safety note</h2><p>Do not upload passport photos, ID cards, bank details or private documents through website forms. The team will contact the customer if more information is needed.</p>',
      ),
      array(
        'title' => 'How to request a recommendation letter',
        'excerpt' => 'Guide for Myanmar customers who need Visa Extension, Bank, Driving License or vehicle buying recommendation letters.',
        'terms' => array('letter-service', 'myanmar-language-guides'),
        'content' => '<h2>Letter Service overview</h2><p>Letter Service is for Myanmar nationality customers who need recommendation letter support.</p><h2>Supported letter types</h2><ul><li>Visa Extension — ဗီဇာသက်တမ်းတိုး</li><li>Bank Recommendation Letter — ဘဏ်ဖွင့်ဖို့ ထောက်ခံစာ</li><li>Driving License Recommendation Letter — ယာဉ်မောင်းလိုင်စင်ပြုလုပ်ဖို့ - တိုးဖို့ ထောက်ခံစာ</li><li>Motorcycle / Car Buying Letter — ယာဉ်ဝယ်ဖို့ ထောက်ခံစာ</li></ul><h2>Next step</h2><p>Submit name, Myanmar nationality, contact information and letter type. The team will contact you to confirm the details.</p>',
      ),
      array(
        'title' => 'Thailand visa extension basic guide',
        'excerpt' => 'Basic guide for Arrival Visa and TR Visa extension request support.',
        'terms' => array('visa-extension', 'thailand-visa'),
        'content' => '<h2>Visa extension support</h2><p>Easy Extension supports basic requests for Arrival Visa and TR Visa extension. Customers can choose e Extension or Walk In VIP Extension.</p><h2>Useful information to prepare</h2><ul><li>Name and contact information</li><li>Nationality</li><li>Current visa type</li><li>Visa expiry date</li><li>Preferred extension date</li><li>Special request notes</li></ul><h2>Important note</h2><p>Immigration decisions are made by the relevant authority. Easy Visa For Myanmar helps with request coordination and customer support.</p>',
      ),
      array(
        'title' => 'What information is needed for Easy Pass?',
        'excerpt' => 'A quick guide for airport support requests at DMK, BKK and CNX.',
        'terms' => array('thailand-visa', 'travel-tips'),
        'content' => '<h2>Easy Pass request guide</h2><p>Easy Pass helps customers send airport arrival support requests for DMK, BKK and CNX.</p><h2>Information usually needed</h2><ul><li>Name</li><li>Nationality</li><li>Arrival airport</li><li>From city</li><li>Visa type</li><li>Special request notes</li></ul><p>Submit only basic information first. The admin team will contact you for next steps.</p>',
      ),
      array(
        'title' => 'How customers receive completed documents',
        'excerpt' => 'Delivery method guide for LINE, Facebook, Email, Message, Telegram and WhatsApp.',
        'terms' => array('travel-tips'),
        'content' => '<h2>Delivery method options</h2><p>For services like TM30, customers can choose how they want to receive the completed file or follow-up message.</p><ul><li>LINE</li><li>Facebook</li><li>Email</li><li>Message</li><li>Telegram</li><li>WhatsApp</li></ul><h2>Recommendation</h2><p>Choose the channel you check often. Make sure your contact information is correct before submitting the form.</p>',
      ),
      array(
        'title' => 'Myanmar language support for visa services',
        'excerpt' => 'A simple guide for customers who prefer Myanmar language explanations.',
        'terms' => array('myanmar-language-guides', 'travel-tips'),
        'content' => '<h2>Myanmar language support</h2><p>Easy Visa For Myanmar can add Myanmar language guide content to help customers understand service steps more clearly.</p><h2>Good places to use Myanmar language</h2><ul><li>Letter type descriptions</li><li>FAQ answers</li><li>Service instructions</li><li>Safety notes</li><li>Contact method explanations</li></ul><p>You can edit these guide posts from WordPress Admin → Visa Guides.</p>',
      ),
    );

    foreach ($guides as $index => $guide) {
      $post_id = wp_insert_post(array(
        'post_type' => 'evm_visa_guide',
        'post_status' => 'publish',
        'post_title' => $guide['title'],
        'post_content' => $guide['content'],
        'post_excerpt' => $guide['excerpt'],
        'menu_order' => $index,
      ));

      if (!is_wp_error($post_id) && $post_id) {
        wp_set_object_terms($post_id, $guide['terms'], 'evm_guide_category');
        update_post_meta($post_id, '_evm_starter_guide', '1');
      }
    }
  }

  update_option('evm_v53_visa_guides_seeded', '1');
}
add_action('init', 'evm_seed_v53_visa_guides', 32);

function evm_flush_rewrite_rules_v53() {
  evm_register_post_types();
  flush_rewrite_rules();
}
add_action('after_switch_theme', 'evm_flush_rewrite_rules_v53');

/* ===== End V53 Visa Guides / Blog features ===== */

function evm_smtp_plugin_active() {
  return class_exists('WPMailSMTP') ||
         class_exists('FluentMail\App\Hooks\Handlers\AdminMenuHandler') ||
         defined('POST_SMTP_VER') ||
         defined('WPMS_ON') ||
         function_exists('post_smtp') ||
         function_exists('wp_mail_smtp');
}


function evm_cleanup_sample_reviews_v56() {
  if (get_option('evm_sample_reviews_v56_cleaned')) {
    return;
  }

  $sample_titles = array(
    'Clear and quick reply',
    'Easy to choose service',
    'Helpful support process',
  );

  $sample_reviews = get_posts(array(
    'post_type'      => 'evm_testimonial',
    'post_status'    => 'any',
    'posts_per_page' => -1,
  ));

  foreach ($sample_reviews as $review) {
    $customer = get_post_meta($review->ID, '_evm_testimonial_customer', true);
    if (in_array($review->post_title, $sample_titles, true) && $customer === 'Customer') {
      update_post_meta($review->ID, '_evm_testimonial_live', '');
      if ($review->post_status === 'publish') {
        wp_update_post(array('ID' => $review->ID, 'post_status' => 'draft'));
      }
    }
  }

  update_option('evm_sample_reviews_v56_cleaned', '1');
}
add_action('after_switch_theme', 'evm_cleanup_sample_reviews_v56');
add_action('admin_init', 'evm_cleanup_sample_reviews_v56');


function evm_footer_fallback_menu() {
  echo '<ul>';
  echo '<li><a href="' . esc_url(home_url('/')) . '">' . esc_html__('Home', 'easy-visa-myanmar') . '</a></li>';
  echo '<li><a href="' . esc_url(home_url('/visa-guides/')) . '">' . esc_html__('Visa Guides', 'easy-visa-myanmar') . '</a></li>';
  echo '<li><a href="' . esc_url(home_url('/flight-ticket-booking/')) . '">' . esc_html__('Flights', 'easy-visa-myanmar') . '</a></li>';
  echo '<li><a href="' . esc_url(home_url('/hotel-rent/')) . '">' . esc_html__('Hotels', 'easy-visa-myanmar') . '</a></li>';
  echo '<li><a href="' . esc_url(home_url('/easy-pass-service/')) . '">' . esc_html__('Easy Pass', 'easy-visa-myanmar') . '</a></li>';
  echo '<li><a href="' . esc_url(home_url('/easy-extension-service/')) . '">' . esc_html__('Easy Extension', 'easy-visa-myanmar') . '</a></li>';
  echo '<li><a href="' . esc_url(home_url('/letter-service/')) . '">' . esc_html__('Letter Service', 'easy-visa-myanmar') . '</a></li>';
  echo '<li><a href="' . esc_url(home_url('/tm30-service/')) . '">' . esc_html__('TM30 Service', 'easy-visa-myanmar') . '</a></li>';
  echo '</ul>';
}

function evm_admin_smtp_notice() {
  if (!current_user_can('manage_options') || evm_smtp_plugin_active()) {
    return;
  }

  echo '<div class="notice notice-warning"><p><strong>' . esc_html__('Easy Visa email reminder:', 'easy-visa-myanmar') . '</strong> ' . esc_html__('For real hosting, please set up SMTP so inquiry emails do not go to spam. Inquiries are still saved in WordPress Admin → Inquiries.', 'easy-visa-myanmar') . '</p></div>';
}
add_action('admin_notices', 'evm_admin_smtp_notice');

