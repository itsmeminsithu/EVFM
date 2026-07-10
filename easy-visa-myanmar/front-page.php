<?php
/**
 * Front page template.
 */
get_header();

$logo = file_exists(get_theme_file_path('/assets/images/logo.png')) ? get_theme_file_uri('/assets/images/logo.png') : '';
$hero_slides = evm_get_hero_slides();
?>

<main id="primary" class="site-main">
  <section class="evm-hero">
    <div class="evm-container hero-grid">
      <div class="hero-content">
        <span class="hero-badge"><?php echo evm_icon_svg('shield'); ?> <?php echo esc_html(evm_get_option('evm_hero_badge', 'Travel · Visa · Knowledge Sharing')); ?></span>
        <h1><?php echo esc_html(evm_get_option('evm_hero_title', 'Worldwide visa and travel support')); ?></h1>
        <p><?php echo esc_html(evm_get_option('evm_hero_subtitle', 'For customers traveling to Thailand, Singapore, Vietnam, Laos and other countries. Choose a service and our admin will contact you soon.')); ?></p>
        <blockquote class="hero-random-quote">
          <?php echo esc_html(evm_get_random_quote('general')); ?>
        </blockquote>

        <div class="hero-actions">
          <a class="evm-btn evm-btn-primary" href="<?php echo esc_url(evm_get_option('evm_primary_cta_url', '#booking')); ?>">
            <?php echo esc_html(evm_get_option('evm_primary_cta_text', 'Start Request')); ?> →
          </a>
          <a class="evm-btn evm-btn-outline" href="<?php echo esc_url(evm_get_option('evm_secondary_cta_url', '#booking')); ?>">
            <?php echo esc_html(evm_get_option('evm_secondary_cta_text', 'Explore Services')); ?>
          </a>
        </div>
      </div>

      <aside class="hero-card">
        <div class="hero-slider" data-autoplay="true" aria-label="<?php esc_attr_e('Travel inspiration slider', 'easy-visa-myanmar'); ?>">
          <?php foreach ($hero_slides as $index => $slide) : ?>
            <div class="hero-slide <?php echo $index === 0 ? 'is-active' : ''; ?>">
              <img src="<?php echo esc_url($slide['image']); ?>" alt="<?php echo esc_attr($slide['title']); ?>" loading="<?php echo $index === 0 ? 'eager' : 'lazy'; ?>" decoding="async">
              <div class="hero-slide-caption">
                <span><?php echo esc_html($slide['label']); ?></span>
                <strong><?php echo esc_html($slide['title']); ?></strong>
                <?php if (!empty($slide['text']) && $slide['text'] !== $slide['title']) : ?>
                  <p><?php echo esc_html(wp_trim_words($slide['text'], 18)); ?></p>
                <?php endif; ?>
              </div>
            </div>
          <?php endforeach; ?>

          <?php if (count($hero_slides) > 1) : ?>
            <div class="hero-slider-ui">
              <button type="button" class="hero-slider-btn hero-slider-prev" aria-label="<?php esc_attr_e('Previous slide', 'easy-visa-myanmar'); ?>">‹</button>
              <div class="hero-slider-dots" role="tablist" aria-label="<?php esc_attr_e('Slider navigation', 'easy-visa-myanmar'); ?>">
                <?php foreach ($hero_slides as $index => $slide) : ?>
                  <button type="button" class="hero-slider-dot <?php echo $index === 0 ? 'is-active' : ''; ?>" aria-label="<?php echo esc_attr(sprintf(__('Go to slide %d', 'easy-visa-myanmar'), $index + 1)); ?>"></button>
                <?php endforeach; ?>
              </div>
              <button type="button" class="hero-slider-btn hero-slider-next" aria-label="<?php esc_attr_e('Next slide', 'easy-visa-myanmar'); ?>">›</button>
            </div>
          <?php endif; ?>
        </div>

        <div class="hero-mini-grid">
          <div class="hero-mini">
            <strong>Visa</strong>
            <span><?php esc_html_e('Simple application guides', 'easy-visa-myanmar'); ?></span>
          </div>
          <div class="hero-mini">
            <strong>Guides</strong>
            <span><?php esc_html_e('Visa and service guides', 'easy-visa-myanmar'); ?></span>
          </div>
        </div>
      </aside>
    </div>
  </section>

  <section id="booking" class="booking-wrap">
    <div class="evm-container">
      <div class="booking-box">
        <div class="booking-head">
          <div>
            <h2><?php esc_html_e('Book Travel & Services', 'easy-visa-myanmar'); ?></h2>
            <p><?php esc_html_e('Choose travel requests or visa/support services. The form, details and FAQ will change for that service only.', 'easy-visa-myanmar'); ?></p>
            <div class="booking-tab-groups">
              <span><?php esc_html_e('Travel: Flight Ticket, Hotel Rent', 'easy-visa-myanmar'); ?></span>
              <span><?php esc_html_e('Visa & Support: Easy Pass, Easy Extension, Letter Service, TM30', 'easy-visa-myanmar'); ?></span>
            </div>
            <div class="booking-service-select-wrap">
              <label for="booking-service-select"><?php esc_html_e('Choose Service', 'easy-visa-myanmar'); ?></label>
              <select id="booking-service-select" class="booking-service-select" aria-controls="booking">
                <option value="flight"><?php esc_html_e('Flight Ticket', 'easy-visa-myanmar'); ?></option>
                <option value="hotel"><?php esc_html_e('Hotel Rent', 'easy-visa-myanmar'); ?></option>
                <option value="easy-pass"><?php esc_html_e('Easy Pass Services', 'easy-visa-myanmar'); ?></option>
                <option value="easy-extension"><?php esc_html_e('Easy Extension', 'easy-visa-myanmar'); ?></option>
                <option value="letter-service"><?php esc_html_e('Letter Service', 'easy-visa-myanmar'); ?></option>
                <option value="tm30-service"><?php esc_html_e('TM30 Service', 'easy-visa-myanmar'); ?></option>
              </select>
            </div>
          </div>

          <div class="booking-tabs" role="tablist">
            <button class="booking-tab active" type="button" data-tab="flight" role="tab" aria-selected="true"><span class="tab-icon"><?php echo evm_icon_svg('plane'); ?></span><?php esc_html_e('Flight Ticket', 'easy-visa-myanmar'); ?></button>
            <button class="booking-tab" type="button" data-tab="hotel" role="tab" aria-selected="false"><span class="tab-icon"><?php echo evm_icon_svg('hotel'); ?></span><?php esc_html_e('Hotel Rent', 'easy-visa-myanmar'); ?></button>
            <button class="booking-tab" type="button" data-tab="easy-pass" role="tab" aria-selected="false"><span class="tab-icon"><?php echo evm_icon_svg('visa'); ?></span><?php esc_html_e('Easy Pass Services', 'easy-visa-myanmar'); ?></button>
            <button class="booking-tab" type="button" data-tab="easy-extension" role="tab" aria-selected="false"><span class="tab-icon"><?php echo evm_icon_svg('passport'); ?></span><?php esc_html_e('Easy Extension', 'easy-visa-myanmar'); ?></button>
            <button class="booking-tab" type="button" data-tab="letter-service" role="tab" aria-selected="false"><span class="tab-icon"><?php echo evm_icon_svg('blog'); ?></span><?php esc_html_e('Letter Service', 'easy-visa-myanmar'); ?></button>
            <button class="booking-tab" type="button" data-tab="tm30-service" role="tab" aria-selected="false"><span class="tab-icon"><?php echo evm_icon_svg('passport'); ?></span><?php esc_html_e('TM30 Service', 'easy-visa-myanmar'); ?></button>
          </div>
        </div>

        <?php evm_render_form_error_notice(); ?>

        <div class="booking-service-helper" aria-live="polite">
          <article class="booking-service-panel active" data-booking-info="flight">
            <div class="booking-service-summary booking-helper-block">
              <span class="booking-helper-kicker"><?php esc_html_e('Flight Ticket', 'easy-visa-myanmar'); ?></span>
              <h3><?php esc_html_e('Flight support details', 'easy-visa-myanmar'); ?></h3>
              <p><?php esc_html_e('Use this form for flight route, travel date, passenger count and contact information.', 'easy-visa-myanmar'); ?></p>
            </div>
          </article>

          <article class="booking-service-panel" data-booking-info="hotel">
            <div class="booking-service-summary booking-helper-block">
              <span class="booking-helper-kicker"><?php esc_html_e('Hotel Rent', 'easy-visa-myanmar'); ?></span>
              <h3><?php esc_html_e('Hotel support details', 'easy-visa-myanmar'); ?></h3>
              <p><?php esc_html_e('Use this form for destination, check-in, check-out, guests, rooms and contact information.', 'easy-visa-myanmar'); ?></p>
            </div>
          </article>

          <article class="booking-service-panel" data-booking-info="easy-pass">
            <div class="booking-service-summary booking-helper-block">
              <span class="booking-helper-kicker"><?php esc_html_e('Easy Pass', 'easy-visa-myanmar'); ?></span>
              <h3><?php esc_html_e('Easy Pass details', 'easy-visa-myanmar'); ?></h3>
              <p><?php esc_html_e('Use this form for airport arrival support, nationality, airport, visa type and arrival notes.', 'easy-visa-myanmar'); ?></p>
            </div>
          </article>

          <article class="booking-service-panel" data-booking-info="easy-extension">
            <div class="booking-service-summary booking-helper-block">
              <span class="booking-helper-kicker"><?php esc_html_e('Easy Extension', 'easy-visa-myanmar'); ?></span>
              <h3><?php esc_html_e('Easy Extension details', 'easy-visa-myanmar'); ?></h3>
              <p><?php esc_html_e('Use this form for Arrival Visa or TR Visa extension. Choose e Extension or Walk In VIP Extension.', 'easy-visa-myanmar'); ?></p>
            </div>
          </article>

          <article class="booking-service-panel" data-booking-info="letter-service">
            <div class="booking-service-summary booking-helper-block">
              <span class="booking-helper-kicker"><?php esc_html_e('Letter Service', 'easy-visa-myanmar'); ?></span>
              <h3><?php esc_html_e('Letter Service details', 'easy-visa-myanmar'); ?></h3>
              <p><?php esc_html_e('Use this form for Myanmar recommendation letter requests: visa extension, bank, driving license, motorcycle or car buying letter.', 'easy-visa-myanmar'); ?></p>
            </div>
          </article>

          <article class="booking-service-panel" data-booking-info="tm30-service">
            <div class="booking-service-summary booking-helper-block">
              <span class="booking-helper-kicker"><?php esc_html_e('TM30 Service', 'easy-visa-myanmar'); ?></span>
              <h3><?php esc_html_e('TM30 Service details', 'easy-visa-myanmar'); ?></h3>
              <p><?php esc_html_e('Use this form for TM30 support in Bangkok, Chiang Mai or Mae Sot. Submit basic details only; our team will contact you if more information is needed.', 'easy-visa-myanmar'); ?></p>
            </div>
          </article>
        </div>

        <form id="flight" class="booking-form active" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
          <?php wp_nonce_field('evm_submit_inquiry', 'evm_inquiry_nonce'); ?>
          <div class="evm-hp-field" aria-hidden="true">
            <label>Company Website</label>
            <input type="text" name="evm_company_website" tabindex="-1" autocomplete="off">
          </div>
          <input type="hidden" name="action" value="evm_submit_inquiry">
          <input type="hidden" name="inquiry_type" value="Flight Ticket">
          <?php evm_render_extra_security_fields('Flight Ticket'); ?>
          <input type="hidden" name="redirect_to" value="<?php echo esc_url(add_query_arg('request', 'flight', home_url('/thank-you/'))); ?>">

          <div class="form-grid">
