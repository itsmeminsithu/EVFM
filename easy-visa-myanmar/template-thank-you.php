<?php
/**
 * Template Name: Thank You
 *
 * Thank you page after travel request submission.
 */

get_header();

$request = isset($_GET['request']) ? sanitize_key(wp_unslash($_GET['request'])) : 'travel';

$types = array(
  'flight'         => __('Flight Ticket Request', 'easy-visa-myanmar'),
  'hotel'          => __('Hotel Rent Request', 'easy-visa-myanmar'),
  'easy-pass'      => __('Easy Pass Request', 'easy-visa-myanmar'),
  'easy-extension' => __('Easy Extension Request', 'easy-visa-myanmar'),
  'letter-service' => __('Letter Service Request', 'easy-visa-myanmar'),
  'tm30-service'   => __('TM30 Service Request', 'easy-visa-myanmar'),
  'travel'         => __('Travel Request', 'easy-visa-myanmar'),
);

$messages = array(
  'flight'         => __('Your flight request has been saved. Our team will contact you to confirm route, dates and next steps.', 'easy-visa-myanmar'),
  'hotel'          => __('Your hotel request has been saved. Our team will contact you to confirm stay options and next steps.', 'easy-visa-myanmar'),
  'easy-pass'      => __('Your Easy Pass request has been saved. Our team will contact you through your selected method.', 'easy-visa-myanmar'),
  'easy-extension' => __('Your Easy Extension request has been saved. Our team will contact you to confirm timing and next steps.', 'easy-visa-myanmar'),
  'letter-service' => __('We received your Letter Service request. Our team will contact you through your selected method to confirm the letter type, spelling and next steps.', 'easy-visa-myanmar'),
  'tm30-service'   => __('We received your TM30 request. Our team will contact you through your selected delivery/contact method. Please do not send private documents until our team confirms the next step.', 'easy-visa-myanmar'),
  'travel'         => __('Your request has been saved safely. Please wait for our team to contact you using the phone, email or contact details you submitted.', 'easy-visa-myanmar'),
);

$request_label = isset($types[$request]) ? $types[$request] : $types['travel'];
$request_message = isset($messages[$request]) ? $messages[$request] : $messages['travel'];

$quote = evm_get_random_quote('thank_you');
?>

<main id="primary" class="site-main thank-you-main">
  <section class="thank-you-section">
    <div class="evm-container">
      <div class="thank-you-card">
        <div class="thank-you-icon">
          <?php echo evm_icon_svg('shield'); ?>
        </div>

        <span class="section-kicker"><?php esc_html_e('Request Received', 'easy-visa-myanmar'); ?></span>
        <h1><?php esc_html_e('Thank you. We will contact you soon.', 'easy-visa-myanmar'); ?></h1>

        <p class="thank-you-request">
          <?php echo esc_html($request_label); ?>
        </p>

        <blockquote>
          <?php echo esc_html($quote); ?>
        </blockquote>

        <p class="thank-you-note">
          <?php echo esc_html($request_message); ?>
        </p>

        <div class="thank-you-actions">
          <a class="evm-btn evm-btn-primary" href="<?php echo esc_url(home_url('/')); ?>">
            <?php esc_html_e('Back to Home', 'easy-visa-myanmar'); ?>
          </a>
          <a class="evm-btn evm-btn-outline thank-you-outline" href="mailto:<?php echo esc_attr(evm_get_support_email()); ?>">
            <?php echo esc_html(evm_get_support_email()); ?>
          </a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
