<?php
/**
 * Template Name: Contact / Inquiry Page
 */
get_header();
?>

<main id="primary" class="site-main">
  <section class="page-hero">
    <div class="evm-container">
      <h1><?php the_title(); ?></h1>
      <p><?php esc_html_e('Send an inquiry for visa help, flight tickets, hotel rent, airport transfer or travel questions.', 'easy-visa-myanmar'); ?></p>
    </div>
  </section>

  <section class="evm-section">
    <div class="evm-container evm-contact-grid">
      <div class="entry-content">
        <?php while (have_posts()) : the_post(); ?>
          <?php the_content(); ?>
        <?php endwhile; ?>

        <h2><?php esc_html_e('Service Types', 'easy-visa-myanmar'); ?></h2>
        <ul>
          <li><?php esc_html_e('Myanmar Visa Service', 'easy-visa-myanmar'); ?></li>
          <li><?php esc_html_e('Flight Ticket Booking', 'easy-visa-myanmar'); ?></li>
          <li><?php esc_html_e('Hotel Rent', 'easy-visa-myanmar'); ?></li>
          <li><?php esc_html_e('Airport Transfer', 'easy-visa-myanmar'); ?></li>
          <li><?php esc_html_e('Travel Knowledge Question', 'easy-visa-myanmar'); ?></li>
        </ul>
      </div>

      <form class="evm-contact-form" action="mailto:<?php echo esc_attr(get_option('admin_email')); ?>" method="post" enctype="text/plain">
        <p>
          <label><?php esc_html_e('Name', 'easy-visa-myanmar'); ?></label>
          <input type="text" name="name" required>
        </p>
        <p>
          <label><?php esc_html_e('Email or Phone', 'easy-visa-myanmar'); ?></label>
          <input type="text" name="contact" required>
        </p>
        <p>
          <label><?php esc_html_e('Service Type', 'easy-visa-myanmar'); ?></label>
          <select name="service">
            <option>Myanmar Visa Service</option>
            <option>Flight Ticket Booking</option>
            <option>Hotel Rent</option>
            <option>Airport Transfer</option>
            <option>Travel Question</option>
          </select>
        </p>
        <p>
          <label><?php esc_html_e('Travel Date', 'easy-visa-myanmar'); ?></label>
          <input type="date" name="travel_date">
        </p>
        <p>
          <label><?php esc_html_e('Message', 'easy-visa-myanmar'); ?></label>
          <textarea name="message" required></textarea>
        </p>
        <button class="evm-btn evm-btn-primary" type="submit"><?php esc_html_e('Send Inquiry', 'easy-visa-myanmar'); ?></button>
        <p><small><?php esc_html_e('For production, connect this page with Contact Form 7, WPForms, Fluent Forms or another form plugin.', 'easy-visa-myanmar'); ?></small></p>
      </form>
    </div>
  </section>
</main>

<?php get_footer(); ?>