<div class="form-field">
              <label for="flight-name"><?php esc_html_e('Name', 'easy-visa-myanmar'); ?></label>
              <input id="flight-name" type="text" name="name" placeholder="Your full name" required>
            </div>

            <div class="form-field">
              <label for="flight-contact"><?php esc_html_e('Phone / Email', 'easy-visa-myanmar'); ?></label>
              <input id="flight-contact" type="text" name="contact" placeholder="Phone or email" required>
            </div>

            <?php evm_render_preferred_contact_field('flight'); ?>

            <div class="form-field">
              <label for="flight-from"><?php esc_html_e('From', 'easy-visa-myanmar'); ?></label>
              <input id="flight-from" type="text" name="from" placeholder="Yangon (RGN)" required>
            </div>

            <div class="form-field">
              <label for="flight-to"><?php esc_html_e('To', 'easy-visa-myanmar'); ?></label>
              <input id="flight-to" type="text" name="to" placeholder="Bangkok (BKK)" required>
            </div>

            <div class="form-field">
              <label for="flight-departure"><?php esc_html_e('Departure', 'easy-visa-myanmar'); ?></label>
              <input id="flight-departure" type="date" name="departure">
            </div>

            <div class="form-field flight-return-field">
              <label for="flight-return"><?php esc_html_e('Return', 'easy-visa-myanmar'); ?></label>
              <input id="flight-return" type="date" name="return">
            </div>

            <div class="form-field">
              <label for="flight-passengers"><?php esc_html_e('Passengers', 'easy-visa-myanmar'); ?></label>
              <select id="flight-passengers" name="passengers">
                <option value="1">1 Passenger</option>
                <option value="2">2 Passengers</option>
                <option value="3">3 Passengers</option>
                <option value="4+">4+ Passengers</option>
              </select>
            </div>
            <?php evm_render_privacy_consent_field(); ?>


            <button class="evm-btn evm-btn-primary booking-submit" type="submit"><?php esc_html_e('Submit Flight Request', 'easy-visa-myanmar'); ?></button>
          </div>
        </form>

        <form id="hotel" class="booking-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
          <?php wp_nonce_field('evm_submit_inquiry', 'evm_inquiry_nonce'); ?>
          <div class="evm-hp-field" aria-hidden="true">
            <label>Company Website</label>
            <input type="text" name="evm_company_website" tabindex="-1" autocomplete="off">
          </div>
          <input type="hidden" name="action" value="evm_submit_inquiry">
          <input type="hidden" name="inquiry_type" value="Hotel Rent">
          <?php evm_render_extra_security_fields('Hotel Rent'); ?>
          <input type="hidden" name="redirect_to" value="<?php echo esc_url(add_query_arg('request', 'hotel', home_url('/thank-you/'))); ?>">

          <div class="form-grid">
            <div class="form-field">
              <label for="hotel-name"><?php esc_html_e('Name', 'easy-visa-myanmar'); ?></label>
              <input id="hotel-name" type="text" name="name" placeholder="Your full name" required>
            </div>

            <div class="form-field">
              <label for="hotel-contact"><?php esc_html_e('Phone / Email', 'easy-visa-myanmar'); ?></label>
              <input id="hotel-contact" type="text" name="contact" placeholder="Phone or email" required>
            </div>

            <?php evm_render_preferred_contact_field('hotel'); ?>

            <div class="form-field">
              <label for="hotel-destination"><?php esc_html_e('Destination', 'easy-visa-myanmar'); ?></label>
              <input id="hotel-destination" type="text" name="destination" placeholder="Yangon, Myanmar" required>
            </div>

            <div class="form-field">
              <label for="hotel-checkin"><?php esc_html_e('Check-in', 'easy-visa-myanmar'); ?></label>
              <input id="hotel-checkin" type="date" name="checkin">
            </div>

            <div class="form-field">
              <label for="hotel-checkout"><?php esc_html_e('Check-out', 'easy-visa-myanmar'); ?></label>
              <input id="hotel-checkout" type="date" name="checkout">
            </div>

            <div class="form-field">
              <label for="hotel-guests"><?php esc_html_e('Guests', 'easy-visa-myanmar'); ?></label>
              <select id="hotel-guests" name="guests">
                <option value="1">1 Guest</option>
                <option value="2">2 Guests</option>
                <option value="3">3 Guests</option>
                <option value="4+">4+ Guests</option>
              </select>
            </div>

            <div class="form-field">
              <label for="hotel-rooms"><?php esc_html_e('Rooms', 'easy-visa-myanmar'); ?></label>
              <select id="hotel-rooms" name="rooms">
                <option value="1">1 Room</option>
                <option value="2">2 Rooms</option>
                <option value="3">3 Rooms</option>
              </select>
            </div>
            <?php evm_render_privacy_consent_field(); ?>


            <button class="evm-btn evm-btn-primary booking-submit" type="submit"><?php esc_html_e('Submit Hotel Request', 'easy-visa-myanmar'); ?></button>
          </div>
        </form>

        <form id="easy-pass" class="booking-form easy-pass-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
          <?php wp_nonce_field('evm_submit_inquiry', 'evm_inquiry_nonce'); ?>
          <div class="evm-hp-field" aria-hidden="true">
            <label>Company Website</label>
            <input type="text" name="evm_company_website" tabindex="-1" autocomplete="off">
          </div>
          <input type="hidden" name="action" value="evm_submit_inquiry">
          <input type="hidden" name="inquiry_type" value="Easy Pass">
          <?php evm_render_extra_security_fields('Easy Pass'); ?>
          <input type="hidden" name="redirect_to" value="<?php echo esc_url(add_query_arg('request', 'easy-pass', home_url('/thank-you/'))); ?>">

          <div class="form-grid easy-pass-grid">
            <div class="form-field">
              <label for="easy-pass-name"><?php esc_html_e('Name', 'easy-visa-myanmar'); ?></label>
              <input id="easy-pass-name" type="text" name="name" placeholder="Your full name" required>
            </div>

            <div class="form-field">
              <label for="easy-pass-contact"><?php esc_html_e('Phone / Email', 'easy-visa-myanmar'); ?></label>
              <input id="easy-pass-contact" type="text" name="contact" placeholder="Phone or email" required>
            </div>

            <?php evm_render_preferred_contact_field('easy-pass'); ?>

            <div class="form-field">
              <label for="easy-pass-nationality"><?php esc_html_e('Nationality', 'easy-visa-myanmar'); ?></label>
              <input id="easy-pass-nationality" type="text" name="nationality" placeholder="Myanmar" required>
            </div>

            <div class="form-field">
              <label for="easy-pass-airport"><?php esc_html_e('Arrive Airport', 'easy-visa-myanmar'); ?></label>
              <select id="easy-pass-airport" name="arrive_airport" required>
                <option value="DMK">DMK - Don Mueang</option>
                <option value="BKK">BKK - Suvarnabhumi</option>
                <option value="CNX">CNX - Chiang Mai</option>
              </select>
            </div>

            <div class="form-field">
              <label for="easy-pass-from"><?php esc_html_e('From', 'easy-visa-myanmar'); ?></label>
              <input id="easy-pass-from" type="text" name="from" placeholder="City / Country" required>
            </div>

            <div class="form-field">
              <label for="easy-pass-visa-type"><?php esc_html_e('Visa Type', 'easy-visa-myanmar'); ?></label>
              <select id="easy-pass-visa-type" name="visa_type" required>
                <option value="">Select Visa Type</option>
                <option value="TR Visa">TR Visa (Tourist)</option>
                <option value="ED Visa">ED Visa</option>
                <option value="DTV Visa">DTV Visa</option>
                <option value="Non-LA Visa">Non-LA Visa</option>
                <option value="Visa on Arrival">Visa on Arrival</option>
                <option value="Business Visa">Business Visa</option>
                <option value="Non-B Visa">Non-B Visa</option>
                <option value="Non-O Visa">Non-O Visa</option>
                <option value="Non-Immigrant Visa">Non-Immigrant Visa</option>
                <option value="Transit Visa">Transit Visa</option>
                <option value="Other Visa">Other Visa</option>
              </select>
            </div>

            <div class="form-field form-field-wide easy-pass-message-field">
              <label for="easy-pass-message"><?php esc_html_e('Special Request / Notes', 'easy-visa-myanmar'); ?></label>
              <textarea id="easy-pass-message" name="message" rows="4" placeholder="<?php esc_attr_e('Example: arrival time, family members, urgent request, preferred contact time...', 'easy-visa-myanmar'); ?>"></textarea>
              <small><?php esc_html_e('Please write only basic travel notes here. Do not send passport photos, ID cards or bank details through this form.', 'easy-visa-myanmar'); ?></small>
            </div>
            <?php evm_render_privacy_consent_field(); ?>


            <button class="evm-btn evm-btn-primary booking-submit" type="submit"><?php esc_html_e('Submit Easy Pass Request', 'easy-visa-myanmar'); ?></button>
          </div>
          <p class="easy-pass-note"><?php esc_html_e('Your request will be saved first. Our team will contact you soon through your provided contact information.', 'easy-visa-myanmar'); ?></p>
        </form>


        <form id="easy-extension" class="booking-form easy-extension-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
          <?php wp_nonce_field('evm_submit_inquiry', 'evm_inquiry_nonce'); ?>
          <div class="evm-hp-field" aria-hidden="true">
            <label>Company Website</label>
            <input type="text" name="evm_company_website" tabindex="-1" autocomplete="off">
          </div>
          <input type="hidden" name="action" value="evm_submit_inquiry">
          <input type="hidden" name="inquiry_type" value="Easy Extension">
          <?php evm_render_extra_security_fields('Easy Extension'); ?>
          <input type="hidden" name="redirect_to" value="<?php echo esc_url(add_query_arg('request', 'easy-extension', home_url('/thank-you/'))); ?>">
<div class="form-grid easy-extension-grid">
            <div class="form-field">
              <label for="extension-name"><?php esc_html_e('Name', 'easy-visa-myanmar'); ?></label>
              <input id="extension-name" type="text" name="name" placeholder="Your full name" required>
            </div>

            <div class="form-field">
              <label for="extension-contact"><?php esc_html_e('Phone / Email', 'easy-visa-myanmar'); ?></label>
              <input id="extension-contact" type="text" name="contact" placeholder="Phone or email" required>
            </div>

            <?php evm_render_preferred_contact_field('extension'); ?>

            <div class="form-field">
              <label for="extension-nationality"><?php esc_html_e('Nationality', 'easy-visa-myanmar'); ?></label>
              <input id="extension-nationality" type="text" name="nationality" placeholder="Myanmar" required>
            </div>

            <div class="form-field">
              <label for="extension-current-visa-type"><?php esc_html_e('Current Visa Type', 'easy-visa-myanmar'); ?></label>
              <select id="extension-current-visa-type" name="current_visa_type" required>
                <option value=""><?php esc_html_e('Select Current Visa', 'easy-visa-myanmar'); ?></option>
                <option value="Arrival Visa">Arrival Visa</option>
                <option value="TR Visa">TR Visa (Tourist)</option>
              </select>
            </div>

            <div class="form-field">
              <label for="extension-expiry-date"><?php esc_html_e('Visa Expiry Date', 'easy-visa-myanmar'); ?></label>
              <input id="extension-expiry-date" type="date" name="visa_expiry_date" required>
            </div>

            <div class="form-field">
              <label for="extension-preferred-date"><?php esc_html_e('Preferred Extension Date', 'easy-visa-myanmar'); ?></label>
              <input id="extension-preferred-date" type="date" name="preferred_date">
            </div>

            <div class="form-field form-field-wide">
              <label for="extension-method"><?php esc_html_e('Extension Method', 'easy-visa-myanmar'); ?></label>
              <select id="extension-method" name="extension_method" required>
                <option value=""><?php esc_html_e('Choose Method', 'easy-visa-myanmar'); ?></option>
                <option value="e Extension">e Extension</option>
                <option value="Walk In VIP Extension">Walk In VIP Extension</option>
              </select>
            </div>

            <div class="form-field form-field-wide easy-extension-message-field">
              <label for="extension-message"><?php esc_html_e('Special Request / Notes', 'easy-visa-myanmar'); ?></label>
              <textarea id="extension-message" name="message" rows="4" placeholder="<?php esc_attr_e('Example: visa expires soon, urgent extension, preferred date, question for admin...', 'easy-visa-myanmar'); ?>"></textarea>
              <small><?php esc_html_e('Please send only basic travel notes here. Do not send passport photos, ID cards or bank details through this form.', 'easy-visa-myanmar'); ?></small>
            </div>
            <?php evm_render_privacy_consent_field(); ?>


            <button class="evm-btn evm-btn-primary booking-submit" type="submit"><?php esc_html_e('Submit Easy Extension Request', 'easy-visa-myanmar'); ?></button>
          </div>
        </form>


        <form id="letter-service" class="booking-form letter-service-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
          <?php wp_nonce_field('evm_submit_inquiry', 'evm_inquiry_nonce'); ?>
          <div class="evm-hp-field" aria-hidden="true">
            <label>Company Website</label>
            <input type="text" name="evm_company_website" tabindex="-1" autocomplete="off">
          </div>
          <input type="hidden" name="action" value="evm_submit_inquiry">
          <input type="hidden" name="inquiry_type" value="Letter Service">
          <?php evm_render_extra_security_fields('Letter Service'); ?>
          <input type="hidden" name="redirect_to" value="<?php echo esc_url(add_query_arg('request', 'letter-service', home_url('/thank-you/'))); ?>">

          <div class="form-grid letter-service-grid">
            <div class="form-field">
              <label for="letter-name"><?php esc_html_e('Name', 'easy-visa-myanmar'); ?></label>
              <input id="letter-name" type="text" name="name" placeholder="Your full name" required>
            </div>

            <div class="form-field">
              <label for="letter-nationality"><?php esc_html_e('Nationality', 'easy-visa-myanmar'); ?></label>
              <select id="letter-nationality" name="nationality" required>
                <option value="Myanmar">Myanmar only</option>
              </select>
            </div>

            <div class="form-field">
              <label for="letter-contact"><?php esc_html_e('Contact Info', 'easy-visa-myanmar'); ?></label>
              <input id="letter-contact" type="text" name="contact" placeholder="Phone, email, LINE, Facebook, Telegram or WhatsApp" required>
            </div>

            <?php evm_render_preferred_contact_field('letter'); ?>

            <div class="form-field form-field-wide">
              <label for="letter-type"><?php esc_html_e('Letter Type', 'easy-visa-myanmar'); ?></label>
              <select id="letter-type" name="letter_type" required>
                <option value=""><?php esc_html_e('Choose Letter Type', 'easy-visa-myanmar'); ?></option>
                <option value="Visa Extension (ဗီဇာသက်တမ်းတိုး)">Visa Extension (ဗီဇာသက်တမ်းတိုး)</option>
                <option value="Bank Recommendation Letter (ဘဏ်ဖွင့်ဖို့ ထောက်ခံစာ)">Bank Recommendation Letter (ဘဏ်ဖွင့်ဖို့ ထောက်ခံစာ)</option>
                <option value="Driving License Recommendation Letter (ယာဉ်မောင်းလိုင်စင်ပြုလုပ်ဖို့ - တိုးဖို့ ထောက်ခံစာ)">Driving License Recommendation Letter (ယာဉ်မောင်းလိုင်စင်ပြုလုပ်ဖို့ - တိုးဖို့ ထောက်ခံစာ)</option>
                <option value="Motorcycle / Car Buying Letter (ယာဉ်ဝယ်ဖို့ ထောက်ခံစာ)">Motorcycle / Car Buying Letter (ယာဉ်ဝယ်ဖို့ ထောက်ခံစာ)</option>
              </select>
            </div>

            <div class="form-field form-field-wide letter-message-field">
              <label for="letter-message"><?php esc_html_e('Special Request / Notes', 'easy-visa-myanmar'); ?></label>
              <textarea id="letter-message" name="message" rows="4" placeholder="<?php esc_attr_e('Write only basic notes. Admin will contact you for next steps.', 'easy-visa-myanmar'); ?>"></textarea>
              <small><?php esc_html_e('Please do not send passport photos, ID cards, bank details or private documents through this form.', 'easy-visa-myanmar'); ?></small>
            </div>

            <?php evm_render_privacy_consent_field(); ?>

            <button class="evm-btn evm-btn-primary booking-submit" type="submit"><?php esc_html_e('Submit Letter Service Request', 'easy-visa-myanmar'); ?></button>
          </div>
        </form>

        <form id="tm30-service" class="booking-form tm30-service-form" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" method="post">
          <?php wp_nonce_field('evm_submit_inquiry', 'evm_inquiry_nonce'); ?>
          <div class="evm-hp-field" aria-hidden="true">
            <label>Company Website</label>
            <input type="text" name="evm_company_website" tabindex="-1" autocomplete="off">
          </div>
          <input type="hidden" name="action" value="evm_submit_inquiry">
          <input type="hidden" name="inquiry_type" value="TM30 Service">
          <?php evm_render_extra_security_fields('TM30 Service'); ?>
          <input type="hidden" name="redirect_to" value="<?php echo esc_url(add_query_arg('request', 'tm30-service', home_url('/thank-you/'))); ?>">

          <div class="form-grid tm30-service-grid">
            <div class="form-field">
              <label for="tm30-name"><?php esc_html_e('Name', 'easy-visa-myanmar'); ?></label>
              <input id="tm30-name" type="text" name="name" placeholder="Your full name" required>
            </div>

            <div class="form-field">
              <label for="tm30-country"><?php esc_html_e('Country', 'easy-visa-myanmar'); ?></label>
              <input id="tm30-country" type="text" name="country" placeholder="Myanmar" required>
            </div>

            <div class="form-field">
              <label for="tm30-contact"><?php esc_html_e('Contact Info', 'easy-visa-myanmar'); ?></label>
              <input id="tm30-contact" type="text" name="contact" placeholder="Phone, email, LINE, Facebook, Telegram or WhatsApp" required>
            </div>

            <div class="form-field">
              <label for="tm30-region"><?php esc_html_e('Region', 'easy-visa-myanmar'); ?></label>
              <select id="tm30-region" name="region" required>
                <option value=""><?php esc_html_e('Choose Region', 'easy-visa-myanmar'); ?></option>
                <option value="Bangkok">Bangkok</option>
                <option value="Chiang Mai">Chiang Mai</option>
                <option value="Mae Sot">Mae Sot</option>
              </select>
            </div>

            <div class="form-field form-field-wide">
              <label for="tm30-delivery-method"><?php esc_html_e('How do you want to receive the completed file?', 'easy-visa-myanmar'); ?></label>
              <select id="tm30-delivery-method" name="delivery_method" required>
                <option value=""><?php esc_html_e('Choose Delivery Method', 'easy-visa-myanmar'); ?></option>
                <option value="LINE">LINE</option>
                <option value="Facebook">Facebook</option>
                <option value="Email">Email</option>
                <option value="Message">Message</option>
                <option value="Telegram">Telegram</option>
                <option value="WhatsApp">WhatsApp</option>
              </select>
            </div>

            <div class="form-field form-field-wide tm30-message-field">
              <label for="tm30-message"><?php esc_html_e('Special Request / Notes', 'easy-visa-myanmar'); ?></label>
              <textarea id="tm30-message" name="message" rows="4" placeholder="<?php esc_attr_e('Example: delivery account name, urgent request, preferred contact time...', 'easy-visa-myanmar'); ?>"></textarea>
            </div>

            <?php evm_render_privacy_consent_field(); ?>

            <button class="evm-btn evm-btn-primary booking-submit" type="submit"><?php esc_html_e('Submit TM30 Request', 'easy-visa-myanmar'); ?></button>
          </div>
        </form>

        <div class="booking-faq-after-form" aria-live="polite">
          <?php evm_render_booking_faq_panel('flight', __('Flight FAQ', 'easy-visa-myanmar'), __('Questions about flight ticket support', 'easy-visa-myanmar'), true); ?>
          <?php evm_render_booking_faq_panel('hotel', __('Hotel FAQ', 'easy-visa-myanmar'), __('Questions about hotel rent support', 'easy-visa-myanmar')); ?>
          <?php evm_render_booking_faq_panel('easy-pass', __('Easy Pass FAQ', 'easy-visa-myanmar'), __('Questions about Easy Pass support', 'easy-visa-myanmar')); ?>
          <?php evm_render_booking_faq_panel('easy-extension', __('Easy Extension FAQ', 'easy-visa-myanmar'), __('Questions about visa extension support', 'easy-visa-myanmar')); ?>
          <?php evm_render_booking_faq_panel('letter-service', __('Letter Service FAQ', 'easy-visa-myanmar'), __('Questions about recommendation letter support', 'easy-visa-myanmar')); ?>
          <?php evm_render_booking_faq_panel('tm30-service', __('TM30 Service FAQ', 'easy-visa-myanmar'), __('Questions about TM30 request and file delivery', 'easy-visa-myanmar')); ?>
        </div>

        <div class="booking-security-note">
          <?php echo evm_icon_svg('shield'); ?>
          <p><?php esc_html_e('For your safety, do not upload or send passport photos, ID cards, bank details or private documents through website forms. Submit only the basic details needed for your selected service.', 'easy-visa-myanmar'); ?></p>
        </div>

        <div class="booking-disclaimer-note">
          <?php echo evm_icon_svg('shield'); ?>
          <p><?php echo esc_html(evm_business_disclaimer_text()); ?></p>
        </div>
      </div>
    </div>
  </section>

  <section id="quick-flow" class="evm-section evm-quick-flow-section">
    <div class="evm-container">
      <div class="quick-flow-strip">
        <div>
          <span><?php echo evm_icon_svg('shield'); ?></span>
          <strong><?php esc_html_e('Saved to CMS', 'easy-visa-myanmar'); ?></strong>
          <small><?php esc_html_e('Your request goes to WordPress Admin → Inquiries.', 'easy-visa-myanmar'); ?></small>
        </div>
        <div>
          <span><?php echo evm_icon_svg('chat'); ?></span>
          <strong><?php esc_html_e('Email reminder', 'easy-visa-myanmar'); ?></strong>
          <small><?php esc_html_e('Admin receives a new customer email reminder.', 'easy-visa-myanmar'); ?></small>
        </div>
        <div>
          <span><?php echo evm_icon_svg('visa'); ?></span>
          <strong><?php esc_html_e('Admin contacts you', 'easy-visa-myanmar'); ?></strong>
          <small><?php esc_html_e('We reply through your selected contact or delivery method.', 'easy-visa-myanmar'); ?></small>
        </div>
      </div>
    </div>
  </section>

  <section id="visa-guides-preview" class="evm-section evm-guides-preview-section">
    <div class="evm-container">
      <div class="section-heading compact evm-guides-heading-row">
        <div>
          <span class="section-kicker"><?php esc_html_e('Visa Guides / Blog', 'easy-visa-myanmar'); ?></span>
          <h2><?php esc_html_e('Helpful guides before customers submit a request', 'easy-visa-myanmar'); ?></h2>
          <p><?php esc_html_e('Use guides for TM30, Letter Service, visa extension, travel tips and Myanmar language explanations. Blog posts stay separate from the booking tabs.', 'easy-visa-myanmar'); ?></p>
        </div>
        <a class="evm-btn evm-btn-outline" href="<?php echo esc_url(home_url('/visa-guides/')); ?>"><?php esc_html_e('View All Guides', 'easy-visa-myanmar'); ?></a>
      </div>
      <?php echo do_shortcode('[evm_visa_guides limit="3"]'); ?>
    </div>
  </section>

  <?php if (evm_has_public_testimonials()) : ?>
    <section id="customer-reviews" class="evm-section evm-testimonials-section">
      <div class="evm-container">
        <div class="section-heading compact">
          <span class="section-kicker"><?php esc_html_e('Customer Reviews', 'easy-visa-myanmar'); ?></span>
          <h2><?php esc_html_e('Trusted by customers who need simple support', 'easy-visa-myanmar'); ?></h2>
          <p><?php esc_html_e('Real customer reviews can be edited from WordPress Admin → Customer Reviews.', 'easy-visa-myanmar'); ?></p>
        </div>
        <?php echo do_shortcode('[evm_testimonials]'); ?>
      </div>
    </section>
  <?php endif; ?>

  <section id="help-support" class="evm-section evm-help-support-section">
    <div class="evm-container">
      <div class="help-support-card">
        <div class="help-support-content">
          <span class="section-kicker"><?php esc_html_e('Help & Support', 'easy-visa-myanmar'); ?></span>
          <h2><?php esc_html_e('Need help with Thailand, Singapore, Vietnam, Laos or another country?', 'easy-visa-myanmar'); ?></h2>
          <p><?php esc_html_e('Choose your service tab, submit details, and our admin team will contact you soon. Easy Visa For Myanmar supports worldwide visa and travel requests for all customers. For safety, do not send passport photos, ID cards or bank details through website forms.', 'easy-visa-myanmar'); ?></p>
        </div>

        <div class="help-support-actions">
          <a class="help-support-action" href="<?php echo esc_url(home_url('/about-us/')); ?>">
            <span><?php echo evm_icon_svg('shield'); ?></span>
            <strong><?php esc_html_e('About Us', 'easy-visa-myanmar'); ?></strong>
            <small><?php esc_html_e('Learn who we are and how we support customers.', 'easy-visa-myanmar'); ?></small>
          </a>

          <a class="help-support-action" href="<?php echo esc_url(home_url('/contact/')); ?>">
            <span><?php echo evm_icon_svg('chat'); ?></span>
            <strong><?php esc_html_e('Contact Support', 'easy-visa-myanmar'); ?></strong>
            <small><?php echo esc_html(evm_get_support_email()); ?></small>
          </a>

          <a class="help-support-action" href="<?php echo esc_url(home_url('/faq/')); ?>">
            <span><?php echo evm_icon_svg('blog'); ?></span>
            <strong><?php esc_html_e('FAQ', 'easy-visa-myanmar'); ?></strong>
            <small><?php esc_html_e('Read common questions before submitting your request.', 'easy-visa-myanmar'); ?></small>
          </a>

        </div>

        <div class="evm-contact-mini-grid">
          <?php foreach (evm_get_contact_links() as $contact) : ?>
            <?php if (!empty($contact['url']) && !empty($contact['value'])) : ?>
              <a href="<?php echo esc_url($contact['url']); ?>" class="evm-contact-mini-link" target="<?php echo strpos($contact['url'], 'http') === 0 ? '_blank' : '_self'; ?>" rel="noopener noreferrer">
                <span><?php echo evm_icon_svg($contact['icon']); ?></span>
                <strong><?php echo esc_html($contact['label']); ?></strong>
                <small><?php echo esc_html($contact['value']); ?></small>
              </a>
            <?php endif; ?>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>
